<?php

namespace App\Http\Controllers;

use App\Models\Join;
use App\Models\Quartier;
use Illuminate\Http\Request;

class QuartierController extends Controller
{
    public function getQuartiers()
    {
        return Quartier::all();
    }

    public function addQuartier(Request $request){

        return Quartier::create($request->all());

    }

    public function join(Request $request){

        return Join::create($request->all());
    }

    public function getQuartier(){

        return Quartier::find(1)->first();
    }

    public function getUsers($id){
        $quartier = Quartier::find($id);
        return $quartier->quartiers;
    }

    public function getPosts($id){
        $quartier = Quartier::find($id);

        return $quartier->posts;
    }
}
