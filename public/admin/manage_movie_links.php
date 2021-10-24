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

    <title>Dooo - Manage Movie Links</title>

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

                            <h4 class="font-size-18">Manage Movie Links</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Movie Links</a></li>

                                <li class="breadcrumb-item active">Manage Movie Links</li>

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
                                <h3 class="panel-title">Add Videos</h3>

                            </div>

                            <hr>

                            <div class="panel-body">
                                <input type="hidden" name="videos_id" value="615">
                                <div class="form-group"> <label class="control-label">Label</label>&nbsp;&nbsp;<input
                                        id="Label" type="text" name="label" class="form-control" placeholder="Server#1"
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
                                        <option value="Youtube">Youtube</option>
                                        <option value="Mp4" selected="">Mp4 From Url</option>
                                        <option value="Mkv">Mkv From Url</option>
                                        <option value="M3u8">M3u8 From Url</option>
                                        <option value="Dash">Dash From Url</option>
                                        <option value="Embed">Embed Url</option>
                                        <option value="GoogleDrive">GoogleDrive</option>
                                        <option value="Onedrive">Onedrive</option>
                                        <option value="Yandex">Yandex</option>
                                        <option value="Dropbox">Dropbox</option>
                                        <option value="Racaty">Racaty</option>
                                        <option value="ZippyShare">ZippyShare</option>
                                        <option value="Cinematic">Cinematic</option>
                                        <option value="TubiTV">TubiTV</option>
                                        <option value="Vimeo">Vimeo</option>
                                        <option value="Dailymotion">Dailymotion</option>
                                        <option value="Facebook">Facebook</option>
                                        <option value="GoFile">GoFile</option>
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
                                        <option value="vudeo">vudeo</option>
                                        <option value="StreamTape">StreamTape</option>
                                        <option value="DoodStream">DoodStream</option>
                                        <option value="StreamSB">StreamSB</option>
                                        <option value="Voesx">Voesx</option>
                                    </select> </div>
                                <div class="form-group" id="url-input"> <label class="control-label">Url</label>
                                    <input id="Url" type="text" name="url" id="url-input-field" value=""
                                        class="form-control" placeholder="https://server-1.com/movies/Avengers.mp4"
                                        required="">
                                </div>

                                <div class="form-group"> <label class="control-label">Status</label> <select id="Status"
                                        class="form-control" name="source" id="selected-source">
                                        <option value="Publish" selected="">Publish</option>
                                        <option value="Unpublish">Unpublish</option>
                                    </select> </div>

                                    <div class="form-group"> <label class="control-label">Type</label> <select
                                            id="Type" class="form-control" name="type">
                                            <option value="Free" selected="">Free</option>
                                            <option value="Premium">Premium</option>
                                        </select><br> </div>

                                <div class="form-group row">
                                    <label class="control-label col-sm-2 ">Intro Skip Avaliable?</label>
                                    <div class="col-sm-6">
                                        <input type="checkbox" id="skip_available" switch="bool">
                                        <label for="skip_available" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                </div>

                                <div class="form-group"> <label class="control-label">Intro Start</label>
                                    <div class="input-group date col-5" data-target-input="nearest">
                                        <input type="text" id="intro_start" class="form-control datetimepicker-input"
                                            data-target="#intro_start" placeholder="HH:MM:SS" />
                                        <div class="input-group-append" data-target="#intro_start"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"> <label class="control-label">Intro End</label>
                                    <div class="input-group date col-5" data-target-input="nearest">
                                        <input type="text" id="intro_end" class="form-control datetimepicker-input"
                                            data-target="#intro_end" placeholder="HH:MM:SS" />
                                        <div class="input-group-append" data-target="#intro_end"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-12 row justify-content-end"> <button
                                        onclick="add_movie_links()" class="btn btn-sm btn-primary waves-effect"
                                        type="submit"> <span class="btn-label"><i class="fa fa-plus"></i></span>Add
                                    </button> </div>
                            </div>


                            <div class="panel-heading">
                                <h3 class="panel-title">Video List</h3>

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

                                            <th>Label</th>

                                            <th>Quality</th>

                                            <th>Size</th>

                                            <th>Url</th>

                                            <th>Status</th>

                                            <th>Type</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>





                                    <tbody>
                                        <?php
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                     }
                                       $sql = "SELECT * FROM movie_play_links WHERE movie_id = $ID ORDER BY link_order";
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

                                            <?php
                                            if($row["link_type"] == 0) {
                                                ?>
                                            <td><span>Free</span></td>
                                            <?php
                                            }
                                            if($row["link_type"] == 1) {
                                                ?>
                                            <td><span>Premium</span></td>
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
                                                            onclick="Manage_Subtitle(<?php echo($Row_ID); ?>)">Manage Subtitle</a>

                                                        <a class="dropdown-item" id="Delete"
                                                            onclick="Delete_StreamLink(<?php echo($Row_ID); ?>)">Delete</a>

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
                                            class="control-label">Label</label>&nbsp;&nbsp;<input id="modal_Label"
                                            type="text" name="label" class="form-control" placeholder="Server#1"
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

                                    <div class="form-group"> <label class="control-label">Source</label> <select
                                            id="modal_Source" class="form-control" name="source" id="selected-source">
                                            <option value="Youtube">Youtube</option>
                                            <option value="Mp4" selected="">Mp4 From Url</option>
                                            <option value="Mkv">Mkv From Url</option>
                                            <option value="M3u8">M3u8 From Url</option>
                                            <option value="Dash">Dash From Url</option>
                                            <option value="Embed">Embed Url</option>
                                            <option value="GoogleDrive">GoogleDrive</option>
                                            <option value="Onedrive">Onedrive</option>
                                            <option value="Yandex">Yandex</option>
                                            <option value="Dropbox">Dropbox</option>
                                            <option value="Racaty">Racaty</option>
                                            <option value="ZippyShare">ZippyShare</option>
                                            <option value="Cinematic">Cinematic</option>
                                            <option value="TubiTV">TubiTV</option>
                                            <option value="Vimeo">Vimeo</option>
                                            <option value="Dailymotion">Dailymotion</option>
                                            <option value="Facebook">Facebook</option>
                                            <option value="GoFile">GoFile</option>
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
                                            <option value="vudeo">vudeo</option>
                                            <option value="StreamTape">StreamTape</option>
                                            <option value="DoodStream">DoodStream</option>
                                            <option value="StreamSB">StreamSB</option>
                                            <option value="Voesx">Voesx</option>
                                        </select> </div>
                                    <div class="form-group" id="url-input"> <label class="control-label">Url</label>
                                        <input id="modal_Url" type="text" name="url" value="" class="form-control"
                                            placeholder="https://server-1.com/movies/Avengers.mp4" required="">
                                    </div>

                                    <div class="form-group"> <label class="control-label">Status</label> <select
                                            id="modal_Status" class="form-control" name="source">
                                            <option value="Publish" selected="">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select> </div>

                                        <div class="form-group"> <label class="control-label">Type</label> <select
                                            id="modal_Type" class="form-control" name="type">
                                            <option value="Free" selected="">Free</option>
                                            <option value="Premium">Premium</option>
                                        </select><br> </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-4 ">Intro Skip Avaliable?</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="modal_skip_available" switch="bool">
                                            <label for="modal_skip_available" data-on-label="Yes"
                                                data-off-label="No"></label>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label class="control-label">Intro Start</label>
                                        <div class="input-group date col-10" data-target-input="nearest">
                                            <input type="text" id="modal_intro_start"
                                                class="form-control datetimepicker-input"
                                                data-target="#modal_intro_start" placeholder="HH:MM:SS" />
                                            <div class="input-group-append" data-target="#modal_intro_start"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label class="control-label">Intro End</label>
                                        <div class="input-group date col-10" data-target-input="nearest">
                                            <input type="text" id="modal_intro_end"
                                                class="form-control datetimepicker-input" data-target="#modal_intro_end"
                                                placeholder="HH:MM:SS" />
                                            <div class="input-group-append" data-target="#modal_intro_end"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
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

<script type="text/javascript">
    $(function () {
        $('#intro_start').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true,

        });
        $('#intro_end').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true
        });
        $('#modal_intro_start').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true
        });
        $('#modal_intro_end').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true
        });
    });
