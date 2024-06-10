<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Http\Requests\VoteRequest;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PublicController extends Controller
{
    function index() {
        return view("index");
    }

    function sendEmail(EmailRequest $request) {
        $email = $request->email;

        // ez az e-mail cím már létezik?
        $votedUsers = User::all();
        $megvan = false;
        foreach ($votedUsers as $votedUser) {
            if ( Hash::check($email, $votedUser->email) ) {
                $megvan = true;
            }
        }

        if ( $megvan ) {
            return back()->withErrors("Ezzel az e-mail címmel már adtak le szavazatot!")->withInput();
        } else {
            $user = User::create([
                "email" => Hash::make($email)
            ]);

            Auth::login($user);

            return redirect()->route("vote");
        }
    }


    function vote() {
        return view("vote");
    }

    function sendVote(VoteRequest $request) {
        Vote::create([
            "vote" => $request->vote
        ]);

        Auth::logout();

        return redirect()->route("login")->withSuccess("A szavazatod sikeresen leadtad!");
    }
}
