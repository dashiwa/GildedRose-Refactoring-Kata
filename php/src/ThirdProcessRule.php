<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class ThirdProcessRule
 * @package GildedRose
 */
class ThirdProcessRule
{
    public const AGEDBRIE = 'Aged Brie';

    public const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * @var ItemQuality
     */
    private $itemQuality;

    /**
     * @var ItemNameFilter
     */
    private $itemNameFilter;

    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
        $this->itemNameFilter = new ItemNameFilter();
    }

    public function getItemQuality(): ItemQuality
    {
        return $this->itemQuality;
    }

    public function getItemNameFilter(): ItemNameFilter
    {
        return $this->itemNameFilter;
    }

    public function thirdProcessRule(Item $item): ?int
    {
        if ($item->sell_in < 0) {
            if ($this->getItemNameFilter()->isNotAgedBrieItems($item)) {
                return $this->notBackstagePassesItem($item);
            }

            $this->getItemQuality()->increaseForHalfQuality($item);
        }

        return null;
    }

    public function notBackstagePassesItem(Item $item): ?int
    {
        if ($this->getItemNameFilter()->isNotBackstageItems($item)) {
            return $this->getItemQuality()->qualityAboveZero($item);
        }

        $this->getItemQuality()->reductionQuality($item);

        return null;
    }
}
