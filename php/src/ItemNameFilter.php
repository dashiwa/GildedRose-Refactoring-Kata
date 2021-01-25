<?php


namespace GildedRose;


/**
 * Class ItemNameFilter
 * @package GildedRose
 */
class ItemNameFilter
{
    public const AGEDBRIE = 'Aged Brie';
    public const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * @param Item $item
     * @return bool
     */
    public function isBackstageItems(Item $item): bool
    {
        return $item->name === self::BACKSTAGEPASSES;
    }

    /**
     * @param Item $item
     * @return bool
     */
    public function isNotAgedBrieBackstageItems(Item $item): bool
    {
        return $item->name !== self::AGEDBRIE && $item->name !== self::BACKSTAGEPASSES;
    }

}