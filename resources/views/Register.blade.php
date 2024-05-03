<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G.E.T. Register Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/register.css') }}">
</head>

<body>
    <div class="sticky-top">
        @auth
            <!-- User is logged in -->
            @include('header_success')
        @else
            <!-- User is not logged in -->
            @include('header')
        @endauth
    </div>

    <div class="container align-items-center mt-1" style="width: 75%;">
        <div class="row align-items-center d-flex justify-content-center">
            <div class="col-md-6">
                <div class="form pt-3 pb-4 mt-3">
                    <div class="text-center fs-1 fw-bold m-4 mb-5">Registration</div>

                    @if(session('errors'))
                    <div id="error-alert" class="alert alert-danger pt-2 pb-0 text-left">
                        @foreach(session('errors')->all() as $error)
                        <span class="fs-6">- {{ $error }}</span><br>
                        @endforeach
                    </p>
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('error-alert').style.display = 'none';
                        }, 8000);
                    </script>
                    @endif

                    <form action="/login" method="post">
                    @csrf
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-person-circle d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Create your username" required>
                        </div>
                                
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" fill="black" class="bi bi-lock d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                </svg>
                            </span>
                            <input type="password" class="form-control" id="formGroupExampleInput" name="password" placeholder="Create your password" required>
                        </div>
                                
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="18" fill="black" class="bi bi-lock d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                </svg>
                            </span>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter your password again" required>
                        </div>
                        
                        <div class="input-group mb-4">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-phone d-flex justify-content-center m-0" viewBox="0 0 16 16">
                                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg>
                            </span>
                            <input type="text" class="form-control" id="formGroupExampleInput" name="phoneNum" placeholder="Enter your phone number" required>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="black" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                </svg>
                            </span>
                            <input type="email" class="form-control" id="formGroupExampleInput"  name="email" placeholder="Enter your email" required>
                        </div>
                        <br>

                        <p class="text-center fs-6 mt-1" style="font-family: serif">Already have an account? <a href="/login" class="fw-bold">Sign in</a></p>
              
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button type="submit" class="btn btn-secondary btn-lg fw-bold" style="background-color: #4a4135">Sign up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
    let passworderrorMessage = "{{ $errors->first('password') }}";
    if (passworderrorMessage !== "") {
        alert(passworderrorMessage);
    }
    
    let confirmationerrorMessage = "{{ $errors->first('password_confirmation') }}";
    if (confirmationerrorMessage !== "") {
        alert(confirmationerrorMessage);
    }

    let errorMessage = "{{ $errors->first('name') }}";
    if (errorMessage !== "") {
        alert(errorMessage);
    }

    
    
</script> -->
</body>
</html>