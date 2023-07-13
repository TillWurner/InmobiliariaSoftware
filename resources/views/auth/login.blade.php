<head>
    <link href={{ asset("logincss/login.css") }} rel="stylesheet">
    <!-- font awesome cdn -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
</head>
<body>
    <nav>
        <ul>
            <li><img src="{{ asset('welcome/img/logo2.png') }}" class="logo"></li>            
                <li><a href="{{ route('main') }}">Inicio</a></li>
        </ul>
    </nav>
    
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Iniciar Sesion</button> 
            </div>
            <div class="social-icons">
                <a href="#" class="logo">Inmobiliaria Century</a>
            </div>
            <!--1-->
            <form id="login" method="POST" action="{{ route('login') }}" class="input-group">
                    @csrf
                    <input type="email" id="email" placeholder="Correo Electronico" class="input-field 
                    @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus
                    placeholder="Enter a valid email address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!--password-->
                    <input type="password" id="password" placeholder="Contraseña" class="input-field 
                    @error('password') is-invalid @enderror" name="password"
                    required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="check-box" type="checkbox" name="remember" id="remember" 
                {{ old('remember') ? 'checked' : '' }}><span> Recordar contraseña</span>
                    <button type="submit" name="Login" class="submit-btn">
                        Iniciar Sesion
                    </button>        
                                    @if (Route::has('password.request'))
                                        <a class="btn-btn-link" href="{{ route('password.request') }}">
                                           <!-- {{ __('¿Olvido su contraseña?') }}-->
                                        </a>
                                    @endif
             
            </form>
        </div>
    </div>

    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }

    </script>

</body>

