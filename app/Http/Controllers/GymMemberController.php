<?php


namespace App\Http\Controllers;


use App\Jobs\SendEmailJob;
use App\Jobs\SendMailThreeDaysBeforeExpiringJob;
use App\Jobs\SendMailToCanceledMemberJob;
use App\Jobs\SendMailToExpiredGymMembershipJob;
use App\Jobs\SendMailTwoDaysBeforeExpiringJob;
use App\Mail\SendMailToOurNewMember;
use App\Mail\SendMailToCanceledMember;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GymMemberController extends Controller
{

   public function createNewMember(Request $request){

        $profilePicture = $request->file('profile_picture');
        $path = null;

        if($profilePicture != null){
            $path = $profilePicture->store('public/images');
            $path = str_replace("public/", 'storage/', $path);
        }

        $member = new Member();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->birthdate =  $request->birthdate;
        $member->expire_date = $request->expire_date;
        $member->profile_picture = $path;
        $member->save();


        $job =(new SendEmailJob($request->email))
            ->delay(Carbon::now()->addMinutes(2));

        dispatch($job);

       $job2 =(new SendMailToExpiredGymMembershipJob($request->email))
           ->delay(Carbon::parse($request->expire_date));

       dispatch($job2);

       $job3 =(new SendMailTwoDaysBeforeExpiringJob($request->email))
           ->delay(Carbon::parse($request->expire_date)->subDays(2));

       dispatch($job3);

       $job4 =(new SendMailThreeDaysBeforeExpiringJob($request->email))
           ->delay(Carbon::parse($request->expire_date)->subDays(3));

       dispatch($job4);



       return redirect()->route('index');
    }

    public function showMembers(){
        $members = Member::all();

        return view('members',[
            'members' => $members
        ]);
    }

    public function deleteMember($id){
        $member = Member::find($id);

        if(!$member){
            return abort(404);
        }

        $job =(new SendMailToCanceledMemberJob($member->email));
        dispatch($job);

        $member->delete();


        return redirect()->route('show.members');
    }

    public function editingMember($id){
        $member = Member::find($id);

        if(!$member){
            return abort(404);
        }

        return view('edit_member',[
            'member' => $member
        ]);

    }

    public function editMember(Request $request,$id){
        $member = Member::find($id);

        if(!$member){
            return abort(404);
        }

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->birthdate =  $request->birthdate;
        $member->expire_date = $request->expire_date;
        $member->save();

        return redirect()->route('show.members');


    }
}
