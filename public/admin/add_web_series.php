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
    <title>Dooo - Add Web Series</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/images/favicon.ico">

    <link href="public/cssadd-movie.css" rel="stylesheet" type="text/css" />

    <!-- Summernote css -->
    <link href="public/libs/summernote/summernote.css" rel="stylesheet" type="text/css" />


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
                                <h4 class="font-size-18">Add Web Series</h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dooo</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Web Series</a></li>
                                    <li class="breadcrumb-item active">Add Web Series</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <div class="col-lg-6">

                            <div class="alert alert-info bg-info text-white border-0" role="alert">
                                Import Contents From TMDB
                            </div>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <input class="form-control" id="imdb_id" type="text" placeholder="Enter TMDB ID. Ex: 101010"
                                value="" id="example-text-input">
                        </div>

                        <div class="col-lg-1">
                            <span class="input-group-btn">
                                <button type="submit" onclick="Load_Movie_Data()" id="import_btn"
                                    class="btn btn-primary waves-effect waves-light"> Fetch </button>
                            </span>

                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h6>
                                <p> Get TMDb ID from here: <a href="https://www.themoviedb.org/tv/"
                                        target="_blank">TheMovieDB.org</a> </p>
                            </h6>
                        </div>

                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div id="result" class="m-t-15"></div>
                        </div>

                    </div>


                    <br>

                    <div class="form" action="https://admin.fliq.pro/admin/videos/add/" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-body">
                                    <h3 class="card-title mt-0">Web Series Info</h3>
                                    <hr>

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" value="" id="title">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <div class="summernote" id="description"></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Genres</label>
                                        <!--<input class="form-control" type="text" value="" id="genres">-->
                                        <select class="select2 form-control select2-multiple" id="genres" multiple="multiple" multiple data-placeholder="Choose ..."></select>
                                    </div>

                                    <div class="form-group">
                                        <label>Release Date</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" id="release_date"
                                                class="form-control datetimepicker-input" data-target="#release_date"
                                                placeholder="YYYY-MM-DD" />
                                            <div class="input-group-append" data-target="#release_date"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Trailer URL(YouTube Only)</label>
                                        <input class="form-control" type="text" value="" id="trailler_youtube_source">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-body">
                                    <h3 class="card-title mt-0">Additional Info</h3>
                                    <hr>

                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <div class="row justify-content-center">
                                            <img class="img-fluid" id="thumb_image"
                                                style="padding: 0.20rem; background-color: #FFF; border: 1px solid #dee2e6; border-radius: 0.25rem; max-width: 100%; height: auto;"
                                                width="150" src="public/images/dooo_thumbnail_placeholder.png"
                                                data-holder-rendered="true">
                                        </div>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10">
                                                <input class="form-control" id="Thumbnail_URL" type="text"
                                                    placeholder="Image URL (Best Fit = 500 x 750)" value=""
                                                    id="example-text-input">
                                            </div>

                                            <div class="col-lg-1">
                                                <span class="input-group-btn">
                                                    <button type="submit" onclick="SET_Thumbnail()" id="import_btn"
                                                        class="btn btn-primary waves-effect waves-light"> SET </button>
                                                </span>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Poster</label>
                                        <div class="row justify-content-center">
                                            <img class="img-fluid" id="poster_image"
                                                style="padding: 0.20rem; background-color: #FFF; border: 1px solid #dee2e6; border-radius: 0.25rem; max-width: 100%; height: auto;"
                                                width="350" src="public/images/Dooo_poster_placeholder.png"
                                                data-holder-rendered="true">
                                        </div>
                                        <br>
                                        <div class="row justify-content-center">
                                            <div class="col-lg-10">
                                                <input class="form-control" id="Poster_URL" type="text"
                                                    placeholder="Image URL (Best Fit = 2048 x 1152)" value=""
                                                    id="example-text-input">
                                            </div>

                                            <div class="col-lg-1">
                                                <span class="input-group-btn">
                                                    <button type="submit" onclick="SET_Poster()" id="import_btn"
                                                        class="btn btn-primary waves-effect waves-light"> SET </button>
                                                </span>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Free/Premium</label>
                                        <select class="form-control" id="Free_Premium">
                                            <option>Default</option>
                                            <option>Free</option>
                                            <option>Premium</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Enable Download</label>
                                        <div>
                                            <input type="checkbox" id="Enable_Download" switch="bool" checked />
                                            <label for="Enable_Download" data-on-label="" data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Publish</label>
                                        <div>
                                            <input type="checkbox" id="Publish_toggle" switch="bool" checked />
                                            <label for="Publish_toggle" data-on-label="" data-off-label=""></label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 row justify-content-end">
                                            <button class="btn btn-primary dropdown-toggle waves-effect waves-light"
                                                onclick="Save_Movie_Data()" id="create_btn" type="submit"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-plus mr-2"></i> Create
                                            </button>
                                        </div>
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
    <?php include 'layouts/rightbar.php'; ?>
    <?php include 'layouts/footerScript.php'; ?>

    <!--tinymce js-->
    <script src="public/libs/tinymce/tinymce.min.js"></script>

    <!-- Summernote js -->
    <script src="public/libs/summernote/summernote.js"></script>

    <!-- init js -->
    <script src="public/js/pages/form-editor.init.js"></script>

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
            $('#release_date').datetimepicker({
                format: 'YYYY-MM-DD',
                allowInputToggle: true
            });
        });
    </script>

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

            $.ajax({
            type: 'POST',
            url: "dashboard_api/get_select_genre.php",
            contentType: 'application/json',
            dataType: 'json',
                success: function (response2) {
                    if(response2 != "") {
                        $("#genres").select2({
                            data: response2
                        })
                    }
                }
            });
        }

        function SET_Thumbnail() {
            var Thumbnail_URL = document.getElementById("Thumbnail_URL").value;
            $('#thumb_image').attr('src', Thumbnail_URL);
        }

        function SET_Poster() {
            var Poster = document.getElementById("Poster_URL").value;
            $('#poster_image').attr('src', Poster);
        }

                /**
 * Convert a string to HTML entities
 */
