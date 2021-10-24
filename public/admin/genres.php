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

                            <h4 class="font-size-18">Genrer Manager</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Special</a></li>

                                <li class="breadcrumb-item active">Genres</li>

                            </ol>

                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <a href=""
                                class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="modal" data-target="#Add_Genre_Modal"> <i
                                    class="mdi mdi-plus-box-multiple-outline mr-2"></i> Add genre</a>

                        </div>
                    </div>

                </div>

                <!-- end page title -->

                <div class="form" action="https://admin.fliq.pro/admin/videos/add/" method="post">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="card card-body">

                            <table id="datatable" class="table table-striped"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>##</th>

                                        <th>Icon</th>

                                        <th>Name</th>

                                        <th>Description</th>

                                        <th>featured</th>

                                        <th>Status</th>

                                    </tr>

                                </thead>

                            </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



        </div> <!-- container-fluid -->

    </div>

    <!-- End Page-content -->

    <!-- Add Genre Modal -->
    <div class="modal fade" id="Add_Genre_Modal" tabindex="-1" role="dialog" aria-labelledby="Add_Genre_Modal_Lebel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Add_Genre_Modal_Lebel">Add Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="panel-heading">
                        <h3 class="panel-title row justify-content-center">New Genre information</h3>
                    </div>

                    <hr>

                    <div class="form-group"> <label class="control-label">
                            Name</label>&nbsp;&nbsp;<input id="modal_Genre_Name" type="text" name="label"
                            class="form-control" placeholder="Genre 1" required=""> </div>

                    <div class="form-group"> <label class="control-label">
                            Icon</label>&nbsp;&nbsp;<input id="modal_Genre_Icon" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                    <div class="form-group"> <label class="control-label">description</label>
                        <textarea id="modal_Genre_Description" class="form-control" rows="3"
                            placeholder="Add Your Genre Description Here."
                            style="margin-top: 0px; margin-bottom: 0px; height: 145px;"></textarea>
                    </div>

                    <div class="form-group"> <label class="control-label">Featured</label> <select
                            id="modal_Genre_Featured" class="form-control" name="source" id="selected-source">
                            <option value="No" selected="">No</option>
                            <option value="Yes">Yes</option>
                        </select> </div>

                    <div class="form-group"> <label class="control-label">Status</label> <select id="modal_Genre_Status"
                            class="form-control" name="source" id="selected-source">
                            <option value="Publish" selected="">Publish</option>
                            <option value="Unpublish">Unpublish</option>
                        </select><br> </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="Add_Genre()" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Genre Modal -->
    <div class="modal fade" id="Edit_Genre_Modal" tabindex="-1" role="dialog" aria-labelledby="Add_Genre_Modal_Lebel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Edit_Genre_Modal_Lebel">Edit Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="Edit_modal_Genre_id" name="Edit_modal_Genre_id" value="000">

                    <div class="panel-heading">
                        <h3 class="panel-title row justify-content-center">Edit Genre information</h3>
                    </div>

                    <hr>

                    <div class="form-group"> <label class="control-label">
                            Name</label>&nbsp;&nbsp;<input id="Edit_modal_Genre_Name" type="text" name="label"
                            class="form-control" placeholder="Genre 1" required=""> </div>

                    <div class="form-group"> <label class="control-label">
                            Icon</label>&nbsp;&nbsp;<input id="Edit_modal_Genre_Icon" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                    <div class="form-group"> <label class="control-label">description</label>
                        <textarea id="Edit_modal_Genre_Description" class="form-control" rows="3"
                            placeholder="Add Your Genre Description Here."
                            style="margin-top: 0px; margin-bottom: 0px; height: 145px;"></textarea>
                    </div>

                    <div class="form-group"> <label class="control-label">Featured</label> <select
                            id="Edit_modal_Genre_Featured" class="form-control" name="source" id="selected-source">
                            <option value="No" selected="">No</option>
                            <option value="Yes">Yes</option>
                        </select> </div>

                    <div class="form-group"> <label class="control-label">Status</label> <select id="Edit_modal_Genre_Status"
                            class="form-control" name="source" id="selected-source">
                            <option value="Publish" selected="">Publish</option>
                            <option value="Unpublish">Unpublish</option>
                        </select><br> </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" onclick="Update_Genre()" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>

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

