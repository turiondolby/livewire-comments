<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class EpisodesController extends Controller
{
    public function __invoke(Episode $episode)
    {
        return view('episodes.show', compact('episode'));
    }
}
