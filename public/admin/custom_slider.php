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

    <title>Dooo - Custom Slider</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



    <link href="public/cssadd-movie.css" rel="stylesheet" type="text/css" />



    <!-- Summernote css -->

    <link href="public/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />


    <!-- Select2 CSS-->

    <link href="public/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />


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

                            <h4 class="font-size-18">Custom Slider</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Slider</a></li>

                                <li class="breadcrumb-item active">Custom Slider</li>

                            </ol>

                        </div>

                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <a href="" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="modal" data-target="#Add_cs_Modal"> <i class="mdi mdi-plus-box-multiple-outline mr-2"></i> Add</a>

                        </div>
                    </div>

                </div>

                <!-- end page title -->

                <div class="form" action="" method="post">

<div class="row">

    <div class="col-md-12">

        <div class="card card-body">

            <h3 class="card-title mt-0">Custom Slider</h3>

            <br>

            <table id="datatable" class="table table-striped"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                <thead>

                                    <tr>

                                        <th>#</th>

                                        <th>##</th>

                                        <th>Title</th>

                                        <th>Banner</th>

                                        <th>Type</th>

                                        <th>Status</th>

                                    </tr>

                                </thead>

                                <tbody>
                                            <?php
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                     }
                                       $sql = "SELECT * FROM image_slider ORDER BY id DESC";
                                       $result = $conn->query($sql);
                                 
                                        $conn->close();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $int_table_id = 1;
                                           while($row = $result->fetch_assoc()) {
                                               ?>
                                            <tr>
                                                <th><?php echo($int_table_id); ?></th>

                                                <td>
                                                    <div class="btn-group mr-1 mt-2"> <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">Edit</button><div class="dropdown-menu" style=""> <a class="dropdown-item" id="Edit"data-toggle="modal" data-target="#Edit_cs_Modal" onclick="load_cs_details(<?php echo stripslashes($row['id']); ?>)" href="#">Edit</a> <a class="dropdown-item" id="Delete" onclick="Delete_cs(<?php echo stripslashes($row['id']); ?>)" href="#">Delete</a>
                                                     </div>
                                                    
                                                </td>

                                                <td><?php echo stripslashes($row["title"]); ?></td>

                                                <td><img class="img-fluid" height="100" width="80"
                                                        src=<?php echo $row["banner"]; ?>
                                                        data-holder-rendered="true"></td>

                                                <?php
                                            if($row["content_type"] == 0) {
                                                ?>
                                                <td><span class="badge badge-info">Movie</span></td>
                                                <?php
                                            }
                                            if($row["content_type"] == 1) {
                                                ?>
                                                <td><span class="badge badge-info">WebSeries</span></td>
                                                <?php
                                            }
                                            if($row["content_type"] == 2) {
                                                ?>
                                                <td><span class="badge badge-info">WebView</span></td>
                                                <?php
                                            }
                                            if($row["content_type"] == 3) {
                                                ?>
                                                <td><span class="badge badge-info">External Browser	</span></td>
                                                <?php
                                            }
                                            ?>




                                                <?php
                                            if($row["status"] == 0) {
                                                ?>
                                                <td><span class="badge badge-danger">UnPublished</span></td>
                                                <?php
                                            }
                                            if($row["status"] == 1) {
                                                ?>
                                                <td><span class="badge badge-success">Published</span></td>
                                                <?php
                                            }

                                            ?>

                                            

                                                <?php ++$int_table_id ?>
                                            </tr>
                                            <?php
                                              }
                                              } else {
                                                echo "0 results";
                                              }
                                              ?>

                                        </tbody>

                            </table>

        </div>

    </div>

</div>

