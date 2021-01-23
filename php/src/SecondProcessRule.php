<?php


namespace GildedRose;


class SecondProcessRule
{
    const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';
    public function secondProcessRule($item)
    {
        if ($item->name != self::SULFURASHANDRAGNAROS) {
            --$item->sell_in;
        }
    }

}