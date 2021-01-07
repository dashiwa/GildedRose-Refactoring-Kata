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
            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
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
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->quality = $item->quality - 1;
            }
        }
    }

}