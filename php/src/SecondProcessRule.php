<?php

namespace GildedRose;

/**
 * Class SecondProcessRule
 * @package GildedRose
 */
class SecondProcessRule
{
    private $itemNameFilter;

    public function __construct()
    {
        $this->itemNameFilter = new ItemNameFilter();
    }

    /**
     * @param Item $item
     */
    public function secondProcessRule(Item $item): void
    {
        if ($this->itemNameFilter->isSulfurasHandRagnarosItems($item)) {
            --$item->sell_in;
        }
    }

}