@extends('layouts.app')

@section('content')
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Login') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Login') }}--}}
{{--                                    </button>--}}

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}



<style>
    .b {
        font:  font-family: Futura,Trebuchet MS,Arial,sans-serif;
    }
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body{
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
    }

    .wave{
        position: fixed;
        bottom: 0;
        left: 0;
        height: 100%;
        z-index: -1;
    }

    .container{
        width: 100vw;
        height: 100vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap :7rem;
        padding: 0 2rem;
    }

    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .login-content{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
    }

    .img img{
        width: 500px;
    }

    form{
        width: 360px;
    }

    .login-content img{
        height: 100px;
    }

    .login-content h2{
        margin: 15px 0;
        color: #333;
        text-transform: uppercase;
        font-size: 2.9rem;
    }

    .login-content .input-div{
        position: relative;
        display: grid;
        grid-template-columns: 7% 93%;
        margin: 25px 0;
        padding: 5px 0;
        border-bottom: 2px solid #d9d9d9;
    }

    .login-content .input-div.one{
        margin-top: 0;
    }

    .i{
        color: #d9d9d9;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .i i{
        transition: .3s;
    }

    .input-div > div{
        position: relative;
        height: 45px;
    }

    .input-div > div > h5{
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #999;
        font-size: 18px;
        transition: .3s;
    }

    .input-div:before, .input-div:after{
        content: '';
        position: absolute;
        bottom: -2px;
        width: 0%;
        height: 2px;
        background-color: #b49b00;
        transition: .4s;
    }

    .input-div:before{
        right: 50%;
    }

    .input-div:after{
        left: 50%;
    }

    .input-div.focus:before, .input-div.focus:after{
        width: 50%;
    }

    .input-div.focus > div > h5{
        top: -5px;
        font-size: 15px;
    }

    .input-div.focus > .i > i{
        color: #38d39f;
    }

    .input-div > div > input{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: none;
        padding: 0.5rem 0.7rem;
        font-size: 1.2rem;
        color: #555;
        font-family: 'poppins', sans-serif;
    }

    .input-div.pass{
        margin-bottom: 4px;
    }

    a{
        display: block;
        text-align: right;
        text-decoration: none;
        color: #999;
        font-size: 0.9rem;
        transition: .3s;
    }

    a:hover{
        color: #38d39f;
    }

    .btn{
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        outline: none;
        border: none;
        background-image: linear-gradient(to right, #fbc658, #ffe476, #ffee80);
        background-size: 200%;
        font-size: 1.2rem;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
        margin: 1rem 0;
        cursor: pointer;
        transition: .5s;
    }
    .btn:hover{
        background-position: right;
    }


    @media screen and (max-width: 1050px){
        .container{
            grid-gap: 5rem;
        }
    }

    @media screen and (max-width: 1000px){
        form{
            width: 290px;
        }

        .login-content h2{
            font-size: 2.4rem;
            margin: 8px 0;
        }

        .img img{
            width: 400px;
        }
    }

    @media screen and (max-width: 900px){
        .container{
            grid-template-columns: 1fr;
        }

        .img{
            display: none;
        }

        .wave{
            display: none;
        }

        .login-content{
            justify-content: center;
        }
    }
</style>
{{--<img class="wave" src="assets/img/wave.png">--}}
<div class="container">
    <div class="img">
        <img src="assets/img/bg.png">
    </div>
    <div class="login-content">
<form method="POST" action="{{ route('login') }}">
    @csrf
    <img src="assets/img/avatar.svg">
    <h2 class="title">Welcome</h2>
    <div class="input-div one">
        <div class="i">
            <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="div">
            <h5>Email</h5>
            <input type="email" name="email" value="{{ old('email') }}"  required autocomplete="email" autofocus class="input @error('email') is-invalid @enderror">

        </div>

    </div>

    @error('email')
    <span style="color:red;">
            {{ $message }}
        </span>@enderror

    <div class="input-div pass">
        <div class="i">
            <svg class="bi bi-lock-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <rect width="11" height="9" x="2.5" y="7" rx="2"/>
                <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="div">
            <h5>Password</h5>
            <input type="password" name="password" class="input @error('password') is-invalid @enderror" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>

    </div>
<div>
    <button type="submit" class="btn">
        login
    </button>


</div>

</form>
    </div>
</div>
<script>
    @if(Session::has('error'))

    toastr.error("{{Session::get('error')}}")

    @endif
</script>
<script>
    const inputs = document.querySelectorAll(".input");


    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });

</script>


@endsection
