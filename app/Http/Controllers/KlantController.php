<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use App\Models\Pakket;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    public function index()
    {
        $activeKlant = Klant::where('is_active', 1)->orderBy('postcode')->get();
        $inactiveKlant = Klant::where('is_active', 0)->orderBy('postcode')->get();
        $pakketten = Pakket::all();
        return view('klantengegevens', compact('activeKlant', 'inactiveKlant', 'pakketten'));
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
            'postcode' => 'required|string|regex:/^[1-9][0-9]{3}\s?[a-zA-Z]{2}$/',
            'wensen' => 'nullable|string',
        ], [
            'postcode.required' => 'De postcode is verplicht.',
            'postcode.regex' => 'De postcode moet een geldig Nederlands formaat hebben (bijv. 1234 AB).',
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
    public function updatePackage(Request $request, Klant $klant)
    {
        $request->validate([
            'pakket_id' => 'nullable|exists:pakket,id',
        ]);

        $klant->update(['pakket_id' => $request->pakket_id]);
        return redirect()->route('klantengegevens')->with('success', 'Package updated successfully');
    }

    public function update(Request $request, Klant $klant)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'volwassen' => 'required|integer',
            'kinderen' => 'required|integer',
            'babys' => 'required|integer',
            'postcode' => 'required|string|max:10',
            'wensen' => 'nullable|string',
            'is_active' => 'boolean',
        ]);
        $klant->update($request->all());
        return redirect()->route('klantengegevens')->with('success', 'Klant updated successfully');
    }
}
