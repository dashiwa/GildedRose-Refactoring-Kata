<?php


namespace GildedRose;


/**
 * Class SecondProcessRule
 * @package GildedRose
 */
class SecondProcessRule
{
    const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @param $item
     */
    public function secondProcessRule($item)
    {
        if ($item->name != self::SULFURASHANDRAGNAROS) {
            --$item->sell_in;
        }
    }

}