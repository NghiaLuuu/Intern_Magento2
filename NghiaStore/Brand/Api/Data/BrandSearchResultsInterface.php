<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface BrandSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get brand list
     *
     * @return \NghiaStore\Brand\Api\Data\BrandInterface[]
     */
    public function getItems(): array;

    /**
     * Set brand list
     *
     * @param \NghiaStore\Brand\Api\Data\BrandInterface[] $items
     * @return $this
     */
    public function setItems(array $items): self;
}
