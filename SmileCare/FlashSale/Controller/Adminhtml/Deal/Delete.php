<?php
namespace SmileCare\FlashSale\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use SmileCare\FlashSale\Model\DealFactory;
use SmileCare\FlashSale\Model\ResourceModel\Deal as DealResource;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

class Delete extends Action
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
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @param Context $context
     * @param DealFactory $dealFactory
     * @param DealResource $dealResource
     * @param LoggerInterface $logger
     */
    public function __construct(
        Context $context,
        DealFactory $dealFactory,
        DealResource $dealResource,
        LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->dealFactory = $dealFactory;
        $this->dealResource = $dealResource;
        $this->logger = $logger;
    }

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        
        if (!$id) {
            $this->messageManager->addErrorMessage(__('We can\'t find a deal to delete.'));
            return $resultRedirect->setPath('*/*/');
        }
        
        try {
            $deal = $this->dealFactory->create();
            $this->dealResource->load($deal, $id);
            
            if (!$deal->getId()) {
                $this->messageManager->addErrorMessage(__('This deal no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            
            $this->dealResource->delete($deal);
            $this->messageManager->addSuccessMessage(__('The deal has been deleted successfully.'));
            
            return $resultRedirect->setPath('*/*/');
            
        } catch (LocalizedException $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            $this->logger->error('Flash Sale Deal Delete Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Something went wrong while deleting the deal.'));
            $this->logger->critical('Flash Sale Deal Delete Error: ' . $e->getMessage());
        }
        
        return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
    }
}
