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

    <title>Dooo - Api Setting</title>

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


<body onload="javascript:On_Load()">
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

                                <h4 class="font-size-18">Api Setting</h4>

                                <ol class="breadcrumb mb-0">

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Api Setting</a></li>

                                    <li class="breadcrumb-item active">Api Setting</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end page title -->


                    <div class="form" method="post">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">API</h3>

                                    <hr>



                                    <div class="tab-pane active" id="rest_api" role="tabpanel">
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label"><strong>API SERVER URL FOR
                                                    APP</strong></label>
                                            <div class="col-sm-9">
                                                <textarea rows="2" id="api_url" onclick="copyToClipboard('api_url')"
                                                    class="form-control"></textarea>
                                                <p><small>Copy &amp; paste this URL to App Source Code.</small></p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label"><strong>API KEY FOR
                                                    APP</strong></label>
                                            <div class="col-sm-6">
                                                <input type="text" value="" id="api_key"
                                                    onclick="copyToClipboard('api_key')"
                                                    name="api_secret_key" class="form-control" required=""
                                                    data-parsley-length="[14, 128]">
                                            </div>
                                            <div class="col-sm-3">
                                                <a class="btn btn-primary btn-sm"
                                                    onclick="Generate_Secrate_Key()">Generate New
                                                    Key</a>
                                            </div>
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
        function On_Load() {

            var base_url = window.location.origin;
            $("#api_url").val(base_url);


            $.ajax({
                type: 'POST',
                url: "dashboard_api/get_config.php",
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },
                success: function (response) {
                    var api_key = response.api_key;
                    if(api_key == "" || api_key == null) {
                        Generate_Secrate_Key();
                    } else {
                        $("#api_key").val(api_key);
                    }
                }

            });
        }

        function copyToClipboard(element) {
            var copyText = document.getElementById(element);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
            swal.fire({
                title: 'Copied!',
                text: copyText.value + '\nNow just paste into android configuration file',
                type: 'success'
            });
        }

        function Generate_Secrate_Key() {
            $.ajax({
                type: 'POST',
                url: "dashboard_api/Generate_apikey.php",
                contentType: 'application/json',
                dataType: 'text',
                success: function (response2) {
                    if(response2 == "Api Key Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'Api Key Updated successfully!',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#556ee6',
                            cancelButtonColor: "#f46a6a"
                        }).then(function () {
                            location.reload();
                        });
                    }
                }

            });
        }
    </script>