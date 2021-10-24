<?php
 require '../db/config.php';
 $ID = $_GET['id']; 
 $ct = $_GET['ct']; 

session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$resultat = $bdd->query("SELECT * FROM movie_play_links WHERE id = $ID");
$resultat->setFetchMode(PDO::FETCH_OBJ);
while( $Data = $resultat->fetch() ) 
{
    $name = $Data->name;
}
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <title>Dooo - Subtitle Manager</title>

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



<!-- Begin page -->

<div id="layout-wrapper">





    <?php include 'layouts/topbar.php'; ?>

    <div class="main-content">



        <div class="page-content">

            <div class="container-fluid">



                <!-- start page title -->

                <div class="row align-items-center">

                    <div class="col-sm-12">

                        <div class="page-title-box">

                            <h4 class="font-size-18">Subtitle Manager</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contents</a></li>

                                <li class="breadcrumb-item active">Subtitle Manager</li>

                            </ol>

                            <div class="col-md-12 row justify-content-end">
                                <a class="btn btn-sm btn-primary waves-effect" onClick="history.go(-1);"> <span
                                        class="btn-label"><i class="fa fa-arrow-left"></i></span> Back</a>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- end page title -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                <div>
                                    <h4 class="mb-3 mb-md-0">Subtitle Manager  <?php echo "($name)"; ?></h4>
                                </div>
                                <div class="d-flex align-items-center flex-wrap text-nowrap">
                                    <div class="panel-heading">
                                        <button data-toggle="modal" data-target="#Add_Subtitle_Modal" id="Add_Subtitle"
                                            class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                class="btn-label"><i class="fa fa-plus"></i></span> Add
                                            Subtitle</button>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div>

                                <table id="datatable" class="table table-striped"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Language</th>

                                            <th>Subtitle Url</th>

                                            <th>Mime Type</th>

                                            <th>Status</th>

                                            <th>Options</th>

                                        </tr>

                                    </thead>


                                    <tbody>
                                        <?php
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                     }
                                       $sql = "SELECT * FROM subtitles WHERE content_id = $ID AND content_type = $ct ORDER BY id DESC";
                                       $result = $conn->query($sql);
                                 
                                        $conn->close();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $int_table_id = 1;
                                           while($row = $result->fetch_assoc()) {
                                               ?>
                                        <tr>
                                            <th><?php echo($int_table_id); ?></th>
                                            <td><?php echo stripslashes($row["language"]); ?></td>
                                            <td><?php echo wordwrap($row["subtitle_url"],60,"<br>\n",TRUE); ?></td>
                                            <td><?php echo stripslashes($row["mime_type"]); ?></td>

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

                                            <td>

                                                <div class="btn-group mr-1 mt-2">
                                                    <?php $Row_ID = $row["id"]; ?>

                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Edit</button>

                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item"
                                                            onclick="Load_Subtitle_Data(<?php echo($Row_ID); ?>)"
                                                            data-toggle="modal"
                                                            data-target="#Edit_Subtitle_Modal">Edit
                                                            Subtitle</a>
                                                        <a class="dropdown-item" id="Delete"
                                                            onclick="Delete_Subtitle(<?php echo($Row_ID); ?>)">Delete</a>

                                                    </div>

                                                </div>

                                            </td>



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
                </div>

                <!-- Add Modal -->
                <div class="modal fade" id="Add_Subtitle_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Movie_Link_Edit_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Movie_Link_Edit_Modal_Lebel">Add Subtitle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <div class="form-group"> <label
                                            class="control-label">Language</label>&nbsp;&nbsp;<input id="modal_add_Language"
                                            type="text" name="label" class="form-control" placeholder=""
                                            required=""> </div>

                                    <div class="form-group"> <label
                                            class="control-label">Subtitle Url</label>&nbsp;&nbsp;<input id="modal_add_Subtitle_url"
                                            type="text" name="label" class="form-control" placeholder=""
                                            required=""> </div>


                                        <div class="form-group"> <label class="control-label">Mime Type</label> <select
                                            id="modal_add_Mimetype" class="form-control" name="Mimetype" id="selected-source">
                                            <option value="WebVTT">WebVTT</option>
                                            <option value="TTML">TTML</option>
                                            <option value="SMPTE-TT">SMPTE-TT</option>
                                            <option value="SubRip">SubRip</option>
                                            <option value="SubStationAlpha-SSA">SubStationAlpha-SSA</option>
                                            <option value="SubStationAlpha-ASS">SubStationAlpha-ASS</option>
                                        </select> </div>

                                    <div class="form-group"> <label class="control-label">Status</label> <select
                                            id="modal_Add_Status" class="form-control" name="source">
                                            <option value="Publish" selected="">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select> </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Add_Subtitle()" class="btn btn-primary">Add
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="Edit_Subtitle_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Movie_Link_Edit_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Movie_Link_Edit_Modal_Lebel">Edit Subtitle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <input type="hidden" id="edit_subtitle_id" name="edit_subtitle_id" value="000">

                                    <div class="form-group"> <label
                                            class="control-label">Language</label>&nbsp;&nbsp;<input id="modal_edit_Language"
                                            type="text" name="label" class="form-control" placeholder=""
                                            required=""> </div>

                                    <div class="form-group"> <label
                                            class="control-label">Subtitle Url</label>&nbsp;&nbsp;<input id="edit_subtitle_url"
                                            type="text" name="label" class="form-control" placeholder=""
                                            required=""> </div>


                                        <div class="form-group"> <label class="control-label">Mime Type</label> <select
                                            id="modal_edit_mimetype" class="form-control" name="Language" id="selected-source">
                                            <option value="WebVTT">WebVTT</option>
                                            <option value="TTML">TTML</option>
                                            <option value="SMPTE-TT">SMPTE-TT</option>
                                            <option value="SubRip">SubRip</option>
                                            <option value="SubStationAlpha-SSA">SubStationAlpha-SSA</option>
                                            <option value="SubStationAlpha-ASS">SubStationAlpha-ASS</option>
                                        </select> </div>

                                    <div class="form-group"> <label class="control-label">Status</label> <select
                                            id="modal_edit_Status" class="form-control" name="source">
                                            <option value="Publish" selected="">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select> </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Update_Subtitle_Data()" class="btn btn-primary">Update
                                    </button>
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


<!--Tempus Dominus-->
<script type="text/javascript" src="public/libs/Tempus Dominus/moment.min.js"></script>
<script src="public/libs/Tempus Dominus/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="public/libs/Tempus Dominus/tempusdominus-bootstrap-4.min.css" />


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
    $('#datatable').dataTable({
        "order": [],
        "ordering": false,
        "paging": false,
        "info": false,
        "filter": false,
        "pageLength": 100
    });

    function Add_Subtitle() {
        var modal_add_Language = document.getElementById("modal_add_Language").value;
        var modal_add_Subtitle_url = document.getElementById("modal_add_Subtitle_url").value;
        var modal_add_Mimetype = document.getElementById("modal_add_Mimetype").value;

        var modal_Add_Status = document.getElementById("modal_Add_Status").value;
        if (modal_Add_Status == "Publish") {
            var Status_int = "1";
        } else if (modal_Add_Status == "Unpublish") {
            var Status_int = "0";
        }

        var jsonObjects = {
            "content_id": "<?php echo $ID; ?>",
            "content_type": "<?php echo $ct; ?>",
            "modal_add_Language": modal_add_Language,
            "modal_add_Subtitle_url": modal_add_Subtitle_url,
            "modal_add_Mimetype": modal_add_Mimetype,
            "Status_int": Status_int
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_subtitle.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response2) {
                if (response2 == "Subtitle Added Successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Subtitle Added Successfully!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#556ee6',
                        cancelButtonColor: "#f46a6a"
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    ErrorResponse();
                }
            }
        });
    }

    function Load_Subtitle_Data(ID) {
        var jsonObjects = {
            "ID": ID
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/get_subtitle_details.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'json',
            success: function (response1) {
                var id = response1.id;
                var language = response1.language;
                var subtitle_url = response1.subtitle_url;
                var mime_type = response1.mime_type;
                var status = response1.status;

                if (!id == "") {
                    $("#edit_subtitle_id").val(id);
                    $("#modal_edit_Language").val(language);
                    $("#edit_subtitle_url").val(subtitle_url);
                    $("#modal_edit_mimetype").val(mime_type);
                    if (status == "1") {
                        $("#modal_edit_Status").val("Publish");
                    } else if (status == "0") {
                        $("#modal_edit_Status").val("Unpublish");
                    }
                }
            }
        });
    }

    function Update_Subtitle_Data() {
        var edit_subtitle_id = document.getElementById("edit_subtitle_id").value;
        var modal_edit_Language = document.getElementById("modal_edit_Language").value;
        var edit_subtitle_url = document.getElementById("edit_subtitle_url").value;
        var modal_edit_mimetype = document.getElementById("modal_edit_mimetype").value;

        var Status_Txt = document.getElementById("modal_edit_Status").value;
        if (Status_Txt == "Publish") {
            var Status = "1";
        } else if (Status_Txt == "Unpublish") {
            var Status = "0";
        }

        var jsonObjects = {
            "edit_subtitle_id": edit_subtitle_id,
            "modal_edit_Language": modal_edit_Language,
            "edit_subtitle_url": edit_subtitle_url,
            "modal_edit_mimetype": modal_edit_mimetype,
            "Status": Status

        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/update_subtitle.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response5) {
                if (response5 == "Subtitle Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Subtitle Updated Successfully!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#556ee6',
                        cancelButtonColor: "#f46a6a"
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    ErrorResponse();
                }
            }
        });
    }

    function Delete_Subtitle(ID) {
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
                    url: "dashboard_api/delete_subtitle.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    success: function (response) {
                        if (response == "Subtitle Deleted successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Subtitle Deleted Successfully!',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function () {
                                location.reload();
                            });
                        } else {
                            ErrorResponse();
                        }

                    }
                });
            }
        });
    }

    function ErrorResponse() {
        swal.fire({
            title: 'Error',
            text: 'Something Went Wrong :(',
            type: 'error'
        }).then(function () {
            location.reload();
        });
    }
</script>