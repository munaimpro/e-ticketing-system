<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
        .login-container {
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
        .form-control{
            border-radius:1rem !important;
        }

        /* CSS */
        .btn-rounded {
	// Removes browser styling
	appearance: none;
	border: none;
	font-size: inherit;

	// Units scale with font-size
	border-radius: 2em;
	padding: 0.75em 1em;

	background: blue;
	color: white;

	display: inline-flex;
	align-items: center;

	cursor: wait;
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

// Reveal spinner and animate
.btn-rounded {
	&:active .spinner,
	&:focus .spinner,
	&:hover .spinner {
		--width: 1em;
		--offset-r: 0.333em;
		--offset-l: -0.333em;
		--opacity: 1;

		animation: 0.666s load infinite;

		@keyframes load {
			to {
				transform: rotate(360deg);
			}
		}
	}
}
    </style>
</head>
<body>

<div class="login-container">
    <img src="{{asset('asset/images/dark-logo.png')}}" alt="Logo" width="250" height="65" class="logo">

    <!-- Session Status -->
    <div class="mb-4">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">{{ __('Email*') }}</label>
            <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Enter Your Email">
            @if ($errors->has('email'))
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password">{{ __('Password*') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Enter Your Password">
            @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="form-check mt-4">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">
                {{ __('Remember me') }}
            </label>
        </div>

        <div class="d-flex justify-content-between mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-muted" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
 {{-- register --}}
 <a href="{{route('register')}}" class="btn btn-primary btn-rounded">Register</a>
            <button type="submit" class="btn btn-primary btn-rounded">
                {{ __('Log in') }}
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
