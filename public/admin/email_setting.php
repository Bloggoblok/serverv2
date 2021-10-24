<?php
session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <title>Dooo - Email Setting</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



    <link href="public/cssadd-movie.css" rel="stylesheet" type="text/css" />



    <!-- Summernote css -->

    <link href="public/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />


    <!-- Sweet Alert-->

    <link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


    <link href="public/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="public/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="public/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="public/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />



    <?php include 'layouts/headerStyle.php'; ?>

</head>



<?php include 'layouts/master.php'; echo setLayout();?>


<body onload="javascript:Load_Config()">
    <!-- Begin page -->

    <div id="layout-wrapper">





        <?php include 'layouts/topbar.php'; ?>

        <div class="main-content">



            <div class="page-content">

                <div class="container-fluid">



                    <!-- start page title -->

                    <div class="row align-items-center">

                        <div class="col-sm-6">

                            <div class="page-title-box">

                                <h4 class="font-size-18">Email Setting</h4>

                                <ol class="breadcrumb mb-0">

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Setting</a></li>

                                    <li class="breadcrumb-item active">Email Setting</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end page title -->

                    <div class="form" method="post">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">Contact Email</h3>

                                    <hr>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Contact Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" value="" id="contact_email" class="form-control">
                                            <p>All contact mail will send to this email..</p>
                                        </div>
                                    </div>


                                    <h3 class="card-title mt-0">Outgoing Server Configuration</h3>

                                    <hr>

                                    <div id="smtp" style="">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">SMTP Server Address</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="" id="smtp_host" class="form-control"
                                                    placeholder="ex: smtp.gmail.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">SMTP Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="" id="smtp_user" class="form-control"
                                                    placeholder="ex: example@gmail.com">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">SMTP Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" value="" id="smtp_pass" class="form-control"
                                                    placeholder="ex: ******">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label">SMTP Port</label>
                                            <div class="col-sm-9">
                                                <input type="text" value="" id="smtp_port" class="form-control"
                                                    placeholder="ex: 25">
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-md-12 row justify-content-end">

                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_Email_setting()" id="create_btn" type="submit"
                                                aria-haspopup="true" aria-expanded="false">

                                                <i class="mdi mdi-content-save-all"></i> SAVE CHANGES

                                            </button>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>



                </div> <!-- container-fluid -->

            </div>

            <!-- End Page-content -->

            <?php include 'layouts/footer.php'; ?>

        </div>

        <!-- end main content-->

    </div>

    <!-- END layout-wrapper -->

    <?php include 'layouts/footerScript.php'; ?>



    <!--tinymce js-->

    <script src="public/libs/tinymce/tinymce.min.js"></script>



    <!-- Summernote js -->

    <script src="public/libs/summernote/summernote.js"></script>



    <!-- init js -->

    <script src="public/js/pages/form-editor.init.js"></script>



    <!-- Sweet Alerts js -->

    <script src="public/libs/sweetalert2/sweetalert2.min.js"></script>



    <!-- Sweet alert init js-->

    <script src="public/js/pages/sweet-alerts.init.js"></script>



    <script src="public/libs/select2/js/select2.min.js"></script>

    <script src="public/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="public/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

    <script src="public/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <script src="public/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

    <script src="public/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>



    <script src="public/js/pages/form-advanced.init.js"></script>



    <?php include "layouts/content-end.php"; ?>



    <?php require '../db/config.php'; ?>

    <script>
        function Load_Config() {
            $.ajax({

                type: 'POST',

                url: "dashboard_api/get_config.php",

                contentType: 'application/json',

                dataType: 'json',

                headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },

                success: function (response) {
                    var contact_email = response.Contact_Email;
                    var smtp_host = response.SMTP_Host;
                    var smtp_user = response.SMTP_Username;
                    var smtp_pass = response.SMTP_Password;
                    var smtp_port = response.SMTP_Port;

                    $('#contact_email').val(contact_email);
                    $('#smtp_host').val(smtp_host);
                    $('#smtp_user').val(smtp_user);
                    $('#smtp_pass').val(smtp_pass);
                    $('#smtp_port').val(smtp_port);

                }

            });
        }

        function Save_Email_setting() {
            var contact_email = document.getElementById("contact_email").value;
            var smtp_host = document.getElementById("smtp_host").value;
            var smtp_user = document.getElementById("smtp_user").value;
            var smtp_pass = document.getElementById("smtp_pass").value;
            var smtp_port = document.getElementById("smtp_port").value;

            var jsonObjects = {
                "contact_email": contact_email,
                "smtp_host": smtp_host,
                "smtp_user": smtp_user,
                "smtp_pass": smtp_pass,
                "smtp_port": smtp_port
            };

            $.ajax({
                type: 'POST',
                url: "dashboard_api/save_email_setting.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                success: function (response2) {
                    if (response2 == "Email Setting Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'Email Setting Updated successfully!',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#556ee6',
                            cancelButtonColor: "#f46a6a"
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        Error();
                    }

                }

            });
        }

        function Error() {

            swal.fire({

                title: 'Error',

                text: 'Something Went Wrong :(',

                type: 'error'

            }).then(function () {

                location.reload();

            });

        }
    </script>