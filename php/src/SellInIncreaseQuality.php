<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Interface SellInIncreaseQuality
 * @package GildedRose
 */
interface SellInIncreaseQuality
{
    /**
     * @param ItemQuality $itemQuality
     * @return mixed
     */
    public function IncreaseQuality(ItemQuality $itemQuality);
}
