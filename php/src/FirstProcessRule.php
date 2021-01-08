<?php


namespace GildedRose;

use GildedRose\ItemQuality;

class FirstProcessRule
{
    private $itemQuality;

    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
    }

    public function firstProcessRule($item)
    {

        if ($this->isNotAgedBrieBackstageItems($item)) {

            return $this->itemQuality->qualityAboveZero($item);

        }

        if ($item->quality < 50) {

            $item->quality = $item->quality + 1;


            if ($this->isBackstageItems($item)) {

                if ($item->sell_in < 11) {
                    $this->itemQuality->increaseForHalfQuality($item);
                }
                if ($item->sell_in < 6) {
                    $this->itemQuality->increaseForHalfQuality($item);
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


}