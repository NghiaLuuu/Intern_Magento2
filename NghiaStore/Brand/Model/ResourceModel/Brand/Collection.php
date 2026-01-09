<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Model\ResourceModel\Brand;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use NghiaStore\Brand\Model\Brand as BrandModel;
use NghiaStore\Brand\Model\ResourceModel\Brand as BrandResource;

class Collection extends AbstractCollection
{
    /**
     * Initialize collection
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(
            BrandModel::class,
            BrandResource::class
        );
    }
}
