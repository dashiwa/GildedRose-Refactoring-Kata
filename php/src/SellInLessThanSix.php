<?php


namespace GildedRose;


/**
 * Class SellInLessThanSix
 * @package GildedRose
 */
class SellInLessThanSix implements SellInIncreaseQuality
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @param ItemQuality $itemQuality
     */
    public function IncreaseQuality(ItemQuality $itemQuality)
    {
        $itemQuality->increaseForHalfQuality($this->item);
    }

}