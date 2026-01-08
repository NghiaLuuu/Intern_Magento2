<?php
namespace SmileCare\FlashSale\Model\ResourceModel\Deal;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'deal_id'; // Khóa chính

    protected function _construct()
    {
        // Khai báo cặp đôi hoàn hảo: Model Deal và ResourceModel Deal
        $this->_init(
            \SmileCare\FlashSale\Model\Deal::class,
            \SmileCare\FlashSale\Model\ResourceModel\Deal::class
        );
    }
}
