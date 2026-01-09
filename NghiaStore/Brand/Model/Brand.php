<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use NghiaStore\Brand\Api\Data\BrandInterface;
use NghiaStore\Brand\Model\ResourceModel\Brand as BrandResource;

class Brand extends AbstractExtensibleModel implements BrandInterface
{
    /**
     * Initialize resource model
     */
    protected function _construct(): void
    {
        $this->_init(\NghiaStore\Brand\Model\ResourceModel\Brand::class);
    }

    /**
     * @inheritdoc
     */
    public function getId(): ?int
    {
        $value = $this->_getData(self::ID);
        return $value !== null ? (int) $value : null;
    }

    /**
     * @inheritdoc
     */
    public function setId($brandId): self
    {
        return $this->setData(self::ID, $brandId);
    }

    /**
     * @inheritdoc
     */
    public function getName(): ?string
    {
        return $this->_getData(self::NAME);
    }

    /**
     * @inheritdoc
     */
    public function setName($name): self
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @inheritdoc
     */
    public function getUrlKey(): ?string
    {
        return $this->_getData(self::URL_KEY);
    }

    /**
     * @inheritdoc
     */
    public function setUrlKey($urlKey): self
    {
        return $this->setData(self::URL_KEY, $urlKey);
    }

    /**
     * @inheritdoc
     */
    public function getDescription(): ?string
    {
        return $this->_getData(self::DESCRIPTION);
    }

    /**
     * @inheritdoc
     */
    public function setDescription($description): self
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritdoc
     */
    public function getImage(): ?string
    {
        return $this->_getData(self::IMAGE);
    }

    /**
     * @inheritdoc
     */
    public function setImage($image): self
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * @inheritdoc
     */
    public function getIsActive(): ?int
    {
        $value = $this->_getData(self::IS_ACTIVE);
        return $value !== null ? (int) $value : null;
    }

    /**
     * @inheritdoc
     */
    public function setIsActive($isActive): self
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * @inheritdoc
     */
    public function getIsFeatured(): ?int
    {
        $value = $this->_getData(self::IS_FEATURED);
        return $value !== null ? (int) $value : null;
    }

    /**
     * @inheritdoc
     */
    public function setIsFeatured($isFeatured): self
    {
        return $this->setData(self::IS_FEATURED, $isFeatured);
    }
}
