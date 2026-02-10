<?php

namespace App\Helpers;

class NumberToWords
{
    public static function convert($number)
    {
        $number = (int)$number;

        $ones = [
            '', 'One','Two','Three','Four','Five',
            'Six','Seven','Eight','Nine','Ten',
            'Eleven','Twelve','Thirteen','Fourteen','Fifteen',
            'Sixteen','Seventeen','Eighteen','Nineteen'
        ];

        $tens = [
            '', '', 'Twenty','Thirty','Forty',
            'Fifty','Sixty','Seventy','Eighty','Ninety'
        ];

        if ($number < 20) return $ones[$number];

        if ($number < 100) {
            return $tens[intval($number/10)] .
                   ($number%10 ? ' '.$ones[$number%10] : '');
        }

        if ($number < 1000) {
            return $ones[intval($number/100)] . ' Hundred ' .
                   self::convert($number%100);
        }

        if ($number < 1000000) {
            return self::convert(intval($number/1000)) .
                   ' Thousand ' . self::convert($number%1000);
        }

        return '';
    }
}