<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    @include('assets.css')

    @include('assets.js')

    <title>Moderator Login</title>
</head>

<body>

<!--start wrapper-->
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
            <div class="card radius-10">
                <div class="card-body p-4">

                    <div class="text-center">
                        <h4>Moderator</h4>
                        <p>Sign In to your account</p>
                    </div>
                    @if( $errors->any() )
                        @foreach( $errors->all() as $error )
                            <div class="alert alert-dismissible fade show py-2 border-0 border-start border-4 border-danger">
                                <div class="d-flex align-items-center">
                                    <div class="fs-3 text-danger">
                                        <ion-icon name="close-circle-sharp" role="img"
                                                  class="md hydrated"
                                                  aria-label="close circle sharp"></ion-icon>
                                    </div>
                                    <div class="ms-3">
                                        <div class="text-danger">
                                            {{ $error }}
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif


                    <form class="form-body row g-3" action="{{ route('moderator.login.post') }}"
                          method="post">
                        @csrf
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="inputEmail">
                        </div>
                        <div class="col-12">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control"
                                   id="inputPassword">
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       name="remember"
                                       type="checkbox" role="switch"
                                       id="flexSwitchCheckRemember">
                                <label class="form-check-label" for="flexSwitchCheckRemember">Remember
                                    Me</label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Sign In</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end wrapper-->


</body>

</html>
