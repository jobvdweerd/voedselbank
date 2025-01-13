<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;

class PlanningController extends Controller
{
    public function index()
    {
        $requests = Planning::where('status', 'pending')->get();
        return view('planning.requests', compact('requests'));
    }

    public function approve($id)
    {
        $planning = Planning::find($id);
        $planning->status = 'approved';
        $planning->save();

        return redirect()->back()->with('success', 'Planning approved.');
    }

    public function reject($id)
    {
        $planning = Planning::find($id);
        $planning->status = 'rejected';
        $planning->save();

        return redirect()->back()->with('success', 'Planning rejected.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'start_hour' => 'required|integer|min:8|max:17',
            'end_hour' => 'required|integer|min:8|max:17|gte:start_hour',
            'beschikbaar' => 'required|boolean',
            'function' => 'required|string|max:255',
        ]);

        for ($hour = $request->input('start_hour'); $hour < $request->input('end_hour'); $hour++) {
            Planning::create([
                'datum' => $request->input('date'),
                'hour' => $hour,
                'beschikbaar' => $request->input('beschikbaar'),
                'functie' => $request->input('function'),
            ]);
        }

        return redirect()->route('planning')->with('success', 'Planning opgeslagen');
    }
}
