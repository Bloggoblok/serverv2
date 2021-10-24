<?php
 require '../db/config.php';
 $ID = $_GET['id']; 

session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <title>Dooo - Manage Movie Download Links</title>

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

                            <h4 class="font-size-18">Manage Movie Download Links</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Movies</a></li>

                                <li class="breadcrumb-item active">Manage Movie Download Links</li>

                            </ol>

                            <div class="col-md-12 row justify-content-end">
                                <a class="btn btn-sm btn-primary waves-effect" href="all_movies.php"> <span
                                        class="btn-label"><i class="fa fa-arrow-left"></i></span>Back To List</a>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- end page title -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Download links</h3>

                            </div>

                            <hr>

                            <div class="panel-body">
                                <input type="hidden" name="videos_id" value="615">
                                <div class="form-group"> <label class="control-label">Name</label>&nbsp;&nbsp;<input
                                        id="Label" type="text" name="label" class="form-control" placeholder="Name#1"
                                        required=""> </div>

                                <div class="form-group"> <label class="control-label">Order</label> <input id="Order"
                                        type="number" name="order" class="form-control" placeholder="0 to 9999"
                                        required=""> </div>

                                <div class="form-group"> <label class="control-label">Quality</label>&nbsp;&nbsp;<input
                                        id="Quality" type="text" name="label" class="form-control" placeholder="1080p"
                                        required=""> </div>

                                <div class="form-group"> <label class="control-label">Size</label>&nbsp;&nbsp;<input
                                        id="Size" type="text" name="label" class="form-control" placeholder="1.0GB"
                                        required=""> </div>

                                <div class="form-group"> <label class="control-label">Source</label> <select id="Source"
                                        class="form-control" name="source" id="selected-source">
                                        <option value="Custom">Custom</option>
                                        <option value="Mp4" selected="">Mp4</option>
                                        <option value="Mkv">Mkv</option>
                                        <option value="Youtube">Youtube</option>
                                        <option value="GoogleDrive">GoogleDrive</option>
                                        <option value="Onedrive">Onedrive</option>
                                        <option value="Yandex">Yandex</option>
                                        <option value="Vimeo">Vimeo</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="MP4Upload">MP4Upload</option>
                                        <option value="GooglePhotos">GooglePhotos</option>
                                        <option value="MediaFire">MediaFire</option>
                                        <option value="OKru">OK.ru</option>
                                        <option value="VK">VK</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Solidfiles">Solidfiles</option>
                                        <option value="Vidoza">Vidoza</option>
                                        <option value="UpToStream">UpToStream</option>
                                        <option value="Fansubs">Fansubs</option>
                                        <option value="Sendvid">Sendvid</option>
                                        <option value="Fembed">Fembed</option>
                                        <option value="Filerio">Filerio</option>
                                        <option value="Megaup">Megaup</option>
                                        <option value="GoUnlimited">GoUnlimited</option>
                                        <option value="Cocoscope">Cocoscope</option>
                                        <option value="Vidbm">Vidbm</option>
                                        <option value="Pstream">Pstream</option>
                                        <option value="vlare">vlare</option>
                                        <option value="StreamWiki">StreamWiki</option>
                                        <option value="Vivosx">Vivosx</option>
                                        <option value="BitTube">BitTube</option>
                                        <option value="VideoBin">VideoBin</option>
                                        <option value="4shared">4shared</option>
                                        <option value="StreamTape">StreamTape</option>
                                        <option value="vudeo">vudeo</option>
                                        <option value="Dropbox">Dropbox</option>
                                    </select> </div>
                                <div class="form-group" id="url-input"> <label class="control-label">Url</label>
                                    <input id="Url" type="text" name="url" id="url-input-field" value=""
                                        class="form-control" placeholder="https://server-1.com/movies/Avengers.mp4"
                                        required="">
                                </div>

                                <div class="form-group"> <label class="control-label">Download type</label> <select id="download_type"
                                        class="form-control" name="source" id="selected-source">
                                        <option value="Internal" selected="">Internal</option>
                                        <option value="External">External</option>
                                        </select></div>

                                <div class="form-group"> <label class="control-label">Status</label> <select id="Status"
                                        class="form-control" name="source" id="selected-source">
                                        <option value="Publish" selected="">Publish</option>
                                        <option value="Unpublish">Unpublish</option>
                                    </select><br> </div>


                                <div class="form-group col-md-12 row justify-content-end"> <button
                                        onclick="add_download_links()" class="btn btn-sm btn-primary waves-effect"
                                        type="submit"> <span class="btn-label"><i class="fa fa-plus"></i></span>Add
                                    </button> </div>
                            </div>


                            <div class="panel-heading">
                                <h3 class="panel-title">Download Link List</h3>

                            </div>
                            <br>
                            <div>

                                <table id="datatable" class="table table-striped"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>

                                        <tr>

                                            <th>#</th>

                                            <th>Source</th>

                                            <th>Order</th>

                                            <th>Name</th>

                                            <th>Quality</th>

                                            <th>Size</th>

                                            <th>Url</th>

                                            <th>Type</th>

                                            <th>Status</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>





                                    <tbody>
                                        <?php
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                     }
                                       $sql = "SELECT * FROM movie_download_links WHERE movie_id = $ID ORDER BY link_order";
                                       $result = $conn->query($sql);
                                 
                                        $conn->close();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $int_table_id = 1;
                                           while($row = $result->fetch_assoc()) {
                                               ?>
                                        <tr>
                                            <th><?php echo($int_table_id); ?></th>
                                            <td><?php echo stripslashes($row["type"]); ?></td>
                                            <td><?php echo stripslashes($row["link_order"]); ?></td>
                                            <td><?php echo stripslashes($row["name"]); ?></td>
                                            <td><?php echo stripslashes($row["quality"]); ?></td>
                                            <td><?php echo stripslashes($row["size"]); ?></td>
                                            <td><?php echo wordwrap($row["url"],60,"<br>\n",TRUE); ?></td>
                                            <td><?php echo stripslashes($row["download_type"]); ?></td>

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
                                                            onclick="Load_Link_Data(<?php echo($Row_ID); ?>)"
                                                            data-toggle="modal"
                                                            data-target="#Movie_Link_Edit_Modal">Edit
                                                            Link</a>

                                                        <a class="dropdown-item" id="Delete"
                                                            onclick="Delete_DownloadLink(<?php echo($Row_ID); ?>)">Delete</a>

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

                <!-- Modal -->
                <div class="modal fade" id="Movie_Link_Edit_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Movie_Link_Edit_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Movie_Link_Edit_Modal_Lebel">Edit Link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <input type="hidden" id="modal_videos_id" name="modal_videos_id" value="000">
                                    <div class="form-group"> <label
                                            class="control-label">Name</label>&nbsp;&nbsp;<input id="modal_Label"
                                            type="text" name="label" class="form-control" placeholder="Name#1"
                                            required=""> </div>

                                    <div class="form-group"> <label class="control-label">Order</label> <input
                                            id="modal_Order" type="number" name="order" class="form-control"
                                            placeholder="0 to 9999" required=""> </div>

                                    <div class="form-group"> <label
                                            class="control-label">Quality</label>&nbsp;&nbsp;<input id="modal_Quality"
                                            type="text" name="label" class="form-control" placeholder="1080p"
                                            required=""> </div>

                                    <div class="form-group"> <label class="control-label">Size</label>&nbsp;&nbsp;<input
                                            id="modal_Size" type="text" name="label" class="form-control"
                                            placeholder="1.0GB" required=""> </div>

                                    <div class="form-group"> <label class="control-label">Source</label> <select id="modal_Source"
                                        class="form-control" name="modal_Source" id="selected-source">
                                        <option value="Custom">Custom</option>
                                        <option value="Mp4" selected="">Mp4</option>
                                        <option value="Mkv">Mkv</option>
                                        <option value="Youtube">Youtube</option>
                                        <option value="GoogleDrive">GoogleDrive</option>
                                        <option value="Onedrive">Onedrive</option>
                                        <option value="Yandex">Yandex</option>
                                        <option value="Vimeo">Vimeo</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="MP4Upload">MP4Upload</option>
                                        <option value="GooglePhotos">GooglePhotos</option>
                                        <option value="MediaFire">MediaFire</option>
                                        <option value="OKru">OK.ru</option>
                                        <option value="VK">VK</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="Solidfiles">Solidfiles</option>
                                        <option value="Vidoza">Vidoza</option>
                                        <option value="UpToStream">UpToStream</option>
                                        <option value="Fansubs">Fansubs</option>
                                        <option value="Sendvid">Sendvid</option>
                                        <option value="Fembed">Fembed</option>
                                        <option value="Filerio">Filerio</option>
                                        <option value="Megaup">Megaup</option>
                                        <option value="GoUnlimited">GoUnlimited</option>
                                        <option value="Cocoscope">Cocoscope</option>
                                        <option value="Vidbm">Vidbm</option>
                                        <option value="Pstream">Pstream</option>
                                        <option value="vlare">vlare</option>
                                        <option value="StreamWiki">StreamWiki</option>
                                        <option value="Vivosx">Vivosx</option>
                                        <option value="BitTube">BitTube</option>
                                        <option value="VideoBin">VideoBin</option>
                                        <option value="4shared">4shared</option>
                                        <option value="StreamTape">StreamTape</option>
                                        <option value="vudeo">vudeo</option>
                                        <option value="Dropbox">Dropbox</option>
                                    </select> </div>

                                    <div class="form-group" id="url-input"> <label class="control-label">Url</label>
                                        <input id="modal_Url" type="text" name="url" value="" class="form-control"
                                            placeholder="https://server-1.com/movies/Avengers.mp4" required="">
                                    </div>

                                    <div class="form-group"> <label class="control-label">Download type</label> <select id="modal_download_type"
                                        class="form-control" name="modal_download_type" id="selected-source">
                                        <option value="Internal" selected="">Internal</option>
                                        <option value="External">External</option>
                                        </select></div>

                                    <div class="form-group"> <label class="control-label">Status</label> <select
                                            id="modal_Status" class="form-control" name="source">
                                            <option value="Publish" selected="">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select><br> </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Update_Link_Data()" class="btn btn-primary">Save
                                    changes</button>
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

    function add_download_links() {
        var Label = document.getElementById("Label").value;
        var Order = document.getElementById("Order").value;
        var Quality = document.getElementById("Quality").value;
        var Size = document.getElementById("Size").value;
        var Source = document.getElementById("Source").value;
        var Url = document.getElementById("Url").value;
        var download_type = document.getElementById("download_type").value;


        var Status_Txt = document.getElementById("Status").value;
        if (Status_Txt == "Publish") {
            var Status = "1";
        } else if (Status_Txt == "Unpublish") {
            var Status = "0";
        }

        var jsonObjects = {
            "Movie_id": "<?php echo $ID; ?>",
            "Label": Label,
            "Order": Order,
            "Quality": Quality,
            "Size": Size,
            "Source": Source,
            "Url": Url,
            "download_type": download_type,
            "Status": Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_movie_download_links.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response2) {
                if (response2 == "Link Added Successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Download Link Added Successfully!',
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

    function Load_Link_Data(ID) {
        var jsonObjects = {
            "ID": ID
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/get_movie_download_link_details.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'json',
            success: function (response4) {
                var id = response4.id;
                var Label = response4.name;
                var Order = response4.link_order;
                var Quality = response4.quality;
                var Size = response4.size;
                var Source = response4.type;
                var Url = response4.url;
                var Status = response4.status;
                var download_type = response4.download_type;

                if (!id == "") {
                    $("#modal_videos_id").val(id);
                    $("#modal_Label").val(Label);
                    $("#modal_Order").val(Order);
                    $("#modal_Quality").val(Quality);
                    $("#modal_Size").val(Size);
                    $("#modal_Source").val(Source);
                    $("#modal_Url").val(Url);
                    $("#modal_download_type").val(download_type);

                    if (Status == "1") {
                        $("#modal_Status").val("Publish");
                    } else if (Status == "0") {
                        $("#modal_Status").val("Unpublish");
                    }
                }
            }
        });
    }

    function Update_Link_Data() {
        var modal_videos_id = document.getElementById("modal_videos_id").value;
        var Label = document.getElementById("modal_Label").value;
        var Order = document.getElementById("modal_Order").value;
        var Quality = document.getElementById("modal_Quality").value;
        var Size = document.getElementById("modal_Size").value;
        var Source = document.getElementById("modal_Source").value;
        var Url = document.getElementById("modal_Url").value;
        var download_type = document.getElementById("modal_download_type").value;


        var Status_Txt = document.getElementById("modal_Status").value;
        if (Status_Txt == "Publish") {
            var Status = "1";
        } else if (Status_Txt == "Unpublish") {
            var Status = "0";
        }

        var jsonObjects = {
            "ID": modal_videos_id,
            "Label": Label,
            "Order": Order,
            "Quality": Quality,
            "Size": Size,
            "Source": Source,
            "Url": Url,
            "download_type": download_type,
            "Status": Status

        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/update_movie_download_link_data.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response5) {
                if (response5 == "Link Data Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Download Link Updated Successfully!',
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

    function Delete_DownloadLink(ID) {
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
                    url: "dashboard_api/delete_download_link.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    success: function (response) {
                        if (response == "Link Deleted successfully") {
                            Success();
                        } else {
                            Error();
                        }

                    }
                });
            }
        });
    }

    function Success() {
        swal.fire({
            title: 'Successful!',
            text: 'Download Link Deleted Successfully!',
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