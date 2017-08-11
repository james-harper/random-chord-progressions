<?php

namespace Tests\Unit\Chord;

use App\Exceptions\InvalidChordException;
use App\Models\Chord\Chord;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChordTest extends TestCase
{
    public function testMajorChord()
    {
        $cMajor = Chord::make('C');
        $this->assertEquals($cMajor->getNotes(), ['C', 'E', 'G']);
        $this->assertEquals($cMajor->getName(), 'C major');
    }

    public function testMinorChord()
    {
        $cMinor = Chord::make('C', 'minor');
        $this->assertEquals($cMinor->getNotes(), ['C', 'Eb', 'G']);
        $this->assertEquals($cMinor->getName(), 'C minor');
    }

    public function testSeventhChord()
    {
        $c7 = Chord::make('C', '7');
        $this->assertEquals($c7->getNotes(), ['C', 'E', 'G', 'Bb']);
        $this->assertEquals($c7->getName(), 'C 7');
    }

    public function testMajor7Chord()
    {
        $cMaj7 = Chord::make('C', 'maj7');
        $this->assertEquals($cMaj7->getNotes(), ['C', 'E', 'G', 'B']);
        $this->assertEquals($cMaj7->getName(), 'C maj7');
    }

    public function testMinor7Chord()
    {
        $cMin7 = Chord::make('C', 'min7');
        $this->assertEquals($cMin7->getNotes(), ['C', 'Eb', 'G', 'Bb']);
        $this->assertEquals($cMin7->getName(), 'C min7');
    }

    public function testDiminishedChord()
    {
        $cDim = Chord::make('C', 'dim');
        $this->assertEquals($cDim->getNotes(), ['C', 'Eb', 'Gb']);
        $this->assertEquals($cDim->getName(), 'C dim');
    }

    public function testInvalidChord()
    {
        $this->expectException(InvalidChordException::class);
        $chord = Chord::make('C', 'INVALID');
    }
}
