<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function lastFiveTransactions()
    {
        $userId = Auth::id();
        $accountIds = Account::where('user_id',$userId)->pluck('id');
        $transactions = Transaction::whereIn('account_id', $accountIds)->with('account:id,name')->orderBy('id','desc')->limit(5)->get();
        return view('transactions.index', compact('transactions'))->render();
    }

    public function getAccounts()
    {
        $userId = Auth::id();
        $accounts = Account::where('user_id', $userId)->get();
        return view('user-accounts.index', compact('accounts'))->render();
    }
}
