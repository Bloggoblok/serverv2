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

    <title>Dooo - Image Slider</title>

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


<body onload="javascript:OnLoad()">
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

                                <h4 class="font-size-18">Terms & Conditions</h4>

                                <ol class="breadcrumb mb-0">

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>

                                    <li class="breadcrumb-item active">Terms & Conditions</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end page title -->

                    <div class="form">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">Terms & Conditions</h3>

                                    <hr>

                                    <div class="summernote" id="summernote"></div>

                                    </br>
                                    <div class="form-group">
                                        <div class="col-md-12 row justify-content-end">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save()" id="create_btn" type="submit" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="mdi mdi-content-save-all"></i> Save
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
        function OnLoad() {
            $.ajax({
                type: 'POST',
                url: "dashboard_api/get_config.php",
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },
                success: function (response) {
                    var TermsAndConditions = response.TermsAndConditions;
                    $('#summernote').summernote('code', TermsAndConditions);
                }

            });
        }

        function Save() {
            var TermsAndConditions = $('#summernote').summernote('code');
            var jsonObjects = {

                "TermsAndConditions": TermsAndConditions
            };
            $.ajax({

                type: 'POST',
                url: "dashboard_api/save_tc.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                success: function (response) {
                    if (response == "Terms And Conditions Data Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'Terms And Conditions Data Updated Successfully!',
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