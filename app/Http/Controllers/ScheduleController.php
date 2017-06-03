<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();

        return view('schedules.index', compact('schedules'));
    }

    public function store()
    {
        $this->authorize('store', Schedule::class);

        Schedule::persist(request()->all());

        return back();
    }
}
