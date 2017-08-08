<?php

namespace App\Models\Progression\Random;

use App\Lookup\Chord;
use App\Models\Chord\BaseChord;
use App\Models\Key\BaseKey;

class RandomProgression
{
    protected $bars = [];
    protected $chords = [];
    protected $excludedExtensions = [Chord::DIMINISHED];
    protected $key;

    public function __construct(BaseKey $key, int $numBars)
    {
        $this->key = $key;
        $this->generateRandomBars($numBars);
    }

    public function getChords() : array
    {
        if (!empty($this->chords)) {
            return $this->chords;
        }

        $chords = $this->key->getChords();

        return $this->chords = array_values(
            array_filter($chords, function ($chord) {
                return !in_array(
                    $chord->getExtension(), $this->excludedExtensions
                );
            })
        );
    }

    public function getBars() : array
    {
        return $this->bars;
    }

    public function addBar(array $bar) : void
    {
        $this->bars[] = $bar;
    }

    protected function getRandomChord() : BaseChord
    {
        $chords = $this->getChords();
        $randomIndex = random_int(0, count($chords) - 1);
        return $chords[$randomIndex];
    }

    protected function generateRandomBars(int $numBars) : void
    {
        for ($i = 0; $i < $numBars; $i++) {
            $chord = ($i === 0) ?
                $this->getChords()[0] : $this->getRandomChord();

            $this->addBar([
                'chords' => [$chord->getName()],
            ]);
        }
    }
}