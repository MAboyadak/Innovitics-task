<form action="{{route('accountWithdraw')}}" method="post">
  @csrf
  <div class="row text-center p-3 account-list">
    <h4 class="text-center"> Account List : </h4>
    @foreach ($accounts as $account)
        <div class="col-6">
          <button type="button" class="btn account-name" data-account-id={{$account->id}}>{{$account->name}}</button>
        </div>        
    @endforeach
    <input type="hidden" name="account_id" value="">
  </div>

  <div class="row text-center p-3 account-actions d-none">
    <h4 class="text-center"> Actions : </h4>
    <div>
        <button type="button" id="inquiry-btn" class="btn">Balance Inquiry</button>
    </div>
    <div>
        <button type="button" id="withdraw-btn" class="btn">Withdraw</button>
    </div>
  </div>

  <div class="row withdraw-section d-none p-2">
    <h4> <span> Withdraw Amount: </span> <input class="form-control mt-2 w-50" type="number" name="withdraw_amount" value=""> </h4>
    <div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

  <input type="hidden" name="action" value="">
</form>

<div class="row acc-balance d-none">
  <h4>Account Balance : <span id="acc-balance"> </span> L.E</h4>
</div>