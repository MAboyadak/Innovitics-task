<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Account Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($transactions as $tr)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$tr->account->name}}</td>
                <td>{{$tr->amount}}</td>
                <td>{{$tr->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>