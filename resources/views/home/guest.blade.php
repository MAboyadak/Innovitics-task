@extends('layout.app')

@section('content')
    <div class="screen-container row">
        <div class="actions col-4">
            {{-- <div>
                <button type="button" id="register-btn" class="btn">Register new user</button>
            </div> --}}
            <div>
                <button type="button" id="login-btn" class="btn">Log in</button>
            </div>
        </div>
        <div class="screen col-8" id="screen">
            
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/auth-events.js"></script>
@endsection