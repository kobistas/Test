<?php

namespace App\Http\Controllers\Auth;
use Socialite;
use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
    * Redirect the user to the GitHub authentication page.
    *
    * @return Response
    */
   public function redirectToProvider()
   {
       return Socialite::driver('facebook')->redirect();
   }

   /**
    * Obtain the user information from GitHub.
    *
    * @return Response
    */
   public function handleProviderCallback()
   {
       $user = Socialite::driver('facebook')->user();
       $authUser = $this ->findOrCreateUser($user);
      //  return dd($user);
      //pasitikrinti su dd ka gali duoti facebook
      Auth::login($authUser, true);
      return redirect('/')->with('info', 'Jūs prisijungėte su Facebook vartotojo paskyra į stipriausią e-sporto Žaidimų Lygos turnyrą Lietuvoje.');

   }
   public function findOrCreateUser($user) {

      $authUser = User::where('provider_user_id',$user->id)->first();

      if($authUser){
        return $authUser;
      }

        return User::create([

            'name' => $user['name'],
            'email' => $user->email,
            'link' =>$user['link'],
            'password' =>'none',
            'provider_user_id' =>$user->id,
            'avatar'=> $user->avatar_original

        ]);

   }
}
