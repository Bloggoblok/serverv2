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

    <title>Dooo - Ads Setting</title>

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

                                <h4 class="font-size-18">Ads Setting</h4>

                                <ol class="breadcrumb mb-0">

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Ads Setting</a></li>

                                    <li class="breadcrumb-item active">Ads Setting</li>

                                </ol>

                            </div>

                        </div>

                    </div>

                    <!-- end page title -->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body">
                                <h3 class="card-title mt-0">AD SETTING</h3>
                                <hr>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Ads Network</label>
                                    <div class="col-sm-3 ">
                                        <select class="form-control" id="mobile_ads_network_Controll">
                                            <option>Disable</option>
                                            <option>AdMob</option>
                                            <option>StartApp</option>
                                            <option>Facebook</option>
                                            <option>AdColony</option>
                                            <option>UnityAds</option>
                                            <option>CustomAds</option>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <strong>Admob</strong>
                                <hr>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Admob Publisher ID</label>
                                    <div class="col-sm-3">
                                        <input type="text" value=" pub-xxxxxxxxxxxxxxxx" data-parsley-minlength="10"
                                            id="admob_publisher_id" name="admob_publisher_id" class="form-control"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Admob APP ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="ca-app-pub-xxxxxxxxxxxxxxxx/xxxxxxxxxx"
                                            data-parsley-minlength="10" id="admob_app_id" name="admob_app_id"
                                            class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Admob Banner Ads ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="ca-app-pub-xxxxxxxxxxxxxxxx/xxxxxxxxxx"
                                            data-parsley-minlength="10" id="admob_banner_ads_id"
                                            name="admob_banner_ads_id" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Admob Interstitial Ads ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="ca-app-pub-xxxxxxxxxxxxxxxx/xxxxxxxxxx"
                                            data-parsley-minlength="10" id="admob_interstitial_ads_id"
                                            name="admob_interstitial_ads_id" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Admob Native Ads ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="ca-app-pub-xxxxxxxxxxxxxxxx/xxxxxxxxxx"
                                            data-parsley-minlength="10" id="admob_native_ads_id"
                                            name="admob_native_ads_id" class="form-control" required="">
                                    </div>
                                </div>

                                <br>
                                <br>
                                <strong>Facebook</strong>
                                <hr>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Facebook APP ID</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="xxxxxxxxxxxxxxxx" data-parsley-minlength="10"
                                            id="facebook_app_id" name="facebook_app_id" class="form-control"
                                            required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Facebook Banner Ads Placement ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxxxxxxxxxx"
                                            data-parsley-minlength="10" id="facebook_banner_ads_placement_id"
                                            name="facebook_banner_ads_placement_id" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Facebook Interstitial Ads Placement ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxxxxxxxxxx"
                                            data-parsley-minlength="10" id="facebook_interstitial_ads_placement_id"
                                            name="facebook_interstitial_ads_placement_id" class="form-control" required="">
                                    </div>
                                </div>

                                <br>
                                <br>
                                <strong>StartApp</strong>
                                <hr>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">StartApp App ID</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="xxxxxxxxx" data-parsley-minlength="8"
                                            id="startapp_app_id" name="startapp_app_id" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>
                                <br>
                                <strong>AdColony</strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">AdColony App ID</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="xxxxxxxxx" data-parsley-minlength="8"
                                            id="AdColony_app_id" name="AdColony_app_id" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Banner Zone ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxx" data-parsley-minlength="8"
                                            id="AdColony_BANNER_ZONE_ID" name="AdColony_BANNER_ZONE_ID" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Interstitial Zone ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxx" data-parsley-minlength="8"
                                            id="AdColony_INTERSTITIAL_ZONE_ID" name="AdColony_INTERSTITIAL_ZONE_ID" class="form-control"
                                            required="">
                                    </div>
                                </div>
                                
                                <br>
                                <br>
                                <strong>Unity Ads</strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">UnityAds Game ID</label>
                                    <div class="col-sm-3">
                                        <input type="text" value="xxxxxxxxx" data-parsley-minlength="8"
                                            id="UnityAds_game_id" name="UnityAds_game_id" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Banner Zone ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxx" data-parsley-minlength="8"
                                            id="UnityAds_BANNER_ID" name="UnityAds_BANNER_ID" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>
                                <br>
                                <strong>Custom Ads</strong>
                                <hr>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Custom Banner Url</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxx" data-parsley-minlength="8"
                                            id="Custom_Banner_Url" name="Custom_Banner_Url" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Custom Banner Click Url Type</label>
                                    <div class="col-sm-3 ">
                                        <select class="form-control" id="Custom_Banner_Click_Url_Type">
                                            <option>None</option>
                                            <option>External Browser</option>
                                            <option>Internal Browser</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Custom Banner Click Url</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxx" data-parsley-minlength="8"
                                            id="Custom_Banner_Click_Url" name="Custom_Banner_Click_Url" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Custom Interstitial Url</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxx" data-parsley-minlength="8"
                                            id="Custom_Interstitial_Url" name="Custom_Interstitial_Url" class="form-control"
                                            required="">
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Custom Interstitial Click Url Type</label>
                                    <div class="col-sm-3 ">
                                        <select class="form-control" id="Custom_Interstitial_Click_Url_Type">
                                            <option>None</option>
                                            <option>External Browser</option>
                                            <option>Internal Browser</option>
                                        </select>
                                    </div>
                                </div>

                                <br>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Custom Interstitial Click Url</label>
                                    <div class="col-sm-6">
                                        <input type="text" value="xxxxxxxxxxxxxxxxxx" data-parsley-minlength="8"
                                            id="Custom_Interstitial_Click_Url" name="Custom_Interstitial_Click_Url" class="form-control"
                                            required="">
                                    </div>
                                </div>


                                <br>

                                <div class="form-group">
                                    <div class="col-md-12 row justify-content-end">
                                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                            onclick="Save_Data()" id="create_btn" type="submit" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="mdi mdi-content-save-all"></i> Save
                                        </button>
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

                    var ad_type = response.ad_type;
                    var Admob_Publisher_ID = response.Admob_Publisher_ID;
                    var Admob_APP_ID = response.Admob_APP_ID;
                    var adMob_Native = response.adMob_Native;
                    var adMob_Banner = response.adMob_Banner;
                    var adMob_Interstitial = response.adMob_Interstitial;
                    var facebook_app_id = response.facebook_app_id;
                    var facebook_banner_ads_placement_id = response.facebook_banner_ads_placement_id;
                    var facebook_interstitial_ads_placement_id = response.facebook_interstitial_ads_placement_id;
                    var StartApp_App_ID = response.StartApp_App_ID;
                    var AdColony_app_id = response.AdColony_app_id;
                    var AdColony_banner_zone_id = response.AdColony_banner_zone_id;
                    var AdColony_interstitial_zone_id = response.AdColony_interstitial_zone_id;
                    var unity_game_id = response.unity_game_id;
                    var unity_banner_id = response.unity_banner_id;

                    var Custom_Banner_Url = response.custom_banner_url;
                    var Custom_Banner_Click_Url_Type_count = response.custom_banner_click_url_type;
                    var Custom_Banner_Click_Url = response.custom_banner_click_url;
                    var Custom_Interstitial_Url = response.custom_interstitial_url;
                    var Custom_Interstitial_Click_Url_Type_count = response.custom_interstitial_click_url_type;
                    var Custom_Interstitial_Click_Url = response.custom_interstitial_click_url;

                    if (ad_type == "0") {
                        $("#mobile_ads_network_Controll").val("Disable");
                    } else if (ad_type == "1") {
                        $("#mobile_ads_network_Controll").val("AdMob");
                    } else if (ad_type == "2") {
                        $("#mobile_ads_network_Controll").val("StartApp");
                    } else if (ad_type == "3") {
                        $("#mobile_ads_network_Controll").val("Facebook");
                    } else if (ad_type == "4") {
                        $("#mobile_ads_network_Controll").val("AdColony");
                    } else if (ad_type == "5") {
                        $("#mobile_ads_network_Controll").val("UnityAds");
                    } else if (ad_type == "6") {
                        $("#mobile_ads_network_Controll").val("CustomAds");
                    }else {
                        $("#mobile_ads_network_Controll").val("Disable");
                    }
                    

                    $("#admob_publisher_id").val(Admob_Publisher_ID);
                    $("#admob_app_id").val(Admob_APP_ID);
                    $("#admob_banner_ads_id").val(adMob_Banner);
                    $("#admob_interstitial_ads_id").val(adMob_Interstitial);
                    $("#admob_native_ads_id").val(adMob_Native);
                    $("#facebook_app_id").val(facebook_app_id);
                    $("#facebook_banner_ads_placement_id").val(facebook_banner_ads_placement_id);
                    $("#facebook_interstitial_ads_placement_id").val(facebook_interstitial_ads_placement_id);
                    $("#startapp_app_id").val(StartApp_App_ID);
                    $("#AdColony_app_id").val(AdColony_app_id);
                    $("#AdColony_BANNER_ZONE_ID").val(AdColony_banner_zone_id);
                    $("#AdColony_INTERSTITIAL_ZONE_ID").val(AdColony_interstitial_zone_id);
                    $("#UnityAds_game_id").val(unity_game_id);
                    $("#UnityAds_BANNER_ID").val(unity_banner_id);

                    $("#Custom_Banner_Url").val(Custom_Banner_Url);

                    if(Custom_Banner_Click_Url_Type_count == 0) {
                        $("#Custom_Banner_Click_Url_Type").val("None");
                    } else if(Custom_Banner_Click_Url_Type_count == 1) {
                        $("#Custom_Banner_Click_Url_Type").val("External Browser");
                    } else if(Custom_Banner_Click_Url_Type_count == 2) {
                        $("#Custom_Banner_Click_Url_Type").val("Internal Browser");
                    }

                    $('#Custom_Banner_Click_Url').val(Custom_Banner_Click_Url);
                    $('#Custom_Interstitial_Url').val(Custom_Interstitial_Url);

                    if(Custom_Interstitial_Click_Url_Type_count == 0) {
                        $("#Custom_Interstitial_Click_Url_Type").val("None");
                    } else if(Custom_Interstitial_Click_Url_Type_count == 1) {
                        $("#Custom_Interstitial_Click_Url_Type").val("External Browser");
                    } else if(Custom_Interstitial_Click_Url_Type_count == 2) {
                        $("#Custom_Interstitial_Click_Url_Type").val("Internal Browser");
                    }

                    $('#Custom_Interstitial_Click_Url').val(Custom_Interstitial_Click_Url);

                }

            });
        }

        function Save_Data() {
            var mobile_ads_network_Controll = document.getElementById("mobile_ads_network_Controll").value;
            if (mobile_ads_network_Controll == "AdMob") {
                var ad_type = "1";
            } else if (mobile_ads_network_Controll == "StartApp") {
                var ad_type = "2";
            } else if (mobile_ads_network_Controll == "Facebook") {
                var ad_type = "3";
            }else if (mobile_ads_network_Controll == "AdColony") {
                var ad_type = "4";
            }else if (mobile_ads_network_Controll == "UnityAds") {
                var ad_type = "5";
            }else if (mobile_ads_network_Controll == "CustomAds") {
                var ad_type = "6";
            } else if (mobile_ads_network_Controll == "Disable") {
                var ad_type = "0";
            }
            var admob_publisher_id = document.getElementById("admob_publisher_id").value;
            var admob_app_id = document.getElementById("admob_app_id").value;
            var admob_banner_ads_id = document.getElementById("admob_banner_ads_id").value;
            var admob_interstitial_ads_id = document.getElementById("admob_interstitial_ads_id").value;
            var admob_native_ads_id = document.getElementById("admob_native_ads_id").value;
            var facebook_app_id = document.getElementById("facebook_app_id").value;
            var facebook_banner_ads_placement_id = document.getElementById("facebook_banner_ads_placement_id").value;
            var facebook_interstitial_ads_placement_id = document.getElementById("facebook_interstitial_ads_placement_id").value;
            var startapp_app_id = document.getElementById("startapp_app_id").value;
            var AdColony_app_id = document.getElementById("AdColony_app_id").value;
            var AdColony_BANNER_ZONE_ID = document.getElementById("AdColony_BANNER_ZONE_ID").value;
            var AdColony_INTERSTITIAL_ZONE_ID = document.getElementById("AdColony_INTERSTITIAL_ZONE_ID").value;
            var UnityAds_game_id = document.getElementById("UnityAds_game_id").value;
            var UnityAds_BANNER_ID = document.getElementById("UnityAds_BANNER_ID").value;

            var Custom_Banner_Url = document.getElementById("Custom_Banner_Url").value;

            var Custom_Banner_Click_Url_Type = document.getElementById("Custom_Banner_Click_Url_Type").value;
            if (Custom_Banner_Click_Url_Type == "None") {
                var Custom_Banner_Click_Url_Type_int = "0";
            } else if (Custom_Banner_Click_Url_Type == "External Browser") {
                var Custom_Banner_Click_Url_Type_int = "1";
            } else if (Custom_Banner_Click_Url_Type == "Internal Browser") {
                var Custom_Banner_Click_Url_Type_int = "2";
            }

            var Custom_Banner_Click_Url = document.getElementById("Custom_Banner_Click_Url").value;
            var Custom_Interstitial_Url = document.getElementById("Custom_Interstitial_Url").value;

            var Custom_Interstitial_Click_Url_Type = document.getElementById("Custom_Interstitial_Click_Url_Type").value;
            if (Custom_Interstitial_Click_Url_Type == "None") {
                var Custom_Interstitial_Click_Url_Type_int = "0";
            } else if (Custom_Interstitial_Click_Url_Type == "External Browser") {
                var Custom_Interstitial_Click_Url_Type_int = "1";
            } else if (Custom_Interstitial_Click_Url_Type == "Internal Browser") {
                var Custom_Interstitial_Click_Url_Type_int = "2";
            }

            var Custom_Interstitial_Click_Url = document.getElementById("Custom_Interstitial_Click_Url").value;

            var jsonObjects = {
                "ad_type": ad_type,
                "admob_publisher_id": admob_publisher_id,
                "admob_app_id": admob_app_id,
                "admob_banner_ads_id": admob_banner_ads_id,
                "admob_interstitial_ads_id": admob_interstitial_ads_id,
                "admob_native_ads_id": admob_native_ads_id,
                "facebook_app_id": facebook_app_id,
                "facebook_banner_ads_placement_id": facebook_banner_ads_placement_id,
                "facebook_interstitial_ads_placement_id": facebook_interstitial_ads_placement_id,
                "startapp_app_id": startapp_app_id,
                "AdColony_app_id": AdColony_app_id,
                "AdColony_BANNER_ZONE_ID": AdColony_BANNER_ZONE_ID,
                "AdColony_INTERSTITIAL_ZONE_ID": AdColony_INTERSTITIAL_ZONE_ID,
                "UnityAds_game_id": UnityAds_game_id,
                "UnityAds_BANNER_ID": UnityAds_BANNER_ID,
                "Custom_Banner_Url": Custom_Banner_Url,
                "Custom_Banner_Click_Url_Type": Custom_Banner_Click_Url_Type_int,
                "Custom_Banner_Click_Url": Custom_Banner_Click_Url,
                "Custom_Interstitial_Url": Custom_Interstitial_Url,
                "Custom_Interstitial_Click_Url_Type": Custom_Interstitial_Click_Url_Type_int,
                'Custom_Interstitial_Click_Url': Custom_Interstitial_Click_Url
            };
            $.ajax({

                type: 'POST',
                url: "dashboard_api/save_ad_setting.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                success: function (response) {
                    if (response == "Ad Setting Data Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'Ad Setting Updated successfully!',
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