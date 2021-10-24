<?php
 require '../db/config.php';
 $ID = $_GET['id']; 

session_start();
if($_SESSION['Status'] != "Logged in") {
   header("Location: login.php");
}

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$resultat = $bdd->query("SELECT * FROM web_series WHERE id = $ID");
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

    <title>Dooo - Manage Season</title>

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

                            <h4 class="font-size-18">Manage Season</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Season</a></li>

                                <li class="breadcrumb-item active">Manage Season</li>

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
                                        <h4 class="mb-3 mb-md-0"><?php echo $name; ?></h4>
                                    </div>
                                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                                        <div class="panel-heading">
                                            <button data-toggle="modal" data-target="#Add_Season_Modal" id="Add_Season"
                                                class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                    class="btn-label"><i class="fa fa-plus"></i></span> Add
                                                Season</button>

                                            <button data-toggle="modal" onClick="Fetch_All_Data()"
                                                class="btn btn-sm btn-primary waves-effect waves-light"><span
                                                    class="btn-label"><i class="mdi mdi-ballot-recount"></i></span>
                                                Fetch
                                                All Season</button>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="panel-body">
                                <div>

                                    <table id="datatable" class="table table-striped"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>Session Name</th>

                                                <th>Order</th>

                                                <th>Episodes</th>

                                                <th>Status</th>

                                                <th>Option</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            <?php
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    if ($conn->connect_error) {
                                     die("Connection failed: " . $conn->connect_error);
                                     }
                                       $sql = "SELECT * FROM web_series_seasons WHERE web_series_id = $ID ORDER BY season_order";
                                       $result = $conn->query($sql);
                                 
                                        $conn->close();

                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            $int_table_id = 1;
                                           while($row = $result->fetch_assoc()) {
                                               ?>
                                            <tr>
                                                <th><?php echo($int_table_id); ?></th>
                                                <td><?php echo stripslashes($row["Session_Name"]); ?></td>
                                                <td><?php echo stripslashes($row["season_order"]); ?></td>

                                                <?php $td = $row["id"]; ?>

                                                <td>
                                                    <?php
                                                      $conn2 = new mysqli($servername, $username, $password, $dbname);
                                                       if ($conn2->connect_error) {
                                                         die("Connection failed: " . $conn2->connect_error);
                                                        }
                                                      $sql2 = "SELECT * FROM web_series_episoade WHERE season_id = $td";
                                                      $result2 = $conn2->query($sql2);
                                 
                                                       $conn2->close();

                                                       if ($result2->num_rows > 0) {
                                                        echo $result2->num_rows;
                                                       } else {
                                                           echo "0";
                                                       }
                                                    ?>


                                                </td>

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
                                                    <?php $Row_ID = $row["id"]; ?>


                                                    <a class="btn btn-primary btn-sm" onclick="Manage_Episodes(<?php echo($Row_ID); ?>)">Manage Episodes</a>
                                                    <a class="btn btn-primary btn-sm" onclick="Load_Season_Data(<?php echo($Row_ID); ?>)" data-toggle="modal" data-target="#Edit_Season_Modal" id="Edit_Season"><span class="btn-label"><i
                                                                class="typcn typcn-edit"></i></span>Edit</a>
                                                    <a class="btn btn-primary btn-sm" onclick="Delete_Season(<?php echo($Row_ID); ?>)"><span
                                                            class="btn-label"><i
                                                                class="typcn typcn-delete"></i></span>Delete</a>

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

                <!-- Modal -->
                <div class="modal fade" id="Add_Season_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Add_Season_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Add_Season_Modal_Lebel">Add Season</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="panel-heading">
                                    <h3 class="panel-title row justify-content-center">New Seasons information</h3>
                                </div>

                                <hr>

                                <div class="form-group"> <label class="control-label">Seasons
                                        Name</label>&nbsp;&nbsp;<input id="modal_Season_Name" type="text" name="label"
                                        class="form-control" placeholder="Seasons 1" required=""> </div>

                                <div class="form-group"> <label class="control-label">Order</label> <input
                                        id="modal_Order" type="number" name="order" class="form-control"
                                        placeholder="Ex: 1" required=""> </div>

                                <div class="form-group"> <label class="control-label">Status</label> <select
                                        id="modal_Status" class="form-control" name="source" id="selected-source">
                                        <option value="Publish" selected="">Publish</option>
                                        <option value="Unpublish">Unpublish</option>
                                    </select><br> </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Add_season()" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="Edit_Season_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Edit_Season_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Edit_Season_Modal_Lebel">Edit Season</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="panel-heading">
                                    <h3 class="panel-title row justify-content-center">Edit Seasons information</h3>
                                </div>

                                <hr>

                                <input type="hidden" id="modal_season_id" name="modal_season_id" value="000">

                                <div class="form-group"> <label class="control-label">Seasons
                                        Name</label>&nbsp;&nbsp;<input id="edit_modal_Season_Name" type="text" name="label"
                                        class="form-control" placeholder="Seasons 1" required=""> </div>

                                <div class="form-group"> <label class="control-label">Order</label> <input
                                        id="edit_modal_Order" type="number" name="order" class="form-control"
                                        placeholder="Ex: 1" required=""> </div>

                                <div class="form-group"> <label class="control-label">Status</label> <select
                                        id="edit_modal_Status" class="form-control" name="source" id="selected-source">
                                        <option value="Publish" selected="">Publish</option>
                                        <option value="Unpublish">Unpublish</option>
                                    </select><br> </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Update_Season_Data()" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Season Fetch Modal -->
                <div class="modal fade" id="Fetch_Season_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Fetch_Season_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Fetch_Season_Modal_Lebel">Fetch Season</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="panel-heading">
                                    <h3 class="panel-title row justify-content-center">Fetch Seasons information</h3>
                                </div>

                                <hr>

                                <div class="panel-body">
                                    <table id="fetch_season_datatable" class="table table-striped"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                        <thead>

                                            <tr>

                                                <th>#</th>

                                                <th>Session Name</th>

                                                <th>Order</th>

                                                <th>Publish</th>

                                                <th>Add</th>

                                            </tr>

                                        </thead>

                                    </table>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" onclick="Fetch_season()" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Season No Modal -->
                <div class="modal fade" id="Add_TMDB_ID_Modal" tabindex="-1" role="dialog"
                    aria-labelledby="Add_TMDB_ID_Modal_Lebel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="Add_TMDB_ID_Modal_Lebel">Add TMDB ID</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="panel-heading">
                                    <h3 class="panel-title row justify-content-center">Add TMDB ID To Fech All
                                        Seasons</h3>
                                </div>

                                <hr>

                                <div class="form-group"> <label class="control-label">TMDB
                                        ID</label>&nbsp;&nbsp;<input id="modal_TMDB_ID" type="number" name="label"
                                        class="form-control" placeholder="Ex. 12345" required=""> </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="Fetch_All_Data_CustomID()" class="btn btn-primary"
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

    function Add_season() {
        var modal_Season_Name = document.getElementById("modal_Season_Name").value;
        var modal_Order = document.getElementById("modal_Order").value;
        var modal_Status_txt = document.getElementById("modal_Status").value;
        if (modal_Status_txt == "Publish") {
            var Modal_Status = "1";
        } else if (modal_Status_txt == "Unpublish") {
            var Modal_Status = "0";
        }

        var jsonObjects = {
            "webseries_id": "<?php echo $ID; ?>",
            "modal_Season_Name": modal_Season_Name,
            "modal_Order": modal_Order,
            "Modal_Status": Modal_Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/add_season.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response) {
                if (response == "Season Added Successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Season Added Successfully!',
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

    function Delete_Season(ID) {
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
                    url: "dashboard_api/delete_season.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                        'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        if (response == "Season Deleted successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'Season Deleted successfully!',
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

    function Load_Season_Data(ID) {
        var jsonObjects = {
                    "ID": ID
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/get_season_details.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'json',
                    success: function (response2) {
                        var id = response2.id;
                        var Session_Name = response2.Session_Name;
                        var season_order = response2.season_order;
                        var Status = response2.status;

                        if (!id == "") {
                            $("#modal_season_id").val(id);
                            $("#edit_modal_Season_Name").val(Session_Name);
                            $("#edit_modal_Order").val(season_order);

                            if(Status == "1") {
                                $("#edit_modal_Status").val("Publish");
                            } else if(Status == "0") {
                                $("#edit_modal_Status").val("Unpublish");
                            }
                        }
                    }
                });
    }

    function Update_Season_Data() {
        var modal_season_id = document.getElementById("modal_season_id").value;
        var edit_modal_Season_Name = document.getElementById("edit_modal_Season_Name").value;
        var edit_modal_Order = document.getElementById("edit_modal_Order").value;
        var modal_Status_txt = document.getElementById("edit_modal_Status").value;
        if (modal_Status_txt == "Publish") {
            var Modal_Status = "1";
        } else if (modal_Status_txt == "Unpublish") {
            var Modal_Status = "0";
        }

        var jsonObjects = {
            "modal_season_id": modal_season_id,
            "edit_modal_Season_Name": edit_modal_Season_Name,
            "edit_modal_Order": edit_modal_Order,
            "Modal_Status": Modal_Status
        };
        $.ajax({
            type: 'POST',
            url: "dashboard_api/update_season.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response6) {
                if (response6 == "Season Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Season Updated successfully!',
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

    function Manage_Episodes(ID) {
        window.location.assign("manage_episodes.php?id="+ID);
    }

    function Fetch_All_Data() {
        let paramString = window.location.href.split('?')[1];
        let queryString = new URLSearchParams(paramString);
        for (let pair of queryString.entries()) {
            var id = pair[1];
        }

        Swal.fire({
            title: "Are you sure?",
            text: "It Will Fetch All Season Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, Fetch All!"
        }).then(function (result) {
            if (result.value) {
                var jsonObjects = {
                    "Type": "Webseries_id",
                    "id": id
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/get_tmdb_id.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    success: function (IMDB_ID) {
                        if (IMDB_ID != '0') {

                            $.ajax({
                                type: 'GET',
                                url: "https://api.themoviedb.org/3/tv/" + IMDB_ID +
                                    "?api_key=1bfdbff05c2698dc917dd28c08d41096&language=" + tmdb_language,
                                dataType: 'json',
                                beforeSend: function () {
                                    //$("#import_btn").html('Fetching...');
                                },
                                success: function (response) {
                                    var season_arr = response.seasons;
                                    var seasons = new Array();

                                    for(let i = 0; i < season_arr.length; i++){
                                        var season_data = season_arr[i];

                                        if(season_data.name != "Specials") {
                                            var season = {};
                                            season['name'] = season_data.name;
                                            season['season_number'] = season_data.season_number;
                                            seasons.push(season);
                                        }


                                        if(i == season_arr.length - 1){
                                            $('#Fetch_Season_Modal').modal('show');
                                        
                                            var tabl = $('#fetch_season_datatable').dataTable({
                                            "order": [],
                                            "ordering": false,
                                            "paging": false,
                                            "info": false,
                                            "filter": false,
                                            "pageLength": 100,
                                            "destroy": true,
                                            data: seasons,
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
                                                        return '<input class="form-control form-control-sm" type="text" id='+ meta.row+1 +' value="'+data+'">';
                                                    }
                                                },
                                                { 
                                                    data: 'season_number',
                                                    render: function name(data, type, row, meta) {
                                                        return '<input class="form-control form-control-sm" type="number" id='+ meta.row+2 +' value='+data+'>';
                                                    }
    
                                                },
                                                { 
                                                    data: 'Status',
                                                    render: function (data, type, row, meta) {
                                                        return '<div class="col-sm-0"> <input type="checkbox" id='+ meta.row+3 +' switch="bool"> <label for='+ meta.row+3 +' data-on-label="" data-off-label=""></label> </div>';
                                                    }
    
                                                },
                                                { 
                                                    data: 'Add',
                                                    render: function (data, type, row, meta) {
                                                        var Add = "Add";
                                                        return '<div class="col-sm-0"> <input type="checkbox" id='+ meta.row+4 +' switch="bool" checked> <label for='+ meta.row+4 +' data-on-label="" data-off-label=""></label> </div>';
                                                    }
    
                                                }
                                            ]
                                            });
                                        }
                                      
                                    }
                
                                },
                                error: function (jq, status, message) {
                                    Error(); 
                                }
                            });

                        } else {
                            $('#Add_TMDB_ID_Modal').modal('show');


                           /* swal.fire({
                                title: 'Error',
                                text: 'WebSeries Not Added From TMDB :(',
                                type: 'error'
                            }).then(function () {
                                location.reload();
                            });*/
                        }
                    }
                });
            }
        });
    }


    function Fetch_All_Data_CustomID() {
        var modal_TMDB_ID = document.getElementById("modal_TMDB_ID").value;

        Swal.fire({
            title: "Are you sure?",
            text: "It Will Fetch All Season Data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, Fetch All!"
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: "https://api.themoviedb.org/3/tv/" + modal_TMDB_ID +
                        "?api_key=1bfdbff05c2698dc917dd28c08d41096&language=" + tmdb_language,
                    dataType: 'json',
                    beforeSend: function () {
                        //$("#import_btn").html('Fetching...');
                    },
                    success: function (response) {
                        $('#Add_TMDB_ID_Modal').modal('hide');

                        var seasons = new Array();
                        for (var season_data of response.seasons) {
                            if(season_data.name != "Specials") {
                                var season = {};
                                season['name'] = season_data.name;
                                season['season_number'] = season_data.season_number;
                                seasons.push(season);
                            }
                        }

                        $('#Fetch_Season_Modal').css('overflow-y', 'auto');
                        $('#Fetch_Season_Modal').modal('show');
                                    
                                var tabl = $('#fetch_season_datatable').dataTable({
                                    "order": [],
                                    "ordering": false,
                                    "paging": false,
                                    "info": false,
                                    "filter": false,
                                    "pageLength": 100,
                                    "destroy": true,
                                    data: seasons,
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
                                                return '<input class="form-control form-control-sm" type="text" id='+ meta.row+1 +' value="'+data+'">';
                                            }
                                        },
                                        { 
                                            data: 'season_number',
                                            render: function name(data, type, row, meta) {
                                                return '<input class="form-control form-control-sm" type="number" id='+ meta.row+2 +' value='+data+'>';
                                            }
                                        },
                                        { 
                                            data: 'Status',
                                            render: function (data, type, row, meta) {
                                                return '<div class="col-sm-0"> <input type="checkbox" id='+ meta.row+3 +' switch="bool"> <label for='+ meta.row+3 +' data-on-label="" data-off-label=""></label> </div>';
                                            }
                                        },
                                        { 
                                            data: 'Add',
                                            render: function (data, type, row, meta) {
                                                var Add = "Add";
                                                return '<div class="col-sm-0"> <input type="checkbox" id='+ meta.row+4 +' switch="bool" checked> <label for='+ meta.row+4 +' data-on-label="" data-off-label=""></label> </div>';
                                            }
                                        }
                                    ]
                                });
    
                    },
                    error: function (jq, status, message) {
                        Error(); 
                    }
                });
            }
        });
    }

    function Fetch_season() {

        var table = $('#fetch_season_datatable').DataTable();

        Swal.fire({
            title: 'Please Wait',
            allowEscapeKey: false,
            allowOutsideClick: false,
            showConfirmButton: false,
            onOpen: ()=>{
                Swal.showLoading();
            },
            onClose: ()=>{
                $('#Fetch_Season_Modal').modal('hide');
                location.reload();
            }
        });

        table.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
            var data = this.data();
        
            var Name = $("#"+ rowIdx+1).val();
        
            var Order = $("#"+ rowIdx+2).val();
        
            if ($('#'+rowIdx+3).is(':checked')) {
                var Publish_toggle_Count = 1;
            } else {
                var Publish_toggle_Count = 0;
            }
        
            if ($('#'+ rowIdx+4).is(':checked')) {
                var Add_toggle_Count = 1;
            } else {
                var Add_toggle_Count = 0;
            }
        
            if(Add_toggle_Count == 1) {
                var jsonObjects = {
                    "webseries_id": "<?php echo $ID; ?>",
                    "modal_Season_Name": Name,
                    "modal_Order": Order,
                    "Modal_Status": Publish_toggle_Count
                };
                $.ajax({
                    type: 'POST',
                    url: "dashboard_api/add_season.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    success: function (response10) {
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
</script>