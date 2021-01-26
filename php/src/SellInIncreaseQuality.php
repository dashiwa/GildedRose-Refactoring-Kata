<?php

declare(strict_types=1);

namespace GildedRose;

interface SellInIncreaseQuality
{
    /**
     * @return mixed
     */
    public function IncreaseQuality(ItemQuality $itemQuality);
}
