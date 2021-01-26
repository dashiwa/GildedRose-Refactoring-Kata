<?php


namespace GildedRose;


/**
 * Class SellInFactory
 * @package GildedRose
 */
class SellInFactory
{

    /**
     * @param $item
     * @param $itemQuality
     */
    public static function sellInProcess($item, $itemQuality)
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
