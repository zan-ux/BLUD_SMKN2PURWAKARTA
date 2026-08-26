<?php
// app/Http/Controllers/ActivityLogController.php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{

    public function index()
    {
        $logs = ActivityLog::with('user')
            ->when(request('user'), function ($query, $user) {
                $query->where('user_id', $user);
            })
            ->when(request('action'), function ($query, $action) {
                $query->where('action', $action);
            })
            ->when(request('date_from'), function ($query, $date) {
                $query->whereDate('created_at', '>=', $date);
            })
            ->when(request('date_to'), function ($query, $date) {
                $query->whereDate('created_at', '<=', $date);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $users = \App\Models\User::all();
        $actions = ActivityLog::select('action')
            ->distinct()
            ->pluck('action');

        return view('admin.activity-logs.index', compact('logs', 'users', 'actions'));
    }

    public function show(ActivityLog $activityLog)
    {
        return view('admin.activity-logs.show', compact('activityLog'));
    }

    public function destroy(ActivityLog $activityLog)
    {
        $activityLog->delete();

        return redirect()->route('activity-logs.index')
            ->with('success', 'Log berhasil dihapus!');
    }

    public function clear()
    {
        ActivityLog::where('created_at', '<', now()->subDays(30))->delete();

        return redirect()->route('activity-logs.index')
            ->with('success', 'Log lebih dari 30 hari berhasil dibersihkan!');
    }
}