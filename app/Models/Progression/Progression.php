<?php

namespace App\Models\Progression;

class Progression
{
    protected $bars = [];

    public function getBars() : array
    {
        return $this->bars;
    }

    public function addBar(array $bar)
    {
        $this->bars[] = $bar;
    }
}