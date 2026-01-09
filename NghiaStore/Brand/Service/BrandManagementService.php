<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Service;

use NghiaStore\Brand\Api\BrandManagementInterface;
use NghiaStore\Brand\Api\BrandRepositoryInterface;
use NghiaStore\Brand\Model\ResourceModel\Brand\CollectionFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class BrandManagementService implements BrandManagementInterface
{
    /**
     * @var BrandRepositoryInterface
     */
    protected BrandRepositoryInterface $brandRepository;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    public function __construct(
        BrandRepositoryInterface $brandRepository,
        CollectionFactory $collectionFactory
    ) {
        $this->brandRepository = $brandRepository;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @inheritdoc
     */
    public function enableBrandByUrlKey(string $urlKey): bool
    {
        $brand = $this->getBrandByUrlKey($urlKey);

        if ((int)$brand->getIsActive() === 1) {
            return true; // đã active rồi
        }

        $brand->setIsActive(1);
        $this->brandRepository->save($brand);

        return true;
    }

    /**
     * @inheritdoc
     */
    public function disableBrandByUrlKey(string $urlKey): bool
    {
        $brand = $this->getBrandByUrlKey($urlKey);

        if ((int)$brand->getIsActive() === 0) {
            return true; // đã disable rồi
        }

        $brand->setIsActive(0);
        $this->brandRepository->save($brand);

        return true;
    }

    /**
     * Load brand entity by url_key
     *
     * @param string $urlKey
     * @return \NghiaStore\Brand\Api\Data\BrandInterface
     * @throws NoSuchEntityException
     */
    private function getBrandByUrlKey(string $urlKey)
    {
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('url_key', $urlKey);
        $collection->setPageSize(1);

        $brand = $collection->getFirstItem();

        if (!$brand->getId()) {
            throw new NoSuchEntityException(
                __('Brand with URL key "%1" does not exist.', $urlKey)
            );
        }

        return $brand;
    }
}
