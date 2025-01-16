<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;

class PlanningController extends Controller
{
    public function showManagerPlanning()
    {
        $plannings = Planning::all();

        return view('managerooster', compact('plannings'));
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
                'status' => 'pending',
                'user_id' => auth()->id(),
            ]);
        }

        return redirect()->route('planning')->with('success', 'Planning opgeslagen en wacht op goedkeuring');
    }
    public function updateStatus(Request $request, Planning $planning)
    {
        $planning->update(['status' => $request->input('status')]);

        return redirect()->route('managerooster')->with('success', 'Planning status bijgewerkt');
    }
    public function showDagrooster(Request $request)
    {
        $date = $request->input('date', \Carbon\Carbon::now()->format('Y-m-d'));
        $planning = Planning::whereDate('datum', $date)
            ->where('status', 'accepted')
            ->get()
            ->keyBy('hour');

        $emptyRoster = collect();
        for ($hour = 8; $hour <= 17; $hour++) {
            $emptyRoster->push((object)[
                'datum' => $date,
                'hour' => $hour,
                'beschikbaar' => $planning->has($hour) ? $planning[$hour]->beschikbaar : null,
                'functie' => $planning->has($hour) ? $planning[$hour]->functie : null,
                'user' => $planning->has($hour) ? $planning[$hour]->user : null,
            ]);
        }

        $planning = $emptyRoster;
        return view('dagrooster', compact('planning', 'date'));
    }
    public function update(Request $request)
    {
        foreach ($request->datum as $id => $datum) {
            $planning = \App\Models\Planning::find($id);
            $planning->datum = $datum;
            $planning->beschikbaar = $request->beschikbaar[$id];
            $planning->functie = $request->functie[$id];
            $planning->save();
        }

        return redirect()->route('managerooster')->with('success', 'Rooster updated successfully.');
    }
}
