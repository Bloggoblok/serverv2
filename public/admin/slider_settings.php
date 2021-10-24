<?php

require '../db/config.php';

session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <title>Dooo - Slider Settings</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



    <!-- DataTables -->

    <link href="public/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="public/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->

    <link href="public/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Sweet Alert-->
    <link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />



    <?php include 'layouts/headerStyle.php'; ?>

</head>



<?php include 'layouts/master.php'; echo setLayout();?>


<body onload="javascript:Load_Slider_Config()">
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

                            <h4 class="font-size-18">Slider Settings</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>

                                <li class="breadcrumb-item active">Slider Settings</li>

                            </ol>

                        </div>

                    </div>

                </div>

                <!-- end page title -->

                <div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">

                                   <h3 class="card-title mt-0">Slider Settings</h3>
                                   <hr>

                                   <div class="col-12">
                                    <label class="control-label col-md-3">Slider Type</label>
                                    <select class="form-control m-bot15 col-4" id="slider_type" name="slider_type">
                                        <option value="0" selected="" id="ad1_image_selection">Movie Slider</option>
                                        <option value="1" id="ad1_code_selection">Web Series Slider</option>
                                        <option value="2" id="ad1_code_selection">Custom Slider</option>
                                        <option value="3" id="ad1_disable">Disable</option>
                                    </select>
                                    </div>

                                    <pre> </pre>

                                <div class="col-12">
                                    <label class="control-label col-md-3">Movie Image Slider Max Visible</label>
                                    
                                    <input class="form-control col-5" type="number" value="0"
                                        id="movie_image_slider_max_visible">



                                        

                                    <pre> </pre>
                                 

                                    
                                    <label class="control-label col-md-3">Web Series Image Slider Max Visible</label>
                                    
                                    
                                    <input class="form-control col-5" type="number" value="0"
                                        id="webseries_image_slider_max_visible">

                                </div>
                                <div class="form-group">
                                        <div class="col-md-12 row justify-content-end">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_Slider_Config()" id="create_btn"
                                                type="submit" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-content-save-all"></i>  SAVE
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





<!-- Required datatable js -->

<script src="public/libs/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="public/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->

<script src="public/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<script src="public/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<script src="public/libs/jszip/jszip.min.js"></script>

<script src="public/libs/pdfmake/build/pdfmake.min.js"></script>

<script src="public/libs/pdfmake/build/vfs_fonts.js"></script>

<script src="public/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>

<script src="public/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

<script src="public/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->

<script src="public/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<script src="public/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->

<script src="public/js/pages/datatables.init.js"></script>

<!-- Sweet Alerts js -->
<script src="public/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="public/js/pages/sweet-alerts.init.js"></script>

<?php include "layouts/content-end.php"; ?>

<script>
function Load_Slider_Config() {
    $.ajax({
            type: 'POST',
            url: "dashboard_api/get_config.php",
            contentType: 'application/json',
            dataType: 'json',
            headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },
            success: function (response) {
                var image_slider_type = response.image_slider_type;
                var movie_image_slider_max_visible = response.movie_image_slider_max_visible;
                var webseries_image_slider_max_visible = response.webseries_image_slider_max_visible;

                $("#slider_type").val(image_slider_type);
                $("#movie_image_slider_max_visible").val(movie_image_slider_max_visible);
                $("#webseries_image_slider_max_visible").val(webseries_image_slider_max_visible);

            }
        });
    
}

function Save_Slider_Config() {
    var Slider_Type = document.getElementById("slider_type").value;
    var movie_image_slider_max_visible = document.getElementById("movie_image_slider_max_visible").value;
    var webseries_image_slider_max_visible = document.getElementById("webseries_image_slider_max_visible").value;

    var jsonObjects = {
        "slider_type": Slider_Type,
        "movie_image_slider_max_visible": movie_image_slider_max_visible,
        "webseries_image_slider_max_visible": webseries_image_slider_max_visible,
    };
    $.ajax({
            type: 'POST',
            url: "dashboard_api/save_image_slider_config.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response) {
                if(response == "Image Slider Config Saved successfully") {
                    Success();
                } else {
                    Error();
                }
            }
        });
    
}

function Success() {
        swal.fire({
                    title: 'Successful!',
                    text: 'Slider Settings Saved Successfully!',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: "#f46a6a"
                }).then(function() {
                    location.reload();
                });
    }

    function Error() {
        swal.fire({
            title: 'Error',
                      text: 'Something Went Wrong :(',
                      type: 'error'
                }).then(function() {
                    location.reload();
                });
    }
</script>