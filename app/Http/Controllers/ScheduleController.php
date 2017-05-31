<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedules.index');
    }

    public function store()
    {
        $this->authorize('store', Schedule::class);

        Schedule::create(request()->all());

        return back();
    }
}
