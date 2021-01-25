<?php

namespace GildedRose;

/**
 * Class SecondProcessRule
 * @package GildedRose
 */
class SecondProcessRule
{
    public const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @param Item $item
     */
    public function secondProcessRule(Item $item): void
    {
        if ($item->name !== self::SULFURASHANDRAGNAROS) {
            --$item->sell_in;
        }
    }

}