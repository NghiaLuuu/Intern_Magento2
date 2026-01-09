<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Model\Resolver;

use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Framework\GraphQl\Config\Element\Field;
use NghiaStore\Brand\Model\ResourceModel\Brand\CollectionFactory;

class Brand implements ResolverInterface
{
    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
    }

    public function resolve(
        Field $field,
              $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ): array {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('is_active', 1);

        $result = [];

        foreach ($collection as $brand) {
            $result[] = [
                'id'    => (int)$brand->getId(),
                'name'  => $brand->getName(),
                'image' => $brand->getImage(),
            ];
        }

        return $result;
    }
}
