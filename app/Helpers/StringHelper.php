<?php

namespace App\Helpers;

function stripDotsAndHyphens (string $text): string
{
    return strtr($text, array('.' => '', '-' => ''));
}
