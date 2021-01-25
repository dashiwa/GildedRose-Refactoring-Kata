<?php


namespace GildedRose;

use GildedRose\ItemQuality;

/**
 * Class FirstProcessRule
 * @package GildedRose
 */
class FirstProcessRule
{
    public const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';
    public const AGEDBRIE = 'Aged Brie';

    private $itemQuality;

    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
    }

    /**
     * @param Item $item
     */
    public function firstProcessRule(Item $item)
    {

        if ($this->isNotAgedBrieBackstageItems($item)) {
            return $this->itemQuality->qualityAboveZero($item);
        }

        if ($item->quality < 50) {

            ++$item->quality;

            if ($this->isBackstageItems($item)) {
                SellInFactory::SellInProcess($item, $this->itemQuality);
            }
        }
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function isNotAgedBrieBackstageItems(Item $item): bool
    {
        return $item->name !== self::AGEDBRIE && $item->name !== self::BACKSTAGEPASSES;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function isBackstageItems(Item $item): bool
    {
        return $item->name === self::BACKSTAGEPASSES;
    }


}