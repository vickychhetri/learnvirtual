<!DOCTYPE html>
<html lang="en">

<head>
    <title> Register </title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Learn Virtual" />
    <script>
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="/css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
    <div class="bg-page py-5">
        <div class="container">

            <!-- main-heading -->
            <h2 class="main-title-w3layouts mb-2 text-center text-white"> Register </h2>
            <!--// main-heading -->
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">

                    <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif
                        @if (session('Error'))
                        <div class="alert alert-danger">
                            {{ session('Error') }}
                        </div>
                        @endif
                        <form action="/Register" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="fullName" class="form-control"
                                    placeholder="Enter your Name    " required="">
                                <span style="color:red;">
                                    @error('fullName')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="number" name="mobile" class="form-control"
                                    placeholder="Enter your Name    " required="">
                                <span style="color:red;">
                                    @error('mobile')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter email"
                                    required="">
                                <span style="color:red;">
                                    @error('course')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required="">
                                <span style="color:red;">
                                    @error('password')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Password" required="">
                                <span style="color:red;">
                                    @error('password_confirmation')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-check text-center">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termCondition"
                                    value="agree">
                                <label class="form-check-label" for="exampleCheck1">Agree the terms and policy</label>
                                <span style="color:red;">
                                    @error('termCondition')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <button type="submit"
                                class="btn btn-primary error-w3l-btn mt-sm-5 mt-3 px-4">Submit</button>
                        </form>
                        <p class="paragraph-agileits-w3layouts mt-4">Already have account?
                            <a href="/login">Login</a>
                        </p>
                        <h1 class="paragraph-agileits-w3layouts mt-2">
                            <a href="/">Back to Home</a>
                        </h1>
                    </div>

                </div>
            </div>
            <!-- Copyright -->
            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© 2022 Learn Virtual . All Rights Reserved | Develop by Amita.
                </p>
            </div>
            <!--// Copyright -->
        </div>
    </div>


    <!-- Required common Js -->
    <script src='/js/jquery-2.2.3.min.js'></script>
    <!-- //Required common Js -->

    <!-- Js for bootstrap working-->
    <script src="/js/bootstrap.min.js"></script>
    <!-- //Js for bootstrap working -->

</body>

</html>