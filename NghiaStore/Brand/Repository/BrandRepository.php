<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Repository;

use NghiaStore\Brand\Api\BrandRepositoryInterface;
use NghiaStore\Brand\Api\Data\BrandInterface;
use NghiaStore\Brand\Api\Data\BrandSearchResultsInterface;
use NghiaStore\Brand\Api\Data\BrandSearchResultsInterfaceFactory;
use NghiaStore\Brand\Model\BrandFactory;
use NghiaStore\Brand\Model\ResourceModel\Brand as BrandResource;
use NghiaStore\Brand\Model\ResourceModel\Brand\CollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotDeleteException;

class BrandRepository implements BrandRepositoryInterface
{
    /**
     * @var BrandResource
     */
    protected BrandResource $resource;

    /**
     * @var BrandFactory
     */
    protected BrandFactory $brandFactory;

    /**
     * @var CollectionFactory
     */
    protected CollectionFactory $collectionFactory;

    /**
     * @var BrandSearchResultsInterfaceFactory
     */
    protected BrandSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;

    public function __construct(
        BrandResource $resource,
        BrandFactory $brandFactory,
        CollectionFactory $collectionFactory,
        BrandSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->brandFactory = $brandFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritdoc
     */
    public function save(BrandInterface $brand): BrandInterface
    {
        // Validate đơn giản
        if (!$brand->getName()) {
            throw new CouldNotSaveException(__('Brand name is required.'));
        }

        if (!$brand->getUrlKey()) {
            throw new CouldNotSaveException(__('URL key is required.'));
        }

        try {
            /** @var \NghiaStore\Brand\Model\Brand $brand */
            $this->resource->save($brand);
        } catch (CouldNotSaveException $e) {
            throw $e;
        } catch (\Exception $e) {
            throw new CouldNotSaveException(
                __('Could not save brand: %1', $e->getMessage()),
                $e
            );
        }

        return $brand;
    }

    /**
     * @inheritdoc
     */
    public function getById(int $brandId): BrandInterface
    {
        $brand = $this->brandFactory->create();
        $this->resource->load($brand, $brandId);

        if (!$brand->getId()) {
            throw new NoSuchEntityException(
                __('Brand with ID "%1" does not exist.', $brandId)
            );
        }

        return $brand;
    }

    /**
     * @inheritdoc
     */
    public function delete(BrandInterface $brand): bool
    {
        try {
            /** @var \NghiaStore\Brand\Model\Brand $brand */
            $this->resource->delete($brand);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(
                __('Could not delete brand: %1', $e->getMessage())
            );
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function deleteById(int $brandId): bool
    {
        $brand = $this->getById($brandId);
        return $this->delete($brand);
    }

    /**
     * @inheritdoc
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    ): BrandSearchResultsInterface {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
