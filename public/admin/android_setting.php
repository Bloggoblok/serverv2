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

    <title>Dooo - Android Setting</title>

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

                                <h4 class="font-size-18">Android Setting</h4>

                                <ol class="breadcrumb mb-0">

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Android Setting</a></li>

                                    <li class="breadcrumb-item active">Android Setting</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end page title -->


                    <div class="form" method="post">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">Android Setting</h3>

                                    <hr>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">App Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="" name="apk_name" id="apk_name"
                                                placeholder="Ex: Dooo" class="form-control" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">Login Mandatory?</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="login_mandatory_bool" switch="bool" checked="">
                                            <label for="login_mandatory_bool" data-on-label=""
                                                data-off-label=""></label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">Maintenance</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="maintenance_bool" switch="bool">
                                            <label for="maintenance_bool" data-on-label="" data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">All Live TV Type</label>
                                        <div class="col-sm-3 ">
                                            <select class="form-control" id="All_Live_TV_Type">
                                                 <option>Default</option>
                                                <option>Free</option>
                                                <option>Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">All Movies Type</label>
                                        <div class="col-sm-3 ">
                                            <select class="form-control" id="All_Movies_Type">
                                                <option>Default</option>
                                                <option>Free</option>
                                                <option>Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">All Series Type</label>
                                        <div class="col-sm-3 ">
                                            <select class="form-control" id="All_Series_Type">
                                                <option>Default</option>
                                                <option>Free</option>
                                                <option>Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">LiveTV Visiable in Home</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="LiveTV_Visiable_in_Home_bool" switch="bool">
                                            <label for="LiveTV_Visiable_in_Home_bool" data-on-label=""
                                                data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">Genre List Visiable in Home</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="genreList_Visiable_in_Home_bool" switch="bool">
                                            <label for="genreList_Visiable_in_Home_bool" data-on-label=""
                                                data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-12 row justify-content-end">

                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_Android_Setting_Data()" id="create_btn" type="submit"
                                                aria-haspopup="true" aria-expanded="false">

                                                <i class="mdi mdi-content-save-all"></i> SAVE

                                            </button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">Login Setting</h3>

                                    <hr>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">Google Login</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="google_login_bool" switch="bool">
                                            <label for="google_login_bool" data-on-label="" data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-12 row justify-content-end">

                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_Login_Setting()" id="create_btn" type="submit"
                                                aria-haspopup="true" aria-expanded="false">

                                                <i class="mdi mdi-content-save-all"></i> SAVE

                                            </button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">Content Setting</h3>

                                    <hr>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">shuffle contents</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="shuffle_contents_bool" switch="bool">
                                            <label for="shuffle_contents_bool" data-on-label=""
                                                data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">

                                        <label class="control-label col-md-3">Home Rand Max Movie Show</label>
                                        <input class="form-control col-5" type="number" value="0"
                                            id="Home_Rand_Max_Movie_Show">
                                        <pre> </pre>

                                    </div>
                                    <div class="form-group row">

                                        <label class="control-label col-md-3">Home Rand Max Series Show</label>
                                        <input class="form-control col-5" type="number" value="0"
                                            id="Home_Rand_Max_Series_Show">
                                        <pre> </pre>

                                    </div>
                                    <div class="form-group row">

                                        <label class="control-label col-md-3">Home Recent Max Movie Show</label>
                                        <input class="form-control col-5" type="number" value="0"
                                            id="Home_Recent_Max_Movie_Show">
                                        <pre> </pre>

                                    </div>
                                    <div class="form-group row">

                                        <label class="control-label col-md-3">Home Recent Max Series Show</label>
                                        <input class="form-control col-5" type="number" value="0"
                                            id="Home_Recent_Max_Series_Show">
                                        <pre> </pre>

                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-12 row justify-content-end">

                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_android_content_setting()" id="create_btn" type="submit"
                                                aria-haspopup="true" aria-expanded="false">

                                                <i class="mdi mdi-content-save-all"></i> SAVE

                                            </button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form" method="post">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="card card-body">

                                        <h3 class="card-title mt-0">Comment Settings</h3>

                                        <hr>

                                        <div class="panel-body">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 ">Movies Comment</label>
                                                <div class="col-sm-6">
                                                    <input type="checkbox" id="moviesComment" switch="bool">
                                                    <label for="moviesComment" data-on-label=""
                                                        data-off-label=""></label>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 ">WebSeries Comment</label>
                                                <div class="col-sm-6">
                                                    <input type="checkbox" id="webSeriesComment" switch="bool">
                                                    <label for="webSeriesComment" data-on-label=""
                                                        data-off-label=""></label>
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <div class="col-md-12 row justify-content-end">

                                                    <button
                                                        class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                        onclick="Save_Comment_Setting()" id="create_btn"
                                                        type="submit" aria-haspopup="true" aria-expanded="false">

                                                        <i class="mdi mdi-content-save-all"></i> SAVE

                                                    </button>

                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="card card-body">

                                    <h3 class="card-title mt-0">Message Setting</h3>

                                    <hr>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-3 ">Show Message</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="Show_Message_bool" switch="bool">
                                            <label for="Show_Message_bool" data-on-label="" data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Message Title</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="" name="Message_Title" id="Message_Title"
                                                placeholder="Ex: Dooo" class="form-control" required="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Message</label>
                                        <div class="col-sm-6">
                                            <input type="text" value="" name="Message" id="Message"
                                                placeholder="Ex: Thank You For Using Our app" class="form-control"
                                                required="">
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-12 row justify-content-end">

                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_Message_Setting_Data()" id="create_btn" type="submit"
                                                aria-haspopup="true" aria-expanded="false">

                                                <i class="mdi mdi-content-save-all"></i> SAVE

                                            </button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form" method="post">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="card card-body">

                                        <h3 class="card-title mt-0">Android Update</h3>

                                        <hr>

                                        <div class="panel-body">
                                            <!-- panel  -->
                                            <div class="alert alert-success"><strong>Note: </strong>An update popup will
                                                be display to old version user based on bellow APK information.</div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label">Latest APK Version Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="" name="apk_version_name"
                                                        id="apk_version_name" placeholder="Ex: V1.0.0"
                                                        class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label">Latest APK Version Code</label>
                                                <div class="col-sm-9">
                                                    <input type="number" value="" name="apk_version_code"
                                                        id="apk_version_code" placeholder="Ex: 0" class="form-control"
                                                        required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 ">APK File URL</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="" name="latest_apk_url"
                                                        id="latest_apk_url"
                                                        placeholder="Ex: PlayStore URL or any other direct download URL"
                                                        class="form-control" required="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label">What's new on latest APK</label>
                                                <div class="col-sm-9">
                                                    <textarea type="text" rows="6" name="apk_whats_new"
                                                        id="apk_whats_new" class="form-control"></textarea>
                                                    <p><small>Separate Line By Comma ( , ).</small></p>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 control-label">Update Type</label>
                                                <div class="col-sm-3 ">
                                                    <select class="form-control" id="Update_Type">
                                                        <option>In App Update</option>
                                                        <option>External Browser</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-sm-3 ">Update Skipable?</label>
                                                <div class="col-sm-6">
                                                    <input type="checkbox" id="update_skipable" switch="bool">
                                                    <label for="update_skipable" data-on-label=""
                                                        data-off-label=""></label>
                                                </div>
                                            </div>


                                            <div class="form-group">

                                                <div class="col-md-12 row justify-content-end">

                                                    <button
                                                        class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                        onclick="Save_Android_Update_Setting()" id="create_btn"
                                                        type="submit" aria-haspopup="true" aria-expanded="false">

                                                        <i class="mdi mdi-content-save-all"></i> SAVE

                                                    </button>

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
            function Load_Config() {
                $.ajax({

                    type: 'POST',

                    url: "dashboard_api/get_config.php",

                    contentType: 'application/json',

                    dataType: 'json',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },

                    success: function (response2) {

                        var apk_name = response2.name;

                        var login_mandatory = response2.login_mandatory;
                        var maintenance = response2.maintenance;

                        var Latest_APK_Version_Name = response2.Latest_APK_Version_Name;
                        var Latest_APK_Version_Code = response2.Latest_APK_Version_Code;
                        var APK_File_URL = response2.APK_File_URL;
                        var Whats_new_on_latest_APK = response2.Whats_new_on_latest_APK;
                        var Update_Skipable = response2.Update_Skipable;
                        var Update_Type = response2.Update_Type;

                        var shuffle_contents = response2.shuffle_contents;
                        var Home_Rand_Max_Movie_Show = response2.Home_Rand_Max_Movie_Show;
                        var Home_Rand_Max_Series_Show = response2.Home_Rand_Max_Series_Show;
                        var Home_Recent_Max_Movie_Show = response2.Home_Recent_Max_Movie_Show;
                        var Home_Recent_Max_Series_Show = response2.Home_Recent_Max_Series_Show;

                        var Show_Message = response2.Show_Message;
                        var Message_Title = response2.Message_Title;
                        var Message = response2.Message;

                        var all_live_tv_type = response2.all_live_tv_type;
                        var all_movies_type = response2.all_movies_type;
                        var all_series_type = response2.all_series_type;
                        var LiveTV_Visiable_in_Home = response2.LiveTV_Visiable_in_Home;

                        var genre_visible_in_home = response2.genre_visible_in_home;

                        var movie_comments = response2.movie_comments;
                        var webseries_comments = response2.webseries_comments;

                        var google_login_bool = response2.google_login;

                        $('#apk_name').val(apk_name);

                        if (login_mandatory == "1") {
                            document.getElementById("login_mandatory_bool").checked = true;
                        } else {
                            document.getElementById("login_mandatory_bool").checked = false;
                        }

                        if (maintenance == "1") {
                            document.getElementById("maintenance_bool").checked = true;
                        } else {
                            document.getElementById("maintenance_bool").checked = false;
                        }

                        $('#apk_version_name').val(Latest_APK_Version_Name);
                        $('#apk_version_code').val(Latest_APK_Version_Code);
                        $('#latest_apk_url').val(APK_File_URL);
                        $('#apk_whats_new').val(Whats_new_on_latest_APK);

                        if (Update_Skipable == "1") {
                            document.getElementById("update_skipable").checked = true;
                        } else {
                            document.getElementById("update_skipable").checked = false;
                        }

                        if (Update_Type == "0") {
                            $("#Update_Type").val("In App Update");
                        } else {
                            $("#Update_Type").val("External Browser");
                        }


                        if (shuffle_contents == "1") {
                            document.getElementById("shuffle_contents_bool").checked = true;
                        } else {
                            document.getElementById("shuffle_contents_bool").checked = false;
                        }
                        $('#Home_Rand_Max_Movie_Show').val(Home_Rand_Max_Movie_Show);
                        $('#Home_Rand_Max_Series_Show').val(Home_Rand_Max_Series_Show);
                        $('#Home_Recent_Max_Movie_Show').val(Home_Recent_Max_Movie_Show);
                        $('#Home_Recent_Max_Series_Show').val(Home_Recent_Max_Series_Show);

                        if (Show_Message == "1") {
                            document.getElementById("Show_Message_bool").checked = true;
                        } else {
                            document.getElementById("Show_Message_bool").checked = false;
                        }

                        $('#Message_Title').val(Message_Title);
                        $('#Message').val(Message);


                        if (all_live_tv_type == "0") {
                            $("#All_Live_TV_Type").val("Default");
                        } else if (all_live_tv_type == "1") {
                            $("#All_Live_TV_Type").val("Free");
                        } else if (all_live_tv_type == "2") {
                            $("#All_Live_TV_Type").val("Paid");
                        }

                        if (all_movies_type == "0") {
                            $("#All_Movies_Type").val("Default");
                        } else if (all_movies_type == "1") {
                            $("#All_Movies_Type").val("Free");
                        } else if (all_movies_type == "2") {
                            $("#All_Movies_Type").val("Paid");
                        }

                        if (all_series_type == "0") {
                            $("#All_Series_Type").val("Default");
                        } else if (all_series_type == "1") {
                            $("#All_Series_Type").val("Free");
                        } else if (all_series_type == "2") {
                            $("#All_Series_Type").val("Paid");
                        }

                        if (LiveTV_Visiable_in_Home == "1") {
                            document.getElementById("LiveTV_Visiable_in_Home_bool").checked = true;
                        } else {
                            document.getElementById("LiveTV_Visiable_in_Home_bool").checked = false;
                        }

                        if (genre_visible_in_home == "1") {
                            document.getElementById("genreList_Visiable_in_Home_bool").checked = true;
                        } else {
                            document.getElementById("genreList_Visiable_in_Home_bool").checked = false;
                        }

                        if (movie_comments == "1") {
                            document.getElementById("moviesComment").checked = true;
                        } else {
                            document.getElementById("moviesComment").checked = false;
                        }
                        if (webseries_comments == "1") {
                            document.getElementById("webSeriesComment").checked = true;
                        } else {
                            document.getElementById("webSeriesComment").checked = false;
                        }

                        if (google_login_bool == "1") {
                            document.getElementById("google_login_bool").checked = true;
                        } else {
                            document.getElementById("google_login_bool").checked = false;
                        }
                    }

                });
            }

            function Save_Android_Update_Setting() {
                var apk_version_name = document.getElementById("apk_version_name").value;
                var apk_version_code = document.getElementById("apk_version_code").value;
                var latest_apk_url = document.getElementById("latest_apk_url").value;
                var apk_whats_new = document.getElementById("apk_whats_new").value;

                if ($('#update_skipable').is(':checked')) {
                    var update_skipable_int = 1;
                } else {
                    var update_skipable_int = 0;
                }

                var Update_Type = document.getElementById("Update_Type").value;
                if (Update_Type == "In App Update") {
                    var Update_Type_int = "0";
                } else if (Update_Type == "External Browser") {
                    var Update_Type_int = "1";
                }

                var jsonObjects = {
                    "apk_version_name": apk_version_name,
                    "apk_version_code": apk_version_code,
                    "latest_apk_url": latest_apk_url,
                    "apk_whats_new": apk_whats_new,
                    "update_skipable_int": update_skipable_int,
                    "Update_Type_int": Update_Type_int
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/android_update_setting.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response3) {
                        if (response3 == "Android Update Data Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Android Update Data Updated successfully!',
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

            function Save_Android_Setting_Data() {
                var apk_name = document.getElementById("apk_name").value;

                var All_Live_TV_Type = document.getElementById("All_Live_TV_Type").value;
                var All_Movies_Type = document.getElementById("All_Movies_Type").value;
                var All_Series_Type = document.getElementById("All_Series_Type").value;

                if ($('#login_mandatory_bool').is(':checked')) {
                    var login_mandatory_int = 1;
                } else {
                    var login_mandatory_int = 0;
                }

                if ($('#maintenance_bool').is(':checked')) {
                    var maintenance_int = 1;
                } else {
                    var maintenance_int = 0;
                }


                if (All_Live_TV_Type == "Default") {
                    var All_Live_TV_Type_count = 0;
                } else if (All_Live_TV_Type == "Free") {
                    var All_Live_TV_Type_count = 1;
                } else if (All_Live_TV_Type == "Paid") {
                    var All_Live_TV_Type_count = 2;
                }

                if (All_Movies_Type == "Default") {
                    var All_Movies_Type_count = 0;
                } else if (All_Movies_Type == "Free") {
                    var All_Movies_Type_count = 1;
                } else if (All_Movies_Type == "Paid") {
                    var All_Movies_Type_count = 2;
                }

                if (All_Series_Type == "Default") {
                    var All_Series_Type_count = 0;
                } else if (All_Series_Type == "Free") {
                    var All_Series_Type_count = 1;
                } else if (All_Series_Type == "Paid") {
                    var All_Series_Type_count = 2;
                }


                if ($('#LiveTV_Visiable_in_Home_bool').is(':checked')) {
                    var LiveTV_Visiable_in_Home_int = 1;
                } else {
                    var LiveTV_Visiable_in_Home_int = 0;
                }

                if ($('#genreList_Visiable_in_Home_bool').is(':checked')) {
                    var genreList_Visiable_in_Home_int = 1;
                } else {
                    var genreList_Visiable_in_Home_int = 0;
                }

                var jsonObjects = {
                    "apk_name": apk_name,
                    "login_mandatory_bool": login_mandatory_int,
                    "maintenance_bool": maintenance_int,
                    "All_Live_TV_Type_count": All_Live_TV_Type_count,
                    "All_Movies_Type_count": All_Movies_Type_count,
                    "All_Series_Type_count": All_Series_Type_count,
                    "LiveTV_Visiable_in_Home_int": LiveTV_Visiable_in_Home_int,
                    "genreList_Visiable_in_Home_int": genreList_Visiable_in_Home_int
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/save_android_setting.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Android Setting Data Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Android Setting Updated successfully!',
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

            function Save_android_content_setting() {
                if ($('#shuffle_contents_bool').is(':checked')) {
                    var shuffle_contents = 1;
                } else {
                    var shuffle_contents = 0;
                }
                var Home_Rand_Max_Movie_Show = document.getElementById("Home_Rand_Max_Movie_Show").value;
                var Home_Rand_Max_Series_Show = document.getElementById("Home_Rand_Max_Series_Show").value;
                var Home_Recent_Max_Movie_Show = document.getElementById("Home_Recent_Max_Movie_Show").value;
                var Home_Recent_Max_Series_Show = document.getElementById("Home_Recent_Max_Series_Show").value;

                var jsonObjects = {
                    "shuffle_contents": shuffle_contents,
                    "Home_Rand_Max_Movie_Show": Home_Rand_Max_Movie_Show,
                    "Home_Rand_Max_Series_Show": Home_Rand_Max_Series_Show,
                    "Home_Recent_Max_Movie_Show": Home_Recent_Max_Movie_Show,
                    "Home_Recent_Max_Series_Show": Home_Recent_Max_Series_Show
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/android_content_setting.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Android Content Setting Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Android Content Setting Updated successfully!',
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

            function Save_Message_Setting_Data() {
                if ($('#Show_Message_bool').is(':checked')) {
                    var Show_Message = 1;
                } else {
                    var Show_Message = 0;
                }
                var Message_Title = document.getElementById("Message_Title").value;
                var Message = document.getElementById("Message").value;

                var jsonObjects = {
                    "Show_Message": Show_Message,
                    "Message_Title": Message_Title,
                    "Message": Message
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/android_message_setting.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Android Message Setting Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Android Message Setting Updated successfully!',
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

            function Save_Comment_Setting() {
                if ($('#moviesComment').is(':checked')) {
                    var moviesComment_int = 1;
                } else {
                    var moviesComment_int = 0;
                }
                if ($('#webSeriesComment').is(':checked')) {
                    var webSeriesComment_int = 1;
                } else {
                    var webSeriesComment_int = 0;
                }
                var jsonObjects = {
                    "moviesComment_int": moviesComment_int,
                    "webSeriesComment_int": webSeriesComment_int
                };

                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/comment_settings.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Comment Setting Data Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Comment Setting Data Updated successfully!',
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

            function Save_Login_Setting() {
                if ($('#google_login_bool').is(':checked')) {
                    var google_login_int = 1;
                } else {
                    var google_login_int = 0;
                }
                var jsonObjects = {
                    "google_login": google_login_int
                };

                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/login_setting.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Login Settings Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Login Settings Updated Successfully!',
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