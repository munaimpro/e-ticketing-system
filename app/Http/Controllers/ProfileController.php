<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    
    // Method for admin user list page
    public function userList(){
        return view('pages.admin.user-list');
        
    }


    // Method for all customer list
    function userall(){
        $userData = User::where('role',3)->get();
        return response()->json($userData);
    }


    // Method for delete user
    public function userDelete(Request $request){
        
        try{
         $user_id = $request->input('id');
 
         User::where('id',$user_id)->delete();
 
         return response()->json([
             'status'=>'success',
             'message'=>'User Delete Successfully'
         ]);        
        }
        catch(Exception $e){
          return response()->json([
             'status'=>'Failed',
             'message'=>$e->getMessage()
          ]);
        }
    }






























    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
