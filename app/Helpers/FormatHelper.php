<?php

namespace App\Helpers;

class FormatHelper
{
    /**
     * Format a number as Indonesian currency
     *
     * @param float|int $value
     * @param bool $withSymbol
     * @return string
     */
    public static function formatMoney($value, $withSymbol = true)
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
    public static function formatWeight($value, $withSymbol = true)
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
    public static function formatDecimal($value)
    {
        return number_format($value, 2, '.', ',');
    }
}
