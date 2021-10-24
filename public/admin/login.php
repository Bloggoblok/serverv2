<?php

 if(session_id() != '' || isset($_SESSION)) {
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dooo- Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/images/favicon.ico">

    <?php include 'layouts/headerStyle.php'; ?>

</head>

<body>

    <div class="home-btn d-none d-sm-block">
        <a href="login.php" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue</p>
                                <a href="index.php" class="logo logo-admin">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJMAAACRCAMAAADw83osAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJUExURQAAAO4uRwAAANcfYtMAAAADdFJOU///ANfKDUEAAAAJcEhZcwAAD14AAA9eAQXNOC0AAAOPSURBVHhe7ZLRctswDARb//9Hx5K2tkWCEgDimEym+6bDAdx48ufx8/jv5GPo9PcffC9k4ITPDtE6TCdkXhCvwuW02MpywuMMsxUYTkh0MNbTO2FgQUNN58TzNnTExJzWWEWdVli1Tjx8BU0dCSe5VcpJbJV0klqlnYRWE04yqd/0O1GXkHOiLCLjRFVGwommjrgTRSFhJ3pKok7UpASdaJ1gVKcbc6L0AYMDslnmnIjfkM8RcqLzgvgEoxkiTlReELcwzTPhRNrDPE3eidCESpKAEw0gHEErRdaJ7AKKCZJORJdQjeN3onBAdgPlKDknoluoB9E65azUThkrvVPcKuVE4oY1L0ucglaLnEJWuf8nrVXSKWXF5i1pJ+FPlXfSWc04qazmnFJWbI6ZdVJYzTvVW1U4ZaSuzpU4Ff9URU6lVmVOGanBzTqnlJR5tdCpzKrUKWfF6ptipxKrcqeU1Pl4vdMTNiKwuSNxmpTSOGWsWHyickpYsad0iluxJnWKSrGldYpasSR2ilmxIneKSLGhdwpY0V/h5LaivcbJKUV5kZNPiu4qJ5cU1WVOHima65wcUhQXOt1KUVvqdCdFS+hkrByHRlDSOdlLpCZUnoic2Gm3CC1obEic2NghOiAzoLAjcKIPhEDYwhTKnWi/IT8gO8PsRbET3U+YHJCdYPSm1IlmA8MDsjfkn1Q6UWxhekD2gvhEnRM1Awo7REDYUOZEy4LGDtEOUUfrNL7N3IaODZ0doicEBp3T8DxjCxpDqG2QXP6FvdPoBaY9zC+guNEFBobT4BGGLUwvobrRfltYTvZDjBoYXkN34/xlYzv1bxE3MLyD9oZDaeh0fo+ogeE99L2MnXYu7vGeBza83DiN4TkXrHhJOvGYD3bc5Jx4zAlLbjJOPOWGNTdxJx7yw56fqBPvRGDTT8yJV0KwGqB1urzBKxHYDNE7De/sbwRhNYblZJ46BjFYjWI7PeEbCEOwGmfotNEnAfblFJdOE3AuhcaJY0kUTpxKI3DiUp5yJ+7MUOzElTlKnbgxS6ETF+apc+JAAVVOrJdQ48RyERVOrJZR4MRmHdNO7FUy6cRWLXNOLBUz48RKOXknFgRknahLSDrR1pByoqsi4URTR+t0L0VPSNSJlpSYEx0xndOFFAU5fifGC+idBlIMV2A4WVJM1mA5dVLEqzCdzlZE6xg4fVjxvZCh0zfy85wejy9+uYjuLkesrwAAAABJRU5ErkJggg==" height="24" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">

                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter Password">
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                id="customControlInline" checked>
                                            <label class="custom-control-label" for="customControlInline">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light"
                                            onclick="auth()">Log In</button>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div id="result" class="m-t-15"></div>
                                    </div>

                                </div>

                                <div class="form-group mt-2 mb-0 row">
                                    <div class="col-12 mt-4">
                                        <a href="../../password_reset/recoverpw_ins.php"><i class="mdi mdi-lock"></i> Forgot your
                                            password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())
                            </script> Dooo- Crafted with <i class="mdi mdi-heart text-danger"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'layouts/footerScript.php'; ?>
    <?php include "layouts/content-end.php"; ?>

    <script>
        function auth() {

            var Email = document.getElementById("email").value;
            var Password = document.getElementById("password").value;
            var jsonObjects = {
                "Email": Email,
                "Password": Password
            }
            $.ajax({
                type: 'POST',
                url: "dashboard_api/authentication.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'json',
                success: function (response) {
                    var Status = response.Status;
                    if (Status == "Successful") {
                        window.location.assign("index.php");
                    } else if (Status == "Invalid Credential") {
                        $('#result').html(
                            '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Username &amp; password not match.</div>'
                        );
                    }
                }
            });
        }
    </script>