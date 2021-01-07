<?php


namespace GildedRose;


class ThirdProcessRule
{
    public function thirdProcessRule($item)
    {
        if ($item->sell_in < 0) {

            if ($item->name != 'Aged Brie') {
                return $this->notBackstagePassesItem($item);
            }

            if ($item->quality < 50) {
                $item->quality = $item->quality + 1;
            }

        }
    }

    public function notBackstagePassesItem($item)
    {
        if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($item->quality > 0) {
                if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                    $item->quality = $item->quality - 1;
                }
            }
        } else {
            $item->quality = $item->quality - $item->quality;
        }

    }


}