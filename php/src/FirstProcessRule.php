<?php


namespace GildedRose;

use GildedRose\ItemQuality;

/**
 * Class FirstProcessRule
 * @package GildedRose
 */
class FirstProcessRule
{
    const BACKSTAGEPASSES = 'Backstage passes to a TAFKAL80ETC concert';
    const AGEDBRIE = 'Aged Brie';

    private $itemQuality;

    public function __construct(ItemQuality $itemQuality)
    {
        $this->itemQuality = $itemQuality;
    }

    /**
     * @param $item
     */
    public function firstProcessRule($item)
    {

        if ($this->isNotAgedBrieBackstageItems($item)) {
            return $this->itemQuality->qualityAboveZero($item);
        }

        if ($item->quality < 50) {

            ++$item->quality;

            if ($this->isBackstageItems($item)) {
                SellInFactory::SellInProcess($item, $this->itemQuality);
            }
        }
    }

    /**
     * @param $item
     * @return bool
     */
    public function isNotAgedBrieBackstageItems($item)
    {
        return $item->name != self::AGEDBRIE and $item->name != self::BACKSTAGEPASSES;
    }

    /**
     * @param $item
     * @return bool
     */
    public function isBackstageItems($item)
    {
        return $item->name == self::BACKSTAGEPASSES;
    }


}