<?php

namespace GildedRose;

use GildedRose\ItemQuality;

/**
 * Class ThirdProcessRule
 * @package GildedRose
 */
class ThirdProcessRule
{
    public const AGEDBRIE = 'Aged Brie';
    public const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';

    private $itemQuality;
    private $itemNameFilter;


    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
        $this->itemNameFilter = new ItemNameFilter();
    }

    /**
     * @param Item $item
     */
    public function thirdProcessRule(Item $item)
    {
        if ($item->sell_in < 0) {

            if ($this->itemNameFilter->isNotAgedBrieItems($item)) {
                return $this->notBackstagePassesItem($item);
            }

            $this->itemQuality->increaseForHalfQuality($item);

        }
    }

    /**
     * @param Item $item
     */
    public function notBackstagePassesItem(Item $item)
    {
        if ($this->itemNameFilter->isNotBackstageItems($item)) {
            return $this->itemQuality->qualityAboveZero($item);
        }

        $this->itemQuality->reductionQuality($item);

    }



}