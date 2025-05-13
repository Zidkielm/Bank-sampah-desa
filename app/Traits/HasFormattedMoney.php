<?php

namespace App\Traits;

trait HasFormattedMoney
{
    /**
     * Format a number as Indonesian currency
     *
     * @param float|int $value
     * @param bool $withSymbol
     * @return string
     */
    public function formatMoney($value, $withSymbol = true)
    {
        if ($withSymbol) {
            return 'Rp ' . number_format($value, 0, ',', '.');
        }

        return number_format($value, 0, ',', '.');
    }

    /**
     * Format a number as Indonesian weight
     *
     * @param float|int $value
     * @param bool $withSymbol
     * @return string
     */
    public function formatWeight($value, $withSymbol = true)
    {
        if ($withSymbol) {
            return 'Kg ' . number_format($value, 0, ',', '.');
        }

        return number_format($value, 0, ',', '.');
    }

    /**
     * Format a number with 2 decimal places
     *
     * @param float|int $value
     * @return string
     */
    public function formatDecimal($value)
    {
        return number_format($value, 2, '.', ',');
    }
}
