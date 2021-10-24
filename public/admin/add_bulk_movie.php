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

    <title>Dooo - Bulk Movie Importer</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />

    <meta content="Themesbrand" name="author" />

    <!-- App favicon -->

    <link rel="shortcut icon" href="public/images/favicon.ico">



    <link href="public/cssadd-movie.css" rel="stylesheet" type="text/css" />

<!-- DataTables -->

<link href="public/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<link href="public/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />

<!-- Responsive datatable examples -->

<link href="public/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />

    <!-- Summernote css -->

    <link href="public/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />


    <!-- Toaster-->

    <link href="public/libs/toaster/toastr.min.css" rel="stylesheet" type="text/css" />


    <link href="public/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="public/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <link href="public/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="public/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />



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

                    <div class="col-sm-6">

                        <div class="page-title-box">

                            <h4 class="font-size-18">Bulk Movie Importer</h4>

                            <ol class="breadcrumb mb-0">

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>

                                <li class="breadcrumb-item"><a href="javascript: void(0);">Import</a></li>

                                <li class="breadcrumb-item active">Bulk Movie Importer</li>

                            </ol>

                        </div>

                    </div>

                </div>

                <!-- end page title -->

                <div class="form" action="https://admin.fliq.pro/admin/videos/add/" method="post">

<div class="row">

    <div class="col-md-12">

        <div class="card card-body">

            <h3 class="card-title mt-0">Import Movies (<a href="https://www.themoviedb.org/movie"
                                        target="_blank">TMDB ID</a>)</h3>

            <hr>

            <div class="form-group">
                <textarea required="" class="form-control col-md-12" id="tmdb_ids" rows="5"
                    spellcheck="false"></textarea>
                <p><small>Separate ID By Comma ( , ).</small></p>
                <br>
                <h3 class="card-title mt-0">Settings</h3>

                <hr>
                <div class="col-md-12 row">
                    <div class="form-group col-md-4">
                        <label>Free/Premium</label>
                        <select class="form-control" id="Free_Premium">
                            <option>Free</option>
                            <option>Premium</option>
                        </select>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Enable Download</label>
                        <div>
                            <input type="checkbox" id="Enable_Download" switch="bool" />
                            <label for="Enable_Download" data-on-label="" data-off-label=""></label>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Publish</label>
                        <div>
                            <input type="checkbox" id="Publish_toggle" switch="bool" checked />
                            <label for="Publish_toggle" data-on-label="" data-off-label=""></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 row justify-content-end">
                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light" onclick="Import()"
                        id="create_btn" type="submit" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-plus mr-2"></i> Import
                    </button>
                </div>
            </div>

        </div>

        <div class="card card-body" id="import_log" hidden>

            <h3 class="card-title mt-0">Import Log</h3>
            <br>
            <table id="movie_datatable" class="table table-striped"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Thumbnail</th>

                        <th>Name</th>

                        <th>Description</th>

                        <th>Status</th>

                    </tr>

                </thead>

            </table>
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

<!-- Required datatable js -->

<script src="public/libs/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="public/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Summernote js -->

<script src="public/libs/summernote/summernote.js"></script>



<!-- init js -->

<script src="public/js/pages/form-editor.init.js"></script>



<!-- Toaster js -->

