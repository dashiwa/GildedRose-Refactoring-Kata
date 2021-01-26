<?php

declare(strict_types=1);

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


    public function secondProcessRule(Item $item): void
    {
        if ($this->itemNameFilter->isNotSulfurasHandRagnarosItems($item)) {
            $this->decreaseSellInItem($item);
        }
    }

    /**
     * @return int
     */
    public function decreaseSellInItem(Item $item): int
    {
        return --$item->sell_in;
    }
}