String.prototype.toHtmlEntities = function() {
    return this.replace(/./gm, function(s) {
        // return "&#" + s.charCodeAt(0) + ";";
        return (s.match(/[a-z0-9\s]+/i)) ? s : "&#" + s.charCodeAt(0) + ";";
    });
};

/**
 * Create string from HTML entities
 */
String.fromHtmlEntities = function(string) {
    return (string+"").replace(/&#\d+;/gm,function(s) {
        return String.fromCharCode(s.match(/\d+/gm)[0]);
    })
};

        function Load_Movie_Data() {
            var IMDB_ID = document.getElementById("imdb_id").value;
            if (IMDB_ID != '') {
                $.ajax({
                    type: 'GET',
                    url: "https://api.themoviedb.org/3/tv/"+ IMDB_ID +"?api_key=1bfdbff05c2698dc917dd28c08d41096&language="+tmdb_language,
                    dataType: 'json',
                    beforeSend: function () {
                        $("#import_btn").html('Fetching...');
                    },
                    success: function (response) {
                        if(response != false) {
                            var TMDB_ID = response.id;
                            var NAME = response.name;
                            var DESCRIPTION = response.overview;
                            var GENRES = response.genres;
                            var RELEASE_DATE = response.first_air_date;
    
                            var THUMBNAIL = response.poster_path;
                            var Poster = response.backdrop_path;
    
                            if (!TMDB_ID == "") {
                                $("#title").val(NAME);
                                $('#description').summernote('editor.insertText', String.fromHtmlEntities(DESCRIPTION.toHtmlEntities()));
                                $("#release_date").data("datetimepicker").date(RELEASE_DATE);
    
                                $('#thumb_image').attr('src', "https://www.themoviedb.org/t/p/original" +
                                    THUMBNAIL);
                                $('#poster_image').attr('src', "https://www.themoviedb.org/t/p/original" +
                                    Poster);
    
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
                                            $("#genres").select2({
                                                data: response3
                                            })
                                            var genre_arr = [];
                                            response3.forEach((element, index, array) => {
                                                genre_arr.push(element.id);
                                            });
                                            $("#genres").val(genre_arr).trigger("change");
                                        }
                                    }
                                });
    
                                $.ajax({
                                    type: 'GET',
                                    url: "https://api.themoviedb.org/3/tv/" + IMDB_ID +
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
                                                    $("#trailler_youtube_source").val(
                                                        trailler_youtube_source);
                                                }
                                            }
                                        }
    
                                    }
    
                                });
    
    
                                $('#result').html(
                                    '<div class="alert alert-success alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Data imported successfully.</div>'
                                );
                                $('#import_btn').html('Fetch');
                            }
                        } else {
                            $('#result').html(
                                '<div class="alert alert-danger alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No data found in database..</div>'
                            );
                            $('#import_btn').html('Fetch');
                        }
                    },
                    error: function (jq, status, message) {
                        $('#result').html(
                            '<div class="alert alert-danger alert-dismissable m-t-15"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No data found in database..</div>'
                        );
                        $('#import_btn').html('Fetch');
                    }
                });

            } else {
                alert('Please input TMDB ID');
            }
        }

        function Save_Movie_Data() {
            if (document.getElementById("imdb_id").value == "") {
                var IMDB_ID = 0;
            } else {
                var IMDB_ID = document.getElementById("imdb_id").value;
            }
            var Name = document.getElementById("title").value;
            var DESCRIPTION = jQuery($(".summernote").summernote("code")).text();
            var GENRES = $('#genres').select2('data');
            var RELEASE_DATE = document.getElementById("release_date").value;
            var THUMBNAIL = document.getElementById("thumb_image").src;
            var POSTER = document.getElementById("poster_image").src;
            var trailler_youtube_source = document.getElementById("trailler_youtube_source").value;
            var Free_Premium = document.getElementById("Free_Premium").value;
            if (Free_Premium == "Default") {
                var Free_Premium_Count = 0;

            } else if (Free_Premium == "Free") {
                var Free_Premium_Count = 1;

            } else if (Free_Premium == "Premium") {
                var Free_Premium_Count = 2;
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

            var add_WebSeries_genre = "";
            GENRES.forEach((element, index, array) => {
                if(add_WebSeries_genre == "") {
                    add_WebSeries_genre = element.text;
                } else {
                    add_WebSeries_genre = add_WebSeries_genre+","+element.text;
                }
            });

            var jsonObjects = {
                "TMDB_ID": IMDB_ID,
                "name": Name,
                "description": DESCRIPTION,
                "genres": add_WebSeries_genre,
                "release_date": RELEASE_DATE,
                "poster": THUMBNAIL,
                "banner": POSTER,
                "youtube_trailer": trailler_youtube_source,
                "downloadable": Enable_Download_Count,
                "type": Free_Premium_Count,
                "status": Publish_toggle_Count
            };
            $.ajax({
                type: 'POST',
                url: "dashboard_api/add_web_series_api.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                success: function (response3) {
                    if (response3 != "") {
                        window.location.assign("manage_seasons.php?id=" + response3);
                    }
                }
            });
        }
    </script>