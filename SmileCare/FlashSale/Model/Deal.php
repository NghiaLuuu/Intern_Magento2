<?php
namespace SmileCare\FlashSale\Model;

use Magento\Framework\Model\AbstractModel;

class Deal extends AbstractModel
{
    protected $_eventPrefix = 'smilecare_flashsale_sale'; // Sự kiện prefix (Cho nâng cao sau này)

    protected function _construct()
    {
        // Trỏ đúng vào ResourceModel của Deal
        $this->_init(\SmileCare\FlashSale\Model\ResourceModel\Deal::class);
    }
}
