<?php

namespace App\Http\Controllers;

use App\Models\Key\Key;
use App\Models\Progression\Random\RhythmicProgression;

use Illuminate\Http\Request;

class ProgressionController extends Controller
{
    public function generate()
    {
        $key = Key::make(
            request()->get('key'), request()->get('tonality', 'major')
        );

        $progression = new RhythmicProgression($key, request()->get('bars', 8));
        return json_encode($progression->getBars());
    }
}