</div>



            </div> <!-- container-fluid -->

        </div>

        <!-- End Page-content -->


        <!-- Add Custom Slider Modal -->
    <div class="modal fade" id="Add_cs_Modal" tabindex="-1" role="dialog" aria-labelledby="Add_cs_Modal_Lebel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Add_cs_Modal_Lebel">Custom Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="panel-heading">
                        <h3 class="panel-title row justify-content-center">Slider information</h3>
                    </div>

                    <hr>

                    <input type="hidden" id="add_cs_content_id" name="add_cs_content_id" value="0">

                    <div class="form-group"> <label class="control-label">Slider Type</label> 
                        <select id="add_slider_type" class="form-control" name="source">
                            <option value="0" selected="">Movie</option>
                            <option value="1">WebSeries</option>
                            <option value="2">WebView</option>
                            <option value="3">External Browser</option>
                        </select> </div>

                        <div class="form-group" id="add_cs_Movie_div">
                            <label class="control-label">Movie</label>
                            <div>
                             <select id="Movie_id" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>

                        <div class="form-group" id="add_cs_Web_Series_div">
                            <label class="control-label">Web Series</label>
                            <div>
                                 <select id="Web_Series_id" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>

                        <div class="form-group"> <label class="control-label">
                            Title</label>&nbsp;&nbsp;<input id="add_cs_Title" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                        <div class="form-group"> <label class="control-label">
                            Banner</label>&nbsp;&nbsp;<input id="add_cs_Banner" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                        <div class="form-group" id="add_cs_URL_div"> <label class="control-label">
                            URL</label>&nbsp;&nbsp;<input id="add_cs_URL" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                        <div class="form-group"> <label class="control-label">Status</label> <select id="add_cs_Status"
                            class="form-control" name="source" id="selected-source">
                            <option value="1" selected="">Publish</option>
                            <option value="0">Unpublish</option>
                        </select><br> </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="add_cs">Add</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Custom Slider Modal -->
    <div class="modal fade" id="Edit_cs_Modal" tabindex="-1" role="dialog" aria-labelledby="Edit_cs_Modal_Lebel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Edit_cs_Modal_Lebel">Custom Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="panel-heading">
                        <h3 class="panel-title row justify-content-center">Slider information</h3>
                    </div>

                    <hr>

                    <input type="hidden" id="Edit_cs_id" name="Edit_cs_id" value="0">

                    <input type="hidden" id="Edit_cs_content_id" name="Edit_cs_content_id" value="0">

                    <div class="form-group"> <label class="control-label">Slider Type</label> 
                        <select id="Edit_slider_type" class="form-control" name="source">
                            <option value="0" selected="">Movie</option>
                            <option value="1">WebSeries</option>
                            <option value="2">WebView</option>
                            <option value="3">External Browser</option>
                        </select> </div>

                        <div class="form-group" id="Edit_cs_Movie_div">
                            <label class="control-label">Movie</label>
                            <div>
                             <select id="Edit_Movie_id" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>

                        <div class="form-group" id="Edit_cs_Web_Series_div">
                            <label class="control-label">Web Series</label>
                            <div>
                                 <select id="Edit_Web_Series_id" class="form-control" style="width:100%;"></select>
                            </div>
                        </div>

                        <div class="form-group"> <label class="control-label">
                            Title</label>&nbsp;&nbsp;<input id="Edit_cs_Title" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                        <div class="form-group"> <label class="control-label">
                            Banner</label>&nbsp;&nbsp;<input id="Edit_cs_Banner" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                        <div class="form-group" id="Edit_cs_URL_div"> <label class="control-label">
                            URL</label>&nbsp;&nbsp;<input id="Edit_cs_URL" type="text" name="label"
                            class="form-control" placeholder="" required=""> </div>

                        <div class="form-group"> <label class="control-label">Status</label> <select id="Edit_cs_Status"
                            class="form-control" name="source" id="selected-source">
                            <option value="1" selected="">Publish</option>
                            <option value="0">Unpublish</option>
                        </select><br> </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="Edit_cs">Edit</button>
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



<!-- Select2 js-->

<script src="public/libs/select2/js/select2.min.js"></script>



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
$.fn.modal.Constructor.prototype.enforceFocus = function() {};

$('#Movie_id').select2({

    placeholder: 'Select Movie',

    minimumInputLength: 2,

    ajax: {

        url: 'dashboard_api/get_notification_content_list.php',

        dataType: 'json',

        delay: 250,

        data: function (params) {

            var query = {

                search: params.term,

                type: 'movie'

            }

            return query;

        },

        processResults: function (data) {

            return {

                results: data

            };

        },

        cache: true

    }

});

$("#Movie_id").change(function () {

    var Movie_id = $("#Movie_id option:selected").val();



    var jsonObjects = {

        "ID": Movie_id

    };



    if (Movie_id != '' && Movie_id != null) {

        $.ajax({

                url: 'dashboard_api/get_single_movie_details.php',

                type: 'POST',

                contentType: 'application/json',

                data: JSON.stringify(jsonObjects),

                dataType: 'json'

            })

            .done(function (response) {

                $("#add_cs_content_id").val(response.id);
                $("#add_cs_Banner").val(response.banner);
                $("#add_cs_Title").val(response.name);

            })

            .fail(function (response) {

                //alert('Something went wrong..');

            })

    }

});











$('#Web_Series_id').select2({

    placeholder: 'Select Web Series',

    minimumInputLength: 2,

    ajax: {

        url: 'dashboard_api/get_notification_content_list.php',

        dataType: 'json',

        delay: 250,

        data: function (params) {

            var query = {

                search: params.term,

                type: 'web_series'

            }

            return query;

        },

        processResults: function (data) {

            return {

                results: data

            };

        },

        cache: true

    }

});

