<?php
namespace SmileCare\FlashSale\Controller\Adminhtml\Deal;

use Magento\Backend\App\Action;

class NewAction extends Action
{
    /**
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'SmileCare_FlashSale::deal';

    /**
     * Create new Deal
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // Chuyển tiếp request sang action 'edit'
        return $this->_forward('edit');
    }
}
