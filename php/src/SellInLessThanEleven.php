<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class SellInLessThanEleven
 * @package GildedRose
 */
class SellInLessThanEleven implements SellInIncreaseQuality
{
    /**
     * @var Item
     */
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function IncreaseQuality(ItemQuality $itemQuality): void
    {
        $itemQuality->increaseForHalfQuality($this->getItem());
    }
}
