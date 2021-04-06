<?php


namespace App\Http\Controllers;


use App\Models\Member;
use Illuminate\Http\Request;

class GymMemberController extends Controller
{
    function index(){

        return view('index',[
        ]);
    }

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
        $member->birthdate =  $request->birthdate;
        $member->expire_date = $request->expire_date;
        $member->profile_picture = $path;
        $member->save();

       return redirect()->route('index');
    }

    public function showMembers(){
        $members = Member::all();

        return view('members',[
            'members' => $members
        ]);
    }
}
