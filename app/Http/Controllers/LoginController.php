<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Password_reset_tokens;
use Illuminate\Support\Str;
use App\Mail\resetPasswordEmail;
use Illuminate\Support\Facades\Mail;
 
class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            if(Auth::user()->role == "admin"){
                $request->session()->regenerate();
                return redirect('/admin/index');
            }
            else{
                $request->session()->regenerate();
                return redirect('user/index');
            }
            
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function forgotPassword(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
        ]);

        if (User::where('email',$request->input('email')) ->first()) {
             // code for mail

             $Password_reset_tokens = new Password_reset_tokens;
             $Password_reset_tokens->email = $request->input('email');
             $token = Str::random(30);
             $Password_reset_tokens->token = $token;
             $Password_reset_tokens->created_at = now();
             $Password_reset_tokens->created_at = now();
             $Password_reset_tokens->save();

             $emailData = [
                'token' => $token,
             ];

             $recipient = $request->input('email');
             Mail::to($recipient)->send(new resetPasswordEmail($emailData));

             return back()->withSuccess('The reset link has been sent.')->with('redirectToHome', true);


            

        }else{
            return back()->withErrors([
                'email' => 'There is no account associated with this email',
            ])->onlyInput('email'); 
        }
        

    }

    

    public function resetPasswordValidate($token){


        $data = Password_reset_tokens::all()
                        ->where('token', $token)
                        ->first();

        if ($data){
            return view('auth.resetPasswordForm')->with('data', $data);
        }
        return redirect('/')->withErrors([
            'email' => 'The token is expired',
        ])->onlyInput('email');

    }

    
    public function forgotPasswordAction(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        $user->password = $password;
        $user->update();

        if ($user){
            return redirect('/')->withSuccess('The password has been reset. Please login');
        }else{
            return redirect('/')->withErrors([
            'email' => 'The Reset Password is unsuccessful',
        ])->onlyInput('email');

        }


    }

}