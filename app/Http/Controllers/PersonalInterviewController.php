<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal_interviews;

class PersonalInterviewController extends Controller
{
    public function create()
    {
        return view('personal_interview.create');
    }

    public function created(Request $request)
    {
        $interview = new Personal_interviews();

        $interview->conferences_id = $request->conferences_id;
        $interview->start = $request->start;
        $interview->location = $request->location;
        $interview->minutes = $request->minutes;
        $interview->author = 99;

        $interview->save();

        return redirect(route('conference.list'));
    }
}
