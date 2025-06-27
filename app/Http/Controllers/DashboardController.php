<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
 
public function index()
{
    $total = LeaveRequest::count();
    $approved = LeaveRequest::where('status_request', 'approved')->count();
    $pending = LeaveRequest::where('status_request', 'pending')->count();

    return view('dashboard', compact('total', 'approved', 'pending'));
}

}
