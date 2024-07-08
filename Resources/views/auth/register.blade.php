<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 400px;
            width: 100%;
            padding: 15px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 100px;
        }
        .form-control {
            border-radius: 1rem !important;
        }
        .btn-rounded {
            appearance: none;
            border: none;
            font-size: inherit;
            border-radius: 2em;
            padding: 0.75em 1em;
            background: blue;
            color: white;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }
        .spinner {
            --size: 1.25em;
            --offset-r: calc(var(--size) * -1);
            --offset-l: 0;
            --opacity: 0;
            position: relative;
            display: inline-flex;
            height: var(--size);
            width: var(--size);
            margin-top: calc(var(--size) * -0.5);
            margin-right: var(--offset-r);
            margin-bottom: calc(var(--size) * -0.5);
            margin-left: var(--offset-l);
            box-sizing: border-box;
            border: 0.125em solid rgba(white, 0.333);
            border-top-color: white;
            border-radius: 50%;
            opacity: var(--opacity);
            transition: 0.25s;
        }
        .btn-rounded:hover .spinner,
        .btn-rounded:focus .spinner,
        .btn-rounded:active .spinner {
            --width: 1em;
            --offset-r: 0.333em;
            --offset-l: -0.333em;
            --opacity: 1;
            animation: 0.666s load infinite;
        }
        @keyframes load {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>

<div class="register-container">
    <img src="{{ asset('asset/images/dark-logo.png') }}" alt="Logo" width="250" height="65" class="logo">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">{{ __('Name*') }}</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Enter Your Name">
            @if ($errors->has('name'))
                <div class="text-danger mt-2">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!-- Email Address -->
        <div class="form-group mt-4">
            <label for="email">{{ __('Email*') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Enter Your Email">
            @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password">{{ __('Password*') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Enter Your Password">
            @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-4">
            <label for="password_confirmation">{{ __('Confirm Password*') }}</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Your Password">
            @if ($errors->has('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a class="text-sm text-muted" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
            <button type="submit" class="btn btn-primary btn-rounded">
                {{ __('Register') }}
                <div class="spinner"></div>
            </button>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
