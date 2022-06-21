<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conferences;

class ConferenceController extends Controller
{
    public function list()
    {
        $conferences = Conferences::all(); // すべての投稿を取得
        return view('list', [
            'conferences' => $conferences
        ]);
    }
}
