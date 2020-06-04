<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class VerifyRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Verify registration link with time and user database,
     * if the user exists. If everything checks out, the user's
     * account will be activated.
     *
     * @param $id string hash of created user
     * @return Factory|View
     */
    public function verifyUser($id)
    {
        $userV = User::where('register_hash', $id)->get();
        $text = "";
        if(!$userV->isEmpty())
        {
            $created = $userV[0]->created_at;
            $now = date('Y-m-d h:i:s');
            $interval = $created->diff($now);

            if($interval->d >= 2)
            {
                $text = "Registration link expired!\n Need to create new account";
                $userV[0]->delete();
            }
            else if(isset($userV[0]->email_verified_at))
            {
                $text = "Registration link already activated!";
            }
            else
            {
                $userV[0]->email_verified_at = date('Y-m-d h:i:s');
                $userV[0]->save();
                $text = "Registration of the user " . $userV[0]->name . " has been successful.";
            }
        }
        else
        {
            $text = "The link is not valid!";
        }
        return view('verify.index', ['text' => $text]);
    }
}
