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

    <title>Dooo - Coupon Manager</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



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

                            <h4 class="font-size-18">Coupon Manager</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Subscription</a></li>

                                <li class="breadcrumb-item active">Coupon Manager</li>

                            </ol>

                        </div>

                    </div>

                </div>

                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="panel-heading">
                                <button data-toggle="modal" data-target="#Add_Coupon_Modal" id="Add_Season"
                                    class="btn btn-sm btn-primary waves-effect waves-light"><span class="btn-label"><i
                                            class="fa fa-plus"></i></span> Create Coupon</button>

                            </div>

                            <br>
                            <table id="datatable" class="table table-striped"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>##</th>

                                        <th>Name</th>

                                        <th>Coupon Code</th>

                                        <th>Time</th>

                                        <th>Amount</th>

                                        <th>Subscription Type</th>

                                        <th>Max Use</th>

                                        <th>used</th>

                                        <th>Used By</th>

                                        <th>Expire Date</th>

                                        <th>status</th>

                                    </tr>

                                </thead>

                            </table>

                        </div>
                    </div>
                </div>




                <!-- Add Coupon Modal -->
                <div class="modal fade" id="Add_Coupon_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Add_Coupon_Modal_Lebel" aria-hidden="true">

                    <div class="modal-dialog" role="document">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="Add_Coupon_Modal_Lebel">Create Coupon</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="panel-body">

                                    <input type="hidden" id="Edit_modal_videos_id" name="modal_videos_id" value="000">

                                    <div class="form-group"> <label class="control-label">Name</label>&nbsp;&nbsp;<input
                                            id="Name" type="text" name="label" class="form-control"
                                            placeholder="Premium" required="">

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Coupon Code
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <input id="Coupon_Code" type="text" name="label" class="form-control"
                                                    placeholder="" required="">
                                            </div>

                                            <div class="col-lg-2">
                                                <span class="input-group-btn">
                                                    <button data-toggle="modal" onclick="Genarate_Coupon()"
                                                        id="Generate_Coupon"
                                                        class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                            class="btn-label"><i class="typcn typcn-refresh"></i></span>
                                                        Generate</button>
                                                </span>

                                            </div>

                                        </div>

                                        <div class="form-group"> <label class="control-label">Time (Days)</label> <input
                                                id="Time" type="number" name="order" class="form-control"
                                                placeholder="0 to 9999" required=""> </div>

                                        <div class="form-group"> <label class="control-label">Amount</label> <input
                                                id="Amount" type="number" name="order" class="form-control"
                                                placeholder="0 to 9999" required=""> </div>

                                        <div class="form-group"> <label class="control-label">Max Use</label> <input
                                                id="Max_Use" type="number" name="order" class="form-control"
                                                placeholder="0 to 9999" required=""> </div>


                                        <div class="form-group"> <label class="control-label">Status</label> <select
                                                id="Status" class="form-control" name="source">

                                                <option value="Valid" selected="">Valid</option>

                                                <option value="Expired">Expired</option>

                                            </select><br> </div>


                                        </br>
                                        <label class="control-label">Subscription Type</label>
                                        <hr>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 ">Remove Ads</label>
                                            <div class="col-sm-6">
                                                <input type="checkbox" id="Remove_Ads_bool" switch="bool">
                                                <label for="Remove_Ads_bool" data-on-label="" data-off-label=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 ">Watch Premium Contents</label>
                                            <div class="col-sm-6">
                                                <input type="checkbox" id="Watch_Premium_Contents_bool" switch="bool">
                                                <label for="Watch_Premium_Contents_bool" data-on-label=""
                                                    data-off-label=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 ">Download Premium Contents</label>
                                            <div class="col-sm-6">
                                                <input type="checkbox" id="Download_Premium_Contents_bool"
                                                    switch="bool">
                                                <label for="Download_Premium_Contents_bool" data-on-label=""
                                                    data-off-label=""></label>
                                            </div>
                                        </div>

                                        </br>
                                        <label class="control-label">Expire</label>
                                        <hr>

                                        <div class="form-group">
                                            <label>Expire Date</label>
                                            <div class="input-group date" data-target-input="nearest">
                                                <input type="text" id="add_expire_date"
                                                    class="form-control datetimepicker-input" data-target="#add_expire_date"
                                                    placeholder="YYYY-MM-DD" />
                                                <div class="input-group-append" data-target="#add_expire_date"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="button" onclick="Create_Coupon()" class="btn btn-primary">Add
                                        Coupon</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Edit Coupon Modal -->
                <div class="modal fade" id="Edit_Coupon_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Edit_Coupon_Modal_Lebel" aria-hidden="true">

                    <div class="modal-dialog" role="document">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="Edit_Coupon_Modal_Lebel">Edit Coupon</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="panel-body">

                                    <input id="Edit_ID" type="text" name="label" class="form-control" placeholder=""
                                        required="" style="display: none;">

                                    <input type="hidden" id="Edit_modal_videos_id" name="modal_videos_id" value="000">

                                    <div class="form-group"> <label class="control-label">Name</label>&nbsp;&nbsp;<input
                                            id="Edit_Name" type="text" name="label" class="form-control"
                                            placeholder="Premium" required="">

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Coupon Code
                                        </label>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <input id="Edit_Coupon_Code" type="text" name="label"
                                                    class="form-control" placeholder="" required="">
                                            </div>

                                            <div class="col-lg-2">
                                                <span class="input-group-btn">
                                                    <button data-toggle="modal" onclick="Edit_Genarate_Coupon()"
                                                        id="Generate_Coupon"
                                                        class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                            class="btn-label"><i class="typcn typcn-refresh"></i></span>
                                                        Generate</button>
                                                </span>

                                            </div>

                                        </div>

                                        <div class="form-group"> <label class="control-label">Time (Days)</label> <input
                                                id="Edit_Time" type="number" name="order" class="form-control"
                                                placeholder="0 to 9999" required=""> </div>

                                        <div class="form-group"> <label class="control-label">Amount</label> <input
                                                id="Edit_Amount" type="number" name="order" class="form-control"
                                                placeholder="0 to 9999" required=""> </div>

                                        <div class="form-group"> <label class="control-label">Max Use</label> <input
                                                id="Edit_Max_Use" type="number" name="order" class="form-control"
                                                placeholder="0 to 9999" required=""> </div>


                                        <div class="form-group"> <label class="control-label">Status</label> <select
                                                id="Edit_Status" class="form-control" name="source">

                                                <option value="Valid" selected="">Valid</option>

                                                <option value="Expired">Expired</option>

                                            </select><br> </div>


                                        </br>
                                        <label class="control-label">Subscription Type</label>
                                        <hr>

                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 ">Remove Ads</label>
                                            <div class="col-sm-6">
                                                <input type="checkbox" id="Edit_Remove_Ads_bool" switch="bool">
                                                <label for="Edit_Remove_Ads_bool" data-on-label=""
                                                    data-off-label=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 ">Watch Premium Contents</label>
                                            <div class="col-sm-6">
                                                <input type="checkbox" id="Edit_Watch_Premium_Contents_bool"
                                                    switch="bool">
                                                <label for="Edit_Watch_Premium_Contents_bool" data-on-label=""
                                                    data-off-label=""></label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label col-sm-6 ">Download Premium Contents</label>
                                            <div class="col-sm-6">
                                                <input type="checkbox" id="Edit_Download_Premium_Contents_bool"
                                                    switch="bool">
                                                <label for="Edit_Download_Premium_Contents_bool" data-on-label=""
                                                    data-off-label=""></label>
                                            </div>
                                        </div>

                                        </br>
                                        <label class="control-label">Expire</label>
                                        <hr>

                                        <div class="form-group">
                                        <label>Expire Date</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" id="expire_date"
                                                class="form-control datetimepicker-input" data-target="#expire_date"
                                                placeholder="YYYY-MM-DD" />
                                            <div class="input-group-append" data-target="#expire_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    </div>

                                </div>

                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    <button type="button" onclick="Update_Coupon()" class="btn btn-primary">Update
                                        Coupon</button>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Show Users Modal -->
                <div class="modal fade" id="Show_Users_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Show_Users_Modal_Lebel" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="Show_Users_Modal_Lebel">Edit Coupon</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body">

                                <div class="panel-body">
                                    <table id="Show_User_datatable" class="table table-striped"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>Name</th>

                                                <th>Email</th>

                                                <th>Role</th>

                                                <th>Subscription</th>

                                            </tr>

                                        </thead>

                                    </table>
                                </div>

                                <div class="modal-footer">

                                </div>

                            </div>

                        </div>

                    </div>

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

        <!-- Sweet Alert-->
        <link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- init js -->

        <script src="public/js/pages/form-editor.init.js"></script>

        <!-- Sweet Alerts js -->
        <script src="public/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="public/js/pages/sweet-alerts.init.js"></script>

        <!-- Required datatable js -->

        <script src="public/libs/datatables.net/js/jquery.dataTables.min.js"></script>

        <script src="public/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

        <!--Tempus Dominus-->
        <script type="text/javascript" src="public/libs/Tempus Dominus/moment.min.js"></script>
        <script src="public/libs/Tempus Dominus/tempusdominus-bootstrap-4.min.js"></script>
        <link rel="stylesheet" href="public/libs/Tempus Dominus/tempusdominus-bootstrap-4.min.css" />

        <script src="public/libs/select2/js/select2.min.js"></script>

        <script src="public/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

        <script src="public/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

        <script src="public/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>

        <script src="public/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js"></script>

        <script src="public/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>



        <script src="public/js/pages/form-advanced.init.js"></script>



        <?php include "layouts/content-end.php"; ?>



        <?php require '../db/config.php'; ?>

        <script type="text/javascript">
            $(function () {
                $('#expire_date').datetimepicker({
                    format: 'YYYY-MM-DD',
                    allowInputToggle: true
                });
                $('#add_expire_date').datetimepicker({
                    format: 'YYYY-MM-DD',
                    allowInputToggle: true
                });
            });
        </script>

        <script>
            var name = "";
            function onLoad() {
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/get_config.php",
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        name = response.name;
                    }
                });
            }

            $('#datatable').dataTable({
                "order": [],
                "ordering": false,
                "processing": true,
                "serverSide": true,
                "ajax": "/admin/dashboard_api/coupon/get_all_coupons.php",
                "columns": [{
                        "data": "1",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "data": "2",
                        render: function (data) {
                            return '<div class="btn-group"> <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Edit</button> <div class="dropdown-menu" style=""> <a class="dropdown-item" data-toggle="modal" data-target="#Edit_Coupon_Modal" onclick="Load_Coupon_Data(' +
                                data + ')">Edit</a> <a class="dropdown-item" onclick="Delete_Coupon(' +
                                data + ')" href="#">Delete</a> </div> </div>';
                        }
                    },
                    {
                        "data": "3"
                    },
                    {
                        "data": "4",
                        render: function (data) {
                            return '<label>'+data+'</label>';
                        }
                    },
                    {
                        "data": "5",
                        render: function (data) {
                            return data + "Days";
                        }
                    },
                    {
                        "data": "6"
                    },
                    {
                        "data": "7"
                    },
                    {
                        "data": "8"
                    },
                    {
                        "data": "9"
                    },
                    {
                        "data": "10",
                        render: function (data) {
                            return "<button type='button' class='btn btn-info btn-sm waves-effect waves-light' data-toggle='modal' data-target='#Show_Users_Modal' onclick=init_usersData('" + data + "'); href='#'>Users</button>";
                        }
                    },
                    {
                        "data": "11"
                    },
                    {
                        "data": "12",
                        render: function (data) {
                            if (data == 0) {
                                return '<span class="badge badge-danger">Expired</span';
                            } else if (data == 1) {
                                return '<span class="badge badge-success">Valid</span>';
                            }
                        }
                    }
                ]

            });

            function init_usersData(data) {
                var userID_arr = data.split(',');

                var user_list_count = 1;

                for (const userID of userID_arr) {
                    var jsonObjects = {
                        "userID": userID
                    };
                    $.ajax({
                        type: 'POST',
                        url: "dashboard_api/get_user_Details.php",
                        contentType: 'application/json',
                        data: JSON.stringify(jsonObjects),
                        dataType: 'json',
                        success: function (response) {
                            if(response != "") { 
                                var name = response.name;
                                var email = response.email;
                                var role = response.role;
                                var active_subscription = response.active_subscription;

                                var Show_User_datatable = $('#Show_User_datatable').dataTable({
                                        "order": [],
                                        "ordering": false,
                                        "paging": false,
                                        "info": false,
                                        "filter": false,
                                        "pageLength": 100,
                                        "destroy": true
                                    });
                                $('#Show_User_datatable').DataTable().row.add([
                                    user_list_count, name, email, detect_role(role), active_subscription
                                ]).draw();
                                user_list_count++;
                            }
                        }
                    });
                }
            }

            function detect_role(data) {
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

            function Create_Coupon() {
                var Name = document.getElementById("Name").value;
                var Coupon_Code = document.getElementById("Coupon_Code").value;
                var Time = document.getElementById("Time").value;
                var Amount = document.getElementById("Amount").value;
                var Max_Use = document.getElementById("Max_Use").value;
                var Status = document.getElementById("Status").value;
                var add_expire_date = document.getElementById('add_expire_date').value;

                if (Status == "Valid") {
                    var Status_Count = 1;

                } else if (Status == "Expired") {
                    var Status_Count = 0;
                }


                if ($('#Remove_Ads_bool').is(':checked')) {
                    var Remove_Ads = 1;
                } else {
                    var Remove_Ads = 0;
                }
                if ($('#Watch_Premium_Contents_bool').is(':checked')) {
                    var Watch_Premium_Contents = 2;
                } else {
                    var Watch_Premium_Contents = 0;
                }
                if ($('#Download_Premium_Contents_bool').is(':checked')) {
                    var Download_Premium_Contents = 3;
                } else {
                    var Download_Premium_Contents = 0;
                }

                var Subscription_Type = "";
                if (Remove_Ads != "0") {
                    Subscription_Type = "" + Remove_Ads;
                }
                if (Watch_Premium_Contents != "0") {
                    Subscription_Type = "" + Subscription_Type + Watch_Premium_Contents;
                }
                if (Download_Premium_Contents != "0") {
                    Subscription_Type = "" + Subscription_Type + Download_Premium_Contents;
                }
                if (Subscription_Type != "") {
                    var f_Subscription_Type = Subscription_Type;
                } else {
                    var f_Subscription_Type = 0;
                }


                var jsonObjects = {
                    "Name": Name,
                    "Coupon_Code": Coupon_Code,
                    "Time": Time,
                    "Amount": Amount,
                    "Max_Use": Max_Use,
                    "Status_Count": Status_Count,
                    "f_Subscription_Type": f_Subscription_Type,
                    "add_expire_date": add_expire_date
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/coupon/create_coupon.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response != "") {
                            location.reload();
                        }
                    }
                });
            }

            function Genarate_Coupon() {
                if(name != "") {
                    document.getElementById('Coupon_Code').value = name+'-' + Get_Rand(8);
                } else {
                    document.getElementById('Coupon_Code').value = Get_Rand(12);
                }
                
            }

            function Edit_Genarate_Coupon() {
                if(name != "") {
                    document.getElementById('Edit_Coupon_Code').value = name+'-' + Get_Rand(8);
                } else {
                    document.getElementById('Edit_Coupon_Code').value = Get_Rand(12);
                }
                
            }

            function Get_Rand(length) {
                var result = [];
                var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result.push(characters.charAt(Math.floor(Math.random() *
                        charactersLength)));
                }
                return result.join('');
            }

            function Delete_Coupon(ID) {
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
                            url: "dashboard_api/coupon/delete_coupon.php",
                            contentType: 'application/json',
                            data: JSON.stringify(jsonObjects),
                            dataType: 'text',
                            headers: {
                                'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                            },
                            success: function (response) {
                                if (response == "Coupon Deleted successfully") {
                                    Coupon_Deleted_successfully();
                                } else {
                                    Error();
                                }

                            }
                        });
                    }
                });
            }

            function Coupon_Deleted_successfully() {
                swal.fire({
                    title: 'Successful!',
                    text: 'Coupon Deleted Successfully!',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: "#f46a6a"
                }).then(function () {
                    location.reload();
                });
            }

            

            function Load_Coupon_Data(ID) {
                var jsonObjects = {
                    "ID": ID
                };
                $.ajax({

                    type: 'POST',

                    url: "dashboard_api/coupon/get_coupon_details.php",

                    contentType: 'application/json',

                    data: JSON.stringify(jsonObjects),

                    dataType: 'json',

                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },

                    success: function (response) {

                        var id = response.id;
                        var name = response.name;
                        var coupon_code = response.coupon_code;
                        var time = response.time;
                        var amount = response.amount;
                        var subscription_type = response.subscription_type;
                        var status = response.status;
                        var max_use = response.max_use;
                        var expireDate = response.expire_date;

                        if (!id == "") {

                            $("#Edit_ID").val(id);
                            $("#Edit_Name").val(name);
                            $("#Edit_Coupon_Code").val(coupon_code);
                            $("#Edit_Time").val(time);
                            $("#Edit_Amount").val(amount);
                            $("#Edit_Max_Use").val(max_use);

                            if (status == "0") {
                                $("#Edit_Status").val("Expired");
                            } else if (status == "1") {
                                $("#Edit_Status").val("Valid");
                            }

                            var sNumber = subscription_type.toString();
                            $('#Edit_Remove_Ads_bool').attr('checked', false);
                            $('#Edit_Watch_Premium_Contents_bool').attr('checked', false);
                            $('#Edit_Download_Premium_Contents_bool').attr('checked', false);
                            for (var i = 0, len = sNumber.length; i < len; i += 1) {
                                if (sNumber.charAt(i) == 1) {
                                    $('#Edit_Remove_Ads_bool').attr('checked', true);
                                }
                                if (sNumber.charAt(i) == 2) {
                                    $('#Edit_Watch_Premium_Contents_bool').attr('checked', true);
                                }
                                if (sNumber.charAt(i) == 3) {
                                    $('#Edit_Download_Premium_Contents_bool').attr('checked', true);
                                }
                            }

                            $("#expire_date").data("datetimepicker").date(expireDate);

                        }
                    }

                });
            }

            function Update_Coupon() {
                var Edit_ID = document.getElementById("Edit_ID").value;
                var Edit_Name = document.getElementById("Edit_Name").value;
                var Edit_Coupon_Code = document.getElementById("Edit_Coupon_Code").value;
                var Edit_Time = document.getElementById("Edit_Time").value;
                var Edit_Amount = document.getElementById("Edit_Amount").value;
                var Edit_Max_Use = document.getElementById("Edit_Max_Use").value;
                var Edit_Status = document.getElementById("Edit_Status").value;
                var expire_date = document.getElementById('expire_date').value;
                

                if (Edit_Status == "Valid") {
                    var Edit_Status_Count = 1;

                } else if (Edit_Status == "Expired") {
                    var Edit_Status_Count = 0;
                }


                if ($('#Edit_Remove_Ads_bool').is(':checked')) {
                    var Edit_Remove_Ads = 1;
                } else {
                    var Edit_Remove_Ads = 0;
                }
                if ($('#Edit_Watch_Premium_Contents_bool').is(':checked')) {
                    var Edit_Watch_Premium_Contents = 2;
                } else {
                    var Edit_Watch_Premium_Contents = 0;
                }
                if ($('#Edit_Download_Premium_Contents_bool').is(':checked')) {
                    var Edit_Download_Premium_Contents = 3;
                } else {
                    var Edit_Download_Premium_Contents = 0;
                }

                var Edit_Subscription_Type = "";
                if (Edit_Remove_Ads != "0") {
                    Edit_Subscription_Type = "" + Edit_Remove_Ads;
                }
                if (Edit_Watch_Premium_Contents != "0") {
                    Edit_Subscription_Type = "" + Edit_Subscription_Type + Edit_Watch_Premium_Contents;
                }
                if (Edit_Download_Premium_Contents != "0") {
                    Edit_Subscription_Type = "" + Edit_Subscription_Type + Edit_Download_Premium_Contents;
                }
                if (Edit_Subscription_Type != "") {
                    var f_Edit_Subscription_Type = Edit_Subscription_Type;
                } else {
                    var f_Edit_Subscription_Type = 0;
                }


                var jsonObjects = {
                    "Edit_ID": Edit_ID,
                    "Edit_Name": Edit_Name,
                    "Edit_Coupon_Code": Edit_Coupon_Code,
                    "Edit_Time": Edit_Time,
                    "Edit_Amount": Edit_Amount,
                    "Edit_Max_Use": Edit_Max_Use,
                    "Edit_Status_Count": Edit_Status_Count,
                    "f_Edit_Subscription_Type": f_Edit_Subscription_Type,
                    "expire_date": expire_date
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/coupon/update_coupon_details.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {

                        if (response == "Coupon Details Updated successfully") {

                            Coupon_Details_Updated_successfully();

                        } else {

                            Error();

                        }

                    }

                });
            }

            function Coupon_Details_Updated_successfully() {
                swal.fire({
                    title: 'Successful!',
                    text: 'Coupon Details Updated successfully!',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#556ee6',
                    cancelButtonColor: "#f46a6a"
                }).then(function () {
                    location.reload();
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