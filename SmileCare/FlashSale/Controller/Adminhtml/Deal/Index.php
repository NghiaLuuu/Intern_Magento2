<?php
namespace SmileCare\FlashSale\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $resultPageFactory;

    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('SmileCare_FlashSale::deal'); // Chọn menu nào sáng lên
        $resultPage->getConfig()->getTitle()->prepend(__('Flash Sale Deals')); // Tiêu đề trang
        return $resultPage;
    }

    // Kiểm tra quyền truy cập (ACL)
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('SmileCare_FlashSale::deal');
    }
}
