<?php

namespace App\Http\Controllers\Auth;

use App\Http\Auth as HttpAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Member;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Jobs\AdminMailNotificationJob;
use App\Notifications\MemberRegisterNotification;

class ApiMemberAuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only("email", "password");

        if (!Auth::guard()->once($credentials)) {
            $data = [
                'error' => true,
                'message' => "Mail ou mot de passe incorrect"
            ];

            return response()->json($data, 404);
        }

        $user = Member::where('email', $credentials['email'])->first();

        $data = [
            "success" => true,
            "user" => $user,
            "token" => $user->api_token
        ];

        return response()->json($data);
    }

    public function register(StoreMemberRequest $request) {
        $validated = $request->validated();

        $user = new Member;
        $token =  Str::random(60);

        $user->firstname = $validated['firstname'] ?? null;
		$user->lastname = $validated['lastname'] ?? null;
		$user->email = $validated['email'] ?? null;
		$user->job_title_id = $validated['job_title_id'] ?? null;
		$user->password = $validated['password'] ?? null;
        $user->api_token = $token;

        $user->save();

        AdminMailNotificationJob::dispatchAfterResponse(
            new MemberRegisterNotification($user));

        $data = [
            'success'  => true,
            'user'   => $user,
            'token' => $token
        ];

        return response()->json($data);
    }

    public function forgot_password(ForgotPasswordRequest $request) {
        $validated = $request->validated();
        $status = Password::sendResetLink($validated);

        $data = [
            'status' => __($status)
        ];

        return response()->json($data, 200);
    }

    public function reset_password(ResetPasswordRequest $request) {
        $validated = $request->validated();

        $status = Password::reset(
            $validated,
            function (Member $user, string $password) {
                $user->password = $password;
                $user->save();

                event(new PasswordReset($user));
            }
        );

        $data = [
            'status' => __($status)
        ];

        return response()->json($data, 200);
    }

    public function logout(Request $request) {


        $user->api_token = Str::random(60);

        $user->save();

        $data = [
            "success" => true,
        ];

        return response()->json($data, 200);
    }

}
