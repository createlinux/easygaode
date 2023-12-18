<?php
if (!function_exists('egd_empty_array_to_string')) {
    function egd_empty_array_to_string($arrayOrString)
    {
        return !$arrayOrString ? "" : $arrayOrString;
    }
}

