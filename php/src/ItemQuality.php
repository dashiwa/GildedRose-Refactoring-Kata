<?php


namespace GildedRose;


/**
 * Class ItemQuality
 * @package GildedRose
 */
class ItemQuality
{
    private $itemNameFilter;

    public function __construct()
    {
        $this->itemNameFilter = new ItemNameFilter();
    }

    /**
     * @param $item
     */
    public function qualityAboveZero($item): void
    {
        if ($item->quality > 0) {
           $this->decreaseQuality($item);
        }
    }

    /**
     * @param $item
     */
    public function increaseForHalfQuality($item): void
    {
        if ($item->quality < 50) {
            ++$item->quality;
        }
    }

    /**
     * @param $item
     */
    public function decreaseQuality($item): void
    {
        if ($this->itemNameFilter->isNotSulfurasHandRagnarosItems($item)) {
           --$item->quality;
        }
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
