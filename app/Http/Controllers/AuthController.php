<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;
use App\Services\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    const SUCCESS_REDIRECT_ROUTE_NAME = 'home';
    private $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getLoginForm()
    {
        return view('auth.login')->render();
    }

    public function getRegisterForm()
    {
        return view('auth.register')->render();
    }

    public function login(LoginRequest $request, LoginService $loginService)
    {
        $validatedData = $request->validated();
        if($loginService->login($validatedData)){
            return redirect()->route(self::SUCCESS_REDIRECT_ROUTE_NAME)->with('success', 'Welcome Back :) ');
        }
        else{
            return redirect()->back()->with('error', 'The login credentials are not valid.');
        }
    }

    // public function register(RegisterRequest $request, LoginService $loginService)
    // {
    //     $validatedData = $request->validated();

    //     try{
    //         $result = $this->userRepo->store($validatedData);
    //         $cardNumber = $result['card_number'];
    //         $validatedData['card_number'] = $cardNumber;
    //         $loginService->login($validatedData);
    //         return redirect()->route(self::SUCCESS_REDIRECT_ROUTE_NAME)->with('success', 'User Created Successfully');
    //     }catch(\Exception $e){
    //         // throw new \Exception('Error in storing.');
    //         throw new \Exception($e->getMessage());
    //     }
    // }
}
