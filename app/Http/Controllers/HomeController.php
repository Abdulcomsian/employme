<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\States;
use App\Models\Cities;
class HomeController extends Controller
{
    public function getStates($countryId)
    {
        $states = States::where('country_id', $countryId)->pluck('name','id');
        return response()->json($states);    
    }
    public function getCities($stateId)
    {
        $cities = Cities::where('state_id', $stateId)->pluck('name','id');
        return response()->json($cities);    
    }
}
