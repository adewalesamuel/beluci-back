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

        if (!Auth::guard('member')->once($credentials)) {
            $data = [
                'error' => true,
                'message' => "Mail ou mot de passe incorrect"
            ];

            return response()->json($data, 404);
        }

        $member = Member::where('email', $credentials['email'])->first();

        $data = [
            "success" => true,
            "user" => $member,
            "token" => $member->api_token
        ];

        return response()->json($data);
    }

    public function register(StoreMemberRequest $request) {
        $validated = $request->validated();

        $member = new Member;
        $token =  Str::random(60);

        $member->company_name = $validated['company_name'] ?? null;
		$member->country_name = $validated['country_name'] ?? null;
		$member->head_office = $validated['head_office'] ?? null;
		$member->address = $validated['address'] ?? null;
		$member->website_url = $validated['website_url'] ?? null;
		$member->fullname = $validated['fullname'] ?? null;
		$member->creation_date = $validated['creation_date'] ?? null;
		$member->employee_number = $validated['employee_number'] ?? null;
		$member->legal_status = $validated['legal_status'] ?? null;
		$member->share_capital = $validated['share_capital'] ?? null;
		$member->sector = $validated['sector'] ?? null;
		$member->other_details = $validated['other_details'] ?? null;
		$member->company_category = $validated['company_category'] ?? null;
		$member->representative_fullname = $validated['representative_fullname'] ?? null;
		$member->position = $validated['position'] ?? null;
		$member->nationality = $validated['nationality'] ?? null;
		$member->email = $validated['email'] ?? null;
		$member->phone_number = $validated['phone_number'] ?? null;
		$member->sales_representative_fullname = $validated['sales_representative_fullname'] ?? null;
		$member->sales_representative_position = $validated['sales_representative_position'] ?? null;
		$member->sales_representative_email = $validated['sales_representative_email'] ?? null;
		$member->sales_representative_phone_number = $validated['sales_representative_phone_number'] ?? null;
		$member->cover_letter_url = $validated['cover_letter_url'] ?? null;
		$member->photo_url = $validated['photo_url'] ?? null;
		$member->commercial_register_url = $validated['commercial_register_url'] ?? null;
		$member->idcard_url = $validated['idcard_url'] ?? null;
		$member->password = "123456789";
		$member->member_id = $validated['member_id'] ?? null;
		$member->is_validated = false;
        $member->api_token = $token;

        $member->save();

        AdminMailNotificationJob::dispatchAfterResponse(
            new MemberRegisterNotification($member));

        $data = [
            'success'  => true,
            'user'   => $member,
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
            function (Member $member, string $password) {
                $member->password = $password;
                $member->save();

                event(new PasswordReset($member));
            }
        );

        $data = [
            'status' => __($status)
        ];

        return response()->json($data, 200);
    }

    public function logout(Request $request) {
        $member = HttpAuth::getUser($request, HttpAuth::USER);

        $member->api_token = Str::random(60);

        $member->save();

        $data = [
            "success" => true,
        ];

        return response()->json($data, 200);
    }

}