$("#Web_Series_id").change(function () {

    var Web_Series_id = $("#Web_Series_id option:selected").val();



    var jsonObjects = {

        "ID": Web_Series_id

    };



    if (Web_Series_id != '' && Web_Series_id != null) {

        $.ajax({

                url: 'dashboard_api/get_single_webseries_details.php',

                type: 'POST',

                contentType: 'application/json',

                data: JSON.stringify(jsonObjects),

                dataType: 'json'

            })

            .done(function (response) {

                $("#add_cs_content_id").val(response.id);
                $("#add_cs_Banner").val(response.banner);
                $("#add_cs_Title").val(response.name);

            })

            .fail(function (response) {

                //alert('Something went wrong..');

            })

    }

});




$('#Edit_Movie_id').select2({

placeholder: 'Select Movie',

minimumInputLength: 2,

ajax: {

    url: 'dashboard_api/get_notification_content_list.php',

    dataType: 'json',

    delay: 250,

    data: function (params) {

        var query = {

            search: params.term,

            type: 'movie'

        }

        return query;

    },

    processResults: function (data) {

        return {

            results: data

        };

    },

    cache: true

}

});

$("#Edit_Movie_id").change(function () {

var Edit_Movie_id = $("#Edit_Movie_id option:selected").val();



var jsonObjects = {

    "ID": Edit_Movie_id

};



if (Edit_Movie_id != '' && Edit_Movie_id != null) {

    $.ajax({

            url: 'dashboard_api/get_single_movie_details.php',

            type: 'POST',

            contentType: 'application/json',

            data: JSON.stringify(jsonObjects),

            dataType: 'json'

        })

        .done(function (response) {

            $("#Edit_cs_content_id").val(response.id);
            $("#Edit_cs_Banner").val(response.banner);
            $("#Edit_cs_Title").val(response.name);

        })

        .fail(function (response) {

            //alert('Something went wrong..');

        })

}

});





$('#Edit_Web_Series_id').select2({

placeholder: 'Select Web Series',

minimumInputLength: 2,

ajax: {

    url: 'dashboard_api/get_notification_content_list.php',

    dataType: 'json',

    delay: 250,

    data: function (params) {

        var query = {

            search: params.term,

            type: 'web_series'

        }

        return query;

    },

    processResults: function (data) {

        return {

            results: data

        };

    },

    cache: true

}

});

$("#Edit_Web_Series_id").change(function () {

var Edit_Web_Series_id = $("#Edit_Web_Series_id option:selected").val();



var jsonObjects = {

    "ID": Edit_Web_Series_id

};



if (Edit_Web_Series_id != '' && Edit_Web_Series_id != null) {

    $.ajax({

            url: 'dashboard_api/get_single_webseries_details.php',

            type: 'POST',

            contentType: 'application/json',

            data: JSON.stringify(jsonObjects),

            dataType: 'json'

        })

        .done(function (response) {

            $("#Edit_cs_content_id").val(response.id);
            $("#Edit_cs_Banner").val(response.banner);
            $("#Edit_cs_Title").val(response.name);

        })

        .fail(function (response) {

            //alert('Something went wrong..');

        })

}

});




document.getElementById('add_cs_URL_div').setAttribute("hidden","");
document.getElementById('add_cs_Web_Series_div').setAttribute("hidden","");
$("#add_slider_type").change(function () {
    if($(this).val() == 0 || $(this).val() == 1) {
        document.getElementById('add_cs_URL_div').setAttribute("hidden","");
        if($(this).val() == 0) {
            document.getElementById('add_cs_Movie_div').removeAttribute("hidden");
            document.getElementById('add_cs_Web_Series_div').setAttribute("hidden","");
        } else if($(this).val() == 1) {
            document.getElementById('add_cs_Movie_div').setAttribute("hidden","");
            document.getElementById('add_cs_Web_Series_div').removeAttribute("hidden");
        }
    } else {
        document.getElementById('add_cs_Movie_div').setAttribute("hidden","");
        document.getElementById('add_cs_Web_Series_div').setAttribute("hidden","");
        document.getElementById('add_cs_URL_div').removeAttribute("hidden");
    }
});






