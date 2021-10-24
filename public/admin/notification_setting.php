<?php
session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}

require '../notification/intialize.php';
SRN();
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <title>Dooo - Notification Settings</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



    <!-- Sweet Alert-->

    <link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />



    <?php include 'layouts/headerStyle.php'; ?>

</head>



<?php include 'layouts/master.php'; echo setLayout();?>



<body onload="javascript:Load_Notification_Data()">



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

                            <h4 class="font-size-18">Setting</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Notifications</a></li>

                                <li class="breadcrumb-item active">Setting</li>

                            </ol>

                        </div>

                    </div>



                </div>

                <!-- end page title -->

                <div class="form" action="https://admin.fliq.pro/admin/videos/add/" method="post">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="card card-body">

                                <h3 class="card-title mt-0">PUSH NOTIFICATION SETTING</h3>

                                <hr>



                                <div class="alert alert-warning">If you don't have <a href="https://onesignal.com/"

                                        target="_blank">OneSignal</a> account yet.Signup <a

                                        href="https://onesignal.com/" target="_blank">here</a> to get AppID And Key.

                                </div>

                                <br>



                                <div class="form-group">

                                    <label>Onesignal Api Key</label>

                                    <input class="form-control col-md-9" type="text" value="" id="Onesignal_Api_Key">

                                </div>



                                <div class="form-group">

                                    <label>Onesignal App ID</label>

                                    <input class="form-control col-md-9" type="text" value="" id="Onesignal_Appid">

                                </div>



                                <div class="form-group">

                                    <div class="col-md-12 row justify-content-end">

                                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light"

                                            onclick="Save_Onesignal_Data()" id="create_btn"

                                            type="submit" aria-haspopup="true" aria-expanded="false">

                                            <i class="mdi mdi-content-save-all"></i> SAVE CHANGES

                                        </button>

                                    </div>

                                </div>

                            </div>

                            <div class="card card-body">

                                <h3 class="card-title mt-0">SRN Config</h3>

                                <hr>



                                <div class="alert alert-danger">Create a Cron job Using this Url To send Random Notification.
                                If you set Cron job Daily 4 Times it will Send 4 Random Notification when the Cron Execute.

                                </div>

                                <br>

                                <div class="form-group">

                                    <label>SRN Cron Job Url</label>

                                    <input class="form-control col-md-9" onclick="copyToClipboard('SRN_Cron_Job_Url')" type="text" value="" id="SRN_Cron_Job_Url">

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



<!-- Sweet Alerts js -->

<script src="public/libs/sweetalert2/sweetalert2.min.js"></script>



<!-- Sweet alert init js-->

<script src="public/js/pages/sweet-alerts.init.js"></script>



<?php include "layouts/content-end.php"; ?>



<script>
var base_url = window.location.origin;
$("#SRN_Cron_Job_Url").val(base_url+"/notification/srn.php");

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


function Load_Notification_Data() {

    $.ajax({

            type: 'POST',

            url: "dashboard_api/get_onesignal_data.php",

            contentType: 'application/json',

            dataType: 'json',

            headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },

            success: function (response) {



                var Onesignal_Api_Key = response.onesignal_api_key;

                var Onesignal_Appid = response.onesignal_appid;



                $("#Onesignal_Api_Key").val(Onesignal_Api_Key);

                $("#Onesignal_Appid").val(Onesignal_Appid);

            }

        });

}



function Save_Onesignal_Data() {

    var Onesignal_Api_Key = document.getElementById("Onesignal_Api_Key").value;

    var Onesignal_Appid = document.getElementById("Onesignal_Appid").value;



    var jsonObjects = {

                "Onesignal_Api_Key": Onesignal_Api_Key,

                "Onesignal_Appid": Onesignal_Appid,

            };

    $.ajax({

        type: 'POST',

        url: 'dashboard_api/save_onesignal_data.php',

        contentType: 'application/json',

        data: JSON.stringify(jsonObjects),

        dataType: 'text',
        
        headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },

        success: function (response) {

            if (response == "Onesignal Data Updated successfully") {

                Success();

            } else {

                Error();

            }

        }

    })

}



function Success() {

        swal.fire({

                    title: 'Successful!',

                    text: 'Onesignal Data Updated successfully!',

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