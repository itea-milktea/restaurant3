<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServerProfileModel;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index(Request $request){
        $store = ServerProfileModel::when($request->search, function($q) use($request){
            $q->where('firstname', 'like', '%' . $request->search . '%')
            ->orWhere('lastname', 'like', '%' . $request->search . '%')
            ->orWhere('code', 'like', '%' . $request->search . '%');
        })->paginate(5);
        return view('employee.employee-info', compact('store'));
    }

    
    public function addEmployee(){
        return view('employee.add-employee');
    }

    public function employeeCode($employee_code){
        return ServerProfileModel::whereEmployeeCode($employee_code);
    }
    public function createProfile(Request $request){
        $profile = new ServerProfileModel;

        $employee_code = mt_rand(10000, 99999);
        if($this->employeeCode($employee_code)){
            $employee_code = mt_rand(10000, 99999);
        }
        try{
            $createProfile = $profile->create([

                'code' => $employee_code, 
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'middle_name' => $request['middle_name'],
                'age' => $request['age'],
                'contact' => $request['contact'],
                'birthday' => $request['birthday'],
                'email' => $request['email'],
                'address' => $request['address'],
                'position' => $request['position'],
                'status' => $request['status'],

                
            ]);
            if($createProfile){
                Alert::success('Success','Create Profile Added Succesfully');
                return redirect()->back();
                
            }else{
                Alert::error('Error', 'Something went Wrong');
                return redirect()->back();
            }
            
        } catch(\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->back();
        }
    }

    public function viewProfile($id){
        $staff_profile = ServerProfileModel::find($id);
        return view('employee.employee_profile', compact('staff_profile'));
    }

    public function submitPerformance(Request $request, $id){
        $staff_id = ServerProfileModel::find($id);

        $staff_id->update([
            'ratings' => $request['ratings'],
            'reviews' => $request['reviews']
        ]);

        Alert::success('Success', 'Staff Rated');
        return redirect()->back();
    }
    
    public function updateProfile(Request $request, $id){
        $employee_id = ServerProfileModel::find($id);

        $employee_id->update([
            'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'middle_name' => $request['middle_name'],
                'age' => $request['age'],
                'contact' => $request['contact'],
                'birthday' => $request['birthday'],
                'email' => $request['email'],
                'address' => $request['address'],
                'position' => $request['position'],
                'status' => $request['status'],
        ]);

        Alert::success('Success', 'Employee Profile updated successfully');
        return redirect()->back();
    }

    public function deleteEmployee($id){
        $profile = ServerProfileModel::find($id);

        $profile->delete();

        Alert::success('Success', 'Employee Profile has been deleted successfully');
        return redirect()->back();
    }
}

