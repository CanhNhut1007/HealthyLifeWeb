<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Password_reset;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
Use App\Jobs\SendEmail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected function create(array $data)
    {
        $password_resets= Password_reset::create([
            'email' => $data['email'],
            'codeverify' => rand(100000,999999),
        ]);

        return $password_resets;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
        ]);
    }

    public function resetpassword(Request $request){
        $this->validate($request, [
            'email'   => 'required|email'
        ]);
      
        $user = User::where('email',$request->get('email'))
                        ->where('active',User::ACTIVE)
                        ->first();
        if(!empty($user)){
            $password_resets = $this->create($request->all());
            $view = 'emailverifyresetpassword';
            $subject = '[HealthLife] Reset your account';
            $this->dispatch(new SendEmail($password_resets,$view, $subject));

            //Mail::to($password_resets->email)->send(new SendMailable($password_resets,$view));

            return redirect()->route('resetpasswordverify')//,['email'=> $user->email])//,array('email' =>  $user->email,'success' => 'Congratulations! Your account has been made, an email has been sent to your email. Please enter your code in this email message to verify your account and complete registration.'));
                            ->with([ 'email' => $password_resets->email ]) 
                            ->with(['success' => "Check your inbox! We've sent a verification code, please enter code and you will be reset password."]);
        }
        else{
            return back()->with('error', 'That address either can not be used to reset your password or is not associated with a user account.');
        }
    }

    public function verifycoderesetpassword(Request $request){
        
        $this->validate($request, [
            'email'   => 'required|email',
            'codeverify'  => 'required'
        ]);
        $passwordreset = Password_reset::where('email', $request->get('email'))
                    ->where('codeverify', $request->get('codeverify'))->first();

        if (empty($passwordreset)) {
            return back()->with(['error' => 'Your code reset password is either expired or invalid.']);
        }

        $passwordreset->codeverify = 0;
        $passwordreset->save();

        $new_password = Str::random(6);
        User::where('email',$request->get('email'))
            ->update(['password' => Hash::make($new_password)]);

        $view = "emailsendnewpassword";
        $new_user = array ('email' => $request->get('email'),
                            'password'=> $new_password);
        $subject = '[HealthLife] Your new password from HealthLife';
        $this->dispatch(new SendEmail($new_user,$view,$subject));
       // Mail::to($verify["email"])->send(new SendMailable($new_user,$view));
        return redirect()->route("login")
        ->with(['success' => 'Congratulations! Your password is reseted.']);
    }
    
    public function ShowResetPasswordForm(){
        return view('showresetpassword');
    }

    public function Showverifyresetpassword(){
        return view('showverifyresetpassword');
    }
}