</script>
<script>
    $('#datatable').dataTable({
        "order": [],
        "ordering": false,
        "paging": false,
        "info": false,
        "filter": false,
        "pageLength": 100
    });

    function add_movie_links() {
        var Label = document.getElementById("Label").value;
        var Order = document.getElementById("Order").value;
        var Quality = document.getElementById("Quality").value;
        var Size = document.getElementById("Size").value;
        var Source = document.getElementById("Source").value;
        var Url = document.getElementById("Url").value;


        var Status_Txt = document.getElementById("Status").value;
        if (Status_Txt == "Publish") {
            var Status = "1";
        } else if (Status_Txt == "Unpublish") {
            var Status = "0";
        }

        var Type_Txt = document.getElementById("Type").value;
        if (Type_Txt == "Premium") {
            var Type = "1";
        } else if (Type_Txt == "Free") {
            var Type = "0";
        }

        if ($('#skip_available').is(':checked')) {
            var skip_available_Count = 1;
        } else {
            var skip_available_Count = 0;
        }
        var intro_start = document.getElementById('intro_start').value;
        var intro_end = document.getElementById('intro_end').value;

        var jsonObjects = {
            "Movie_id": "<?php echo $ID; ?>",
            "Label": Label,
            "Order": Order,
            "Quality": Quality,
            "Size": Size,
            "Source": Source,
            "Url": Url,
            "Status": Status,
            "skip_available_Count": skip_available_Count,
            "intro_start": intro_start,
            "intro_end": intro_end,
            "link_type": Type
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_movie_links.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response2) {
                if (response2 == "Link Added Successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Movie Link Added Successfully!',
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
            url: "dashboard_api/get_movie_link_details.php",
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
                var skip_available = response4.skip_available;
                var intro_start = response4.intro_start;
                var intro_end = response4.intro_end;
                var link_type = response4.link_type;

                if (!id == "") {
                    $("#modal_videos_id").val(id);
                    $("#modal_Label").val(Label);
                    $("#modal_Order").val(Order);
                    $("#modal_Quality").val(Quality);
                    $("#modal_Size").val(Size);
                    $("#modal_Source").val(Source);
                    $("#modal_Url").val(Url);

                    if (Status == "1") {
                        $("#modal_Status").val("Publish");
                    } else if (Status == "0") {
                        $("#modal_Status").val("Unpublish");
                    }

                    if (link_type == "1") {
                        $("#modal_Type").val("Premium");
                    } else if (link_type == "0") {
                        $("#modal_Type").val("Free");
                    }

                    if (skip_available == "1") {
                        $('#modal_skip_available').attr('checked', true);
                    } else if (skip_available == "0") {
                        $('#modal_skip_available').attr('checked', false);
                    }

                    $("#modal_intro_start").data("datetimepicker").date(intro_start);
                    $("#modal_intro_end").data("datetimepicker").date(intro_end);
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


        var Status_Txt = document.getElementById("modal_Status").value;
        if (Status_Txt == "Publish") {
            var Status = "1";
        } else if (Status_Txt == "Unpublish") {
            var Status = "0";
        }

        var Type_Txt = document.getElementById("modal_Type").value;
        if (Type_Txt == "Premium") {
            var modal_Type = "1";
        } else if (Type_Txt == "Free") {
            var modal_Type = "0";
        }

        if ($('#modal_skip_available').is(':checked')) {
            var modal_skip_available_Count = 1;
        } else {
            var modal_skip_available_Count = 0;
        }
        var modal_intro_start = document.getElementById('modal_intro_start').value;
        var modal_intro_end = document.getElementById('modal_intro_end').value;

        var jsonObjects = {
            "ID": modal_videos_id,
            "Label": Label,
            "Order": Order,
            "Quality": Quality,
            "Size": Size,
            "Source": Source,
            "Url": Url,
            "Status": Status,
            "modal_skip_available_Count": modal_skip_available_Count,
            "modal_intro_start": modal_intro_start,
            "modal_intro_end": modal_intro_end,
            "link_type": modal_Type

        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/update_movie_link_data.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response5) {
                if (response5 == "Link Data Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Movie Link Updated Successfully!',
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

    function Delete_StreamLink(ID) {
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
                    url: "dashboard_api/delete_movie_link_api.php",
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
            text: 'Movie Link Deleted Successfully!',
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

    function Manage_Subtitle(ID) {
        window.location.assign("subtitle_manager.php?id="+ID+"&ct="+1);
    }
</script>