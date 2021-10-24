<?php
 require '../db/config.php';
 $ID = $_GET['id']; 

session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$resultat = $bdd->query("SELECT * FROM web_series_seasons WHERE id = $ID");
$resultat->setFetchMode(PDO::FETCH_OBJ);
while( $Data = $resultat->fetch() ) 
{
    $web_series_id = $Data->web_series_id;
    $Session_Name = $Data->Session_Name;
}
$resultat2 = $bdd->query("SELECT * FROM web_series WHERE id = $web_series_id");
$resultat2->setFetchMode(PDO::FETCH_OBJ);
while( $Data2 = $resultat2->fetch() ) 
{
    $name = $Data2->name;
}
?>

<!doctype html>

<html lang="en">



<head>

    <meta charset="utf-8" />

    <title>Dooo - Manage Episodes</title>

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

    <!-- Bootstrap Css -->
    <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/headerStyle.php'; ?>

</head>



<?php include 'layouts/master.php'; echo setLayout();?>


<body onload="javascript:On_Load()">
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

                            <h4 class="font-size-18">Manage Episodes</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Episodes</a></li>

                                <li class="breadcrumb-item active">Manage Episodes</li>

                            </ol>

                            <div class="col-md-12 row justify-content-end">
                                <a class="btn btn-sm btn-primary waves-effect" href="all_web_series.php"> <span
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

                                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                                    <div>
                                        <h4 class="mb-3 mb-md-0"><?php echo $name." - ".$Session_Name; ?></h4>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                                        <div class="panel-heading">
                                            <button data-toggle="modal" data-target="#Add_Episode_Modal" id="Add_Season"
                                                class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                    class="btn-label"><i class="fa fa-plus"></i></span>Add
                                                Episode</button>
                                            <button data-toggle="modal" data-toggle="modal" data-target="#Add_Season_no_Modal"
                                                class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                    class="btn-label"><i class="mdi mdi-ballot-recount"></i></span>
                                                Fetch All Episodes</button>
                                        </div>
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

                                            <th>Action</th>

                                            <th>Thumbnail</th>

                                            <th>Episodes Name</th>

                                            <th>Description</th>

                                            <th>Source</th>

                                            <th>Order</th>

                                            <th>Url</th>

                                            <th>Downloadable</th>

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
                                       $sql = "SELECT * FROM web_series_episoade WHERE season_id = $ID ORDER BY episoade_order";
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

                                                <div class="btn-group mr-1 mt-2">

                                                    <?php $Row_ID = $row["id"]; ?>

                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Edit</button>

                                                    <div class="dropdown-menu" style="">

                                                        <a class="dropdown-item"
                                                            onclick="Load_Episode_Data(<?php echo($Row_ID); ?>)"
                                                            data-toggle="modal" data-target="#Edit_Episode_Modal">Edit
                                                            Episode</a>

                                                        <a class="dropdown-item"
                                                            onclick="Manage_Downloads(<?php echo($Row_ID); ?>)">Manage Downloads</a>

                                                        <a class="dropdown-item" id="Delete"
                                                            onclick="Manage_Subtitle(<?php echo($Row_ID); ?>)">Manage Subtitle</a>

                                                        <a class="dropdown-item"
                                                            onclick="Delete_Episode(<?php echo($Row_ID); ?>)">Delete</a>

                                                    </div>

                                                </div>

                                            </td>
                                            <td>

                                                <div>

                                                    <img class="img-fluid" height="100" width="80"
                                                        src=<?php echo $row["episoade_image"]; ?>
                                                        data-holder-rendered="true">

                                                </div>

                                            </td>
                                            <td><?php echo stripslashes($row["Episoade_Name"]); ?></td>
                                            <td><?php echo wordwrap(stripslashes($row["episoade_description"]),20,"<br>\n",TRUE); ?></td>
                                            <td><?php echo stripslashes($row["source"]); ?></td>
                                            <td><?php echo stripslashes($row["episoade_order"]); ?></td>
                                            <td><?php echo wordwrap($row["url"],40,"<br>\n",TRUE); ?></td>
                                            <td>
                                                <?php
                                              if($row["downloadable"] == "0") {
                                                  ?>
                                                <span class="badge badge-danger">No</span>
                                                <?php
                                              } else if($row["downloadable"] == "1") {
                                                ?>
                                                <span class="badge badge-success">Yes</span>
                                                <?php
                                              }
                                              ?>
                                            </td>
                                            <td>
                                                <?php
                                              if($row["type"] == "0") {
                                                  ?>
                                                <span class="badge badge-danger">Not Premium</span>
                                                <?php
                                              } else if($row["type"] == "1") {
                                                ?>
                                                <span class="badge badge-success">Premium</span>
                                                <?php
                                              }
                                              ?>
                                            </td>
                                            <td>
                                                <?php
                                              if($row["status"] == "0") {
                                                  ?>
                                                <span class="badge badge-danger">Not Released</span>
                                                <?php
                                              } else if($row["status"] == "1") {
                                                ?>
                                                <span class="badge badge-success">Released</span>
                                                <?php
                                              }
                                              ?>
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

                <!-- Add Episode Modal -->
                <div class="modal fade" id="Add_Episode_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Add_Episode_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Add_Episode_Modal_Lebel">Edit Link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <input type="hidden" id="modal_videos_id" name="modal_videos_id" value="000">
                                    <div class="form-group"> <label class="control-label">Episodes
                                            Name</label>&nbsp;&nbsp;<input id="modal_Episodes_Name" type="text"
                                            name="label" class="form-control" placeholder="Episode 1" required="">
                                    </div>
                                    <div class="form-group"> <label class="control-label">Thumbnail
                                            Url</label>&nbsp;&nbsp;<input id="modal_Thumbnail" type="text" name="label"
                                            class="form-control" placeholder="" required=""> </div>
                                    <div class="form-group"> <label class="control-label">Order</label> <input
                                            id="modal_Order" type="number" name="order" class="form-control"
                                            placeholder="0 to 9999" required=""> </div>
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

                                    <div class="form-group">
                                        <label>Description</label>
                                        <div>
                                            <textarea required="" class="form-control col-md-9" id="modal_Description"
                                                rows="5" spellcheck="false"></textarea>
                                            <grammarly-extension data-grammarly-shadow-root="true"
                                                style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: auto;"
                                                class="cGcvT"></grammarly-extension>
                                        </div>
                                    </div>


                                    <div class="form-group"> <label class="control-label">Downloadable</label> <select
                                            id="modal_Downloadable" class="form-control" name="source">
                                            <option value="No" selected="">No</option>
                                            <option value="Yes">Yes</option>
                                        </select> </div>

                                    <div class="form-group"> <label class="control-label">Type</label> <select
                                            id="modal_Type" class="form-control" name="source">
                                            <option value="Free" selected="">Free</option>
                                            <option value="Premium">Premium</option>
                                        </select> </div>

                                    <div class="form-group"> <label class="control-label">Status</label> <select
                                            id="modal_Status" class="form-control" name="source">
                                            <option value="Publish" selected="">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select><br> </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-4 ">Intro Skip Avaliable?</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="add_modal_skip_available" switch="bool">
                                            <label for="add_modal_skip_available" data-on-label="Yes"
                                                data-off-label="No"></label>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label class="control-label">Intro Start</label>
                                        <div class="input-group date col-10" data-target-input="nearest">
                                            <input type="text" id="add_modal_intro_start"
                                                class="form-control datetimepicker-input"
                                                data-target="#add_modal_intro_start" placeholder="HH:MM:SS" />
                                            <div class="input-group-append" data-target="#add_modal_intro_start"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label class="control-label">Intro End</label>
                                        <div class="input-group date col-10" data-target-input="nearest">
                                            <input type="text" id="add_modal_intro_end"
                                                class="form-control datetimepicker-input"
                                                data-target="#add_modal_intro_end" placeholder="HH:MM:SS" />
                                            <div class="input-group-append" data-target="#add_modal_intro_end"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Add_Episode()" class="btn btn-primary">Add
                                    Episode</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Episode Modal -->
                <div class="modal fade" id="Edit_Episode_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Edit_Episode_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Edit_Episode_Modal_Lebel">Edit Link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <input type="hidden" id="Edit_modal_videos_id" name="modal_videos_id" value="000">
                                    <div class="form-group"> <label class="control-label">Episodes
                                            Name</label>&nbsp;&nbsp;<input id="Edit_modal_Episodes_Name" type="text"
                                            name="label" class="form-control" placeholder="Episode 1" required="">
                                    </div>
                                    <div class="form-group"> <label class="control-label">Thumbnail
                                            Url</label>&nbsp;&nbsp;<input id="Edit_modal_Thumbnail" type="text"
                                            name="label" class="form-control" placeholder="" required=""> </div>
                                    <div class="form-group"> <label class="control-label">Order</label> <input
                                            id="Edit_modal_Order" type="number" name="order" class="form-control"
                                            placeholder="0 to 9999" required=""> </div>
                                    <div class="form-group"> <label class="control-label">Source</label> <select
                                            id="Edit_modal_Source" class="form-control" name="source"
                                            id="selected-source">
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
                                    <div class="form-group" id="Edit_url-input"> <label
                                            class="control-label">Url</label>
                                        <input id="Edit_modal_Url" type="text" name="url" value="" class="form-control"
                                            placeholder="https://server-1.com/movies/Avengers.mp4" required="">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <div>
                                            <textarea required="" class="form-control col-md-9"
                                                id="Edit_modal_Description" rows="5" spellcheck="false"></textarea>
                                            <grammarly-extension data-grammarly-shadow-root="true"
                                                style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: auto;"
                                                class="cGcvT"></grammarly-extension>
                                        </div>
                                    </div>


                                    <div class="form-group"> <label class="control-label">Downloadable</label> <select
                                            id="Edit_modal_Downloadable" class="form-control" name="source">
                                            <option value="No" selected="">No</option>
                                            <option value="Yes">Yes</option>
                                        </select> </div>

                                    <div class="form-group"> <label class="control-label">Type</label> <select
                                            id="Edit_modal_Type" class="form-control" name="source">
                                            <option value="Free" selected="">Free</option>
                                            <option value="Premium">Premium</option>
                                        </select> </div>

                                    <div class="form-group"> <label class="control-label">Status</label> <select
                                            id="Edit_modal_Status" class="form-control" name="source">
                                            <option value="Publish" selected="">Publish</option>
                                            <option value="Unpublish">Unpublish</option>
                                        </select><br> </div>

                                    <div class="form-group row">
                                        <label class="control-label col-sm-4 ">Intro Skip Avaliable?</label>
                                        <div class="col-sm-6">
                                            <input type="checkbox" id="edit_modal_skip_available" switch="bool">
                                            <label for="edit_modal_skip_available" data-on-label="Yes"
                                                data-off-label="No"></label>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label class="control-label">Intro Start</label>
                                        <div class="input-group date col-10" data-target-input="nearest">
                                            <input type="text" id="edit_modal_intro_start"
                                                class="form-control datetimepicker-input"
                                                data-target="#edit_modal_intro_start" placeholder="HH:MM:SS" />
                                            <div class="input-group-append" data-target="#edit_modal_intro_start"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group"> <label class="control-label">Intro End</label>
                                        <div class="input-group date col-10" data-target-input="nearest">
                                            <input type="text" id="edit_modal_intro_end"
                                                class="form-control datetimepicker-input"
                                                data-target="#edit_modal_intro_end" placeholder="HH:MM:SS" />
                                            <div class="input-group-append" data-target="#edit_modal_intro_end"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fas fa-clock"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Update_Episode_Data()" class="btn btn-primary">Update
                                    Episode</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Episode Fetch Modal -->
                <div class="modal fade" id="Fetch_Episode_Modal" tabindex="-1" role="dialog" 
                aria-labelledby="Fetch_Episode_Modal_Lebel"aria-hidden="true">
                    <div class="modal-dialog modal-full" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Fetch_Episode_Modal_Lebel">Fetch Episode</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                
                                <div class="panel-heading">
                                    <h3 class="panel-title row justify-content-center">Fetch Episode information</h3>
                                </div>
                
                                <hr>
                
                                <div class="panel-body">
                                    <table id="fetch_episode_datatable" class="table table-striped"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                
                                        <thead>
                
                                            <tr>
                
                                                <th>#</th>
                
                                                <th>Name</th>
                
                                                <th>Thumbnail</th>
                
                                                <th>Description</th>
                
                                                <th>Source</th>
                
                                                <th>Order</th>
                
                                                <th>Url</th>
                
                                                <th>Downloadable</th>
                
                                                <th>Type</th>
                
                                                <th>Status</th>
                
                                                <th>Add</th>
                
                                            </tr>
                
                                        </thead>
                
                                    </table>
                                </div>
                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Fetch_Episode()" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Season No Modal -->
                <div class="modal fade" id="Add_Season_no_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Add_Season_no_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Add_Season_Modal_Lebel">Add Season Number</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="panel-heading">
                                    <h3 class="panel-title row justify-content-center">Add Seasons No. To Fech All
                                        Episodes</h3>
                                </div>

                                <hr>

                                <div class="form-group"> <label class="control-label">Seasons
                                        Number</label>&nbsp;&nbsp;<input id="modal_Season_No" type="number" name="label"
                                        class="form-control" placeholder="Ex. 1" required=""> </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="Fetch_All_Data()" class="btn btn-primary"
                                        id="Fetch_btn">Fetch</button>
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
        $('#add_modal_intro_start').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true,

        });
        $('#add_modal_intro_end').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true
        });
        $('#edit_modal_intro_start').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true
        });
        $('#edit_modal_intro_end').datetimepicker({
            format: 'HH:mm:ss',
            allowInputToggle: true
        });
    });
