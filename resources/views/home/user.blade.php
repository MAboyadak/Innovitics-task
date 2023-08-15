@extends('layout.app')

@section('content')
    <div class="screen-container row">
        <div class="actions col-4">
            <div>
                <button type="button" id="accounts-btn" class="btn">Accounts</button>
            </div>
            <div>
                <button type="button" id="last-five-btn" class="btn">Last five transactions</button>
            </div>
        </div>
        <div class="screen col-8" id="screen">
            
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/account-events.js"></script>
@endsection