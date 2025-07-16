<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class leaveRequestController extends Controller
{
    public function create()
    {
        return view('leave.create');
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
        return redirect()->back()->with('success', 'your request has been submit');
    }



    public function myRequests()
    {
        $user = auth()->user();
        $requests = $user->leaveRequests()->get();
        return view('leave.my-requests', compact('requests'));
    dd(auth()->id());

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
}
