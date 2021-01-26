<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class SellInFactory
 * @package GildedRose
 */
class SellInFactory
{
    public static function sellInProcess(Item $item, ItemQuality $itemQuality): void
    {
        if ($item->sell_in < 11) {
            $SellInLessThanEleven = new SellInLessThanEleven($item);
            $SellInLessThanEleven->IncreaseQuality($itemQuality);
        }
        if ($item->sell_in < 6) {
            $SellInLessThanSix = new SellInLessThanSix($item);
            $SellInLessThanSix->IncreaseQuality($itemQuality);
        }
    }
}
