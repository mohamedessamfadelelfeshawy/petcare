<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <script></script>
    <meta charset="UTF-8" />
    <meta name="description" content="Project1 " />
    <link rel="icon" href="/assets/images/logo.png.svg" />
    <link rel="stylesheet" href="/assets/css/signup.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  </head>
  <body>
    <section class="main">
      <div class="one">
      <img src="/assets/images/logo.png.svg">
        <p>PET <span>Care</span></p>
      </div>
       <div class="two">
        <h1>Sign up</h1>
        <form method="POST" action="{{ route('register') }}">
        @csrf

         
                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" placeholder="First name" required autocomplete="firstname" autofocus>
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Last name" required autocomplete="lastname" autofocus>
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
             
            
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-Mail" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            
            
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password" required autocomplete="password" autofocus>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                    <input id="c_password" type="password" class="form-control @error('c_password') is-invalid @enderror" name="c_password" value="{{ old('c_password') }}" placeholder="Confirm password" required autocomplete="c_password" autofocus>
                    @error('c_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
             
           
                    <input id="contact_number" type="text" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" placeholder="Contact number" required autocomplete="contact_number" autofocus>
                    @error('contact_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address" required autocomplete="address" autofocus>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               
                    <select class="form-select @error('type') is-invalid @enderror" name="type" id="type">
                        <option value="Customer">Customer</option>
                        <option value="Vet">Vet</option>
                        <option value="Trader">Trader</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
              
        
   

            <br>
            <input type="submit" value="Sign Up">
        </form>

      </div> 
    </section>
  </body>
</html>

