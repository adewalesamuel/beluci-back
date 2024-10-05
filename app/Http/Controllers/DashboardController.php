<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_index(Request $request) {
        $validated_members = Member::where('is_validated', true)->count();
        $pending_members = Member::whereNull('is_validated')
        ->orWhere('is_validated', false)->count();
        $latest_event = Event::latest()->first();
        $members = Member::orderBy('created_at', 'desc')->paginate();

        $data = [
            'validated_members' => $validated_members,
            'pending_members' => $pending_members,
            'latest_event' => $latest_event,
            'members' => $members
        ];

        return response()->json($data, 200);
    }
}
