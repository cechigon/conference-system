<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal_interviews;
use App\Models\Personal_interviews_attendances;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

    public function entry($id)
    {
        $interview = Personal_interviews::find($id);

        return view('personal_interview.entry', [
            'interview' => $interview,
        ]);
    }

    public function registration(Request $request)
    {
        if (empty(Personal_interviews_attendances::where('personal_interviews_id', $request->personal_interviews_id)->where('users_id', 1)->get()->first())) {
            $attendance = new Personal_interviews_attendances();

            $attendance->personal_interviews_id = $request->personal_interviews_id;
            $attendance->users_id = 1;

            $attendance->save();
        }

        return redirect(route('conference.list'));
    }

    public function situation($id)
    {
        //$attendances = Personal_interviews_attendances::where('personal_interviews_id', $id)->get();
        //$attendances = Personal_interviews_attendances::selectRaw('*, @row:=@row+1 as row')->where('personal_interviews_id', $id)->get();

        $count = DB::table('attendances')
        ->orderBy('attendance_at', 'desc')
        ->selectRaw('personal_interviews_attendances.id as pid, attendances.users_id, attendances.attendance_at, personal_interviews_attendances.start, personal_interviews_attendances.end, personal_interviews_attendances.created_at, personal_interviews_attendances.updated_at')->where('personal_interviews.id', $id)
        ->join('personal_interviews', 'attendances.conferences_id', '=', 'personal_interviews.conferences_id')
        ->leftjoin('personal_interviews_attendances', function ($join) {
            $join->on('personal_interviews.id', '=', 'personal_interviews_id')
                ->on('attendances.users_id', '=', 'personal_interviews_attendances.users_id');
        })->count();

        DB::statement(DB::raw('set @row:=' . $count . '+1'));

        $attendances = DB::table('attendances')
        ->orderBy('attendance_at', 'asc')
        ->selectRaw('personal_interviews_attendances.id as pid, attendances.users_id, attendances.attendance_at, personal_interviews_attendances.start, personal_interviews_attendances.end, personal_interviews_attendances.created_at, personal_interviews_attendances.updated_at, @row:=@row-1 as row')->where('personal_interviews.id', $id)
        ->join('personal_interviews', 'attendances.conferences_id', '=', 'personal_interviews.conferences_id')
        ->leftjoin('personal_interviews_attendances', function ($join) {
            $join->on('personal_interviews.id', '=', 'personal_interviews_id')
                ->on('attendances.users_id', '=', 'personal_interviews_attendances.users_id');
        })->get();

        //dd($attendances->toSql(), $attendances->getBindings());

        return view('personal_interview.situation', [
            'attendances' => $attendances,
        ]);
    }

    public function start(Request $request)
    {
        $attendance = Personal_interviews_attendances::find($request->id);
        $attendance->start = Carbon::now();
        $attendance->save();

        return redirect(route('personal_interview.situation', ['id' => $attendance->personal_interviews_id]));
    }

    public function end(Request $request)
    {
        $attendance = Personal_interviews_attendances::find($request->id);
        $attendance->end = Carbon::now();
        $attendance->save();

        return redirect(route('personal_interview.situation', ['id' => $attendance->personal_interviews_id]));
    }
}
