@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}  
                    <div  style="float:right">
                        <a  href="{{ route('logout') }}" class="btn btn-primary btn-sm" style="margin-right:10px;" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                        </form>
                    </div>
                </div>

           

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <p>
                    <div class="small">Logged in as: <strong style="color:green;margin-bottom:15px;">{{ Auth::user()->name }}</strong></div>
                    </p>
                    {{ __('<body>') }}<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;{{ __('Nothing!') }}<br>
                    {{ __('</body>') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection