<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Member;
use App\Http\Auth;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Jobs\MailNotificationJob;
use App\Notifications\MemberValidatedNotification;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $is_validated = $request->input('is_validated');
    	$members = Member::where(function($memberQuery) use($is_validated) {
            if (isset($is_validated)) {
                if (boolval(($is_validated)) === true) {
                    return $memberQuery->where('is_validated', true);
                } else {
                    return $memberQuery->whereNull('is_validated');
                }

            }

            return $memberQuery->where('is_validated', true)
            ->orWhereNull('is_validated');
        });

        if (isset($query)) {
            $members = $members->where(function($memberQuery) use ($query) {
                return $memberQuery->orWhere('email', 'like', "%$query%")
                    ->orWhere('company_name', 'like', "%$query%")
                    ->orWhere('country_name', 'like', "%$query%")
                    ->orWhere('address', 'like', "%$query%")
                    ->orWhere('fullname', 'like', "%$query%")
                    ->orWhere('sector', 'like', "%$query%");
            });
        }

        $members = $members->orderBy('created_at', 'desc');

        if ($request->input('page') == null ||
            $request->input('page') == '') {
            $members = $members->get();
        } else {
            $members = $members->paginate(isset($query) ? 100 : '');
        }

        $data = [
            'success' => true,
            'members' => $members
        ];

        return response()->json($data);
    }

    public function trashed_index(Request $request) {
        $data = [
            'success' => true,
            'members' => Member::onlyTrashed()->paginate()
        ];

        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        $validated = $request->validated();

        $member = new Member;

        $member->logo_url = $validated['logo_url'] ?? null;
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
		$member->parent_company = $validated['parent_company'] ?? null;
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
		$member->password = $validated['password'] ?? '123456789';
		$member->member_id = $validated['member_id'] ?? null;
        $member->member_source = $validated['member_source'] ?? null;
        $member->sales_representative_nationality = $validated['sales_representative_nationality'] ?? null;
        $member->api_token = Str::random(60);
        $member->is_validated = $validated['is_validated'] ?? null;

        $member->save();

        $data = [
            'success'       => true,
            'member'   => $member
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        $data = [
            'success' => true,
            'member' => $member
        ];

        return response()->json($data);
    }

    public function profile_show(Request $request)
    {
        $member = Auth::getUser($request, Auth::USER);

        $data = [
            'success' => true,
            'member' => $member
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $validated = $request->validated();

        $member->logo_url = $validated['logo_url'] ?? null;
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
		$member->parent_company = $validated['parent_company'] ?? null;
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
		$member->member_id = $validated['member_id'] ?? null;
        $member->member_source = $validated['member_source'] ?? null;
        $member->sales_representative_nationality = $validated['sales_representative_nationality'] ?? null;
        $member->is_validated = $validated['is_validated'] ?? null;

        if (isset($validated['password']))
            $member->password = $validated['password'] ?? null;

        $member->save();

        $data = [
            'success'       => true,
            'member'   => $member
        ];

        return response()->json($data);
    }

    public function profile_update(UpdateMemberRequest $request)
    {
        $validated = $request->validated();
        $member = Auth::getUser($request, Auth::USER);

        $member->logo_url = $validated['logo_url'] ?? null;
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

        if (isset($validated['password']))
            $member->password = $validated['password'] ?? null;

        $member->save();

        $data = [
            'success'       => true,
            'member'   => $member
        ];

        return response()->json($data);
    }

    public function validate(Request $request, Member $member) {
        $member->is_validated = true;
        $member->password = substr($member->company_name, 0, 3) . "1234";

        $member->save();

        MailNotificationJob::dispatchAfterResponse(
            $member, new MemberValidatedNotification($member));

        $data = [
            "sucess" => true,
            'member' => $member
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        $data = [
            'success' => true,
            'member' => $member
        ];

        return response()->json($data);
    }

    public function restore(int $id) {
        $member = Member::where('id', $id)->withTrashed()->firstOrFail();
        $member->restore();

        $data = [
            'success' => true,
            'member' => $member
        ];

        return response()->json($data, 200);
    }
}
