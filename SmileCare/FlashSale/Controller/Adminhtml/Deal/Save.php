<?php
namespace SmileCare\FlashSale\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use SmileCare\FlashSale\Model\DealFactory;
use SmileCare\FlashSale\Model\ResourceModel\Deal as DealResource;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;

class Save extends Action
{
    /**
     * Authorization level of a basic admin session
     */
    const ADMIN_RESOURCE = 'SmileCare_FlashSale::deal';

    /**
     * @var DealFactory
     */
    protected $dealFactory;

    /**
     * @var DealResource
     */
    protected $dealResource;

    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @param Context $context
     * @param DealFactory $dealFactory
     * @param DealResource $dealResource
     * @param DataPersistorInterface $dataPersistor
     */
    public function __construct(
        Context $context,
        DealFactory $dealFactory,
        DealResource $dealResource,
        DataPersistorInterface $dataPersistor
    ) {
        parent::__construct($context);
        $this->dealFactory = $dealFactory;
        $this->dealResource = $dealResource;
        $this->dataPersistor = $dataPersistor;
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        
        if ($data) {
            // Xử lý nested data từ UI Component form (data có thể nằm trong key 'general')
            if (isset($data['general']) && is_array($data['general'])) {
                $data = array_merge($data, $data['general']);
                unset($data['general']);
            }
            
            // Lấy deal_id từ data hoặc request param
            $dealId = !empty($data['deal_id']) ? $data['deal_id'] : $this->getRequest()->getParam('id');
            
            try {
                $deal = $this->dealFactory->create();
                
                // Nếu có ID thì load deal để update
                if ($dealId) {
                    $this->dealResource->load($deal, $dealId);
                    if (!$deal->getId()) {
                        $this->messageManager->addErrorMessage(__('This deal no longer exists.'));
                        return $resultRedirect->setPath('*/*/');
                    }
                }
                
                // Loại bỏ các key không cần thiết
                unset($data['form_key']);
                
                // Xử lý empty deal_id cho create mới
                if (empty($data['deal_id'])) {
                    unset($data['deal_id']);
                }
                
                // Nếu đang edit: dùng addData để merge với data cũ
                // Nếu đang create: dùng setData
                if ($deal->getId()) {
                    $deal->addData($data);
                } else {
                    $deal->setData($data);
                }
                
                // Save
                $this->dealResource->save($deal);
                
                // Clear data persistor
                $this->dataPersistor->clear('smilecare_flashsale_deal');
                
                $this->messageManager->addSuccessMessage(__('You saved the deal.'));
                
                // Xử lý redirect
                // - Nếu có param 'back' hoặc 'redirect' = 'continue' → quay về edit
                // - Nếu không → quay về listing
                $redirect = $this->getRequest()->getParam('back');
                if (!$redirect) {
                    $redirect = $this->getRequest()->getParam('redirect');
                }
                
                if ($redirect === 'continue' || $redirect === 'edit' || $redirect) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $deal->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
                
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the deal.'));
            }
            
            // Lưu data vào persistor để hiển thị lại khi có lỗi
            $this->dataPersistor->set('smilecare_flashsale_deal', $data);
            
            if ($dealId) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $dealId]);
            }
            return $resultRedirect->setPath('*/*/new');
        }
        
        return $resultRedirect->setPath('*/*/');
    }
}
