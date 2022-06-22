<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conferences;

class ConferenceController extends Controller
{
    public function list()
    {
        $conferences = Conferences::all();
        return view('conference.list', [
            'conferences' => $conferences
        ]);
    }

    public function entry($id)
    {
        $conference = Conferences::find($id);
        return view('conference.entry', [
            'conference' => $conference
        ]);
    }
}
