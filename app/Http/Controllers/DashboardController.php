<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->employee_type === 'admin') {

            // Basic counts
            $totalEmployees  = User::where('employee_type', 'employee')->count();
            $totalRequests   = LeaveRequest::count();
            $approvedCount   = LeaveRequest::where('status_request', 'approved')->count();
            $pendingCount    = LeaveRequest::where('status_request', 'pending')->count();
            $rejectedCount   = LeaveRequest::where('status_request', 'rejected')->count();

            // Recent requests
            $recentRequests  = LeaveRequest::with('user')->latest()->take(5)->get();
            $requests        = LeaveRequest::with('user')->latest()->get();

            
            

            return view('admin.dashboard', compact(
                'totalEmployees',
                'totalRequests',
                'approvedCount',
                'pendingCount',
                'rejectedCount',
                'recentRequests',
                'requests',
            ));
        } else {

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
