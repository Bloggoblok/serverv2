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

    <title>Dooo - User Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



    <link href="public/cssadd-movie.css" rel="stylesheet" type="text/css" />

    <!-- Toaster-->
    <link href="public/libs/toaster/toastr.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Sweet Alert-->
    <link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Summernote css -->

    <link href="public/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />


    <!-- DataTables -->

    <link href="public/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="public/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->

    <link href="public/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />


    <link href="public/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="public/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="public/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="public/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />



    <?php include 'layouts/headerStyle.php'; ?>

</head>



<?php include 'layouts/master.php'; echo setLayout();?>


<body onload="javascript:onLoad()">
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

                            <h4 class="font-size-18">User Manager</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">User Manager</a></li>

                                <li class="breadcrumb-item active">User Manager</li>

                            </ol>

                        </div>

                    </div>

                </div>

                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="panel-heading">
                                <button data-toggle="modal" data-target="#Add_User_Modal" id="Add_User"
                                    class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i
                                            class="fa fa-plus"></i></span>Add User</button>

                            </div>

                            <br>
                            <table id="datatable" class="table table-striped"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>##</th>

                                        <th>Full Name</th>

                                        <th>Email</th>

                                        <th>Role</th>

                                        <th>Subscription</th>

                                    </tr>

                                </thead>

                            </table>

                        </div>
                    </div>
                </div>

                 <!-- Add User Modal -->
                 <div class="modal fade" id="Add_User_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Add_User_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Add_User_Modal_Lebel">Add New User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <input type="hidden" id="Add_modal_User_id" name="modal_videos_id" value="000">
                                    <div class="form-group"> <label class="control-label">User
                                            Name</label>&nbsp;&nbsp;<input id="add_modal_User_Name" type="text"
                                            name="label" class="form-control" placeholder="" required="">
                                    </div>
                                    <div class="form-group"> <label class="control-label">Email
                                            </label>&nbsp;&nbsp;<input id="Add_modal_Email" type="text"
                                            name="label" class="form-control" placeholder="" required="">
                                    </div>
                                    <div class="form-group"> <label class="control-label">Password
                                            </label>&nbsp;&nbsp;<input id="Add_modal_Password" type="text"
                                            name="label" class="form-control" placeholder="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Add_User()" class="btn btn-primary">Add
                                    User</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit User Modal -->
                <div class="modal fade" id="Edit_User_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Edit_User_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Edit_User_Modal_Lebel">Edit User Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <input type="hidden" id="Edit_modal_User_id" name="Edit_modal_User_id" value="000">
                                    <div class="form-group"> <label class="control-label">User
                                            Name</label>&nbsp;&nbsp;<input id="Edit_modal_User_Name" type="text"
                                            name="label" class="form-control" placeholder="" required="">
                                    </div>
                                    <div class="form-group"> <label class="control-label">Email
                                            </label>&nbsp;&nbsp;<input id="Edit_modal_Email" type="text"
                                            name="label" class="form-control" placeholder="" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Update_User()" class="btn btn-primary">Update
                                    User</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Notify User Modal -->
                <div class="modal fade" id="send_Notification_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="send_Notification_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="send_Notification_Modal_Lebel">Send Notification</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <input type="hidden" id="nUserID" name="nUserID" value="000">
                            <div class="form-group">
                                <label>Heading</label>
                                <input class="form-control col-md-12" type="text" value="" id="Heading">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <div>
                                    <textarea required="" class="form-control col-md-12" id="Message"
                                        rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Large Icon</label>
                                <input class="form-control col-md-12" type="text" value="" id="Large_Icon">
                            </div>

                            <div class="form-group">
                                <label>Big Picture</label>
                                <input class="form-control col-md-12" type="text" value="" id="Big_Picture">
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="NotifyUser()" class="btn btn-primary">Notify
                                    User</button>
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

