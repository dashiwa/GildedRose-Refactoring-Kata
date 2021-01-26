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
        if ($this->itemNameFilter->isNotSulfurasHandRagnarosItems($item)) {
            $this->decreaseSellInItem($item);
        }
    }

    /**
     * @param Item $item
     * @return int
     */
    public function decreaseSellInItem(Item $item): int
    {
        return --$item->sell_in;
    }

}