</script>
<script>
    var tmdb_language = "en-US";

function On_Load() {
    $.ajax({
        type: 'POST',
        url: "dashboard_api/get_config.php",
        contentType: 'application/json',
        dataType: 'json',
        headers: {
                    'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                },
        success: function (response) {
            tmdb_language = response.tmdb_language;
        }
    });
}


    $('#datatable').dataTable({
        "order": [],
        "ordering": false,
        "paging": false,
        "info": false,
        "filter": false,
        "pageLength": 100
    });

    function Add_Episode() {
        var modal_Episodes_Name = document.getElementById("modal_Episodes_Name").value;
        var modal_Thumbnail = document.getElementById("modal_Thumbnail").value;
        var modal_Order = document.getElementById("modal_Order").value;
        var modal_Source = document.getElementById("modal_Source").value;
        var modal_Url = document.getElementById("modal_Url").value;
        var modal_Description = document.getElementById("modal_Description").value;

        var modal_Downloadable = document.getElementById("modal_Downloadable").value;
        var modal_Type = document.getElementById("modal_Type").value;
        var modal_Status = document.getElementById("modal_Status").value;

        if (modal_Downloadable == "No") {
            var Downloadable = "0";
        } else if (modal_Downloadable == "Yes") {
            var Downloadable = "1";
        }

        if (modal_Type == "Free") {
            var Type = "0";
        } else if (modal_Type == "Premium") {
            var Type = "1";
        }

        if (modal_Status == "Publish") {
            var Status = "1";
        } else if (modal_Status == "Unpublish") {
            var Status = "0";
        }

        if ($('#add_modal_skip_available').is(':checked')) {
            var add_modal_skip_available_Count = 1;
        } else {
            var add_modal_skip_available_Count = 0;
        }
        var add_modal_intro_start = document.getElementById('add_modal_intro_start').value;
        var add_modal_intro_end = document.getElementById('add_modal_intro_end').value;

        var jsonObjects = {
            "season_id": "<?php echo $ID; ?>",
            "modal_Episodes_Name": modal_Episodes_Name,
            "modal_Thumbnail": modal_Thumbnail,
            "modal_Order": modal_Order,
            "modal_Source": modal_Source,
            "modal_Url": modal_Url,
            "modal_Description": modal_Description,
            "Downloadable": Downloadable,
            "Type": Type,
            "Status": Status,
            "add_modal_skip_available_Count": add_modal_skip_available_Count,
            "add_modal_intro_start": add_modal_intro_start,
            "add_modal_intro_end": add_modal_intro_end
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_episode.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response2) {
                if (response2 != "") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Episode Added Successfully!',
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

    function Load_Episode_Data(ID) {
        var jsonObjects = {
            "ID": ID
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/get_episode_details.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'json',
            success: function (response3) {
                var id = response3.id;
                var Episoade_Name = response3.Episoade_Name;
                var episoade_image = response3.episoade_image;
                var episoade_description = response3.episoade_description;
                var episoade_order = response3.episoade_order;
                var season_id = response3.season_id;
                var downloadable = response3.downloadable;
                var type = response3.type;
                var status = response3.status;
                var source = response3.source;
                var url = response3.url;
                var edit_modal_skip_available = response3.skip_available;
                var edit_modal_intro_start = response3.intro_start;
                var edit_modal_intro_end = response3.intro_end;



                if (!id == "") {
                    $("#Edit_modal_videos_id").val(id);
                    $("#Edit_modal_Episodes_Name").val(Episoade_Name);
                    $("#Edit_modal_Thumbnail").val(episoade_image);
                    $("#Edit_modal_Order").val(episoade_order);
                    $("#Edit_modal_Source").val(source);
                    $("#Edit_modal_Url").val(url);
                    $("#Edit_modal_Description").val(episoade_description);

                    if (downloadable == "1") {
                        $("#Edit_modal_Downloadable").val("Yes");
                    } else if (downloadable == "0") {
                        $("#Edit_modal_Downloadable").val("No");
                    }

                    if (type == "1") {
                        $("#Edit_modal_Type").val("Premium");
                    } else if (type == "0") {
                        $("#Edit_modal_Type").val("Free");
                    }

                    if (status == "1") {
                        $("#Edit_modal_Status").val("Publish");
                    } else if (status == "0") {
                        $("#Edit_modal_Status").val("Unpublish");
                    }

                    if (edit_modal_skip_available == "1") {
                        $('#edit_modal_skip_available').attr('checked', true);
                    } else if (edit_modal_skip_available == "0") {
                        $('#edit_modal_skip_available').attr('checked', false);
                    }

                    $("#edit_modal_intro_start").data("datetimepicker").date(edit_modal_intro_start);
                    $("#edit_modal_intro_end").data("datetimepicker").date(edit_modal_intro_end);
                }
            }
        });
    }

    function Update_Episode_Data() {
        var Edit_modal_videos_id = document.getElementById("Edit_modal_videos_id").value;
        var Edit_modal_Episodes_Name = document.getElementById("Edit_modal_Episodes_Name").value;
        var Edit_modal_Thumbnail = document.getElementById("Edit_modal_Thumbnail").value;
        var Edit_modal_Order = document.getElementById("Edit_modal_Order").value;
        var Edit_modal_Source = document.getElementById("Edit_modal_Source").value;
        var Edit_modal_Url = document.getElementById("Edit_modal_Url").value;
        var Edit_modal_Description = document.getElementById("Edit_modal_Description").value;
        var Edit_modal_Downloadable = document.getElementById("Edit_modal_Downloadable").value;
        var Edit_modal_Type = document.getElementById("Edit_modal_Type").value;
        var Edit_modal_Status = document.getElementById("Edit_modal_Status").value;

        if (Edit_modal_Downloadable == "No") {
            var Edit_Downloadable = "0";
        } else if (Edit_modal_Downloadable == "Yes") {
            var Edit_Downloadable = "1";
        }

        if (Edit_modal_Type == "Free") {
            var Edit_Type = "0";
        } else if (Edit_modal_Type == "Premium") {
            var Edit_Type = "1";
        }

        if (Edit_modal_Status == "Publish") {
            var Edit_Status = "1";
        } else if (Edit_modal_Status == "Unpublish") {
            var Edit_Status = "0";
        }

        if ($('#edit_modal_skip_available').is(':checked')) {
            var edit_modal_skip_available_Count = 1;
        } else {
            var edit_modal_skip_available_Count = 0;
        }
        var edit_modal_intro_start = document.getElementById('edit_modal_intro_start').value;
        var edit_modal_intro_end = document.getElementById('edit_modal_intro_end').value;


        var jsonObjects = {
            "Edit_modal_videos_id": Edit_modal_videos_id,
            "Edit_modal_Episodes_Name": Edit_modal_Episodes_Name,
            "Edit_modal_Thumbnail": Edit_modal_Thumbnail,
            "Edit_modal_Order": Edit_modal_Order,
            "Edit_modal_Source": Edit_modal_Source,
            "Edit_modal_Url": Edit_modal_Url,
            "Edit_modal_Description": Edit_modal_Description,
            "Edit_Downloadable": Edit_Downloadable,
            "Edit_Type": Edit_Type,
            "Edit_Status": Edit_Status,
            "edit_modal_skip_available_Count": edit_modal_skip_available_Count,
            "edit_modal_intro_start": edit_modal_intro_start,
            "edit_modal_intro_end": edit_modal_intro_end
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/update_episode_details.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response4) {
                if (response4 == "Episode Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Episode Updated successfully!',
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

    function Manage_Downloads(ID) {
        window.location.assign("manage_episode_Download_links.php?id="+ID);
    }

    function Delete_Episode(ID) {
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
                    url: "dashboard_api/delete_episode.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Episode Deleted successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Episode Deleted successfully!',
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

    function Fetch_All_Data() {
        var modal_Season_No = document.getElementById("modal_Season_No").value;

        Swal.fire({
            title: "Are you sure?",
            text: "It Will Fetch All Episode Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, Fetch All!"
        }).then(function (result) {
            if (result.value) {
                var jsonObjects = {
                    "Type": "Webseries_id",
                    "id": <?php echo $web_series_id; ?>
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/get_tmdb_id.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    success: function (IMDB_ID) {
                        if (IMDB_ID != '') {

                            $.ajax({
                                type: 'GET',
                                url: "https://api.themoviedb.org/3/tv/" + IMDB_ID +
                                    "/season/"+ modal_Season_No +"?api_key=1bfdbff05c2698dc917dd28c08d41096&language=" + tmdb_language,
                                dataType: 'json',
                                beforeSend: function () {
                                    $("#Fetch_btn").html('Fetching...');
                                },
                                success: function (response) {
                                    $("#Fetch_btn").html('Fetch');
                                    $('#Add_Season_no_Modal').modal('hide');

                                    var episodes_arr = response.episodes;
                                    var episodes = new Array();

                                    for(let i = 0; i < episodes_arr.length; i++){
                                        var episode_data = episodes_arr[i];

                                        var episode = {};
                                        episode['name'] = episode_data.name;
                                        episode['still_path'] = episode_data.still_path;
                                        episode['overview'] = episode_data.overview;
                                        episode['episode_number'] = episode_data.episode_number;
                                        episodes.push(episode);


                                        if(i == episodes_arr.length - 1){
                                            $('#Fetch_Episode_Modal').css('overflow-y', 'auto');
                                            $('#Fetch_Episode_Modal').modal('show');
        
                                            var tabl = $('#fetch_episode_datatable').dataTable({
                                                "order": [],
                                                "ordering": false,
                                                "paging": false,
                                                "info": false,
                                                "filter": false,
                                                "pageLength": 100,
                                                "destroy": true,
                                                data: episodes,
                                                columns: [
                                                    { 
                                                        data: 'id',
                                                        render: function (data, type, row, meta) {
                                                            return meta.row + meta.settings._iDisplayStart + 1;
                                                        }
                                                    },
                                                    { 
                                                        data: 'name',
                                                        render: function name(data, type, row, meta) {
                                                            return '<textarea class="form-control" maxlength="225" rows="5" type="text" id='+ meta.row+1 +'>'+data+'</textarea>';
                                                        }
                                                    },
                                                    { 
                                                        data: 'still_path',
                                                        render: function name(data, type, row, meta) {
                                                            return '<textarea class="form-control" maxlength="225" rows="8" type="text" id='+ meta.row+2 +'>https://www.themoviedb.org/t/p/original'+data+'</textarea>';
                                                        }
                                                    },
                                                    { 
                                                        data: 'overview',
                                                        render: function name(data, type, row, meta) {
                                                            return '<textarea class="form-control" maxlength="225" rows="10" placeholder="" id='+ meta.row+3 +'>'+data+'</textarea>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'Source',
                                                        render: function (data, type, row, meta) {
                                                            return '<div class="form-group"><select id='+ meta.row+4 +' class="form-control" name="source" id="selected-source"><option value="Youtube">Youtube</option><option value="Mp4" selected="">Mp4 From Url</option><option value="Mkv">Mkv From Url</option><option value="M3u8">M3u8 From Url</option><option value="Dash">Dash From Url</option><option value="Embed">Embed Url</option><option value="GoogleDrive">GoogleDrive</option><option value="Onedrive">Onedrive</option><option value="Yandex">Yandex</option><option value="Dropbox">Dropbox</option><option value="Racaty">Racaty</option><option value="ZippyShare">ZippyShare</option><option value="Cinematic">Cinematic</option><option value="TubiTV">TubiTV</option><option value="Vimeo">Vimeo</option><option value="Dailymotion">Dailymotion</option><option value="Facebook">Facebook</option><option value="GoFile">GoFile</option><option value="MP4Upload">MP4Upload</option><option value="GooglePhotos">GooglePhotos</option><option value="MediaFire">MediaFire</option><option value="OKru">OK.ru</option><option value="VK">VK</option><option value="Twitter">Twitter</option><option value="Solidfiles">Solidfiles</option><option value="Vidoza">Vidoza</option><option value="UpToStream">UpToStream</option><option value="Fansubs">Fansubs</option><option value="Sendvid">Sendvid</option><option value="Fembed">Fembed</option><option value="Filerio">Filerio</option><option value="Megaup">Megaup</option><option value="GoUnlimited">GoUnlimited</option><option value="Cocoscope">Cocoscope</option><option value="Vidbm">Vidbm</option><option value="Pstream">Pstream</option><option value="vlare">vlare</option><option value="StreamWiki">StreamWiki</option><option value="Vivosx">Vivosx</option><option value="BitTube">BitTube</option><option value="VideoBin">VideoBin</option><option value="4shared">4shared</option><option value="vudeo">vudeo</option><option value="StreamTape">StreamTape</option><option value="DoodStream">DoodStream</option><option value="StreamSB">StreamSB</option><option value="Voesx">Voesx</option> </div>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'episode_number',
                                                        render: function name(data, type, row, meta) {
                                                            return '<input class="form-control form-control-sm" type="number" id='+ meta.row+5 +' value='+data+'>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'Url',
                                                        render: function (data, type, row, meta) {
                                                            return '<textarea id='+ meta.row+6 +' type="text" maxlength="225" rows="6" name="url" value="" class="form-control" placeholder="" required=""></textarea>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'Downloadable',
                                                        render: function (data, type, row, meta) {
                                                            return '<select id='+ meta.row+7 +' class="form-control" name="source"> <option value="No" selected="">No</option> <option value="Yes">Yes</option> </select>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'Type',
                                                        render: function (data, type, row, meta) {
                                                            return '<select id='+ meta.row+8 +' class="form-control" name="source"> <option value="Free" selected="">Free</option> <option value="Premium">Premium</option> </select>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'Status',
                                                        render: function (data, type, row, meta) {
                                                            return '<input type="checkbox" id='+ meta.row+9 +' switch="bool"> <label for='+ meta.row+9 +' data-on-label="" data-off-label=""></label>';
                                                        }
        
                                                    },
                                                    { 
                                                        data: 'Add',
                                                        render: function (data, type, row, meta) {
                                                            var Add = "Add";
                                                            return '<input type="checkbox" id='+ meta.row+10 +' switch="bool" checked> <label for='+ meta.row+10 +' data-on-label="" data-off-label=""></label>';
                                                        }
        
                                                    }
                                                ]
                                            });
                                        }
                                      
                                    }
                                },
                                error: function (jq, status, message) {
                                    $("#Fetch_btn").html('Fetch');
                                    $('#Add_Season_no_Modal').modal('hide');
                                    swal.fire({
                                        title: 'Error',
                                        text: 'No Episodes Avaliable For the Season No. You Entered :(',
                                        type: 'warning'
                                    }).then(function () {
                                        location.reload();
                                    });
                                }
                            });

                        } else {
                            swal.fire({
                                title: 'Error',
                                text: 'WebSeries Not Added From TMDB :(',
                                type: 'error'
                            }).then(function () {
                                location.reload();
                            });
                        }
                    }
                });
            }
        });

       /* Swal.fire({
            title: 'Please Wait',
            allowEscapeKey: false,
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: ()=>{
                Swal.showLoading();
            }

            // timer: 3000,
            // timerProgressBar: true
        });*/
    }

    function Fetch_Episode() {
        var table = $('#fetch_episode_datatable').DataTable();

        Swal.fire({
            title: 'Please Wait',
            allowEscapeKey: false,
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: ()=>{
                Swal.showLoading();
            },
            onClose: ()=>{
                $('#Fetch_Episode_Modal').modal('hide');
                location.reload();
            }
        });

        table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
                var data = this.data();
            
                var modal_Episodes_Name = $("#"+ rowIdx+1).val();
                var modal_Thumbnail = $("#"+ rowIdx+2).val();
                var modal_Order = $("#"+ rowIdx+5).val();
                var modal_Source = $("#"+ rowIdx+4).val();
                var modal_Url = $("#"+ rowIdx+6).val();
                var modal_Description = $("#"+ rowIdx+3).val();

                var modal_Downloadable = $("#"+ rowIdx+7).val();
                var modal_Type = $("#"+ rowIdx+8).val();

                if (modal_Downloadable == "No") {
                  var Downloadable = "0";
                } else if (modal_Downloadable == "Yes") {
                    var Downloadable = "1";
                }
            
                if (modal_Type == "Free") {
                    var Type = "0";
                } else if (modal_Type == "Premium") {
                    var Type = "1";
                }
            
                if ($('#'+rowIdx+9).is(':checked')) {
                    var Publish_toggle_Count = 1;
                } else {
                    var Publish_toggle_Count = 0;
                }
            
                if ($('#'+ rowIdx+10).is(':checked')) {
                    var Add_toggle_Count = 1;
                } else {
                    var Add_toggle_Count = 0;
                }
            
                if(Add_toggle_Count == 1) {
                    var jsonObjects = {
                        "season_id": "<?php echo $ID; ?>",
                        "modal_Episodes_Name": modal_Episodes_Name,
                        "modal_Thumbnail": modal_Thumbnail,
                        "modal_Order": modal_Order,
                        "modal_Source": modal_Source,
                        "modal_Url": modal_Url,
                        "modal_Description": modal_Description,
                        "Downloadable": Downloadable,
                        "Type": Type,
                        "Status": Publish_toggle_Count,
                        "add_modal_skip_available_Count": "0",
                        "add_modal_intro_start": "",
                        "add_modal_intro_end": ""
                    };
                    $.ajax({
                        type: 'POST',
                        url: "dashboard_api/add_episode.php",
                        contentType: 'application/json',
                        data: JSON.stringify(jsonObjects),
                        dataType: 'text',
                        success: function (response) {
                            if(data.counter >= table.rows().count()) {
                                data.counter++; 
                            } else {
                                Swal.close();
                            }
                        }
                    });
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

    function Manage_Subtitle(ID) {
        window.location.assign("subtitle_manager.php?id="+ID+"&ct="+2);
    }
</script>