<!-- Toaster js -->
<script src="public/libs/toaster/toastr.min.js"></script>

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
    var Onesignal_Api_Key;
    var Onesignal_Appid;
    function onLoad() {
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

    $('#datatable').dataTable({
        "order": [],
        "ordering": false,
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "/admin/dashboard_api/user/get_all_users.php",
            "type":"GET",
            headers: { 'x-api-key': '<?php echo $_SESSION['api_key']; ?>' },
        },
        "columns": [{
                "data": "1",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "data": "2",
                render: function (data) {
                    return '<div class="btn-group mr-1"> <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</button> <div class="dropdown-menu" style=""> <a class="dropdown-item" data-toggle="modal" data-target="#send_Notification_Modal" onclick="initNotification(' +
                        data + ')" href="#">Send Notification</a> <a class="dropdown-item" data-toggle="modal" data-target="#Edit_User_Modal" onclick="Load_User_Data(' +
                        data + ')" href="#">Edit User</a> <a class="dropdown-item" onclick="Delete_User(' +
                        data + ')" href="#">Delete User</a> </div> </div>';
                }
            },
            {
                "data": "3"
            },
            {
                "data": "4"
            },
            {
                "data": "5",
                render: function (data) {
                    if (data == 0) {
                        return 'User';
                    } else if (data == 1) {
                        return 'Admin';
                    } else if (data == 2) {
                        return 'SubAdmin';
                    } else if (data == 3) {
                        return 'Editor';
                    } else if (data == 4) {
                        return 'Editor';
                    }
                }
            },
            {
                "data": "6",
                render: function (data) {
                    return data;
                }
            }
        ]

    });

    function initNotification(ID) {
        $("#nUserID").val(ID);
    }

    function NotifyUser() {
        var nUserID = document.getElementById("nUserID").value;
        var Heading = document.getElementById("Heading").value;
        var Message = document.getElementById("Message").value;
        var Large_Icon = document.getElementById("Large_Icon").value;
        var Big_Picture = document.getElementById("Big_Picture").value;
    
        if(Heading != "" && Message != "") {
            var jsonObjects = {
                "include_external_user_ids": [nUserID],
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
                    
                    toastr.success("Total Recipients= " + response.recipients, "Sended Successfully!");
                },
                error: function (response) {
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
            })
        } else {
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
    }

    function Load_User_Data(ID) {
        var jsonObjects = {
                    "userID": ID
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/get_user_Details.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'json',
                    success: function (response) {
                        if(response != "") { 
                            $("#Edit_modal_User_id").val(response.id);
                            $("#Edit_modal_User_Name").val(response.name);
                            $("#Edit_modal_Email").val(response.email);
                        }
                    }
                });
    }

    function Delete_User(ID) {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, delete it!"
        }).then(function (result) {
            if (result.value) {
                var jsonObjects = {
                    "ID": ID
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/delete_user.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "User Deleted successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'User Deleted successfully!',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            Error();
                        }

                    }
                });
            }
        });
    }

    function Add_User() {
        var add_modal_User_Name = document.getElementById("add_modal_User_Name").value;
        var Add_modal_Email = document.getElementById("Add_modal_Email").value;
        var Add_modal_Password = document.getElementById("Add_modal_Password").value;

        var jsonObjects = {
                    "add_modal_User_Name": add_modal_User_Name,
                    "Add_modal_Email": Add_modal_Email,
                    "Add_modal_Password": Add_modal_Password
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/add_user.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "User Added successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'User Added successfully!',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                location.reload();
                            });
                        }else  if (response == "Email Already Regestered") { 
                            swal.fire({
                                title: 'Warning!',
                                text: 'Email Already Regestered!',
                                type: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                swal.close()
                            });
                        } else {
                            Error();
                        }

                    }
                });
    }

    function Update_User() {
        var Edit_modal_User_id = document.getElementById("Edit_modal_User_id").value;
        var Edit_modal_User_Name = document.getElementById("Edit_modal_User_Name").value;
        var Edit_modal_Email = document.getElementById("Edit_modal_Email").value;

                var jsonObjects = {
                    "Edit_modal_User_id": Edit_modal_User_id,
                    "Edit_modal_User_Name": Edit_modal_User_Name,
                    "Edit_modal_Email": Edit_modal_Email
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/update_user_data.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "User Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'User Updated successfully!',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                location.reload();
                            });
                        }else  if (response == "Email Already Regestered") { 
                            swal.fire({
                                title: 'Warning!',
                                text: 'Email Already Regestered!',
                                type: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                swal.close()
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
                }).then(function() {
                    location.reload();
                });
    }
</script>