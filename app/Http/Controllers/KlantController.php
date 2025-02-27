<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Klant;
use App\Models\Pakket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    // app/Http/Controllers/KlantController.php

    public function store(Request $request)
    {
        $accountType = $request->input('account_type');

        if ($accountType === 'klant') {
            $klant = new Klant();
            $klant->naam = $request->input('naam');
            $klant->volwassen = $request->input('volwassen');
            $klant->kinderen = $request->input('kinderen');
            $klant->babys = $request->input('babys');
            $klant->postcode = $request->input('postcode');
            $klant->wensen = $request->input('wensen');
            $klant->save();
        } elseif ($accountType === 'medewerker') {
            $user = new User();
            $user->name = $request->input('naam');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role_id = User::ROLE_MEDEWERKER;
            $user->save();
        } elseif ($accountType === 'verdeler') {
            $user = new User();
            $user->name = $request->input('naam');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->role_id = User::ROLE_VERDELER;
            $user->save();
        }

        return redirect()->route('klantengegevens')->with('success', 'Account created successfully.');
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
