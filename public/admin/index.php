<?php
date_default_timezone_set("Asia/Kolkata");
use Translation\Translation;
require '../db/config.php';
session_start();
 if($_SESSION['Status'] != "Logged in") {
    header("Location: login.php");
 }

require '../notification/intialize.php';
SRN();

$Total_Movie = 0;
$Total_Unpublished_Movie = 0;
$Total_WebSeries = 0;
$Total_Unpublished_WebSeries = 0;

                $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $resultat = $bdd->query("SELECT * FROM movies");
                $resultat->setFetchMode(PDO::FETCH_OBJ);
                while( $Movie_data = $resultat->fetch() ) 
                {
                    $Total_Movie++;

                    if($Movie_data->status == "0") {
                        $Total_Unpublished_Movie++;
                    }

                }



                $resultat2 = $bdd->query("SELECT * FROM web_series");
                $resultat2->setFetchMode(PDO::FETCH_OBJ);
                while( $WebSeries_data = $resultat2->fetch() ) 
                {
                    $Total_WebSeries++;

                    if($WebSeries_data->status == "0") {
                        $Total_Unpublished_WebSeries++;
                    }

                }

$sql = "SELECT count(*) FROM view_log WHERE date = ? AND content_type = ?"; 
$result = $bdd->prepare($sql); 
$result->execute([date('m-d-Y', time()), "1"]); 
$todaysMoviesView = $result->fetchColumn(); 

