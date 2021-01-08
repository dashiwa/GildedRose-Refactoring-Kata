<?php


namespace GildedRose;


class ItemQuality
{
    public function qualityAboveZero($item)
    {
        if ($item->quality > 0) {

            $isNotSulfuras = $item->name != 'Sulfuras, Hand of Ragnaros';

            if ($isNotSulfuras) {
                $item->quality = $item->quality - 1;
            }
        }
    }

    public function increaseForHalfQuality($item)
    {
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }
    }

}