<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use NghiaStore\Brand\Api\Data\BrandInterface;
use NghiaStore\Brand\Api\Data\BrandSearchResultsInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface BrandRepositoryInterface
{
    /**
     * Save brand
     *
     * @param BrandInterface $brand
     * @return BrandInterface
     * @throws LocalizedException
     */
    public function save(BrandInterface $brand): BrandInterface;

    /**
     * Get brand by ID
     *
     * @param int $brandId
     * @return BrandInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $brandId): BrandInterface;

    /**
     * Delete brand
     *
     * @param BrandInterface $brand
     * @return bool
     * @throws LocalizedException
     */
    public function delete(BrandInterface $brand): bool;

    /**
     * Delete brand by ID
     *
     * @param int $brandId
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function deleteById(int $brandId): bool;

    /**
     * Get brand list
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return BrandSearchResultsInterface
     */
    public function getList(
        SearchCriteriaInterface $searchCriteria
    ): BrandSearchResultsInterface;
}
