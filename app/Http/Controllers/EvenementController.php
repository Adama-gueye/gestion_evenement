<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function acceuil()
    {
        return view('index');
    }

    public function apropos()
    {        
        $evenements = Evenement::all();
        return view('about-us',compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function rules()
    {
        return [
            'libelle' => 'required',
            'date_limite_inscription' => 'required|date|after_or_equal:today|before:date_evenement',
            'description' => 'required',
            'image' => 'required',
            'date_evenement' => 'required|date|after_or_equal:today',
            'etat' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'Desolé! Veuillez choisir une image svp',
            'libelle.required' => 'Desolé! le champ libelle est Obligatoire',
            'description.required' => 'Desolé! veuillez choisir une description svp',
            'etat.required' => 'Desolé! veuillez choisir un etat svp',
            'date_evenement.required' => 'Desolé! le champ Date Evenement est Obligatoire',
            'date_limite_inscription.required' => 'Desolé! le champ date limite inscription est obligatoir',
            'date_limite_inscription.after_or_equal' => 'Désolé! La date limite d\'inscription doit être aujourd\'hui ou une date future.',
            'date_limite_inscription.after_or_equal' => 'Désolé! La date limite d\'inscription doit être aujourd\'hui ou une date future.',
            'date_evenement.after_or_equal' => 'Désolé! La date de l\'événement doit être aujourd\'hui ou une date future.',
            'date_limite_inscription.before' => 'Désolé! La date limite d\'inscription doit être antérieure à la date de l\'événement.',
        ];
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate($this->rules(), $this->messages());
        $evenement = new Evenement();
        $evenement->libelle = $request->libelle;
        $evenement->date_limite_inscription = $request->date_limite_inscription;
        $evenement->description = $request->description;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $evenement['image']= $filename;
        }
        $evenement->date_evenement = $request->date_evenement;
        $evenement->etat = $request->etat;
        $evenement->user_id = $user->id;
        $evenement->save();

        return redirect()->route('association.index',$user->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement=Evenement::find($id);
        $user = Auth::user();
        return view('associations.updateEvenement',compact('user','evenement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $request->validate($this->rules(), $this->messages());
        $evenement = Evenement::find($id);
        if ($request->file('image')) {
            if ($evenement->image) {
                $oldImagePath = public_path('public/images/' . $evenement->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        }
        $evenement->libelle = $request->libelle;
        $evenement->date_limite_inscription = $request->date_limite_inscription;
        $evenement->description = $request->description;
    
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $evenement['image']= $filename;
        }
        $evenement->date_evenement = $request->date_evenement;
        $evenement->etat = $request->etat;
        $evenement->user_id = $user->id;
        $evenement->save();

        return redirect()->route('association.index',$user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $evenement = Evenement::find($id);
        if ($evenement->image) {
            $imagePath = public_path('public/images/' . $evenement->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $evenement->delete();
        return redirect()->route('association.index',$user->id);
    }
}
