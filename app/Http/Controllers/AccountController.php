<?php

namespace App\Http\Controllers;

use App\Http\Requests\WithdrawRequest;
use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getAccountBalance(Request $request)
    {
        $jsonData = $request->json()->all();
        $accountId = $jsonData['account_id'];
        $accountBalance = Account::where('id', $accountId)->first()->balance; 
        return response()->json($accountBalance);
    }

    public function accountWithdraw(WithdrawRequest $request, AccountService $accountService)
    {
        $validatedData = $request->validated();
        if($request->action == 'withdraw'){
            return $accountService->withdraw($validatedData);
        }else{
            return redirect()->back()->with('error', 'Invalid operation.');
        }
    }
}
