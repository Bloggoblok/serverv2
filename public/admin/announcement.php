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
    <title>Dooo - Announcement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/images/favicon.ico">

    <!-- Toaster-->
    <link href="public/libs/toaster/toastr.min.css" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/headerStyle.php'; ?>
</head>

<?php include 'layouts/master.php'; echo setLayout();?>

<body onload="javascript:Load_Onesignal_Data()">

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
                            <h4 class="font-size-18">Announcement</h4>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Notifications</a></li>
                                <li class="breadcrumb-item active">Announcement</li>
                            </ol>
                        </div>
                    </div>

                </div>
                <!-- end page title -->
                <div class="form" action="https://admin.fliq.pro/admin/videos/add/" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-body">
                                <h3 class="card-title mt-0">SEND PUSH NOTIFICATION (Announcement)</h3>
                                <hr>

                                <div class="form-group">
                                    <label>Heading</label>
                                    <input class="form-control col-md-9" type="text" value="" id="Heading">
                                </div>

                                <div class="form-group">
                                                <label>Message</label>
                                                <div>
                                                    <textarea required="" class="form-control col-md-9" id="Message" rows="5"></textarea>
                                                </div>
                                            </div>

                                <div class="form-group">
                                    <label>Large Icon</label>
                                    <input class="form-control col-md-9" type="text" value="" id="Large_Icon">
                                </div>

                                <div class="form-group">
                                    <label>Big Picture</label>
                                    <input class="form-control col-md-9" type="text" value="" id="Big_Picture">
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 row justify-content-end">
                                        <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                            onclick="Save_Onesignal_Data()" id="create_btn"
                                            type="submit" aria-haspopup="true" aria-expanded="false">
                                            <i class="ion ion-md-send"></i> SEND
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

<!-- Sweet Alerts js -->
<script src="public/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Toaster js -->
<script src="public/libs/toaster/toastr.min.js"></script>

<!-- Sweet alert init js-->
<script src="public/js/pages/sweet-alerts.init.js"></script>

<?php include "layouts/content-end.php"; ?>

<script>
var Onesignal_Api_Key;
var Onesignal_Appid;

function Load_Onesignal_Data() {
    $.ajax({
            type: 'POST',
            url: "dashboard_api/get_onesignal_data.php",
            contentType: 'application/json',
            dataType: 'json',
            headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
            success: function (response) {

                Onesignal_Api_Key = response.onesignal_api_key;
                Onesignal_Appid = response.onesignal_appid;
            }
        });
}

function Save_Onesignal_Data() {
    var Heading = document.getElementById("Heading").value;
    var Message = document.getElementById("Message").value;
    var Large_Icon = document.getElementById("Large_Icon").value;
    var Big_Picture = document.getElementById("Big_Picture").value;

    if(Heading != "" && Message != "") {
        var jsonObjects = {
            "included_segments": ["All"],
	        "app_id": Onesignal_Appid,
	        "contents": {"en": Message},
	        "headings": {"en": Heading},
	        "data": {"Type": "Announcement"},
	        "big_picture": Big_Picture,
	        "large_icon": Large_Icon
        };

        $.ajax({
            type: 'POST',
            url: 'https://onesignal.com/api/v1/notifications',
            headers: {
                'Authorization': 'Basic ' + Onesignal_Api_Key,
                'Content-Type':'application/json'
            },
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'json',
            success: function (response) {
                Success(response.recipients);
            },
            error: function (response) {
                Error();
            }
        })
    } else {
        Warning();
    }
    
}

function Success(recipients_Data) {
    toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "2000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

toastr.success("Total Recipients= " + recipients_Data, "Sended Successfully!");
}

function Warning() {
    toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "2000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

toastr.warning("Fill All Details Correctly!");
}

function Error() {
    toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "2000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

toastr.error("Something Went Wrong!");
}

</script>