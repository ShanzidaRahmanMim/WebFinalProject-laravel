<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use App\Mail\Websitemail;

class DashboardController extends Controller
{
    public function Index()
    {
        return view('admin.dashboard');
    }
    public function Login()
    {
        return view('admin.login');
    }
    public function LoginSubmit(Request $request)
    {
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
            'status'=>'active'

        ];
        if(Auth::attempt($credentials))
        {
            return redirect()->route('admindashboard');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    public function Logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
    public function Registration()
    {
        return view('admin.registration');
    }
    public function RegistrationSubmit(Request $request)
    {   $token=hash('sha256',time());
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->status='pending';
        $user->token=$token;
        $user->save();
        $verification_link=url('registration/verify/'.$token.'/'.$request->email);
        $subject='Registration Confirmation';
        $message='Please click on the link below to verify your email address:<br> <a href="'.$verification_link.'">Click here</a>';
        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        echo 'Email has been sent to your email address. Please verify your email address.';
    }
    public function VerifyRegistration($token,$email)
    {
        $user=User::where('token',$token)->where('email',$email)->first();
        if(!$user)
        {
            return redirect()->route('login');
        }
        $user->status='active';
        $user->token='';
        $user->update();
        echo 'Email has been verified. Please login to continue.';
    }
    public function ForgetPassword()
    {
        return view('admin.forget_password');
    }
     public function ForgetPasswordSubmit(Request $request)
     {
        $token=hash('sha256',time());
        $user=User::where('email',$request->email)->first();
        if(!$user)
        {
            dd('Email does not exist');
        }
        $user->token=$token;
        $user->update();
        $reset_link=url('reset-password/'.$token.'/'.$request->email);
        $subject='Reset Password';
        $message='Please click on the link below to reset your password:<br> <a href="'.$reset_link.'">Click here</a>';
        \Mail::to($request->email)->send(new Websitemail($subject,$message));
        echo 'Email has been sent to your email address.';



     }
    public function ResetPassword($token,$email)
     {
        $user=User::where('token',$token)->where('email',$email)->first();
        if(!$user)
        {
            dd('No user is found');
            return redirect()->route('login');
        }
        return view('admin.reset_password',compact('token','email'));
     }
     public function ResetPasswordSubmit(Request $request)
     {
        $user=User::where('token',$request->token)->where('email',$request->email)->first();
        $user->token='';
        $user->password=Hash::make($request->newpassword);
        $user->update();
        echo 'Password has been reset successfully.';
     }
     

     
}
