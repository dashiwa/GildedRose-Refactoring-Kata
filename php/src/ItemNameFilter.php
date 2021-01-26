<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class ItemNameFilter
 * @package GildedRose
 */
class ItemNameFilter
{
    public const AGEDBRIE = 'Aged Brie';

    public const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';

    public const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @return bool
     */
    public function isBackstageItems(Item $item): bool
    {
        return $item->name === self::BACKSTAGEPASSES;
    }

    /**
     * @return bool
     */
    public function isNotBackstageItems(Item $item): bool
    {
        return $item->name !== self::BACKSTAGEPASSES;
    }

    /**
     * @return bool
     */
    public function isNotAgedBrieBackstageItems(Item $item): bool
    {
        return $item->name !== self::AGEDBRIE && $item->name !== self::BACKSTAGEPASSES;
    }

    /**
     * @return bool
     */
    public function isNotAgedBrieItems(Item $item): bool
    {
        return $item->name !== self::AGEDBRIE;
    }

    /**
     * @return bool
     */
    public function isNotSulfurasHandRagnarosItems(Item $item): bool
    {
        return $item->name !== self::SULFURASHANDRAGNAROS;
    }
}