<script src="public/libs/toaster/toastr.min.js"></script>



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
    var code = "";
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
                code = response.license_code;
            }
        });
    }

    var list_count = 1;
    
    function Import() {
        var tmdb_ids = document.getElementById("tmdb_ids").value;
        if(tmdb_ids != "") {
            document.getElementById("import_log").hidden=false

            var tmdb_id_arrey = tmdb_ids.split(',');
            tmdb_id_arrey.forEach(tmdb_id => {
                fetch_movie(tmdb_id.trim());
            });

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
            
            toastr.warning("Please Add TMDB ID to Import Contents!");
        }
    }

    function fetch_movie(IMDB_ID) {
            if (IMDB_ID != '') {
                $.ajax({
                    type: 'GET',
                    url: "https://api.themoviedb.org/3/movie/"+ IMDB_ID +"?api_key=1bfdbff05c2698dc917dd28c08d41096&language="+tmdb_language,
                    dataType: 'json',
                    success: function (response) {
                        if(response != false) {
                            var TMDB_ID = response.id;
                            var NAME = response.title;
                            var DESCRIPTION = response.overview;
                            var GENRES = response.genres;
                            var RELEASE_DATE = response.release_date;
                            var RUNTIME = response.runtime;
    
                            var THUMBNAIL = "https://www.themoviedb.org/t/p/original" + response.poster_path;
                            var Poster = "https://www.themoviedb.org/t/p/original" + response.backdrop_path;
    
                            if (!TMDB_ID == "") {
    
                                var GENRES_json_obj = "";
                                for (var GENRE_Json_Content of GENRES) {
                                    if (GENRES_json_obj == "") {
                                        GENRES_json_obj = GENRE_Json_Content.name + ", ";
                                    } else {
                                        GENRES_json_obj = GENRES_json_obj + GENRE_Json_Content.name + ", ";
                                    }
                                }
                                var GENRE_list = GENRES_json_obj.slice(0, -2);
                                
                                var jsonObjects3 = {
                                    "GENRE_list": GENRE_list
                                };
                                $.ajax({
                                    type: 'POST',
                                    url: "dashboard_api/initiate_genres.php",
                                    contentType: 'application/json',
                                    data: JSON.stringify(jsonObjects3),
                                    dataType: 'json',
                                    success: function (response3) {
                                        if(response3 != "") {
                                           /* $("#genres").select2({
                                                data: response3
                                            })
                                            var genre_arr = [];
                                            response3.forEach((element, index, array) => {
                                                genre_arr.push(element.id);
                                            });
                                            $("#genres").val(genre_arr).trigger("change");*/
                                        }
                                    }
                                });
    
                                $.ajax({
                                    type: 'GET',
                                    url: "https://api.themoviedb.org/3/movie/" + IMDB_ID +
                                        "/videos?api_key=1bfdbff05c2698dc917dd28c08d41096",
                                    dataType: 'json',
                                    success: function (response2) {
                                        var Video_Data_Json = response2.results;
                                        for (var Video_Json_Content of Video_Data_Json) {
                                            if (Video_Json_Content.type == "Trailer") {
                                                if (Video_Json_Content.site == "YouTube") {
                                                    var trailler_youtube_source =
                                                        "https://www.youtube.com/watch?v=" +
                                                        Video_Json_Content.key;
                                                }
                                            }
                                        }
                                        add_movie(TMDB_ID, NAME, DESCRIPTION, GENRE_list, RELEASE_DATE, RUNTIME, THUMBNAIL, Poster, trailler_youtube_source);
                                    }
    
                                });
                            }
                        }
                    },
                    error: function (jq, status, message) {
                       
                    }
                });

            } else {
                alert('Please input TMDB ID');
            }
    }

    function add_movie(IMDB_ID,Name,DESCRIPTION,GENRES,RELEASE_DATE,RUNTIME,THUMBNAIL,POSTER,trailler_youtube_source) {
            
            var Free_Premium = document.getElementById("Free_Premium").value;
            if (Free_Premium == "Free") {
                var Free_Premium_Count = 0;

            } else if (Free_Premium == "Premium") {
                var Free_Premium_Count = 1;
            }

            if ($('#Enable_Download').is(':checked')) {
                var Enable_Download_Count = 1;
            } else {
                var Enable_Download_Count = 0;
            }

            if ($('#Publish_toggle').is(':checked')) {
                var Publish_toggle_Count = 1;
            } else {
                var Publish_toggle_Count = 0;
            }

            var jsonObjects = {
                "TMDB_ID": IMDB_ID,
                "name": Name,
                "description": DESCRIPTION,
                "genres": GENRES,
                "release_date": RELEASE_DATE,
                "runtime": RUNTIME,
                "poster": THUMBNAIL,
                "banner": POSTER,
                "youtube_trailer": trailler_youtube_source,
                "downloadable": Enable_Download_Count,
                "type": Free_Premium_Count,
                "status": Publish_toggle_Count
            };
            $.ajax({
                type: 'POST',
                url: "dashboard_api/add_movie_api.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                success: function (response3) {
                    if (response3 != "") {
                        var datatable = $('#movie_datatable').dataTable({
                            "order": [],
                            "ordering": false,
                            "paging": false,
                            "info": false,
                            "filter": false,
                            "pageLength": 100,
                            "destroy": true
                        });
                        $('#movie_datatable').DataTable().row.add([
                            list_count, getThumbnail(THUMBNAIL), Name, DESCRIPTION, initStatus(Publish_toggle_Count)
                        ]).draw();
                        list_count++;
                    }
                }
            });
    }

    function getThumbnail(data) {
        return '<img class="img-fluid" height="100" width="80" src='+ data +' data-holder-rendered="true">';
    }

    function initStatus(data) {
        if(data == 0) {
            return '<span class="badge badge-danger">UnPublished</span';
        } else if(data == 1) {
            return '<span class="badge badge-success">Published</span>';
        }
    }
</script>