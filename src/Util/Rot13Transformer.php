<?php


namespace App\Util;


class Rot13Transformer
{
    public function transform($value)
    {
        return str_rot13($value);
    }
}
