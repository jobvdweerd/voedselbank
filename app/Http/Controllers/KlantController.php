<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    public function index()
    {
        $klant = Klant::all();
        return view('klantengegevens', compact('klant'));
    }
    public function create()
    {
        return view('createklant');
    }
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'volwassen' => 'required|integer',
            'kinderen' => 'required|integer',
            'babys' => 'required|integer',
            'postcode' => 'required|string|max:10',
            'wensen' => 'nullable|string',
        ]);

        Klant::create($request->all());

        return redirect()->route('klantengegevens')->with('success', 'Klant created successfully.');
    }
    public function edit(Klant $klant)
    {
        return view('editklant', compact('klant'));
    }
    public function toggleActive(Klant $klant)
    {
        $klant->is_active = !$klant->is_active;
        $klant->save();

        return redirect()->route('klantengegevens')->with('success', 'Klant status updated successfully.');
    }

    public function update(Request $request, Klant $klant)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'volwassenen' => 'required|integer',
            'kinderen' => 'required|integer',
            'babys' => 'required|integer',
            'postcode' => 'required|string|max:10',
            'wensen' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $klant->update($request->only(['naam', 'volwassenen', 'kinderen', 'babys', 'postcode', 'wensen', 'is_active']));
        return redirect()->route('klant.index')->with('success', 'Klant updated successfully');
    }
}
