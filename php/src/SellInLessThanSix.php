<?php

declare(strict_types=1);

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


    public function IncreaseQuality(ItemQuality $itemQuality): void
    {
        $itemQuality->increaseForHalfQuality($this->item);
    }
}
