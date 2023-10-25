<?php

namespace App\src\Traits;

trait CalculationUtils
{
    public static function calculateStatistics(array $prices): array
    {
        foreach ($prices as $price) {
            $max = $max ?? $price;
            $min = $min ?? $price;
            $sum = $sum ?? 0;
            $max = max($price, $max);
            $min = min($price, $min);
            $sum += $price;
        }

        $max = number_format($max, 2, '.', '') ?? 0;
        $min = number_format($min, 2, '.', '') ?? 0;
        $sum = number_format($sum, 2, '.', '') ?? 0;

        $avg = number_format(count($prices) == 0 ? 0 : (float)$sum/count($prices), 2, '.', '');

        return ['max' => $max, 'min' => $min, 'avg' => $avg];
    }
}