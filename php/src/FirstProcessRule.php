<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class FirstProcessRule
 * @package GildedRose
 */
class FirstProcessRule
{
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
        $this->itemNameFilter = new ItemNameFilter();
        $this->itemQuality = $itemQuality;
    }

    public function getItemQuality(): ItemQuality
    {
        return $this->itemQuality;
    }

    public function getItemNameFilter(): ItemNameFilter
    {
        return $this->itemNameFilter;
    }

    public function firstProcessRule(Item $item): ?int
    {
        if ($this->getItemNameFilter()->isNotAgedBrieBackstageItems($item)) {
            return $this->getItemQuality()->qualityAboveZero($item);
        }

        if ($item->quality < 50) {
            ++$item->quality;

            if ($this->getItemNameFilter()->isBackstageItems($item)) {
                SellInFactory::SellInProcess($item, $this->getItemQuality());
            }
        }

        return null;
    }
}
