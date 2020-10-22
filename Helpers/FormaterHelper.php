<?php

namespace Helpers;

class FormaterHelper
{
    /**
     * Remove characters and use only numbers.
     *
     * @param string $phone
     * @return string $phone
     */
    public static function formatPhone($phone)
    {
        return str_replace(['(', ')', '-', ' '], [''], $phone);
    }

    /**
     * function to insert mask phone
     *
     * @param string $phone
     * @return string
     */
    public function maskPhone($phone)
    {
        $string = '';
        $string .= '(' . substr($phone, 0, 2) . ') ';
        $string .= substr($phone, 2, 4) . '-' . substr($phone, 6, 10);
        return $string;
    }

    /**
     * Remove characters and use only numbers.
     *
     * @param string $document
     * @return string $document
     */
    public static function formatDocument($document)
    {
        return str_replace(['-', '.', '/', ' '], [''], $document);
    }
}
