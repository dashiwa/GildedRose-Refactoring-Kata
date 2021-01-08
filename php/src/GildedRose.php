<?php

declare(strict_types=1);

namespace GildedRose;


final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {

            $itemQuality = new ItemQuality();
            $firstProcessRule = new FirstProcessRule($itemQuality);

            $firstProcessRule->firstProcessRule($item);


            $secondProcessRule = new SecondProcessRule();

            $secondProcessRule->secondProcessRule($item);


            $thirdProcessRule = new ThirdProcessRule($itemQuality);

            $thirdProcessRule->thirdProcessRule($item);

        }
    }
}
