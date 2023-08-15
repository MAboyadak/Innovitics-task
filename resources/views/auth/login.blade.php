<form action="{{route('login')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="">Card Number : </label>
        <input type="text" class="form-control" name="card_number">
    </div>
    <div class="form-group">
        <label for="">PIN : </label>
        <input type="password" class="form-control" name="pin">
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn submit-btn">Submit</button>
    </div>
</form>