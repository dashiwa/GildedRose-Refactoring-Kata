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

    public function isBackstageItems(Item $item): bool
    {
        return $item->name === self::BACKSTAGEPASSES;
    }

    public function isNotBackstageItems(Item $item): bool
    {
        return $item->name !== self::BACKSTAGEPASSES;
    }

    public function isNotAgedBrieBackstageItems(Item $item): bool
    {
        return $item->name !== self::AGEDBRIE && $item->name !== self::BACKSTAGEPASSES;
    }

    public function isNotAgedBrieItems(Item $item): bool
    {
        return $item->name !== self::AGEDBRIE;
    }

    public function isNotSulfurasHandRagnarosItems(Item $item): bool
    {
        return $item->name !== self::SULFURASHANDRAGNAROS;
    }
}
