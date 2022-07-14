<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Train;

class TrainController extends Controller
{
    public function index(){
       
        // stampo i treni in partenza da oggi in poi:
        // - con 'where' (query builder) creo la query: primo paramentro = per quale colonna devo filtrare; secondo paramentro = operatore relazionale; terzo parametro = metodo date(formattato così sennò aggiunge anche l'orario) che restituisce ora e data odierni;
        // - metodo get() obbligatorio
        $trains = Train::where('departure_date', '>', date('Y-m-d'))->get();

        return view('home', compact('trains'));
    }
}
