<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class FirstProcessRule
 * @package GildedRose
 */
class FirstProcessRule
{
    private $itemQuality;

    private $itemNameFilter;

    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemNameFilter = new ItemNameFilter();
        $this->itemQuality = $itemQuality;
    }


    public function firstProcessRule(Item $item): ?int
    {
        if ($this->itemNameFilter->isNotAgedBrieBackstageItems($item)) {
            return $this->itemQuality->qualityAboveZero($item);
        }

        if ($item->quality < 50) {
            ++$item->quality;

            if ($this->itemNameFilter->isBackstageItems($item)) {
                SellInFactory::SellInProcess($item, $this->itemQuality);
            }
        }

        return null;
    }
}
