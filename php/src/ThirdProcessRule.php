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


    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
    }

    /**
     * @param Item $item
     */
    public function thirdProcessRule(Item $item)
    {
        if ($item->sell_in < 0) {

            if ($item->name !== self::AGEDBRIE) {
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
        if ($item->name !== self::BACKSTAGEPASSES) {
            return $this->itemQuality->qualityAboveZero($item);
        }

        $this->reductionQuality($item);

    }

    /**
     * @param Item $item
     * @return int;
     */
    public function reductionQuality(Item $item): int
    {
        return $item->quality -= $item->quality;
    }

}