<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Conferences;
use App\Models\Attendances;
use Carbon\Carbon;

class ConferenceController extends Controller
{
    public function list()
    {
        $conferences = Conferences::all();
        return view('conference.list', [
            'conferences' => $conferences
        ]);
    }

    public function qr($id)
    {
        $conferences = Conferences::find($id);
        return view('conference.qr', [
            'conference' => $conferences
        ]);
    }

    public function create()
    {
        return view('conference.create');
    }

    public function created(Request $request)
    {
        $conference = new Conferences();

        $conference->conference_name = $request->conference_name;
        $conference->class_number = $request->class_number;
        $conference->deadline = $request->deadline;
        $conference->date = $request->date;
        $conference->start_time = $request->start_time;
        $conference->end_time = $request->end_time;
        $conference->location = $request->location;
        $conference->note = $request->note;
        $conference->attendances_url = uniqid();
        $conference->author = Auth::id();

        $conference->save();

        return redirect(route('conference.list'));
    }

    public function entry($id)
    {
        $attendance = Attendances::where('conferences_id', $id)->where('users_id', Auth::id())->get()->first();
        $conference = Conferences::find($id);

        return view('conference.entry', [
            'conference' => $conference,
            'attendance' => $attendance,
        ]);
    }

    public function registration(Request $request)
    {
        if (empty(Attendances::where('conferences_id', $request->conference_id)->where('users_id',  Auth::id())->get()->first())) {
            $attendance = new Attendances();

            $attendance->conferences_id = $request->conference_id;
            $attendance->users_id = Auth::id();
            $attendance->father = ($request->father == 'father');
            $attendance->mother = ($request->mother == 'mother');
            $attendance->other = ($request->other == 'other');
            $attendance->entry = ($request->entry == 'attendance');
            $attendance->entry_at = Carbon::now();
            $attendance->attendance = false;
            $attendance->attendance_at = NULL;

            $attendance->save();
        } else {
            $attendance = Attendances::where('conferences_id', $request->conference_id)->where('users_id', Auth::id())->get()->first();

            $attendance->conferences_id = $request->conference_id;
            $attendance->users_id = Auth::id();
            $attendance->father = ($request->father == 'father');
            $attendance->mother = ($request->mother == 'mother');
            $attendance->other = ($request->other == 'other');
            $attendance->entry = ($request->entry == 'attendance');
            $attendance->entry_at = Carbon::now();

            $attendance->save();
        }

        return redirect(route('conference.list'));
    }

    public function attendance($id)
    {
        $attendance = Attendances::where('attendances_url', $id)->join('conferences', 'conferences.id', '=', 'conferences_id')->first();

        if (!$attendance) {
            abort(404);
        }

        return view('conference.attendance', [
            'attendance' => $attendance,
        ]);
    }

    public function attendanced(Request $request)
    {
        if (empty(Attendances::where('conferences_id', $request->conference_id)->where('users_id', Auth::id())->get()->first())) {
            #未登録
        } else {
            if (empty(Attendances::where('conferences_id', $request->conference_id)->where('users_id', Auth::id())->first()->attendance)) {
                $attendance = Attendances::where('conferences_id', $request->conference_id)->where('users_id', Auth::id())->get()->first();

                $attendance->attendance = true;
                $attendance->attendance_at = Carbon::now();

                $attendance->save();
            }
        }

        return redirect(route('conference.list'));
    }

    public function situation($id)
    {
        $attendances = Attendances::where('conferences_id', $id)->get();

        return view('conference.situation', [
            'attendances' => $attendances,
        ]);
    }
}
