<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\AdminMailNotificationJob;
use App\Jobs\MailNotificationJob;
use App\Models\Member;
use App\Notifications\ContactFormNotification;
use App\Notifications\MemberMessageNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request) {
        $validated = $request->validated();

        AdminMailNotificationJob::dispatchAfterResponse(
            new ContactFormNotification(
                $validated['fullname'] ?? '',
                $validated['email'],
                $validated['message'] ?? '')
            );

        $data = ["success" => true];

        return response()->json($data, 200);
    }

    public function member_message(ContactRequest $request) {
        $validated = $request->validated();
        $member = Member::where('email', $validated['email'])->firstOrFail();

        MailNotificationJob::dispatchAfterResponse(
            $member,
            new MemberMessageNotification(
                $validated['fullname'] ?? '',
                $validated['email'],
                $validated['message'] ?? ''
            )
        );

        $data = ['success' => true];

        return response()->json($data, 200);
    }
}
