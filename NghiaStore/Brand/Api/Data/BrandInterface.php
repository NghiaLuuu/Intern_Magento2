<?php
declare(strict_types=1);

namespace NghiaStore\Brand\Api\Data;

interface BrandInterface
{
    /**#@+
     * Constants for keys of data array
     */
    public const ID           = 'brand_id';
    public const NAME         = 'name';
    public const URL_KEY      = 'url_key';
    public const DESCRIPTION  = 'description';
    public const IMAGE        = 'image';
    public const IS_ACTIVE    = 'is_active';
    public const IS_FEATURED  = 'is_featured';
    /**#@-*/

    /**
     * Get brand ID
     *
     * @return int|null
     */
    public function getId(): ?int;

    /**
     * Set brand ID
     *
     * @param int $brandId
     * @return self
     */
    public function setId($brandId): self;

    /**
     * Get brand name
     *
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * Set brand name
     *
     * @param string $name
     * @return self
     */
    public function setName($name): self;

    /**
     * Get URL key
     *
     * @return string|null
     */
    public function getUrlKey(): ?string;

    /**
     * Set URL key
     *
     * @param string $urlKey
     * @return self
     */
    public function setUrlKey($urlKey): self;

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Set description
     *
     * @param string|null $description
     * @return self
     */
    public function setDescription($description): self;

    /**
     * Get image
     *
     * @return string|null
     */
    public function getImage(): ?string;

    /**
     * Set image
     *
     * @param string|null $image
     * @return self
     */
    public function setImage($image): self;

    /**
     * Get active status
     *
     * @return int|null
     */
    public function getIsActive(): ?int;

    /**
     * Set active status
     *
     * @param int $isActive
     * @return self
     */
    public function setIsActive($isActive): self;

    /**
     * Get featured status
     *
     * @return int|null
     */
    public function getIsFeatured(): ?int;

    /**
     * Set featured status
     *
     * @param int $isFeatured
     * @return self
     */
    public function setIsFeatured($isFeatured): self;
}
