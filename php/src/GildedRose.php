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

    /**
     * @var FirstProcessRule
     */
    private $firstProcessRule;

    /**
     * @var SecondProcessRule
     */
    private $secondProcessRule;

    /**
     * @var ThirdProcessRule
     */
    private $thirdProcessRule;

    public function __construct(array $items)
    {
        $itemQuality = new ItemQuality();
        $this->items = $items;
        $this->firstProcessRule = new FirstProcessRule($itemQuality);
        $this->secondProcessRule = new SecondProcessRule();
        $this->thirdProcessRule = new ThirdProcessRule($itemQuality);
    }

    public function getFirstProcessRule(): FirstProcessRule
    {
        return $this->firstProcessRule;
    }

    public function getSecondProcessRule(): SecondProcessRule
    {
        return $this->secondProcessRule;
    }

    public function getThirdProcessRule(): ThirdProcessRule
    {
        return $this->thirdProcessRule;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $this->getFirstProcessRule()->firstProcessRule($item);
            $this->getSecondProcessRule()->secondProcessRule($item);
            $this->getThirdProcessRule()->thirdProcessRule($item);
        }
    }
}
