<?php


namespace GildedRose;


class SecondProcessRule
{
    public function secondProcessRule($item)
    {
        if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            $item->sell_in = $item->sell_in - 1;
        }
    }

}