<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Jobs\AdminMailNotificationJob;
use App\Notifications\ContactFormNotification;
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
}
