<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Brand extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct(): void
    {
        // nghiastore_brand = tên bảng
        // brand_id        = khóa chính
        $this->_init('nghiastore_brand', 'brand_id');
    }
}