$('#add_cs').click(function(){
    var add_cs_content_id = document.getElementById("add_cs_content_id").value;
    var add_slider_type = document.getElementById("add_slider_type").value;
    var add_cs_Title = document.getElementById("add_cs_Title").value;
    var add_cs_Banner = document.getElementById("add_cs_Banner").value;
    var add_cs_URL = document.getElementById("add_cs_URL").value;
    var add_cs_Status = document.getElementById("add_cs_Status").value;


    var jsonObjects = {
            "add_cs_content_id": add_cs_content_id,
            "add_slider_type": add_slider_type,
            "add_cs_Title": add_cs_Title,
            "add_cs_Banner": add_cs_Banner,
            "add_cs_URL": add_cs_URL,
            "add_cs_Status": add_cs_Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_cs.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            headers: {
                'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
            },
            success: function (response4) {
                if (response4 == "Custom Slider Added Successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Custom Slider Added Successfully!',
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
});

function Delete_cs(ID) {
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
                    url: "dashboard_api/delete_cs.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Custom Slider Deleted successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Custom Slider Deleted successfully!',
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


$('#Edit_cs').click(function(){
    var Edit_cs_id = document.getElementById("Edit_cs_id").value;
    var Edit_cs_content_id = document.getElementById("Edit_cs_content_id").value;
    var Edit_slider_type = document.getElementById("Edit_slider_type").value;
    var Edit_cs_Title = document.getElementById("Edit_cs_Title").value;
    var Edit_cs_Banner = document.getElementById("Edit_cs_Banner").value;
    var Edit_cs_URL = document.getElementById("Edit_cs_URL").value;
    var Edit_cs_Status = document.getElementById("Edit_cs_Status").value;


        var jsonObjects = {
            "Edit_cs_id": Edit_cs_id,
            "Edit_cs_content_id": Edit_cs_content_id,
            "Edit_slider_type": Edit_slider_type,
            "Edit_cs_Title": Edit_cs_Title,
            "Edit_cs_Banner": Edit_cs_Banner,
            "Edit_cs_URL": Edit_cs_URL,
            "Edit_cs_Status": Edit_cs_Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/edit_cs.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            headers: {
                'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
            },
            success: function (response4) {
                if (response4 == "Custom Slider Updated Successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Custom Slider Updated Successfully!',
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
});


document.getElementById('Edit_cs_URL_div').setAttribute("hidden","");
document.getElementById('Edit_cs_Web_Series_div').setAttribute("hidden","");
$("#Edit_slider_type").change(function () {
    if($(this).val() == 0 || $(this).val() == 1) {
        document.getElementById('Edit_cs_URL_div').setAttribute("hidden","");
        if($(this).val() == 0) {
            document.getElementById('Edit_cs_Movie_div').removeAttribute("hidden");
            document.getElementById('Edit_cs_Web_Series_div').setAttribute("hidden","");
        } else if($(this).val() == 1) {
            document.getElementById('Edit_cs_Movie_div').setAttribute("hidden","");
            document.getElementById('Edit_cs_Web_Series_div').removeAttribute("hidden");
        }
    } else {
        document.getElementById('Edit_cs_Movie_div').setAttribute("hidden","");
        document.getElementById('Edit_cs_Web_Series_div').setAttribute("hidden","");
        document.getElementById('Edit_cs_URL_div').removeAttribute("hidden");
    }

    $("#Edit_Movie_id").empty().trigger('change')
    $("#Edit_Web_Series_id").empty().trigger('change')
});

function load_cs_details(ID) {
    var jsonObjects = {
        "ID": ID
    };
    $.ajax({
        type: 'POST',
        url: "dashboard_api/get_cs_details.php",
        contentType: 'application/json',
        data: JSON.stringify(jsonObjects),
        dataType: 'json',
        headers: {
            'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
        },
        success: function (response) {
            if(response != "") {
                $("#Edit_cs_id").val(response.id);

                $("#Edit_slider_type").val(response.content_type);

                if (response.content_type == 0 || response.content_type == 1) {
                    document.getElementById('Edit_cs_URL_div').setAttribute("hidden", "");
                    if (response.content_type == 0) {
                        document.getElementById('Edit_cs_Movie_div').removeAttribute("hidden");
                        document.getElementById('Edit_cs_Web_Series_div').setAttribute("hidden", "");
                    } else if (response.content_type == 1) {
                        document.getElementById('Edit_cs_Movie_div').setAttribute("hidden", "");
                        document.getElementById('Edit_cs_Web_Series_div').removeAttribute("hidden");
                    }
                } else {
                    document.getElementById('Edit_cs_Movie_div').setAttribute("hidden", "");
                    document.getElementById('Edit_cs_Web_Series_div').setAttribute("hidden", "");
                    document.getElementById('Edit_cs_URL_div').removeAttribute("hidden");
                }
                
                $("#Edit_cs_Title").val(response.title);
                $("#Edit_cs_Banner").val(response.banner);
                $("#Edit_cs_content_id").val(response.content_id);
                $("#Edit_cs_URL").val(response.url);
                $("#Edit_cs_Status").val(response.status);


                
                var $Edit_Movie_id_option = $("<option selected></option>").val(response.content_id).text(response.title);
                $('#Edit_Movie_id').append($Edit_Movie_id_option).trigger('change');
                var $Edit_Web_Series_id_option = $("<option selected></option>").val(response.content_id).text(response.title);
                $('#Edit_Web_Series_id').append($Edit_Web_Series_id_option).trigger('change');
            
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