<?php

declare(strict_types=1);

namespace GildedRose;

/**
 * Class SecondProcessRule
 * @package GildedRose
 */
class SecondProcessRule
{
    /**
     * @var ItemNameFilter
     */
    private $itemNameFilter;

    public function __construct()
    {
        $this->itemNameFilter = new ItemNameFilter();
    }

    public function getItemNameFilter(): ItemNameFilter
    {
        return $this->itemNameFilter;
    }

    public function secondProcessRule(Item $item): void
    {
        if ($this->getItemNameFilter()->isNotSulfurasHandRagnarosItems($item)) {
            $this->decreaseSellInItem($item);
        }
    }

    public function decreaseSellInItem(Item $item): int
    {
        return --$item->sell_in;
    }
}
