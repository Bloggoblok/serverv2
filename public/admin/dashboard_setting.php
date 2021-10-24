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

    <title>Dooo - Dashboard Setting</title>

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

                                <h4 class="font-size-18">Dashboard Setting</h4>

                                <ol class="breadcrumb mb-0">

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>

                                    <li class="breadcrumb-item active">Dashboard Setting</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end page title -->

                    <div class="form">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">TMDB Setting</h3>

                                    <hr>



                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">TMDB Language</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select class="form-control" id="Language">
                                                </select>
                                            </div>
                                        </div>
                                    </div>

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

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">License Setting</h3>

                                    <hr>



                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">License Code</label>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="text" value="" name="License_Code" id="License_Code" placeholder="Ex: xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group row" id="Item_Name_div">
                                        <label class="col-sm-3 control-label">Item Name</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input type="text" value="" name="Item_Name" id="Item_Name" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Buyer Name</label>
                                        <div class="col-sm-5">
                                            <div class="form-group">
                                                <input type="text" value="" name="Buyer_Name" id="Buyer_Name" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">License Type</label>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <input type="text" value="" name="License_Type" id="License_Type" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Purchased At</label>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" value="" name="Purchased_At_date" id="Purchased_At_date" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" value="" name="Purchased_At_time" id="Purchased_At_time" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Updated At</label>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" value="" name="Updated_At_date" id="Updated_At_date" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <input type="text" value="" name="Updated_At_time" id="Updated_At_time" placeholder="" class="form-control" required="" disabled="">
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <div class="col-md-12 row justify-content-end">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_License()" id="create_btn" type="submit" aria-haspopup="true"
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
        function On_Load() {

            $.ajax({
                type: 'POST',
                url: "dashboard_api/get_config.php",
                contentType: 'application/json',
                dataType: 'json',
                headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },
                success: function (response1) {
                    var License_Code = response1.license_code;
                    $("#License_Code").val(License_Code);

                    if(License_Code != "") {
                        $.ajax({
                            type: 'POST',
                            url: "dashboard_api/verify.php?code="+License_Code,
                            contentType: 'application/json',
                            success: function (response0) {
                                if(response0 != false){
                                    if(response0 == "Invalid purchase code") {
                                        swal.fire({
                                            title: 'Error',
                                            text: 'Invalid purchase code!',
                                            type: 'error',
                                            showCancelButton: false,
                                            showConfirmButton: false,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false
                                        });
                                    } else if(response0 == "Inactive purchase code") {
                                        swal.fire({
                                            title: 'Error',
                                            text: 'Inactive purchase code!',
                                            type: 'error',
                                            showCancelButton: false,
                                            showConfirmButton: false,
                                            allowOutsideClick: false,
                                            allowEscapeKey: false
                                        });
                                    } else {
                                        const dataObj = JSON.parse(response0);
                                        $("#Item_Name").val(dataObj.Item);
                                        $("#Buyer_Name").val(dataObj.Buyer);
                                        $("#License_Type").val(dataObj.License);
    
                                        var _dt = dataObj.Sold_at;
                                        var _dtArr = _dt.split("T");
                                        $("#Purchased_At_date").val(_dtArr[0]);
                                        $("#Purchased_At_time").val(_dtArr[1]);
    
    
                                        var _dt2 = dataObj.Updated_at;
                                        var _dt2Arr = _dt2.split("T");
                                        $("#Updated_At_date").val(_dt2Arr[0]);
                                        $("#Updated_At_time").val(_dt2Arr[1]);
                                    }
                                    
                                } else {
                                    swal.fire({
                                        title: 'Error',
                                        text: 'Invalid purchase code!',
                                        type: 'error',
                                        showCancelButton: false,
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false
                                    });
                                }
                            }
            
                        });
                    }
                }

            });

            $.ajax({
                type: 'GET',
                url: "https://api.themoviedb.org/3/configuration/primary_translations?api_key=1bfdbff05c2698dc917dd28c08d41096",
                contentType: 'application/json',
                dataType: 'json',
                success: function (response) {
                    var Language = document.getElementById('Language');
                    for (var key of response) {
                        Language.add(new Option(key));
                    }
                    $.ajax({
                        type: 'POST',
                        url: "dashboard_api/get_config.php",
                        contentType: 'application/json',
                        dataType: 'json',
                        headers: {
                            'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                        },
                        success: function (response) {

                            var tmdb_language = response.tmdb_language;
                            $("#Language").val(tmdb_language);
                        }

                    });
                }

            });

        }

        function Save() {
            var Language = document.getElementById("Language").value;
            var jsonObjects = {
                "Language": Language
            };
            $.ajax({

                type: 'POST',
                url: "dashboard_api/update_tmdb_language.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                success: function (response) {
                    if (response == "Language Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'TMDB Language Updated successfully!',
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

        function Save_License() {
            var License_Code = document.getElementById("License_Code").value;
            var jsonObjects = {
                "license_code": License_Code
            };
            $.ajax({

                type: 'POST',
                url: "dashboard_api/update_license_code.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },
                success: function (response) {
                    if (response == "License Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'License Code Updated successfully!',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#556ee6',
                            cancelButtonColor: "#f46a6a"
                        }).then(function () {
                            location.reload();
                        });
                    } else if (response == "Invalid purchase code") {
                        swal.fire({
                            title: 'Invalid!',
                            text: 'Invalid purchase code!',
                            type: 'warning',
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