<?php

namespace App\Http\Controllers;

use App\Models\ServerTask;
use Illuminate\Http\Request;
use App\Models\H1Model\Rooms;
use App\Models\PaymentInformation;
use App\Models\ServerProfileModel;

class HomeController extends Controller
{
    public function todolist(){
        $staff = ServerProfileModel::all();
        //$rooms = Rooms::all();
        $orders = PaymentInformation::where('status', 'Pending')->get();
        $assigned_staff = ServerTask::all();
        return view('apps.todolist', compact('staff', 'orders', 'assigned_staff'));
    }
    public function dashbaord(){
     
        return view('apps.dashboard', compact(''));
    }
}

