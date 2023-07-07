

<!DOCTYPE html>
<html>
<head>
      
    <title> login </title>
    <meta charset="UTF-8">
    <meta name="description" content="Project1 ">
    <link rel="icon" href="/assets/images/logo.png.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/assets/css/logo.css">
    <style> </style>

</head>
<body>
    <div class="main">
        <div class="main1">
            <img src="assets/images/logo.png.svg">
            <p> PET <span>Care</span></p>
        </div>
        <div class="main2">
            <div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="username" type="text" placeholder="EMAIL" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> <br>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="password" type="password" placeholder="PASSWORD" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input type="submit" value="Login"/>
                </form>
                <h2> Don't have account? <a href="{{route('register')}}" target="_blank"> signup</a></h2>
            </div>
        </div>
    </div>
</body>
</html>
