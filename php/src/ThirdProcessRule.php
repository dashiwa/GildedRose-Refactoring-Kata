<?php


namespace GildedRose;

use GildedRose\ItemQuality;

class ThirdProcessRule
{
    private $itemQuality;

    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
    }

    public function thirdProcessRule($item)
    {
        if ($item->sell_in < 0) {

            if ($item->name != 'Aged Brie') {
                return $this->notBackstagePassesItem($item);
            }

            $this->itemQuality->increaseForHalfQuality($item);

        }
    }

    public function notBackstagePassesItem($item)
    {
        if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            return $this->itemQuality->qualityAboveZero($item);
        }

        $item->quality = $item->quality - $item->quality;

    }

}