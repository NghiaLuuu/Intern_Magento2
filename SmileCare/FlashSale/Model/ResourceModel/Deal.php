<?php
namespace SmileCare\FlashSale\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Deal extends AbstractDb
{
    protected function _construct()
    {
        // Tên bảng (smilecare_flash_sale) và Khóa chính (deal_id)
        $this->_init('smilecare_flash_sale', 'deal_id');
    }
}
