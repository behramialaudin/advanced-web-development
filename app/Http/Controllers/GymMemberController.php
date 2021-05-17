<?php


namespace App\Http\Controllers;


use App\Models\Member;
use Illuminate\Http\Request;

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