$sql2 = "SELECT count(*) FROM view_log WHERE date = ? AND content_type = ?"; 
$result2 = $bdd->prepare($sql2); 
$result2->execute([date('m-d-Y', time()), "2"]); 
$todaysWebSeriesView = $result2->fetchColumn(); 

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Dooo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="public/images/favicon.ico">

    <link href="public/libs/chartist/chartist.min.css" rel="stylesheet">
    <link href="public/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="public/css/bootstrap-dark.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="public/css/app-dark.min.css" rel="stylesheet" type="text/css" />
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
                                <h4 class="font-size-18"><?php echo Translation::of('Dashboard'); ?></h4>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item active"><?php echo Translation::of('Welcome to Dooo Dashboard'); ?></li>
                                </ol>
                            </div>
                        </div>

                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="public/images/services-icon/01.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50"><?php echo Translation::of('Total Movie'); ?></h5>
                                        <h4 class="font-weight-medium font-size-24"><?php echo $Total_Movie ?> <i
                                                class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1"><?php echo Translation::of('Since last month'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="public/images/services-icon/02.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50"><?php echo Translation::of('UnPublished Movie'); ?></h5>
                                        <h4 class="font-weight-medium font-size-24"><?php echo $Total_Unpublished_Movie ?> <i
                                                class="mdi mdi-arrow-down text-danger ml-2"></i></h4>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1"><?php echo Translation::of('Since last month'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="public/images/services-icon/03.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50"><?php echo Translation::of('Total Series'); ?></h5>
                                        <h4 class="font-weight-medium font-size-24"><?php echo $Total_WebSeries ?> <i
                                                class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1"><?php echo Translation::of('Since last month'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card mini-stat bg-primary text-white">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <div class="float-left mini-stat-img mr-4">
                                            <img src="public/images/services-icon/04.png" alt="">
                                        </div>
                                        <h5 class="font-size-16 text-uppercase mt-0 text-white-50"><?php echo Translation::of('UnPublished Series'); ?></h5>
                                        <h4 class="font-weight-medium font-size-24"><?php echo $Total_Unpublished_WebSeries ?> <i
                                                class="mdi mdi-arrow-down text-danger ml-2"></i></h4>
                                    </div>
                                    <div class="pt-2">
                                        <div class="float-right">
                                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                                        </div>

                                        <p class="text-white-50 mb-0 mt-1"><?php echo Translation::of('Since last month'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                            <div class="col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Todays Content Report</h4>

                                        <div class="cleafix">
                                            <p class="float-left"><i class="mdi mdi-calendar mr-1 text-primary"></i> <?php echo date('M d', time())." (Total View)"; ?></p>
                                            <h5 class="font-18 text-right"><?php echo $todaysMoviesView+$todaysWebSeriesView; ?></h5>
                                        </div>

                                        <div id="ct-donut" class="ct-chart wid"></div>

                                        <div class="mt-1">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td><span class="badge badge-primary">Movies</span></td>
                                                        <td>Views</td>
                                                        <td class="text-right"><?php echo $todaysMoviesView; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><span class="badge badge-success">Web Series</span></td>
                                                        <td>Views</td>
                                                        <td class="text-right"><?php echo $todaysWebSeriesView; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xl-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Most viewed Today</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover table-centered table-nowrap mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">View</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $T_D_Y = date('m-d-Y', time());
                                                    $resultat = $bdd->query("SELECT *, count(content_id ) as max FROM view_log WHERE date LIKE '$T_D_Y' GROUP BY content_id ORDER BY max DESC LIMIT 6");
                                                    $resultat->setFetchMode(PDO::FETCH_OBJ);
                                                    $_I = "0";
                                                    while( $Data = $resultat->fetch() ) {
    
                                                        $sql3 = "SELECT count(*) FROM view_log WHERE date = ? AND content_id = ?"; 
                                                        $result4 = $bdd->prepare($sql3); 
                                                        $result4->execute([date('m-d-Y', time()), $Data->content_id]); 
                                                        $_V = $result4->fetchColumn();

                                                        if($Data->content_type == '1') {
                                                            $resultat2 = $bdd->query("SELECT * FROM movies Where id LIKE $Data->content_id");
                                                            $resultat2->setFetchMode(PDO::FETCH_OBJ);
                                                            while( $_Data = $resultat2->fetch() ) 
                                                            { $_I++; ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $_I; ?></th>
                                                                    <th scope="row"><?php echo $_Data->name; ?></th>
                                                                    <th scope="row"><span class="badge badge-primary">Movies</span></th>
                                                                    <th scope="row"><?php echo $_V; ?></th>
                                                                    <td>
                                                                        <div>
                                                                            <a href="edit_movie.php?id=<?php echo $_Data->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else if($Data->content_type == '2') {
                                                            $resultat2 = $bdd->query("SELECT * FROM web_series Where id LIKE $Data->content_id");
                                                            $resultat2->setFetchMode(PDO::FETCH_OBJ);
                                                            while( $_Data = $resultat2->fetch() ) 
                                                            { $_I++; ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $_I; ?></th>
                                                                    <th scope="row"><?php echo $_Data->name; ?></th>
                                                                    <th scope="row"><span class="badge badge-success">Web Series</span></th>
                                                                    <th scope="row"><?php echo $_V; ?></th>
                                                                    <td>
                                                                        <div>
                                                                            <a href="edit_web_series.php?id=<?php echo $_Data->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                            }
                                                    }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- end row -->

                    <div class="row">

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Most Popular Movies</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">View</th>
                                                    <th scope="col">Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $resultat = $bdd->query("SELECT *, count(content_id ) as max FROM view_log WHERE content_type LIKE 1 GROUP BY content_id ORDER BY max DESC LIMIT 5");
                                                $resultat->setFetchMode(PDO::FETCH_OBJ);
                                                $M_I = "0";
                                                while( $Data = $resultat->fetch() ) {

                                                    $sql3 = "SELECT count(*) FROM view_log WHERE content_type = ? AND content_id = ?"; 
                                                    $result4 = $bdd->prepare($sql3); 
                                                    $result4->execute(["1", $Data->content_id]); 
                                                    $T_M_V = $result4->fetchColumn(); 

                                                    $resultat2 = $bdd->query("SELECT * FROM movies Where id LIKE $Data->content_id");
                                                    $resultat2->setFetchMode(PDO::FETCH_OBJ);
                                                    while( $M_Data = $resultat2->fetch() ) 
                                                    { $M_I++; ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $M_I; ?></th>
                                                            <th scope="row"><?php echo $M_Data->name; ?></th>
                                                            <th scope="row"><?php echo $T_M_V; ?></th>
                                                            <td>
                                                                <div>
                                                                    <a href="edit_movie.php?id=<?php echo $M_Data->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Most Popular WebSeries</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">View</th>
                                                    <th scope="col">Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $resultat10 = $bdd->query("SELECT *, count(content_id ) as max FROM view_log WHERE content_type LIKE 2 GROUP BY content_id ORDER BY max DESC LIMIT 5");
                                                $resultat10->setFetchMode(PDO::FETCH_OBJ);
                                                $S_I = "0";
                                                while( $Data10 = $resultat10->fetch() ) {

                                                    $sql310 = "SELECT count(*) FROM view_log WHERE content_type = ? AND content_id = ?"; 
                                                    $result410 = $bdd->prepare($sql310); 
                                                    $result410->execute(["2", $Data10->content_id]); 
                                                    $T_S_V = $result410->fetchColumn();

                                                    $resultat210 = $bdd->query("SELECT * FROM web_series Where id LIKE $Data10->content_id");
                                                    $resultat210->setFetchMode(PDO::FETCH_OBJ);
                                                    while( $S_Data = $resultat210->fetch() ) 
                                                    { $S_I++; ?>
                                                        <tr>
                                                            <th scope="row"><?php echo $S_I; ?></th>
                                                            <th scope="row"><?php echo $S_Data->name; ?></th>
                                                            <th scope="row"><?php echo $T_S_V; ?></th>
                                                            <td>
                                                                <div>
                                                                    <a href="edit_web_series.php?id=<?php echo $S_Data->id; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include 'layouts/footer.php'; ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <?php include 'layouts/footerScript.php'; ?>

    <!-- Peity chart-->
    <script src="public/libs/peity/jquery.peity.min.js"></script>

    <!-- Plugin Js-->
    <script src="public/libs/chartist/chartist.min.js"></script>
    <script src="public/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js"></script>
    <script src="public/js/pages/dashboard.init.js"></script>

    <?php include "layouts/content-end.php"; ?>

    <script>
        if(<?php echo $todaysMoviesView; ?> == "0" && <?php echo $todaysWebSeriesView; ?> == "0") {
            var chart = new Chartist.Pie('.ct-chart', {
              series: ["1"],
              labels: [1]
            }, {
              donut: true,
              showLabel: false
            });   
        } else {
            var chart = new Chartist.Pie('.ct-chart', {
              series: [<?php echo $todaysMoviesView; ?>, <?php echo $todaysWebSeriesView; ?>],
              labels: [1, 2]
            }, {
              donut: true,
              showLabel: false,
              plugins: [
                Chartist.plugins.tooltip()
              ]
            }); 
        }
        
        
        chart.on('draw', function(data) {
          if(data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();
        
            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
              'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });
        
            var animationDefinition = {
              'stroke-dashoffset': {
                id: 'anim' + data.index,
                dur: 1000,
                from: -pathLength + 'px',
                to:  '0px',
                easing: Chartist.Svg.Easing.easeOutQuint,
                fill: 'freeze'
              }
            };
        
            if(data.index !== 0) {
              animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }
        
            data.element.attr({
              'stroke-dashoffset': -pathLength + 'px'
            });

            data.element.animate(animationDefinition, false);
          }
        });

    </script>