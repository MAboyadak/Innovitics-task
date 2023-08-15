<?php 

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountService
{

    public function withdraw($data)
    {
            $account = Account::where('id', $data['account_id'])->where('user_id', Auth::id())->first();

            if($account){
                $transactionCount = Transaction::where('account_id',$account->id)
                                                ->whereDate('created_at', Carbon::today())
                                                ->count();

                if($transactionCount >= 10){
                    return redirect()->back()->with('error', 'Sorry, You already have reached the limit, you can only have total of ten withdrawals per day.');
                }
                
                DB::beginTransaction();
                    try {
                    $account->balance = $account->balance - $data['withdraw_amount'];
                    $account->save();

                    Transaction::create([
                        'amount'        => $data['withdraw_amount'],
                        'account_id'    => $data['account_id'],
                    ]);
                    DB::commit();
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error in withdrawal please contact the customer support.');
                    DB::rollback();
                }
                return redirect()->back()->with('success', 'Your withdrawal has been made successfully.');
                
            }else{
                return redirect()->back()->with('error', 'This user has no such account.');
            }
    }

}

?>