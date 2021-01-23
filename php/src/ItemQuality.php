<?php


namespace GildedRose;


class ItemQuality
{
    const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';

    public function qualityAboveZero($item)
    {
        if ($item->quality > 0) {

            $isNotSulfuras = $item->name != self::SULFURASHANDRAGNAROS;

            if ($isNotSulfuras) {
                --$item->quality;
            }
        }
    }

    public function increaseForHalfQuality($item)
    {
        if ($item->quality < 50) {
           ++$item->quality;
        }
    }

}