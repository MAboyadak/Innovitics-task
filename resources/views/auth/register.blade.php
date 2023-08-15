<form action="{{route('register')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="">Username : </label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="">PIN : </label>
        <input type="password" class="form-control" name="pin">
    </div>
    <div class="form-group">
        <label for="">Confirm PIN : </label>
        <input type="password" class="form-control" name="pin_confirmation">
    </div>

    <div class="form-group mt-4">
        <button type="submit" class="btn submit-btn">Submit</button>
    </div>
</form>