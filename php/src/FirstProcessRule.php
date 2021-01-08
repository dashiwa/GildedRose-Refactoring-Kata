<?php


namespace GildedRose;


class FirstProcessRule
{
    public function firstProcessRule($item)
    {

        if ($this->isNotAgedBrieBackstageItems($item)) {
            return $this->qualityAboveZero($item);
        }

        if ($item->quality < 50) {

            $item->quality = $item->quality + 1;


            if ($this->isBackstageItems($item)) {
                if ($item->sell_in < 11) {
                    $this->increaseForHalfQuality($item);
                }
                if ($item->sell_in < 6) {
                    $this->increaseForHalfQuality($item);
                }
            }
        }


    }

    public function isNotAgedBrieBackstageItems($item)
    {
        return $item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert';
    }

    public function isBackstageItems($item)
    {
        return $item->name == 'Backstage passes to a TAFKAL80ETC concert';
    }


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