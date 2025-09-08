<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->employee_type === 'admin') {
            // حسابات خاصة بالادمن
            $totalRequests   = LeaveRequest::count();
            $approvedCount   = LeaveRequest::where('status_request', 'approved')->count();
            $pendingCount    = LeaveRequest::where('status_request', 'pending')->count();
            $rejectedCount   = LeaveRequest::where('status_request', 'rejected')->count();
            $recentRequests  = LeaveRequest::latest()->take(5)->get();
            $requests = LeaveRequest::with('user')->latest()->get();


            return view('admin.index', compact(
                'totalRequests',
                'approvedCount',
                'pendingCount',
                'rejectedCount',
                'recentRequests',
                'requests'
            ));
        } else {
            // حسابات خاصة بالموظف
            $approvedCount = $user->leaveRequests()->where('status_request', 'approved')->count();
            $pendingCount  = $user->leaveRequests()->where('status_request', 'pending')->count();
            $rejectedCount = $user->leaveRequests()->where('status_request', 'rejected')->count();
            $recentRequests = $user->leaveRequests()->latest()->take(5)->get();

            return view('employee.dashboard', compact(
                'approvedCount',
                'pendingCount',
                'rejectedCount',
                'recentRequests'
            ));
        }
    }
}
