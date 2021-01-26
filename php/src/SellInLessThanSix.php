<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class SellInLessThanSix
 * @package GildedRose
 */
class SellInLessThanSix implements SellInIncreaseQuality
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
