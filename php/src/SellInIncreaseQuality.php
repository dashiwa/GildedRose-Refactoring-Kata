<?php


namespace GildedRose;


interface SellInIncreaseQuality
{
    /**
     * @param ItemQuality $itemQuality
     * @return mixed
     */
    public function IncreaseQuality(ItemQuality $itemQuality);
}