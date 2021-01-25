<?php


namespace GildedRose;


/**
 * Class ItemQuality
 * @package GildedRose
 */
class ItemQuality
{
    const SULFURASHANDRAGNAROS = 'Sulfuras, Hand of Ragnaros';

    /**
     * @param $item
     */
    public function qualityAboveZero($item)
    {
        if ($item->quality > 0) {
           return $this->decreaseQuality($item);
        }
    }

    /**
     * @param $item
     */
    public function increaseForHalfQuality($item)
    {
        if ($item->quality < 50) {
            ++$item->quality;
        }
    }

    /**
     * @param $item
     */
    public function decreaseQuality($item)
    {
        $isNotSulfuras = $item->name != self::SULFURASHANDRAGNAROS;

        if ($isNotSulfuras) {
            --$item->quality;
        }

    }

    /**
     * @param Item $item
     * @return int;
     */
    public function reductionQuality(Item $item): int
    {
        return $item->quality -= $item->quality;
    }

}