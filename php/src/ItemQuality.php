<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class ItemQuality
 * @package GildedRose
 */
class ItemQuality
{
    /**
     * @var ItemNameFilter
     */
    private $itemNameFilter;

    public function __construct()
    {
        $this->itemNameFilter = new ItemNameFilter();
    }

    public function getItemNameFilter(): ItemNameFilter
    {
        return $this->itemNameFilter;
    }

    public function qualityAboveZero(Item $item): ?int
    {
        if ($item->quality > 0) {
            return $this->decreaseQuality($item);
        }

        return null;
    }

    public function increaseForHalfQuality(Item $item): ?int
    {
        if ($item->quality < 50) {
            return ++$item->quality;
        }

        return null;
    }

    public function decreaseQuality(Item $item): ?int
    {
        if ($this->getItemNameFilter()->isNotSulfurasHandRagnarosItems($item)) {
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
