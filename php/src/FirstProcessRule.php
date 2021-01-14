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
                    $SellInLessThanEleven = new SellInLessThanEleven($item);
                    $SellInLessThanEleven->IncreaseQuality($this->itemQuality);
                }
                if ($item->sell_in < 6) {
                    $SellInLessThanSix = new SellInLessThanSix($item);
                    $SellInLessThanSix->IncreaseQuality($this->itemQuality);
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