<!-- Responsive examples -->

<script src="public/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>

<script src="public/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->

<script src="public/js/pages/datatables.init.js"></script>

<!-- Buttons examples -->

<script src="public/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

<script src="public/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<script src="public/libs/jszip/jszip.min.js"></script>

<script src="public/libs/pdfmake/build/pdfmake.min.js"></script>

<script src="public/libs/pdfmake/build/vfs_fonts.js"></script>

<script src="public/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>

<script src="public/libs/datatables.net-buttons/js/buttons.print.min.js"></script>

<script src="public/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>



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
    $('#datatable').dataTable({
        "order": [],
        "ordering": false,
        "processing": true,
        "serverSide": true,
        "ajax": "/admin/dashboard_api/genres/get_all_genres.php",
        "columns": [{
                "data": "1",
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                "data": "2",
                render: function (data) {
                    return '<div class="btn-group mr-1 mt-2"> <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">Edit</button> <div class="dropdown-menu" style=""> <a class="dropdown-item" onclick="Load_Data(' +
                        data + ')" href="#" data-toggle="modal" data-target="#Edit_Genre_Modal">Edit Genre</a> <a class="dropdown-item" id="Delete" onclick="Delete_Genre(' +
                        data + ')" href="#">Delete</a></div>';
                }
            },
            {
                "data": "3",
                render: function (data) {
                    if(data != "") {
                        return '<img class="d-flex align-self-center rounded mr-3 rounded-circle" src='+ data +' alt="Generic placeholder image" height="60" width="60">';
                    } else {
                        return '<img class="d-flex align-self-center rounded mr-3 rounded-circle" src="public/images/placeholder.jpg" alt="Generic placeholder image" height="60" width="60">';
                    }
                   
                }
            },
            {
                "data": "4"
            },
            {
                "data": "5"
            },
            {
                "data": "6",
                render: function (data) {
                    if (data == 0) {
                        return '<span class="badge badge-warning">Not Featured</span>';
                    } else if (data == 1) {
                        return '<span class="badge badge-info">Featured</span>';
                    }
                }
            },
            {
                "data": "7",
                render: function (data) {
                    if (data == 0) {
                        return '<span class="badge badge-danger">UnPublished</span>';
                    } else if (data == 1) {
                        return '<span class="badge badge-success">Published</span>';
                    }
                }
            }
        ]
    });

    function Add_Genre() {
        var modal_Genre_Name = document.getElementById("modal_Genre_Name").value;
        var modal_Genre_Icon = document.getElementById("modal_Genre_Icon").value;
        var modal_Genre_Description = document.getElementById("modal_Genre_Description").value;

        var modal_Genre_Featured = document.getElementById("modal_Genre_Featured").value;
        var modal_Genre_Status = document.getElementById("modal_Genre_Status").value;

        if (modal_Genre_Featured == "Yes") {
            var Genre_Featured = "1";
        } else if (modal_Genre_Featured == "No") {
            var Genre_Featured = "0";
        }

        if (modal_Genre_Status == "Publish") {
            var Genre_Status = "1";
        } else if (modal_Genre_Status == "Unpublish") {
            var Genre_Status = "0";
        }

        var jsonObjects = {
            "modal_Genre_Name": modal_Genre_Name,
            "modal_Genre_Icon": modal_Genre_Icon,
            "modal_Genre_Description": modal_Genre_Description,
            "Genre_Featured": Genre_Featured,
            "Genre_Status": Genre_Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_genre.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response) {
                if (response != "") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Genre Added Successfully!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#556ee6',
                        cancelButtonColor: "#f46a6a"
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Error_Response();
                }
            }
        });
    }

    function Delete_Genre(ID) {
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
                    url: "dashboard_api/delete_genre.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    success: function (response) {
                        if (response == "Genre Deleted successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Genre Deleted Successfully!',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            Error_Response();
                        }

                    }
                });
            }
        });
    }


    function Load_Data(ID) {
        var jsonObjects = {
            "ID": ID
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/get_genre_details.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'json',
            success: function (response3) {
                var Edit_modal_Genre_id = response3.id;
                var Edit_modal_Genre_Name = response3.name;
                var Edit_modal_Genre_Icon = response3.icon;
                var Edit_modal_Genre_Description = response3.description;
                var Edit_modal_Genre_Featured = response3.featured;
                var Edit_modal_Genre_Status = response3.status;

                if (!Edit_modal_Genre_id == "") {
                    $("#Edit_modal_Genre_id").val(Edit_modal_Genre_id);
                    $("#Edit_modal_Genre_Name").val(Edit_modal_Genre_Name);
                    $("#Edit_modal_Genre_Icon").val(Edit_modal_Genre_Icon);
                    $("#Edit_modal_Genre_Description").val(Edit_modal_Genre_Description);

                    if (Edit_modal_Genre_Featured == "1") {
                        $("#Edit_modal_Genre_Featured").val("Yes");
                    } else if (Edit_modal_Genre_Featured == "0") {
                        $("#Edit_modal_Genre_Featured").val("No");
                    }

                    if (Edit_modal_Genre_Status == "1") {
                        $("#Edit_modal_Genre_Status").val("Publish");
                    } else if (Edit_modal_Genre_Status == "0") {
                        $("#Edit_modal_Genre_Status").val("Unpublish");
                    }
                }
            }
        });
    }

    function Update_Genre() {
        var Edit_modal_Genre_id = document.getElementById("Edit_modal_Genre_id").value;
        var Edit_modal_Genre_Name = document.getElementById("Edit_modal_Genre_Name").value;
        var Edit_modal_Genre_Icon = document.getElementById("Edit_modal_Genre_Icon").value;
        var Edit_modal_Genre_Description = document.getElementById("Edit_modal_Genre_Description").value;

        var Edit_modal_Genre_Featured = document.getElementById("Edit_modal_Genre_Featured").value;
        var Edit_modal_Genre_Status = document.getElementById("Edit_modal_Genre_Status").value;

        if (Edit_modal_Genre_Featured == "Yes") {
            var Edit_Genre_Featured = "1";
        } else if (Edit_modal_Genre_Featured == "No") {
            var Edit_Genre_Featured = "0";
        }

        if (Edit_modal_Genre_Status == "Publish") {
            var Edit_Genre_Status = "1";
        } else if (Edit_modal_Genre_Status == "Unpublish") {
            var Edit_Genre_Status = "0";
        }

        var jsonObjects = {
            "Edit_modal_Genre_id": Edit_modal_Genre_id,
            "Edit_modal_Genre_Name": Edit_modal_Genre_Name,
            "Edit_modal_Genre_Icon": Edit_modal_Genre_Icon,
            "Edit_modal_Genre_Description": Edit_modal_Genre_Description,
            "Edit_Genre_Featured": Edit_Genre_Featured,
            "Edit_Genre_Status": Edit_Genre_Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/update_genre_details.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response4) {
                if (response4 == "Genre Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Genre Updated successfully!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#556ee6',
                        cancelButtonColor: "#f46a6a"
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    Error_Response();
                }
            }
        });
    }

    function Error_Response() {
        swal.fire({
            title: 'Error',
                      text: 'Something Went Wrong :(',
                      type: 'error'
                }).then(function() {
                    location.reload();
                });
    }

</script>