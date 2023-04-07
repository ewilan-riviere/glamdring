<?php

if (! function_exists('format_date')) {
    function format_date(string $date)
    {
        $date = new DateTime($date);

        return $date->format('d/m/Y H:i');
    }
}
