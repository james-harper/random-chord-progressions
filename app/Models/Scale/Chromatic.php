<?php

namespace App\Models\Scale;

class Chromatic extends BaseScale
{
    protected function getIntervals() : string
    {
        return 'HHHHHHHHHHHH';
    }
}