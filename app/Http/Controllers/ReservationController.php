<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $user = Auth::user();
        $evenement = Evenement::find($id);
        return view('client.reservation',compact('user','evenement'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rules()
    {
        return [
            'reference' => 'required',
            'nbre' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'reference.required' => 'Desolé! le champ reference est Obligatoire',
            'nbre.required' => 'Desolé! le champ nombre est obligatoire',
        ];
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate($this->rules(), $this->messages());
        $reservation = new Reservation();
        $reservation->reference = $request->reference;
        $reservation->nbre = $request->nbre;
        $reservation->evenement_id = $request->evenement_id;
        $reservation->etat = 'accepter';
        $reservation->user_id = $user->id;
        $reservation->save();

        return redirect()->route("client.index",$user->id);
    }

    public function changeEtat($id)
    {
        $user = Auth::user();
        $reservation = Reservation::find($id);
        if($reservation->etat==='accepter')
            $reservation->etat = 'décliner';
        else
            $reservation->etat = 'accepter';
        $reservation->save();
        return redirect()->route('association.index',$user->id)->with('success', 'État de la réservation modifié avec succès.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
