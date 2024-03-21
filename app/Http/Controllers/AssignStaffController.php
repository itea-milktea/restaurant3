<?php

namespace App\Http\Controllers;

use App\Models\ServerTask;
use Illuminate\Http\Request;
use App\Models\PaymentInformation;
use App\Models\ServerProfileModel;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class AssignStaffController extends Controller
{
    public function assignStaff(Request $request){
        
        $validatedData = $request->validate([
            'orders' => 'required',
            'staff' => 'required',
            'task_type' => 'required',
            // Add more validation rules as needed
        ]);

        $order = PaymentInformation::where('invoice_no', $validatedData['orders'])->first();

        $staff = ServerProfileModel::where('code', $validatedData['staff'])->first();
        if($staff){
            $staffName = $staff->firstname.' '.$staff->lastname;
            $status = 'Pending';    
        $assign = ServerTask::create([
            'task_type' => $validatedData['task_type'],
            'server_name' => $staffName,
            'client_invoice' => $validatedData['orders'],
            'room_no' => $order->room_no,
            'status' => $status
        ]);

        if($assign->room_no == null){
            Alert::error('Room number required');
            return redirect()->back();
        }

        $order_status = 'On Delivery';
        if($assign){
            $order->update([
                'status' => $order_status
            ]);

            Http::post('http://192.168.101.70:8000/api/update-order-status', [
                'orders' => $validatedData['orders']
            ]);
            Alert::success('Success', 'Task has been assigned');
            return redirect()->back();
        }else{
            Alert::error('Something went wrong', '');
            return redirect()->back();
        }
        }else{
            Alert::error('Staff name required', '');
            return redirect()->back();
        }
        

        
    }
}
