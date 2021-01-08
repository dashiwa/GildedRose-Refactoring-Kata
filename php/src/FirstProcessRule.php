<?php


namespace GildedRose;


class FirstProcessRule
{
    public function firstProcessRule($item)
    {

        if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            return $this->qualityAboveZero($item);
        }

        if ($item->quality < 50) {

            $item->quality = $item->quality + 1;

            $isBackstagePasses = $item->name == 'Backstage passes to a TAFKAL80ETC concert';

            if ($isBackstagePasses) {
                if ($item->sell_in < 11) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
                if ($item->sell_in < 6) {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }
        }


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

}