<?php

declare(strict_types=1);

namespace GildedRose;


/**
 * Class GildedRose
 * @package GildedRose
 */
final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    private $firstProcessRule;
    private $secondProcessRule;
    private $thirdProcessRule;

    public function __construct(array $items)
    {
        $itemQuality = new ItemQuality();
        $this->items = $items;
        $this->firstProcessRule = new FirstProcessRule($itemQuality);
        $this->secondProcessRule = new SecondProcessRule();
        $this->thirdProcessRule = new ThirdProcessRule($itemQuality);

    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->firstProcessRule->firstProcessRule($item);
            $this->secondProcessRule->secondProcessRule($item);
            $this->thirdProcessRule->thirdProcessRule($item);
        }
    }
}
