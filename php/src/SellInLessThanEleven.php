<?php


namespace GildedRose;


/**
 * Class SellInLessThanEleven
 * @package GildedRose
 */
class SellInLessThanEleven implements SellInIncreaseQuality
{

    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @param ItemQuality $itemQuality
     */
    public function IncreaseQuality(ItemQuality $itemQuality): void
    {
        $itemQuality->increaseForHalfQuality($this->item);
    }

}