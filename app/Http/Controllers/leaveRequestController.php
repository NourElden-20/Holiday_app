<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class leaveRequestController extends Controller
{
    public function create()
    {
        return view('leave.create', ['request' => null]);
    }

    public function store(Request $request)
    {
        LeaveRequest::create([
            'user_id' => auth()->id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
            'status_request' => 'pending',



        ]);
        // return view('leave.my-requests', compact('requests'));
        return redirect()->route('myRequests')->with('success', 'your request has been submit');
        // return view('leave/my-requests');
    }



    public function myRequests()
    {
        $user = auth()->user();
        $requests = $user->leaveRequests()->get();
        return view('leave.my-requests', compact('requests'));
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


   
}
