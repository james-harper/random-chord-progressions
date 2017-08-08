<?php

namespace Tests\Unit\Progression;

use App\Models\Key\Key;
use App\Models\Progression\Random\RandomProgression;
use App\Models\Progression\Random\RhythmicProgression;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgressionTest extends TestCase
{
    public function testRandomProgression()
    {
        $progression = new RandomProgression(Key::make('C'), 8);
        $bars = $progression->getBars();

        $this->assertEquals($bars[0]['chords'], ['C major']);
        $this->assertEquals(8, count($bars));
    }

    public function testRandomRhythmicProgression()
    {
        $progression = new RhythmicProgression(Key::make('C'), 16);
        $bars = $progression->getBars();

        $this->assertArrayHasKey('chords', $bars[0]);
        $this->assertArrayHasKey('pattern', $bars[0]);
        $this->assertEquals(16, count($bars));
    }
}
