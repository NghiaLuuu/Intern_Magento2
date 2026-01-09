<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

interface BrandManagementInterface
{
    /**
     * Enable brand by URL key
     *
     * @param string $urlKey
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function enableBrandByUrlKey(string $urlKey): bool;

    /**
     * Disable brand by URL key
     *
     * @param string $urlKey
     * @return bool
     * @throws NoSuchEntityException
     * @throws LocalizedException
     */
    public function disableBrandByUrlKey(string $urlKey): bool;
}
