<?php


namespace GildedRose;


class ItemQuality
{
    const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';

    public function qualityAboveZero($item)
    {
        if ($item->quality > 0) {
           return $this->decreaseQuality($item);
        }
    }

    public function increaseForHalfQuality($item)
    {
        if ($item->quality < 50) {
            ++$item->quality;
        }
    }

    public function decreaseQuality($item)
    {
        $isNotSulfuras = $item->name != self::SULFURASHANDRAGNAROS;

        if ($isNotSulfuras) {
            --$item->quality;
        }

    }

}