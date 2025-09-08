<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Models\User;

class leaveRequestController extends Controller
{
    public function create()
    {
        $user = auth()->user();
        if ($user->employee_type === 'admin') {
            return view('admin.create', ['request' => null]);
        }
        return view('leave.create', ['request' => null]);
    }

    public function store(Request $request)
    {
        LeaveRequest::create([
            'user_id'       => auth()->id(),
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'reason'        => $request->reason,
            'status_request' => 'pending',
        ]);

        $user = auth()->user();

        if ($user->employee_type === 'admin') {
            // أدمن → يروح على البليد الخاص بالأدمن
            return redirect()->route('adminRequests')
                ->with('success', 'Your request has been submitted (Admin View).');
        }

        // موظف عادي → يروح على بليد الموظف
        return redirect()->route('myRequests')
            ->with('success', 'Your request has been submitted (Employee View).');
    }




    public function myRequests()
    {
        $user = auth()->user();
        $requests = $user->leaveRequests()->get();
        return view('leave.my-requests', compact('requests'));
        // dd(auth()->id());

    }
    public function adminRequests()
    {
        $user = auth()->user();
        $requests = $user->leaveRequests()->get();
        return view('admin.myrequests', compact('requests'));
        // dd(auth()->id());

    }


    public function index()
    {
        $requests = LeaveRequest::with('user')->latest()->get();
        return view('admin.index', compact('requests'));
    }
    public function approve($id)
    {
        $request = LeaveRequest::findOrFail($id);
        $request->status_request = 'approved';
        $request->save();

        return redirect()->back()->with('success', 'Request approved successfully.');
    }
    public function reject($id)
    {
        $request = LeaveRequest::findOrFail($id);
        $request->status_request = 'rejected';
        $request->save();

        return redirect()->back()->with('success', 'Request rejected successfully.');
    }



    public function edit($id)
    {
        $request = LeaveRequest::findOrFail($id);
        return view('leave.create', compact('request'));
    }


    public function update(Request $request, $id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->update([
            'reason' => $request->reason,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('myRequests')->with('success', 'Request updated successfully');
    }

    public function destroy($id)
    {
        $request = LeaveRequest::findOrFail($id);
        $request->delete();
        return response()->json(['success' => true]);
    }

    public function showRequestDetails(Request $httpRequest, $id)
    {
        $leaveRequest = $httpRequest->user()->leaveRequests()->findOrFail($id);
        return view('admin.showRequestDetails', compact('leaveRequest'));
    }

    // public function show(Request $request,$id){
    //     $request = LeaveRequest::findOrFail($id);
    // }

    public function createUser()
    {
        return view('admin.createUser');
    }
    public function newUser(Request $request)
    {
        $request->validate([
            'first_name' => 'string |required',
            'last_name' => 'string |required',
            'email' => 'string|required',
            'password' => 'required',
            'employee_type' => 'required',
        ]);
        $user = User::create([
            'user_id' => $request->user_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'employee_type' => $request->employee_type,
        ]);
        return redirect()->route('createUser')->with('success', 'user created successfully');
    }
}
