<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OwnerController extends Controller
{

    public function getOwnerDashboard()
    {
        return view('owner.dashboard');
    }

    public function getOwnerProfile()
    {
        return view('owner.profile');
    }

    public function getUsersDetails()
    {
        return view('owner.users');
    }

    public function getPaymentsDetails()
    {
        return view('owner.payments');
    }
}
