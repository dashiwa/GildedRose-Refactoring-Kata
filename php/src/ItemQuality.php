<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class ItemQuality
 * @package GildedRose
 */
class ItemQuality
{
    private $itemNameFilter;

    public function __construct()
    {
        $this->itemNameFilter = new ItemNameFilter();
    }

    /**
     * @param Item $item
     * @return int|null
     */
    public function qualityAboveZero(Item $item): ?int
    {
        if ($item->quality > 0) {
            return $this->decreaseQuality($item);
        }

        return null;
    }

    /**
     * @param Item $item
     * @return int|null
     */
    public function increaseForHalfQuality(Item $item): ?int
    {
        if ($item->quality < 50) {
            return ++$item->quality;
        }

        return null;
    }

    /**
     * @param Item $item
     * @return int|null
     */
    public function decreaseQuality(Item $item): ?int
    {
        if ($this->itemNameFilter->isNotSulfurasHandRagnarosItems($item)) {
            return --$item->quality;
        }

        return null;
    }

    /**
     * @return int;
     */
    public function reductionQuality(Item $item): int
    {
        return $item->quality -= $item->quality;
    }
}
