<?php


namespace GildedRose;


class SellInLessThanSix implements SellInIncreaseQuality
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function IncreaseQuality(ItemQuality $itemQuality)
    {
        $itemQuality->increaseForHalfQuality($this->item);
    }

}