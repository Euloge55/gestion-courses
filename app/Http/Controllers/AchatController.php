<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    public function index()
    {
        // Récupérer tous les achats triés par date décroissante
        $achats = Achat::orderBy('date_achat', 'desc')->get();
        
        // Calculer le total des dépenses
        $totalDepenses = $achats->sum('prix');
        
        // Trouver le produit le plus acheté
        $topProduit = Achat::select('nom', DB::raw('COUNT(*) as nombre'))
            ->groupBy('nom')
            ->orderBy('nombre', 'desc')
            ->first();
        
        return view('achats.index', compact('achats', 'totalDepenses', 'topProduit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'date_achat' => 'required|date'
        ]);

        Achat::create($request->all());

        return redirect()->route('achats.index')->with('success', 'Achat ajouté avec succès !');
    }
}