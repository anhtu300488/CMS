@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                    <!-- Authentication Links -->
                        @php $locale = session()->get('locale'); @endphp
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @switch($locale)
                                    @case('fr')
                                    <img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French
                                    @break
                                    @case('ge')
                                    <img src="{{asset('img/ge.png')}}" width="30px" height="20x"> German
                                    @break
                                    @case('es')
                                    <img src="{{asset('img/es.png')}}" width="30px" height="20x"> Spanish
                                    @break
                                    @case('in')
                                    <img src="{{asset('img/in.png')}}" width="30px" height="20x"> Hindi
                                    @break
                                    @case('pk')
                                    <img src="{{asset('img/pk.png')}}" width="30px" height="20x"> Urdu
                                    @break
                                    @default
                                    <img src="{{asset('img/us.png')}}" width="30px" height="20x"> English
                                @endswitch
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="lang/en"><img src="{{asset('img/us.png')}}" width="30px" height="20x"> English</a>
                                <a class="dropdown-item" href="lang/fr"><img src="{{asset('img/fr.png')}}" width="30px" height="20x"> French</a>
                                <a class="dropdown-item" href="lang/ge"><img src="{{asset('img/ge.png')}}" width="30px" height="20x"> German</a>
                                <a class="dropdown-item" href="lang/es"><img src="{{asset('img/es.png')}}" width="30px" height="20x"> Spanish</a>
                                <a class="dropdown-item" href="lang/in"><img src="{{asset('img/in.png')}}" width="30px" height="20x"> Hindi</a>
                                <a class="dropdown-item" href="lang/pk"><img src="{{asset('img/pk.png')}}" width="30px" height="20x"> Urdu</a>
                            </div>
                        </li>

                    </ul>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
