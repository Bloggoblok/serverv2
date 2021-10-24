<?php
require '../db/config.php';
//session_start();
require_once __DIR__ . '/../public/translation/Translation.php';
use Translation\Translation;
//Translation::forceLanguage(false);
//Translation::forceLanguage('en-US');

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $resultat = $bdd->query("SELECT * FROM config WHERE id = 1");
    $resultat->setFetchMode(PDO::FETCH_OBJ);
    $json =array();
    while( $Data = $resultat->fetch() ) 
    {
        $admin_panel_language = $Data->admin_panel_language;
        if($Data->admin_panel_language == "" || $Data->admin_panel_language == null) {
            Translation::forceLanguage(false);
        } else if($Data->admin_panel_language == "en-US") {
            Translation::forceLanguage('en-US');
        } else if($Data->admin_panel_language == "zh-CN") {
            Translation::forceLanguage('zh-CN');
        } else if($Data->admin_panel_language == "bn-BD") {
            Translation::forceLanguage('bn-BD');
        } else if($Data->admin_panel_language == "hi-IN") {
            Translation::forceLanguage('hi-IN');
        } else if($Data->admin_panel_language == "es-ES") {
            Translation::forceLanguage('es-ES');
        } else if($Data->admin_panel_language == "ru-RU") {
            Translation::forceLanguage('ru-RU');
        } else if($Data->admin_panel_language == "tr-TR") {
            Translation::forceLanguage('tr-TR');
        }
    }

?>


<head>
    <!-- Sweet Alert-->
<link href="public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="javascript:On_Load()">

<header id="page-topbar">

    <div class="navbar-header">

        <div class="d-flex">

            <!-- LOGO -->

            <div class="navbar-brand-box">

                <a href="index.php" class="logo logo-dark">

                    <span class="logo-sm">

                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJMAAACRCAMAAADw83osAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJUExURQAAAO4uRwAAANcfYtMAAAADdFJOU///ANfKDUEAAAAJcEhZcwAAD14AAA9eAQXNOC0AAAOPSURBVHhe7ZLRctswDARb//9Hx5K2tkWCEgDimEym+6bDAdx48ufx8/jv5GPo9PcffC9k4ITPDtE6TCdkXhCvwuW02MpywuMMsxUYTkh0MNbTO2FgQUNN58TzNnTExJzWWEWdVli1Tjx8BU0dCSe5VcpJbJV0klqlnYRWE04yqd/0O1GXkHOiLCLjRFVGwommjrgTRSFhJ3pKok7UpASdaJ1gVKcbc6L0AYMDslnmnIjfkM8RcqLzgvgEoxkiTlReELcwzTPhRNrDPE3eidCESpKAEw0gHEErRdaJ7AKKCZJORJdQjeN3onBAdgPlKDknoluoB9E65azUThkrvVPcKuVE4oY1L0ucglaLnEJWuf8nrVXSKWXF5i1pJ+FPlXfSWc04qazmnFJWbI6ZdVJYzTvVW1U4ZaSuzpU4Ff9URU6lVmVOGanBzTqnlJR5tdCpzKrUKWfF6ptipxKrcqeU1Pl4vdMTNiKwuSNxmpTSOGWsWHyickpYsad0iluxJnWKSrGldYpasSR2ilmxIneKSLGhdwpY0V/h5LaivcbJKUV5kZNPiu4qJ5cU1WVOHima65wcUhQXOt1KUVvqdCdFS+hkrByHRlDSOdlLpCZUnoic2Gm3CC1obEic2NghOiAzoLAjcKIPhEDYwhTKnWi/IT8gO8PsRbET3U+YHJCdYPSm1IlmA8MDsjfkn1Q6UWxhekD2gvhEnRM1Awo7REDYUOZEy4LGDtEOUUfrNL7N3IaODZ0doicEBp3T8DxjCxpDqG2QXP6FvdPoBaY9zC+guNEFBobT4BGGLUwvobrRfltYTvZDjBoYXkN34/xlYzv1bxE3MLyD9oZDaeh0fo+ogeE99L2MnXYu7vGeBza83DiN4TkXrHhJOvGYD3bc5Jx4zAlLbjJOPOWGNTdxJx7yw56fqBPvRGDTT8yJV0KwGqB1urzBKxHYDNE7De/sbwRhNYblZJ46BjFYjWI7PeEbCEOwGmfotNEnAfblFJdOE3AuhcaJY0kUTpxKI3DiUp5yJ+7MUOzElTlKnbgxS6ETF+apc+JAAVVOrJdQ48RyERVOrJZR4MRmHdNO7FUy6cRWLXNOLBUz48RKOXknFgRknahLSDrR1pByoqsi4URTR+t0L0VPSNSJlpSYEx0xndOFFAU5fifGC+idBlIMV2A4WVJM1mA5dVLEqzCdzlZE6xg4fVjxvZCh0zfy85wejy9+uYjuLkesrwAAAABJRU5ErkJggg=="
                            alt="" height="22">

                    </span>

                    <span class="logo-lg">

                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUwAAABRCAYAAAC5UZ+uAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsIAAA7CARUoSoAAAAN/aVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPg0KICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPg0KICAgIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6QTg2REQ2NUFCQTFCRTkxMTgxN0JFRDc2NUQ4RThGNEIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6ODVFODAyN0YxQkJBMTFFOUEzNEFEQUYwNDA3NUY3MUYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODVFODAyN0UxQkJBMTFFOUEzNEFEQUYwNDA3NUY3MUYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIj4NCiAgICAgIDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkFBNkRENjVBQkExQkU5MTE4MTdCRUQ3NjVEOEU4RjRCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkE4NkRENjVBQkExQkU5MTE4MTdCRUQ3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"
                            alt="" height="17">

                    </span>

                </a>



                <a href="index.php" class="logo logo-light">

                    <span class="logo-sm">

                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJMAAACRCAMAAADw83osAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJUExURQAAAO4uRwAAANcfYtMAAAADdFJOU///ANfKDUEAAAAJcEhZcwAAD14AAA9eAQXNOC0AAAOPSURBVHhe7ZLRctswDARb//9Hx5K2tkWCEgDimEym+6bDAdx48ufx8/jv5GPo9PcffC9k4ITPDtE6TCdkXhCvwuW02MpywuMMsxUYTkh0MNbTO2FgQUNN58TzNnTExJzWWEWdVli1Tjx8BU0dCSe5VcpJbJV0klqlnYRWE04yqd/0O1GXkHOiLCLjRFVGwommjrgTRSFhJ3pKok7UpASdaJ1gVKcbc6L0AYMDslnmnIjfkM8RcqLzgvgEoxkiTlReELcwzTPhRNrDPE3eidCESpKAEw0gHEErRdaJ7AKKCZJORJdQjeN3onBAdgPlKDknoluoB9E65azUThkrvVPcKuVE4oY1L0ucglaLnEJWuf8nrVXSKWXF5i1pJ+FPlXfSWc04qazmnFJWbI6ZdVJYzTvVW1U4ZaSuzpU4Ff9URU6lVmVOGanBzTqnlJR5tdCpzKrUKWfF6ptipxKrcqeU1Pl4vdMTNiKwuSNxmpTSOGWsWHyickpYsad0iluxJnWKSrGldYpasSR2ilmxIneKSLGhdwpY0V/h5LaivcbJKUV5kZNPiu4qJ5cU1WVOHima65wcUhQXOt1KUVvqdCdFS+hkrByHRlDSOdlLpCZUnoic2Gm3CC1obEic2NghOiAzoLAjcKIPhEDYwhTKnWi/IT8gO8PsRbET3U+YHJCdYPSm1IlmA8MDsjfkn1Q6UWxhekD2gvhEnRM1Awo7REDYUOZEy4LGDtEOUUfrNL7N3IaODZ0doicEBp3T8DxjCxpDqG2QXP6FvdPoBaY9zC+guNEFBobT4BGGLUwvobrRfltYTvZDjBoYXkN34/xlYzv1bxE3MLyD9oZDaeh0fo+ogeE99L2MnXYu7vGeBza83DiN4TkXrHhJOvGYD3bc5Jx4zAlLbjJOPOWGNTdxJx7yw56fqBPvRGDTT8yJV0KwGqB1urzBKxHYDNE7De/sbwRhNYblZJ46BjFYjWI7PeEbCEOwGmfotNEnAfblFJdOE3AuhcaJY0kUTpxKI3DiUp5yJ+7MUOzElTlKnbgxS6ETF+apc+JAAVVOrJdQ48RyERVOrJZR4MRmHdNO7FUy6cRWLXNOLBUz48RKOXknFgRknahLSDrR1pByoqsi4URTR+t0L0VPSNSJlpSYEx0xndOFFAU5fifGC+idBlIMV2A4WVJM1mA5dVLEqzCdzlZE6xg4fVjxvZCh0zfy85wejy9+uYjuLkesrwAAAABJRU5ErkJggg=="
                            alt="" height="22">

                    </span>

                    <span class="logo-lg">

                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUwAAABRCAYAAAC5UZ+uAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsIAAA7CARUoSoAAAAN/aVRYdFhNTDpjb20uYWRvYmUueG1wAAAAAAA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/Pg0KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPg0KICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPg0KICAgIDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9InhtcC5kaWQ6QTg2REQ2NUFCQTFCRTkxMTgxN0JFRDc2NUQ4RThGNEIiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6ODVFODAyN0YxQkJBMTFFOUEzNEFEQUYwNDA3NUY3MUYiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODVFODAyN0UxQkJBMTFFOUEzNEFEQUYwNDA3NUY3MUYiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIj4NCiAgICAgIDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkFBNkRENjVBQkExQkU5MTE4MTdCRUQ3NjVEOEU4RjRCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkE4NkRENjVBQkExQkU5MTE4MTdCRUQ3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"
                            alt="" height="35">

                    </span>

                </a>

            </div>



            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">

                <i class="mdi mdi-menu"></i>

            </button>



            <div class="d-none d-sm-block">

                <div class="dropdown pt-3 d-inline-block">

                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <?php echo Translation::of('Add'); ?> <i class="mdi mdi-chevron-down"></i>

                    </a>



                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                        <a class="dropdown-item" href="add_movie.php"><?php echo Translation::of('Add Movies'); ?></a>

                        <a class="dropdown-item" href="add_web_series.php"><?php echo Translation::of('Add Web Series'); ?></a>

                    </div>

                </div>

            </div>

        </div>



        <div class="d-flex">

            <!-- App Search-->

            <form class="app-search d-none d-lg-block">

                <div class="position-relative">

                    <input type="text" class="form-control" placeholder=<?php echo Translation::of('Search...'); ?> />

                    <span class="fa fa-search"></span>

                </div>

            </form>

            <div id="LanguageDiv" class="dropdown d-none d-md-block ml-2">
                <?php if($admin_panel_language == "") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/us_flag.jpg" alt="Header Language" height="16"> English
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } else if($admin_panel_language == "en-US") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/us_flag.jpg" alt="Header Language" height="16"> English
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } else if($admin_panel_language == "zh-CN") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/china_flag.png" alt="Header Language" height="16"> Chinese
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } else if($admin_panel_language == "bn-BD") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/bd_flag.png" alt="Header Language" height="16"> Bengali
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } else if($admin_panel_language == "hi-IN") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/hi_IN.png" alt="Header Language" height="16"> Hindi
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } else if($admin_panel_language == "es-ES") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/spain_flag.jpg" alt="Header Language" height="16"> Spanish
                    <span class="mdi mdi-chevron-down"></span>
                </button>

                <?php } else if($admin_panel_language == "ru-RU") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/russia_flag.jpg" alt="Header Language" height="16"> Russian
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } else if($admin_panel_language == "tr-TR") { ?>
                    <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="mr-2" src="public/images/flags/Turkey_flag.png" alt="Header Language" height="16"> Turkish
                    <span class="mdi mdi-chevron-down"></span>
                </button>
                <?php } ?>
                
                <div id="languageDropdown" class="dropdown-menu dropdown-menu-right" )">

                    <!-- item-->
                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="public/images/flags/germany_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> German </span>
                    </a>-->

                    <!-- item-->
                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="public/images/flags/italy_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Italian </span>
                    </a>-->

                    <!-- item-->
                    <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="public/images/flags/french_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> French </span>
                    </a>-->

                    <!-- item-->
                    <!--<a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="public/images/flags/spain_flag.jpg" alt="user-image" class="mr-1" height="12"> <span class="align-middle"> Spanish </span>
                    </a>-->

                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('English', 'public/images/flags/us_flag.jpg')"><img
                            src="public/images/flags/us_flag.jpg" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> English </span></a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('Chinese', 'public/images/flags/china_flag.png')">
                        <img src="public/images/flags/china_flag.png" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> Chinese </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('Bengali', 'public/images/flags/bd_flag.png')">
                        <img src="public/images/flags/bd_flag.png" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> Bengali </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('Hindi', 'public/images/flags/hi_IN.png')">
                        <img src="public/images/flags/hi_IN.png" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> Hindi </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('Spanish', 'public/images/flags/spain_flag.jpg')">
                        <img src="public/images/flags/spain_flag.jpg" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> Spanish </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('Russian', 'public/images/flags/russia_flag.jpg')">
                        <img src="public/images/flags/russia_flag.jpg" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> Russian </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item"
                        onclick="setLanguage('Turkish', 'public/images/flags/Turkey_flag.png')">
                        <img src="public/images/flags/Turkey_flag.png" alt="user-image" class="mr-1" height="12"> <span
                            class="align-middle"> Turkish </span>
                    </a>
                </div>
            </div>



            <div class="dropdown d-inline-block d-lg-none ml-2">

                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <i class="mdi mdi-magnify"></i>

                </button>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                    aria-labelledby="page-header-search-dropdown">



                    <form class="p-3">

                        <div class="form-group m-0">

                            <div class="input-group">

                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">

                                <div class="input-group-append">

                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>

                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>



            <div class="dropdown d-none d-lg-inline-block">

                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">

                    <i class="mdi mdi-fullscreen"></i>

                </button>

            </div>



            <div class="dropdown d-inline-block">

                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img class="rounded-circle header-profile-user"
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIAEAYAAACk6Ai5AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAABmJLR0QAAAAAAAD5Q7t/AAAACXBIWXMAAABgAAAAYADwa0LPAACAAElEQVR42uzdd2BTVf8G8OdktU33pGWVvfcSkCVTNiiogCgueMWForituEVx4AYXOFBAZYgsBUWW7CUbyobunTbz/P7Ir299VUZLk3OTPJ9/aiH9nudEmtz7zbnnChAREVGFbd0y/q7xdxmNCfPO3xr1W3y8c5rjrPVgQgISdHV0tyYk6OuLD7EmKkrOxd1yT1QUgC9lVnQ0NmAIDFFR2IOu0EdF4Tskix8iI6VJvo4uoaEYCR0eMpvxiEhH59BQfIPOeMRkwk6MQr/ISPG2/B39DQa5TbyCSZGRACCz/plPPC7H4NewMDlTTMVuo/EvfyP+53Hj5QtoYbfLl8US9Cgs/Le5ykwAkTiN9NxcvIPzsoXTiVbyKTE9Lw83iWj5qM2G19BYOIuKMB8xMsRiETZM19UoKkIyDsuzubloiN1Izc1FG2zA/txc9JQ/YnNuLqR41uXMyRGT5MeyWW6uE/ImcVN6ur6+7nncmpFR49W8q2MXpacL3W9iqnA4VP9/JyIi8kXiyksQERH5nsP39q9330/x8cbOxk7GTtWr63ZgAnJq1JAr8LA8X7Oma5cslE2qVxcbxXGhr15d3CUXwlqtmnxXtpThCQniU/Gb2BYfL5/HbMyPj7+cMaX07JzKV1+U+xhAC/nF05gCa0aG7IIVeCo9XcyQ3WHMyJATxWYEnz4tJ4pX0PXMGV1L2QRHT58WZ8QMfHfihDMT7Z2Fp04FjXduc6w6fbrqrB/bzZyVmenZGREREWkLGwBEROSTpBw5cuRIvf5ESUm35KCaNXWjcIOcW6+e8wd5l+uqunVFOp7RldSrJ8aKVfJc3bqyOWoiv149XI+bcV/duqiKQbCFhPxvTU9n1lJ932wAVFr9s1iNbcXFeBkl6HPkiLDCht+OHpV3i7aYeOSIBG4Ui48c0bXGS9h19KgrGXm6PUeO1EIrROHkSSGmiqnC5fJsYiIiosrFBgAREWnKyUeGrJvSoGpVeY8Y4HqjSRNRV46RHzdt6mrtesM1pUkTPCQSReOmTZGKd3Fvq1YYg3moEhpaGWP71QnuJQV4A6CCRD/slS/bbPJDOMRVR47gc7TENX/+KT+Xi+W7+/bpTogh4t4//xSjZRW5et++GuuD89KbHTggxPz58+c7nZ6dIRER0cWxAUBERB7132vkHzgnQ5c3aICd8qjo3batq7m4D+PatsUDuA0t2rYF0Ato3RqdYRcvmM1/reHpE0NvjaOt+mwAeGMcMV6+gCS7XT4uBsnJhw/jK3FaPL1tm+4zOUHkbduGmq47XH22bTP0Bhw/b99eddaP7WbOtFi8k5SIiAINGwBERFQhpUvwT79hG1r9wSZNXCucjXT3XnWVfE2MkAs6dsRTcoHI7dABcWIZHmzcGCnYjHYGQ8XG8tacAqk+GwCaGmcqOmOBwyFcOILF+/bJbvJqvL15M0ajUPTYtEmX64p0JP/xR43EdmOr9N23j5cgEBFRRbABQERE/8q9SV5EhHGSvjj4fJcu4kacxJarr8Z27HBN6dQJw8S94ul27eSbiJdVwsM9mUXTJ24+W58NAF8cRwzHILktP18+hXFwbdmCAfIjPLxpEx7DO3La+vUlzcWn1mvWrWt05+Iun75WUOCdGRMRka9gA4CIKEAd+HjIuikNwsNDeosBrjeuusqV7KoJ9O4t5uIUpnXpIj6Xv+DpDh3kTDEVK/56+7h/4ombL9ZnA8BXx7lo/dlIRw+nE91wFoMPHsQjeFHUXLdOLMA81/U//2x80ZXidK5Zw7sgEBEFJjYAiIj81KnpI0c+uCEkxB5e8q6ua5cuusOAONynj7wdwG19+og0LMK8li1RC0vwWvlPBv+KJ26+WJ8NAF8d54rq/yZnYa/LpZsmbsPsXbuQjdb4YtUquVG8I8+uWuVKzs2zfLBuXW3xm5gtSkq884wREZG3sAFAROTjUocNuubRPS1bop7ugOv6fv1EhOstvNenjxwjYnB7ly7QYYa8MTj47z93Zaf8/0vTJzwaGkdb9dkA8NVxKuVuBhf6v5+L1XJhcTF+xh5E/f47Xpe34PdVq3QP6yboG69YUWPyopvfTd+zx7MzJCIiT2EDgIhI41Jld5kig4NlzajIoqVduuiquj7XvTd4MDKxUJ4bNkz+jBz0qVnzYjX+7YSBDQD/mwcbAGrr+9I8LvZ//2L1xQRMx6oTJ+RH2IQ+K1aINqKhsP34ozMzt33Rx6tWceUAEZG2sQFARKQRZ8KG7X+8Z2ysfabrJceAoUPlKLkCvYcMweOYjkW9e2MC5qGwYve7ZwNAG+Noqz4bAL46jsoGwAUtwm1yalGRgBwg9CtXogpuFr8sXixOB8N6avHiGpPnz/9kcna2Z58ZIiK6FDYAiIi87OCHg7ZObhMXZ1qOR3TnBwwQHYUVTUeOxHI5A0/36yc/E1Ox5OKb7pUXGwDaGEdb9dkA8NVxNNkAuJAvkY6uTiceQH3U37RJRCLM5Zw/X/bSPyc/nTcveeUP8TNnnjvn2WeMiIhKsQFAROQhx2YOTnvi/ipVxPP4wC5vuEGMQ6FYccMNspZ8CF06d0ZPMQFxOh2g5oSBDQD/mwcbAGrr+9I8vNYAuFD9L5GOzk4nSmBGw/Xr5QQsEk/Omxe0wt7a8NC8eUl3LDvyzoCMDM8mISIKPGwAEBFdof/utj/MWmL4ftAg3XyZJbrfcguWyxmI//9P9L/X3m302ADwv3mwAaC2vi/NQ3kD4EJKGwMPoD4ObdqELDlJZM2ZU7xKFFvD5s5tdOfiLp++VlDg2YRERP6LDQAiosu0RnaXKdJgSB4W8bjlzLXX6o5jk+g5dqycjt/w5ODBqItB+DMkpCK12QBQW99f5sEGgNr6vjQPzTYALmQnIhFnseAr7MSvixcjFyPEO19+WXNF0N7Ml5YvF2L+/PnznU7PJici8n1sABARXUBq8yHrpjRo2BC75dXy4KhRoh5uFSNuu03+jBzUvfiu++XFBoDa+v4yDzYA1Nb3pXn4XAPgQqLkLFx17hzMWI9p8+frW+Fq8c4nn1T/c0mVD3rv3u3ZmRAR+R42AIgo4B34eMi6KQ3Cw4MecPURtptuwmwxTe6+7Ta0xUrxYqdOgI8dEF9mfTYA/G8ebACore9L8/CbBsCF6sciEhvXr5d62QE9PvvMvDj4N32Xb79NuHH+gvdvKCz0bAIiIu1iA4CIAk6qHLT18Y8aNQLEOKdz3DisQh+xffx41McRxEZH/9vP+MUB8d+wAeB/82ADQG19X5qH3zcA/j7fFFjRq6BATsXNiJk71/WA61P8+v77tRf+uOajF3bt8mwiIiLtYAOAiPzWnyNGjkiRJlPIq1ar9bGhQ3VfuW6Wc8aPl2PFl7ild+/y1PLLA2I2APxuHmwAqK3vS/MItAbARR6dIlO2bXP/98yZugXBr4Qe/+KLGpPnz3+zc3GxZ5MSEXkfGwBE5DdOPjJk3ZQGVas635Y7dFUmThTdkSTF+PFyJmajU3z8ldTW1gFr5dRnA8D/5sEGgNr6vjQPNgD+nZiMJTieno7RaIyBM2fKD/W/yb3vv5+88of4mTPPnfNsciIiz2MDgIh81om+g7Y+srZNG5mNpiJkwgT5rVgn7rrlFugwA/2CgytzLC0fsFa0PhsA/jcPNgDU1velebABcHnEYOzFAzabXIymiF60SH7vCsOdb75Z66Ef5360dONGz86EiKjysQFARJonZYpMkTpd6hPbWtvOX3edCMGTMv/BBzFWzJGfdu7snQz+V58NAP+bBxsAauv70jzYALhCmZgi5bp10oprxWdvvpncqXVBom3hQiGmiqnC5fJCAiKiCmEDgIg0p/TafbOjOKtk70034VVRVzzw+OMwIQ0dGjX662N5QF/x+mwA+N882ABQW9+X5sEGQCWPIzFFvnrsmKiLrzBtxgynI+9920sffVRb/CZmi5IS7yQiIro0NgCISLn/3oYvCV+JjbffjpUyUnR45BFMwp8YWa3axX6WB/QVr88GgP/Ngw0AtfV9aR5sAHh2HHE9QtAxLU1ukd/I2z780AUdbHjrrdpikZgtcnO9k5CI6J/YACAirzs1vV/1BzfExDibB0UE3/7gg7KPa44cd999OC6mIjcysjy1tHCg56v12QDwv3mwAaC2vi/Ngw0A744jauEk7svNRSfZTtwyY4ac6zqn6/jWW8nJS5d+8EFOjncSExGxAUBEXnAmbNj+x3vGxtoKnI1cv9x3H44iGcUPPAA9WornoqKupLYWD/R8pT4bAP43DzYA1Nb3pXmwAaB4nLfkXGwuLMQkXZJ85L33dAtM/Vznp02rMXn+/E8mZ2d7ZwZEFIjYACCiSnfww0FbJ7eJizNNEG0N2+69F5DbxKuTJlXkE/5L8YkDPY3WZwPA/+bBBoDa+r40DzYANDZOaUNgGlagw6efOj/D1a4NL71UZ/ySKh/vTUvzzoyIKBCwAUBEV8y9aV9YmHl8SQ3r4/fcgz5yjKj9+OM4LqbK1Mo94f87nzzQ00h9NgD8bx5sAKit70vzYANA4+O8JefKn90rBPD8e+857Ka+4teXX65bb/6CmbPy8rwzQyLyR2wAEFG5/XeXfnPJ49bHx43DbEwS5597DscRhaQqVf76WB7oabc+GwD+Nw82ANTW96V5sAGg/XH+p/5qbJFPZWWhp7xJdH7tNVfN/Ddsp99+m3cZIKLyYgOAiC5pjewuU6TBUCss3Gybd9ttYpzYiDrPPCMfxtP4vnr1i/0sD/S0W58NAP+bBxsAauv70jzYAND+OBe9y8CraIujJ0+6uuAIPp06NXlUUEnuI7NnCzF//vz5Tqd3ngEi8kVsABDRBR2rMTTisUd799a1cq4Wk954Q84QUzGjefPy1OCBnnbrswHgf/NgA0BtfV+aBxsA2h+nXHcZGIV+2HnggKu9fBtPP/RQrbeXHJo1ZNky7zwTRORL2AAgov868eLQLo+fa9LEle+ajlWvvYb/4AXsHzDgSmpq6QBJy+OwAaC2vr/Mgw0AtfV9aR5sAGh/nCuqH4/RqP/jj2Kjbqs4MmlSzV4LX5858+hR7zwzRKRlbAAQBbBT0wcefPKaatUc3XQPOFNeeAG75adi/i23oKeYgAidrjLG0PQBkobGYQNAbX1/mQcbAGrr+9I82ADQ/jiV8v+5Berjd6sVZgTLNW+/bb3e/m3IjhdfrP/usiPvDMjP984zRURawgYAUQDZumX8XePvMhpj088b4vZNnCimyx3ynuefl58gHnvCwz0xpi8cIGlhHDYA1Nb3l3mwAaC2vi/Ngw0A7Y/jkfr/v5mguBPDxIfPP1/DEZSZe+Tdd7l3AFHgYAOAKACcuG/QxCd69+rlqompuG7GDIwQt+N0kyaAjx7AeLG+v8yDDQBtjKOt+mwA+Oo4bACore8v85ASEAPgQO8dO0QmGstJkybVSFs8/ZPza9d6dmQiUokNACI/dPKXYQ8/dWPduq45jpucc15+WT4rpoqpI0f+22P94QDGG3x9HmwAaGMcbdVnA8BXx2EDQG19f5nHv9aPx2gs//FHKWQGfr7//lohS+77uFFqqmeTEJE3sQFA5AdKl/bHrTzXLXbII4/Im5AoPnr6aegwAy2Cgy/2s355AOOD47ABoLa+v8yDDQC19X1pHmwAaH8cpfVzsVo+V1yM7QjHmWefrXlr3tnq7d54Q+h+E1OFw+HZZETkSWwAEPmwVDlg3hPzWrXCrfq6GPbxx5iKZ/Fs27blqeHXBzA+NA4bAGrr+8s82ABQW9+X5sEGgPbH0VT9Z5CAsN27dV/K08J15501nEuWz5qxZYtnExKRJ7ABQORDTk0fOfLBDSEhjodK9oe8k5KCZxCMGQ8/jNuRhDf1+orU1NQBhgbr+8s82ADQxjjaqs8GgK+OwwaA2vr+Mo8K1X8RneWbDgfekw3ED++/H7S6pK714SeeSOy3quUX6UVFnk1MRJWBDQAiH3DMMmTyk8e6ddO1kHfL3bNmyVV4EJsbNKiM2po8wNBQfX+ZBxsA2hhHW/XZAPDVcdgAUFvfX+ZRKfUlpuD2Y8cAMUCkTpiQXGtR/qwxP//s2eREdCXYACDSoFQ5VKbIqCjR3llir//qq3Ka+AK77roLtbEEL1bmaZuPHGAorO8v82ADQBvjaKs+GwC+Og4bAGrr+8s8PFJfQuLZ+fMNzXTTbPfefXe1woWN5yzMyvLsTIioPNgAINKQY2sGPfqkbvBgsVAIpHzwASbhT2mtVs2TY/rkAYYX6/vLPNgA0MY42qrPBoCvjsMGgNr6/jIPT9YX1yNEZqSlYR++kKumTKlpWWz61DJnjmdnRESXgw0AIoVOTR948MlrqlVz2nW3yV8+/FDeiFjx9KBBf32MLx8A+EN9f5kHGwDaGEdb9dkA8NVx2ABQW99f5uHV+jPQVb64aBH26McZnrn77uSVP8TPnHnunGcTENG/YQOASIHjdw48+OQ1w4fLKF1TTJg1C/egP/bExv7bY/3qAMAH6/vLPNgA0MY42qrPBoCvjsMGgNr6/jIPJe87tXASnXNzcRZj5MC7766ZtPiRTxO/+cazSYjor9gAIPKC0t37nfNKRpl3vPKK/Aaf4ez991/Oz/rjAYAv1feXebABoI1xtFWfDQBfHYcNALX1/WUemqhfRfyIJl98EbLIdF1QjYkTE26cv+D9GwoLPZuMKLCxAUDkQUdfGbLuydh27fQfy0Rs+eoruQoP4pPy7d6viTfoAK7vL/NgA0Ab42irPhsAvjoOGwBq6/vLPLRUX9RBNWxKTXW95sqVX4wZU+uhH+d+2mbjRs8mJApMOtUBiPyJ+81OiNSlQ+5+6tUHHtB/KG/EoPXrK3LiT0RERBQI5DGcQcfatcUBXUvUWrv2hBws75DPPivlyJEjR+r1qvMR+ROuACCqBEePDNr66JSaNXV1xauGV+fMwXGU4Knu3SujtpY69IFY31/mwRUA2hhHW/W5AsBXx+EKALX1/WUevlBf3Ia30GTjRtdSuVQMHDOmVsiS+z5ulJrq2eRE/o0rAIiuwLHHB7V6qmDECN0qYTV8t2NHZZ74ExEREQUy+RkmYV+nTromGCBH79hxInzIutsfGTNGdS4iX8YVAETlcPje/vVSZESEscQwwLn/3Xflk0iVX40d68kxfaFD78/1/WUeXAGgjXG0VZ8rAHx1HK4AUFvfX+bh0/Vfwvtyz+efh/QMmhT88H33cfNAosvHFQBElyG1+ZB1Ty1r2NCQrN/olBs3yieRiq89e+JPRERERP/iCUxEs3Hjir8teaW4x7ZtJzsPvvOu9k2bqo5F5Au4AoDoItwn/kOGYLcrGPFz5uC4mIqFkZF/fYxPd9BZXzPjcAWA2vr+Mg+uAFBb35fmwRUA2h+H9S+/vkiBFa6CAllfFMn6t9+e/OSidZ89uWCBZxMQ+SY2AIj+onS32eMo2d/w7IsvYg3ux+opU1AbS/D8vx8u+dMbKOv77zzYANDGONqqzwaAr47DBoDa+v4yD7+sfwJDcIeU6CRjkPTOOzX1+cNr1J48Weh+E1OFw+HZRES+gQ0AIgAHPxy0NUXGxQWtEX0dqV9/LV/B1eLTPn0u52f98g2U9f1uHmwAaGMcbdVnA8BXx2EDQG19f5lHQNSfjJtx7W+/OfvK7rrnbryxzvglVT7em5bm2WRE2sY9ACigneg7aOsTx9u0MfVEDYd9y5bynPgTERERkYZNx5dY3r27Ph/nXLlbt56OHlrrttVXXaU6FpFKbABQQEodNuiap/vecotrimivw7p1MIo7xXO1aqnORURERESVbKR4Bn2rV3e55PXiut9+O/HukBm3H7zrLtWxiFTgJQAUEA7f27/efT8FBRmdRkek5Z135BTZHDsr54VfE0vcWN/jfH0evARAG+Noqz4vAfDVcXgJgNr6/jIP1gdQRfwoP/jiC917pusLb54wocbk+fPnzy8u9mxyIrW4AoD82slHhqxLkVWrGk8bmkQ+9fvvlXniT0REREQ+LE0OEnePHetaYV0T3mnNmlQ5YN6tMjFRdSwiT2IDgPzS0YSBc55o0ayZ63s502ncuFG+CYkB7durzkVEREREGjMLnbH3qqt0Pxiy9Tu2bk2VQ+WtslUr1bGIPIGXAJBfOVZjaMRTV/fuLU46V+PtBQtwXEzFwshIT47pE0vcWF/z4/ASALX1/WUevARAbX1fmgcvAdD+OKyvrr5IgRWuggJXpEzFzhtvrPX2kkOf7ly2zLMzIvIOrgAgv3D8+kGvPPPdbbfp6jpXi+U//eSNE38iIiIi8j9yKoKgCw8XxeJ214+LF59sOvSVcdkTJqjORVQZuAKAfJK76yvEcQyWT8uUFBzHEDyTkvLPx3grC+v7a31/mQdXAGhjHG3V5woAXx2HKwDU1veXebB+BcapKsdhxYwZNQ1Lrvvs7KRJ7t8jbyUhqhxsAJBPKd3N37DFeD6yySef4Bt5jfhkzJh/eywPAFjfl8ZhA0BtfX+ZBxsAauv70jzYAND+OKyvtv5Fx5GQeHb+fFdy3mJXzVtuqS1+E7NFSYl3EhFdGTYAyCecmt6veoqMiXE8ZOrkGvn99ziOEjTu3v1iP8MDANb3pXHYAFBb31/mwQaA2vq+NA82ALQ/DuurrX8544jO8lvEbdhgGCD/NOYOHVp11o/tZs7KzPROMqKKYQOANO3EiYEDU2SdOq4SXZLLtHQpTEjDY40aXc7PauGNgfV9v76/zIMNAG2Mo636bAD46jhsAKit7y/zYP1KHGcF9PjyyBH9ctdmeWDAgOrf/3jm87qHD3snIVH5cBNA0qRjOwYefPKaDh3knbrbXDs3bSrPiT8RERERkdf0gxM316vnOqnrIrr+/vuJE8OG3Xpr27aqYxH9GzYASFNS5UD5pOzRQ3edbpEuYdUqOROz8X18vOpcREREREQXI79DMfpVqYK3nF+J13/99fjTQ9bd/sg116jORfRXvASANOHYmkGPPjNy8GBRU/SWsfPmQYcZiA8OvpKamloaxvo+W99f5sFLALQxjrbq8xIAXx2HlwCore8v82B9L4yzE5HYYrGIMNcD4u3hw2v2+rHdp71WrvROcqJ/xxUApNSxmYPTnr7q5pt1c0SYrPH995Vx4k9EREREpFwr5KG92YwHdTfI7CVLjt85VHebdfhw1bEosLEBQEoc7zfY9NRHDz4o6mER1s2ZI5/BZoQaDKpzERERERFVJrkEzfCTyaQ779qJId9+e3LG0Iduq3rjjapzUWDiJQDkVanNB737zLlHHsFisUK+P22aJ8fyiaVhrK/5+v4yD14CoI1xtFWflwD46ji8BEBtfX+ZB+srHOdLpKOe0ykfkmNcDSdMqBWy5L7ZIz75xDszokDHFQDkFakrBz/4TOajj2KxWIEPPHviT0RERESkWTcjAUf0erFFhIj4WbNOXjv4p1vlpEmqY1Fg4AoA8qhUOVg+LZ99FscxRKSkpPz179gZZn1fqO8v8+AKAG2McyX1hTCZjEZAp4uICA0F9PrwcLPZ/X1YGKDXu/9cCLP5rzup6HQhIUFBAKDX63T/W/F/R3A6XS7A5Soutlr/mrmoqLgYcDrz8wsLAZeroKCoyP19UVHZ91LabHa7/z7/WhqHKwDU1veXebC+Nsb5n/onMAS3PftscrfFd37efepU78yQAg0bAOQRx1cOaZJifP55WV/WlY8/9dS/PYZvDKzvC/X9ZR5sAGhjHCkBnc594m4y1apVtSpgNNaoUaUKYDBUqRIb6/4aEwMYDAkJ7q/uPy/9Oa0qbQQ4HOnp2dmAw5GWlpXl/ur+Pj09Kwuw20+ePH8esNmOHz97FnC5CgstFu89/97gC/NgA0D747C+2vpq5yF+lZ+9+mpy8qL82eKxx7wzUwoUbABQpUrtO8iZEvLii/hIDJOPPPHExR7LNwbW94X6/jIPNgA8P07pJ/NBQY0a1apV9tVkql27atWyE369PjY2MtI78/EFTmdWVm5uWUPAZktNPXMGsFoPHEhNBazWgwdTUwGXy73i4Er4wr8jb9VnA0D747C+2vpamId4F1NQ4/nna762uMvnzz/zjHdmTP6ODQCqFJfzif/f8Y2B9X2hvr/Mgw2AKx9Hr4+KCg8HgoPbtGnYEAgObtasXr2yE32jsXr1hATv5AwsUkoJ2O1nzqSnlzUGSkr27j18GCgp2b79wAHA6czLKyi4VCVvJdZ+fTYAtD8O66utr6V5iB74XH72+OM1UxfHzBavvOKdmZO/YgOArkjq04PbPV38zDO4HUni5fJdq6SFF1RfGIf11db3l3mwAXA53M9IUFDDhsnJQEhI27aNG5d9NZnq1q1Wzf24ynzu6Eq5GwQ229Gjp04BxcXbtu3bV/bVaj106MQJ9+NcLm8l0n59NgC0Pw7rq62vxXmITAxAy8mTa7Zd/J/PH3zjDe88A+RveAhDFXJ87+C0Z05OnixDcSc+fv31itTQ0guqlsdhfbX1/WUebAD8k9FYs2ZiIhAWds01bdsCoaHXXNOuHaDXx8RERHh2PuQ9TmdWVl4eYLFs3LhzJ1BUtH79jh2A1bp//7FjQGkDoTL5wu8DGwDaH4f11dbX5DxOYAhukxK7YcGbEyYk37v4/s8XzprlnWeC/AUbAFQuqXLwT0//NGkSjuMDsenNN6+klqZeUDU8Duurre8v8wjkBoDRWK1afDwQFtanz1VXAWZzt26tWwMGQ1xcVJRnc5N2ORwZGTk5gMWydu3WrUBBwc8/b9wIOBxnz2ZkXFltLf8+lGIDQPvjsL7a+pqex5dIR22nU4SLzuKjMWNq3r/ojc/Ofvutd54R8nVsANBlOWYZHPPMZ2PHik14BbfMno3aWIKpV3b6oMkXVA2Ow/pq6/vLPAKhASCE0WgwACEhHTo0bQqEh197bceOQHBwixb167sfwaX7dCmllxIUFKxYsX49UFT0669btgBSWq022+XV0MLvw6WwAaD9cVhfbX1fmIe4R76AE3Y7NupK0Pj662tmLerw+ftLlnjnmSFfxUMhuqjUDwavf2bc0KFiM1ajyoIF8hlsRpDBUBm1tfyCqqVxWF9tfX+Zhz82APT66OjwcCA8fODALl2A8PD+/Tt1ct8uLzTUs3kocLhc+fmFhUBBwfLl69cDBQVLl/72G+B05uZeaNNBX3i9YANA++Owvtr6vjQPMRh70dtmc10jDS7zsGG13l5yaM51y5Z55xkiX8MGAP2r48WD30mRPXvKs2gkH1q6FDrMQHhwcGWO4QsvqFoYh/XV1veXefhDA8BgqFo1Lg6IiHCf8IeF9evXsSMghMlkNHp2fKJSUjocTidgsfz++7ZtQF7e99///DNgt588ee5c6WM8neHKa7ABoP1xWF9tfZ+cx05E4jeLRTceCa59/fvXSFs8fU7I2rWenQH5GjYA6H8c2zHwYIrs0EH3noiQ9/zyi3xSjEdcWJgnxvKpF1Q/ngfra2McNgD+yWhMTk5KAqKiRo/u2xcwmzt2bNbMnZxL+Uk73JsIWiwbN+7aBeTmzp27dOn/NgQqf8Qrr8EGgPbHYX219X15HqKHfFN+lpcnf9VPxrhevZKTFy6cPXvbNs/OhHwFD6EIgPsT/6dq1q6NpnKkfsSmTfIXcZcM8+wdrX3xBdUf58H62hiHDQDAaKxePSEBiIwcObJXLyA0tHv31q0BQKfT6Tz7/BBVntKGwIYNO3cCublfffXjj4DdfuZMWlpljXDlNdgA0P44rK+2vl/M4xPUkk9lZuoisdn5XqdONSYv3vTlm0eOeHZGpHVsAAS4U9P7VU+RMTGOh0xZwIYNOI7eeLZhQ8DHX/C8UN9f5sH62hgnEBsAen1UVHg4EBV1883XXguEhfXu3b49wBN+8i9Op8sFFBa67zJQ2hBwOvPyLrSHwKWwAaC2vr/Mg/W1MY436otR6IeTBw7Iuc6f7EmdOycnL1369dc5OZ4dmbSKDYAA9eeIkSNSpMlkblxyHNcvW4bbkYTmPXv+9TH+8ILnDb4+D9bXxjiB0AAQQq/X64GwsAEDOncGoqLGjOnXD9DpzObK3WGESLukLCmxWoH8/IULf/kFyMtbsGDlSkBKu93huNwaV56DDQDtj8P6auv7yzz+p/7HKETttWttOfaTER369q3/7rIj7wywWj2bgLSGDYAA434RECJ15+D7U+Ts2SIKqXh27NgLP9bTWXy3vr/Mg/W1MY4/NwBCQtq1a9wYiIm5666hQwGDISkpLs6z8yXyFXb72bPp6UBOzqxZCxYAxcXbt+/bd/GfYQNAbX1/mQfra2McJe//TqRi/jff1Ki9eM9sy+jR7tcDbz2jpBobAAEmte8gZ0rIiy/KD8UwTHniCR4AaH8c1ldb31/m4c0GgE4XFhYSAkRH33rrwIFlu/UT0aVZLOvX79gBZGd/9NG337ovFSgs/N/HsAGgtr6/zIP1tTGOyvd/WUMuwudTpyaLJWK2ePZZzyYhrdCrDkDecSxkyNgUefvtWIbPYX/99dI/507aRIGrsn//zearr27ZEkhIePbZO+8EgoObNq1TR/UsiXyL0VizZlISEBbWp0/nzoDLVVRksQA229Gjp05V3jh8/ycKXKW//2KvsCCqe/cHSxrub5l3/Pibew5m7zqwa5fqfORZfPn3c6lyoEyRPXogSVcdT61YITegDQwmU+nf8xMA7Y/D+mrr+8s8PLECQK+PjAwNBWJj77tv5EggJKRDh6ZNPTsPokBlsWzatHs3kJX13ntffQW4XPn5f18ZUB58/9f+OKyvtr6/zONy3v/Fg/IFHLHbXdN1XeTJAQOSay3Kn3Pq5589m4xUYQPAT514cWiXFNmkibOP6yQeXb8ecWiJkKiovz+OBwDaH4f11db3l3lUZgMgOLhly/r1gbi4Bx+86SZAr4+JiYjwbH4icnM6c3MLCoCsrBkzvvgCKC7etu3PP8tfh+//2h+H9dXW95d5lOf9X9yPQeicn4+uwiyqd+lSY/Kimz8fuGePZxOSt7EB4GdO9B2e8cTxpCTXSsdk4/RNm+Qx5CCmZs0LPZ4HANofh/XV1veXeVxJA0AIo9FgAKKjx40bOBAIDx806Oqr3X/DZcREqkgpJZCfv3jx6tVAbu6cOYsXA1I6HJdzNwG+/2t/HNZXW99f5lGR938xEb/h/PHjjiWOWVjeqVNt8dMNs8X5855NSt7CQzc/kSq7yxQZHIywiKHA2rVyDySedd9R+2J4AKD9cVhfbX1/mUdFDgD0+ri4yEggPv7RR8eOBYKCGjZMTvZsTiKqGJvt6NGTJ4GMjFdemTULcDjS07OzL/x4vv9rfxzWV1vfX+ZxRSsAX0IT7N60yWqwL4h4sUcP3jbQP+hUB6BK0iKiNvDuu5d74k9EdCGlm/clJb3xxgMP8MSfyBeYTHXr1qwJJCVNn/7oo+5LdRo2VJ2KiHzaE9iHFh07BucZRuT3f/tt1XGocvAuAD4u9ZbB21Lk+PHyI+zHs888U96f5/JdosD199//iIhhw7p3B+LiHnpo1ChApzObg4NVpySi8hAiKMhkAsLCunVr3x6Qsri4pASwWg8ePH78r49TnZSIVCn3738vkYGF7do9VL3Bva2ePn36zZWHlu2at2OH6nlQxfDl30cd2zHwYIrs0AENdTOAtWtxHifxbFBQeetwCaD2x2F9tfX9ZR7/vgRQp9PpgJiY8eOHDgXCwwcM6NzZszmISI3CwlWrNmwAsrM/+OCbbwDA6XQ6//2x/vh654vjsL7a+v4yj0q9C1AVTIGtpARPAa5WXbvWfG1xly8e3brVszOgysYGgI85EzZs/0s/x8Zav3HEWBdu3Yom4k7E1qpV0XpsAGh/HNZXW99f5vHX+jpdcHBQEBAfP2XKmDFASEi7do0be3Z8ItKG4uIdO/bvB7Kypk37+GPA5bJYSkr+9zH+9Hrny+Owvtr6/jIPT9wGGK+gLdqePGmwuwbagtq2rTrrx3ZzJ2RmenYmVFm4B4CPkHLkyHnz9HrrL86vbYVff32lJ/5EFHhKb9eXmPjqqxMn8sSfKBCFhLRu3bgxkJDw4ouTJgF6fXR0ZKTqVETkUx7DNmyrWdMpdC0MY775RsqRI0eO1PPSch/BBoCPSD1YYth3zSuvIB47sbNvX9V5iMh3GAwJCdHRQGLiyy/ffTdgMtWuXbWq6lREpJLJVKdOjRpAlSrTpk2eDBgMiYlxcapTEZEvkU9hhJjYq9fpWtb3QuzPPac6D10edmo0LlUO2poihw3DLhEM89tvIxqHxG+Vt3UPNwEi8l9GY7Vq8fFAYuJLL/3nP4DRWKVKTIzqVESkJTpdaKjZDISEdOzYsiVQXLx16969gMtVUFBUpDodEXlCpR//9wYwvkuXSXUbZbes9uefb60+eHLXun37VM+T/h1P/zQqtfmQdc/3a9gQp+UGZ4/Nm+U2/A5rRMRfH1MZ1wxxDwDtj8P6auv74jxMpuTkxESgSpXnnrvrLvcS3/Bwz+YnIv/gdObk5OcD6ekpKTNmAHb7iRNnz1buGL70eurP82B9bYzjk3sAXKj+M7BiY0GBrC+KnNd27Jj85KJ1X73DRoDW8BIAjTl8b/96KTIiQs6RfRzLFy36txN/IqJ/U/qJP0/8iaii9Pro6IgIoEqV55+fNAkwGmvUSEpSnYqIfMJzCEKn8HDdbHlS/+L8+enfjhwxckRYmOpY9L+4AkBjju0YfH+KnDMHkUgVU8eOvdhjuQJAbX1/mQfra2OcK6lvMCQmxsQASUnua/z1+thYburl/0qXaDscWVl5eWXfu1z5+e6vhYUWC+BylZTYbADgcFzotm9uRqNeD+h07vvI63RhYWYzoNNFRISGAjpdeHhoKGAwxMVFRZX9Pfk3pzMrKzcXSEt74ok33gAcjvPnr3Svby2/nmppHNZXW99f5uHVFQB/9w6miB2ffFLztcVdZu+5807PzpQuFxsAGnHs8UGtUuSIEbhL1BBT58+/nJ9hA0BtfX+ZB+trY5yK1C89EUtMfOWVu+8u2+yPfJPDkZaWlQXYbMeOnT0L2O3Hj589C9hsJ06cOwfY7WfOpKcDTmd6enY24HIVF1ut/1ujfP+Oyn8I+L+3kzSbg4Pd/+5iYgCDoWrV+HjAZKpVq2pVwGhMTq5a1b3ZXPXqZY8j31T67zMt7fHHp08vawxUhBZfT7U4Duurre8v81DaACi1UNTD5ptuqnn/ojfmHPj2W8/OmC6FDQDF3Ev+q1fXJxhmi2m7duFmvILiyztEYgNAbX1/mQfra2Oc8tTX6cLDzWYgKWnatHvuKVv6T9pmt7tP5IuLd+w4eBCwWvfvT00FrNYDB1JT3ddeFxRc2RjebACUV+nS8qCgxo1r13Z/rVMHCAlp2bJhQ3fDgEvNtc9uP336/HkgLe3RR6dPd680Ke9mgVp6PdXyOKyvtr6/zEMLDQDRGidxOjdXf53rYzmrZcuqs35s90Xdkyc9O3O6EDYAFJEyRaZInS512LZtwM8/400xVUy95pry1bjyHGwAaH8c1ldbX0vzEMJoNBjc1+aOHw8EBzdpUquWd+ZPlyal0+l0AiUlO3ceOgRYLBs37tkDFBdv337gAOB0Zmbm5Hg6Q3ke7d0GwKWUrmgJDm7btnFjwGx270ofHNyyZYMGgBB6Pe8yrR1W6969hw8D6enPPvvOO4CUdrvDcXk/q4XXU18Yh/XV1veXeWihAfBf2SjE9rVra7QMii1u3LOnEPPnz59/8YvTqPKxAaDIscWDxdSQJ59EMwySj77wQkVqsAGgtr6/zIP1tTHOxesLIQQQH//ww6NGAaGhXbu2auWdedOFWa1//nnsGFBYuGbN1q3uE/7du93X4lss//4z2vp90FYD4EL1S/ceMJs7dWrZEggLu+aaDh2AoKAmTerU8WweurSiot9+27wZyMp6883ZswFAykv9O9HW74F2x2F9tfX9ZR6aagCUjp+GLTLj0UdrtF987otl06Z59hmgv2MDwMuOHBk48Lnn2rbVd9HtdIkNG+QGtIHTZKpILTYA1Nb3l3mwvjbGuVj96OhbbunfH4iMHDGifOuEqDKUntAXFv7yy5YtQGHhypUbN7qXQqenl6+Wtn4ffKMBcCFGY/XqVaoAYWH9+nXuDISF9ex51VXcnFCVvLx585YtA/LyvvpqyZKLP1ZL/460PA7rq63vL/PQZAPgQfkC9tnt6Kxfj4+7dKkxeeHdc1pt3uzZZ4JKsQHgJedX9Nn12pzQUEtCcMfCsdu2IRK9xdSGDa+kJhsAauv7yzxYXxvj/Ft9s7lTp2bNgISExx5z3xPEvRKAPMvhSEvLzgby8xcvXrsWKCxctWrTJkDK0t30K05bvw++3QD452yCg00mIDS0e/d27YCIiKFDe/Z075GRkODZ3ASUfvKfmfn6659+Clgs69Zt23ahR3o6ibdmzPr+XN9f5qHFBsB/nYIew44cCT4dpC/+unXrhBvnL5i/oLDQs88I8VDSS1KbD66VIj/+WC5CczH1jjsqoyYbAGrr+8s8WF8b4/y1vsmUnJyYCCQmvvbavfcCOp37xIY8w24/ezYzE8jL++abFSvcS5q3bwcuZylzeWnr98G/GgD/pNPpdO6GQNu2QFTUjTdeey1gMCQlcdNMz3G5iotLSoC0tIcfnjatbNPAv/Ktf0fqxmF9tfX9ZR6abgCU5hkgv8eMDz+ssXeJYU7U3Xd79hkhNgA87PidAw9OfXf4cNcTuodl5vffV2ZtNgDU1veXebC+NsaRsuy2aklJb7xx//2A0Vi1alycd+YXSJzOzMy8PCA39+uvly8vu4YfcG/i50na+n3w9wbA3+n1QrgvFejYEYiKGj16wABAr4+JiYz07LwCUdndAtyNgNLGAODr/468Nw7rq63vL/PwhQbAf+XLR+WsYcNqNlty9RdBixZ59pkJXNxP10NOTR948IVfqlVzntU1dd7400/ogfriN+1dlcjlxETaER//yCNjxgDBwY0bc3f/yiOl1WqzAfn5Cxb88guQkfH6619+Cdhshw65b0JU+Z/0+4ZAewdw/3+22Y4dO3UKKChYsWLdurK/DQqqXz85mXcbqCx6fUREWBhgMFStmpAAWCzr17tX1hCRapp99V8pzoiqvXtPcjT5sfmGL7986+iB13Zn8pKAysa3OA+5r3ejeV1nf/EFJqKHmNq6teo8F6LZFwCiABIe3r9/x45AZOTw4d27q07jP4qLt27dvx9IT5869eOPAYvljz/27gUAh4M3HQL4DuD+d1BSsnv3oUPuSz+2bCnbXNBo5KUClcForFEjKQlwOrOycnPdDRje/ZtILc2++jdELraZzTqr/BgzGzV6c+XB07tnfP216lj+hg2ASpYqh7z23PmbbkJVODH9ySdV57kUzb4AEAUAo7F69fh4ICHh8cdvuQUQwmDgJ48V53Ll5xcVAVlZ7703fz6Qmzt79tKlgMtlsZQuPaa/4jvAX7lcRUXFxe5GwNat7s0gs7KA4OCmTevVA4QICuJeHBUXHNyiRaNGgMWyYcP27e67axQVqU5FFJg0/+rfFKHitwYNHqre6OkW3x8+/ObKg9/vnrFnj+pY/kLr//t9xqnp/aqnyJgY+42m2rqq+/bBhig5oUoVT47JPQDU1veXebC+98cpXWKcmPjqq3ffDQQFNWhQo4Z35uGPSkp27jx0CMjMfOutuXMBpzM7Oz+/YrV8/d8r9wCo/Pp6fWRkeDgQG3v//WPGACEh7do1berZnP7MZjt69ORJIC1typTXXgOkdDgcjsodwxffF1hfe/X9ZR4+tQfA3+3BFpmRleU4I3c6fmvatM74JVXmWtLSPDhiQOBnTZXkvuTGq3tW/eADdBZ/oNHVV6vOc7k03wEk8kPR0WPG9O0LhIZ269aqleo0vkdKm83hAHJyPv540SIgO3vWrIULASmLi61W1el8Cd8BLkfpHhJFRb//vm0b4HIVFlosQHBw8+YNGrgbejqd6pS+4++bLlqte/YcOqQ6FVFg8ZlX/yqoBrPZrGsscnWn6td/c/rBVbuLvvlGdSxfxwbAFTr+9JB1U4uvuUYOxG50euMNROMQevjMr5XvvAAQ+QGTqVatpCQgLu7BB2+4ARDCfZsyujylu/enp0+dOmsWYLFs2sQFgVeC7wAVYbMdOnT8OFBcvG3bvn1ASEjr1o0bAzpdaGhIiOp0viM4uHHjunWB4uLNm3fvBpzO3NyKrtwhovLxuVd/F06iXqNGk+Iaxbca+Oefb60+eHLXun37VMfyVTz0rKCzdw3amiLNZpnlCkabWbNQB0vwrM/9OhGRV7hP9GNj779/xAjuMl5eJSW7dh0+DJw9O2nS9OmA1Vq6ez+ROjbb0aOnTgHnzz/88GuvASUle/YcPqw6lS9xr5yIiZk4cfRooPR1kojoQnR/yGpy+LvvnjgxcODo0dHRqvP4Kh6CVtC9NRvNv+Y/r7wipyJVWAcOVJ2notiyIPK8yMhhw7p2BcLCevVq1051Gt9RWPjzz5s3A5mZr7325ZeAlCUlXOJfmfgOUBnKLhFw30WgdM+AoKB69WrWVJ1O+/T62Njo6LJLK2y2Q4dSU1WnIvJvPvvqPwAObA4L0w0UC3WnIiPfTD/03O4TS5eqjuVr2Gstp2MtB1/73N3t28vGsq6o/sADqvMQkXYZDHFxUVFAVNTo0X37qk7jC9z3ac/NnTPnp5+ArKwZM+bNA6R0OnnbPtI+p9PlArKzP/jgm2+A3NyvvvrxR6D03zVdXFTUzTcPGfLPPQKIiP5OPoksHBg//kTS0IduXti5s+o8voYNgMu0RnaXKdJgQE+sk3s/+gh3IQnPcBEvEV1YdPRttw0Y4L59mNGoOo2WuU+QsrLefXf+fCAvb8GC1atVZyK6Mnl58+YtXw5kZb3/vnvLKjYCLkaI4OCgICAq6pZbhg1TnYaINO1qcRf66XRio5woVn300dYt4+8afxePtC4XGwCXKfm+iC/1SVOm4D5cg96tW6vOQ0TaFRTUqFFyMhAa2qVLixaq02iZy+VyAVlZb7/97bdAYeGqVZs3q85EVLkKC1euXL8eyMycPv3zz7mi5VJCQ3v0uOoqICjIvUkgEdEF6fAQ8ps1i084F2ap9tBDquP4CjYALuHwvcMefn5u3br4DxLlI08/rToPEWmZEEIAMTHjxw8ZUvY9/Z37xD8j4/XXv/oKKCxcvXrrVtWZiDyr9DaCWVlvvDF7NlD6e0B/537djIq67bbrry/7nojoQsQRkYlnnnnmmGXAdaP3JSerzqN1bABcgv4ZZ3vXpjffhBkzUBgcrDoPEWlXWFj37q1auTf/ql5ddRotKl3q776232JZt27XLtWZiLyrqGjduu3b3Ze8fP01wEsD/l1QUMOGtWsDZnOXLm3bqk5DRJpWH3niVrPZ+IH+JZ399ddVx9E6NgAuIDV+0NYU2bcvCvElYgYPVp2HiLTMfTuryMhRo/r0UZ1Fu7KzZ85cuJCf+BMBQGHhL79s2gRkZ3/yyXffqU6jXZGRo0YNGgTwNoFEdClypJgiXh8x4lSDodeNXd2vn+o8WsWX0r/5c8TIESnSZJIrRVddyxkzVOchIu0LD3ff3s9oTEqKjVWdRnvy87///tdfgYKCpUvXr1edhkhbCgqWLPn1VyA/f/Fibn75T0ZjtWpVqrj3BujQQXUaIvIJdV0P4K033+TmgP+ODYC/CdllLdBFTp6MSPTG9Q0bqs5DRNolhMGg1wORkTfc0LOn6jTaY7Fs2LB7N5CTM3s279JLdHE5OZ9++sMPgMWyaRMvjfmnyMgbbxw4EBBCr+c9mIjoYuRHYjoiGzdO0J1vW5Jx332q82gNGwD/79T0gQdf+KVaNdHa9TleeuIJ1XmISPvCwnr3btcOMBgSEqKjVafRDpvt+PFz54DMzLfe4u3PiC6X+/ckM/PNN+fMAez2EyfOnlWdSTsMhsTEuDggNLRnz44dVachIl8gnodONk5JOTZzcNooc5UqqvNoBRsA/89+QBQ4j7z4onxFjEdWWJjqPESkZe5dqSMihgzp2lV1Fu1wuQoLi4uBjIyXX549G5CypMRmU52KyLdIWVJitQLp6a+8MmsW4HIVFRUXq06lHeHhw4e791rh3QGI6OLkDPyI0xERxgKx0vDNc8+pzqMVAd8ASB026JrnlrdsifaoioyxY1XnISLtM5uvuqpJE8BorF49Pl51Gi0o/eTyrbfmzgUcjnPnMjNVZyLybQ7H2bMZGe67Znz5peo02lG6J0BISLt2zZurTkNEvkA68B5+v+OOU9OHfjnGyFeOgG8AYC/+g5Gvv47eYgKc3F+WiC4tMnL48G7dVKfQjoKCn37asAEoLt68ed8+1WmI/EvpngAFBStWrFunOo12REQMH967t+oUROQTRiEB5/V6QGboJr31luo4qgXsCe+xoYMfS5GDBsmV4kv5MN9CiOjSgoIaNKhRAwgKaty4Vi3VadSz20+dSk8HcnI+++zHH1WnIfJvOTmffPL994Ddfvp0WprqNOoFBTVtWr8+YDLVr5+crDoNEfkCORJrcL5nz0C/TWDANQDWyO4yRRoMaI3+ujbTpqnOQ0S+Izy8f39uPgUALpfLVbbJn5Q2m92uOhORf5PSarXZgKyst9+eMwco/T0MdOHh/ft37646BRH5ErlSTsN3r78u5ciRI0cG3n1FAq4BUOvWiO3652+/HbfgdQxr3Fh1HiLSPp3ObA4OBkJDu3Rp2VJ1GvXy8xct+v13wGY7fPjUKdVpiAKL1Xro0PHjQEHB0qW//aY6jXpmc5cubdsCOl1oaEiI6jRE5BN0eAj5zZqdmleCYBl4e8AFTAMgVXaXKTI4GBvRSX721FOq8xCR7wgN7dGjdWtAiKAgo1F1GnUcjvPns7KA3Nyvv16xQnUaosCWk/Pll0uWAA5Henp2tuo06ggRFGQyAWZz167t26tOQ0S+RPwuXsLtzz57+N7+9e77KShIdR5vCZgGgDwT0U3f/t575Qr0w7gaNVTnISLfER7et2+HDqpTqJeT88knS5a4lyJzyT+RWqW3C8zJ+fzzH35QnUa9sLC+fa++WnUKIvIlcgomY25ysmm4yZE7bsIE1Xm8xe8bAAc+HrLu1QPh4aK+nI9pjzyiOg8R+Q6TqU6dqlXLvgaqkpLdu48cASyWP/7480/VaYjoryyW9eu3bwdKSvbuPXxYdRp1TKa6dWvWBIzG5ORq1VSnISJfIpbLL107nnoqc/CQdbc/Eh6uOo+n+X0DwNQE463xU6bIP8VdWJeQoDoPEfmO0NAuXQL7brFSSgnk5Hz88eLFqrMQ0cXk5HzyyXffAaW/t4GqdE8AIqLLdh+miUfj44s34wfbgw88oDqOp/ltA+Dgh4O2psi4OHG/jEAr//8fSUSVz2y++uoWLVSnUKeoaO3anTsBm+348XPnVKchooux2Y4dO3UKsFg2bNixQ3UadUJDu3XjXgBEVCHV5EScffjhEycGDhw9OjpadRxP8dsGgPFFMU538uGH5TzE4y7/X8pBRJUnKKh+/erVAaMxKSk2VnUaFdy3F8vL+/bbn39WnYWIyiM31705YKDeJtBgSEyMj3dfusUdn4ioPORC8SDeiowUo3RJ+oxJk1Tn8RS/awCcCRu2/6WfY2NFFYSJLhMnqs5DRL7HbL766kBe+l9U9OuvO3YAdvvp0+npqtMQUXnY7WfPpqcDRUXr1m3frjqNOrwUgIgqSiSIDrLepEn+uhLA7xoAtscc79ibTZ7MT/6JqKLM5vbtGzdWnUKd/PxFi9auVZ2CiK5Efv53361cCQTqngAhIe3aBXIjl4gqTs7AjyiIiEBN3Y/iK/+7lNxvGgCnpverniJjYrBQbBft771XdR4i8j0GQ1xcZCRgNNaoEYhbhhYXb99+8CBgs6Wmnj2rOg0RXQmb7fjxM2fcd/E4dEh1Gu8rvRuAwRAfHxOjOg0R+SJdWxwT2/xvJYDfNAAcj5se1eU+9BA/+SeiigoJadeuUSPVKdQpKFiyZN061SmIqDLl5y9evHq16hTqBAe3atWkieoUROSLSvcE0J3RD9fdev/9qvNUFp9vABy+t3+9FBkRIdfhNbH6nntU5yEi3xUS0q5dw4aqU3ifw5GRkZsLFBfv2BGInxQS+bPi4m3b/vwTcDjS07OzVafxvuDgNm2aNlWdgoh8mWyBNGx84IH0b0eOGDkiLEx1nivl8w0A3YP6b/R1Jk5EHFriz6go1XmIyBfpdDodEBzcvHnduqqzeF9h4cqVf/wBBOqu4UT+zb0HQFHR6tWbNqnO4n3BwS1buhu7QgihOg0R+aRs/IEj0dHWhiXNTL1vu011nCvlsw2Aw/f2rzfj2qAg8QuARP9ZkkFE3mcy1aqVmAjodCEhQUGq03iT+8SgsPCXX7ZsUZ2FiDypsPCXXzZuBAJtU0CdLjTUbHbvCVC1quo0ROTTRos08c2DD0pXd9ldGgyq41SUzzYADL0M5/MeHDcOvcVU9E9KUp2HiHxXcHCTJrVqqU7hfSUlf/6Zmgo4nZmZeXmq0xCRJ5VeAmC1HjyYmqo6jfcFBTVuXK+e6hRE5MvkcpxB9dq1T56MHFJz7PDhqvNUlM81AKQcOXLePL0e9+Nh+dnkyarzEJHvCwpq3Dg5WXUK77NYfv99507VKYjIm4qKfv992zbVKbwvKKhx40C8xIuIKp+woo9s+MgjqnNUlM81AFKfKD588Lbhw+Vv2IYm9eurzkNEvi8oqFGjwGoAuJcAWywbN+7dqzoLEXmTxbJhw44dQKBdCsAVAERUaULwMw62b3+y9qCtY4926aI6Tnn5XAMA58UdctpDD6mOQUS+T6+PjAwNdd8nOpC2ELVaDx8+fRpwOnNzCwpUpyEib3I6s7Pz8gCbLTX19GnVabzHYEhIiIkBdLrISN4smogqxce6NnKg761I95kGwJEjAwc+91zbtngaK5HVqZPqPETk+0ymWrUCcQeR4uJt2w4cUJ2CiFQqKdm2bd8+1Sm8z2TiZoBEVEmC8CneHjr0+IbhTcd+07ix6jiXy2caAPo3dNdiFz/5J6LKYzS6d/8PNMXF27cfPKg6BRGpVFy8fXsgNgCMxuTkatVUpyAiv1ATi/GFEPrxjl2u075zVzrNNwBOPjJkXYqsWhXf4xV0GzFCdR4i8h+BtgJAypISmw2wWo8cOXVKdRoiUslmO3To+HFASqvVZlOdxnvYACCiyia3iU1i0bhxx2YOThtlrlJFdZ5L0XwDwLnL1Ul/6p575Aa0QZ7JpDoPEfkPkyk5OZBWAFithw+7T/ydTpdLdRoiUklKh8PhAGy2o0dPnlSdxntMplq12AAgokqVhmlIDg42NhNL9D/85z+q41yKZhsAh+/tX2/GtUFBOCd+wOC77lKdh4j8j8GQlBQTozqF95SU7NsXiPf/JqILs1r37Tt6VHUK7zEYkpLi41WnICK/9A3uwtsTJx6+t3+9+34KClId50I02wDQtzCsz00ZOVIuwmxcz5dqIqo8Ol1YWEgIoNOFhoaEqE7jPTbbkSOBtOs3EV1aoK0A0OnCwkJDAZ3ObA6k138i8jz5MAYjJiEheIfhxZyR112nOs+FaLYBIM7LtbLp3XerzkFE/sdgqFIlkD75L2WzHT9+7pzqFESkJTbb8eNnz6pO4X0GQ5UqsbGqUxCRP5LviY+wXbuXAmiuAXBs5uC0FNmihbxZzBFvde6sOg8R+R+DISEhOlp1Cu9xuYqLrVbA4UhPz8lRnYaItMThOHcuI6Nsk9BAoddXqRIXpzoFEfmlGITh+W7dTp4bOGdsQrNmquP8neYaAHgKsfrX+Mk/EXmOwZCQEBWlOoX32O2nTqWnA4CUUqpOQ0Ta4n5dsNvPnElLU53FewyGhASuACAiTxIHdGGu5drby04zDYA/R4wckSLDwoQdb6DG6NGq8xCR/9LrIyPDwlSn8B6HIy0tO1t1CiLSMocjLS0zU3UK79HrIyIC6X2AiBSYjJbCdeut51f02TU2ITRUdZxSmmkAmJcVLzVsGzVKbsPvOBwRoToPEfkvnS483GxWncJ72AAgoktxONLSsrJUp/AenY4NACLyLLlQPIi3IiNtucEvON8dOVJ1nlKaaQDIqaIBJt5+u+ocROT/9PqIiMBqAGRk8Np/IroYpzM9PZAahTpdeDgbAETkFQ1Fljh8222qY5RS3gBIbT5k3fP9GjZEK9yDHVddpToPEfk/nS4iQjsLsTzP6czNLSxUnYKItMzpzMsrKFCdwnsC7X2AiBQqxGi06dr11PQhHW9+sF491XGUNwDkfbI+7r/jDtTBEjwjhOo8ROT/dLqwsEC6/7PLVVhosahOQURa5nIVFBQVqU7hPXp9WBgbAETkFTWxGF8KIUfLMXLpuHGq4yhrAKyR3WWKNBgAeQqzb75Z9RNBRIFDCKPRYFCdwntcrvz8QDqwJ6Lyc7kKCgJppZAQJlMgvQ8QkQacFUa5ddw4KUeOHDlSr1cVQ1kDIPnX8MeMzv790VtMRfOkJFU5iCjwCGEwqHvZ9T6Xq7jYalWdgoi0LPBeJwwGNgCIyKvi8ZO4u1q10w1tTuP23r1VxVB3CUBNjJSmsWOVjU9EASvQVgBIabc7napTEJGWSWm3OxyqU3hPoL0PEJF2yFZypa5I3Xmw1xsABz4esu7VA+Hh+FO0R/VBg1RNnIgCV6CtAJDS4QikA3siKj82AIiIvORafCFbDBuW/u3IESNHeP9+JF5vAASF4TZ7m+uuQzMMwl2BtA0XEWmHXq9TvgWqNzmdLpfqDESkbQ5HYK0U0ukCqRFMRBrSG58hPjTUOqNkZNCywYO9PbzXD4FlbXmTvGf0aG+PS0RUSspAO9ANtIYHEZVfYK2MAux2u111BiKiUaO8PaLXDgmPJgx/OEUmJIgZMKF6z57enigRUSkpbbbAWurKza6I6OICbUk8L40iIuUS0VhWufbaM2HD9t8yLDbWW8N6rQGgG2G/yfjNTTfJ57EZ+YH0FkNEWhN417rydldEdHGB1wAIrEYwEWmPfFM8hU5Go/NuV5bz95EjvTWu9xaFZolestcNN3htPCKiCwqsBoBOZzYHB6tOQURaptOFhgbSzkxS2my8BICItEAkYotc4EcNgFQ5YF6KTEyUveR+fN6pk7cmRkR0IYG2AkCnCw83m1WnICIt0+nCw0NDVafwHim5BwARaYN04FvxfffuRxOGPzw2ISHB0+N5vAEgW+k/1U+87jr0FhNg5TZURKSey1VSYrOpTuE9en1ERCAd2BNR+QVeA6CkxGpVnYKICMAoJCBbrzf96jonY4YM8fRwHj8hF0OQKazXX+/pcYiILpfTmZtbWKg6hffo9ZGR3r/LLBH5Er0+MjI8XHUK73E68/IKClSnICIqIzdJu2u958+bPdYAOBM2bP9LP8fG4hiGomW3bp6eCBHR5XK5Aq0BkJAQHa06BRFpmcFQpUpcnOoU3uN05uTk56tOQURURiyVT4n2vXqdODFw4OjRnjty81gDoOQLxyJnxyFDuOs/EWlNoK0AMBjYACCiizMYqlTx3k2o1HM6c3PZACAiLSm9KwD26TbiqUGDPDWOxxoAIgzJ+HbYME/VJyKqKKczNzeQln4ajYmJgXRgT0TlF2gNAJeLlwAQkTbp9mGDeNJzewFUegPg8L396824NihIzEIPxPTs6dmnh4io/AJtBYDRWKOGe09ZnY5bsRLR/9LrdTrAYKhWrUoV1Vm8h5cAEJFWyXzUwA3XXnv43v71+tcLCqrs+pV+KKiz6YvzmvfqJV8R47GX204RkfY4HJmZeXmqU3iPECaT0QgYjUlJgfQJHxFdmtFYtWqVKoAQRmMgXbDpdGZl5eSoTkFE9C/uEKPwY1iY6WFTenT7rl0ru3zlNwCaYhEKPXfNAhHRlXI4zp7NzAQAKaVUncZ7TKZatZKSVKcgIi0xGmvVqlpVdQpvcr/u2+1nz6anq85CRHRhuifkT6Jg4MBKr1vZBWV/kQ7DgAHeeVqIiMrP5SoutloD71IAk6lBg5o1VacgIi0JCmrQoFYt1Sm8x+nMzs7NBaQsKbFaVachIrqIHwB0qPy9ACqtAXBs5uC0F99q0QIGfICE5GSvPjlERBVgt58+nZGhOoX3BAc3bsxXZyL6q6Cgxo3r1lWdwnvs9tOn09JUpyAiujR5ENNwsE6dVDlo66iPGjWqrLqV1gAQh0QrueHaa9U8PURE5We3l14KEBhMprp1q1d37wkQSNf6EtE/CREUZDIBRmPt2tWqqU7jPQ7HmTNsABCRL9H3F+m6vZV3nl15lwAsdL0l4/v0UfKsEBFVgN1+5kwgrQAo3eQrKKhhQ64EIApsQUGNG9epAwhhMARSQ9BuP3uWDQAi8il6xGJq5Z1nX3EDIFV2lykyOFi+IW7CkquvVvvsEBFdPpvt6NGzZ1Wn8L6QkDZtGjZUnYKIVAoJadu2aVPVKbzPZjt69ORJ1SmIiMrhenEWN3XvXlm3BbzyFQAJ4dsM33TrhmYYhLtCQlQ/P0REl8tmO3Lk9GkAcLlcLtVpvCckpG3byruSjIh8UXBwmzaB1QBwv87bbMeOnTqlOgsRUTn0xmeIDw0Nfsd0OOZwp05XWu6KGwDydzFdVuPSfyLyPaV3A7DZTp0KpEsBTKbk5MREwGBISIiOVp2GiLzJYEhMjIsDjMbq1atUUZ3Ge+z2kyfPnePu/0Tkw2rJDPnolZ93X/kKgEy0EtlsABCR77LZDh8OrE+EhBACMJuvvrpFC9VZiMibQkO7dGnbVnUK77NaDx1KTVWdgoio4uRKfCP+UNgAODW9X/UUGRODfXIsDjVvrvoJISKqKKv14MFAvCY0NLRr11atVKcgIm8ymwOzAWCzHTp0/LjqFEREV2C7vBG72rZNlUPlrTIqqqJlKtwAcDxkXGho260beosJsOoq724CREReZrUeOBCIDQCTqV696tUBg6Fq1bg41WmIyJOMxurVExMBkymwbvtXymo9dOjYMdUpiIiuwNXiLgzU6XT95HPOxhXffL/iJ+6vixX4T7duqp8HIqIrZbOdPJmWBjidOTkFBarTeF94eJ8+HTqoTkFEnhQW1qdP586qU3if05mTk59ftgcAEZGvE3tgkxMqfh5e4QaA/Bnn8EL37qqfACKiKyellEBx8c6dhw+rzuJ9oaG9erVrBwih1+v1qtMQUWUSwmAwGIDQ0GuuCcRGX0nJ9u1//gmUvs4TEfm8R/CRHF7x8/ByNwAO39u/XoqMiEAbbEJWy5aq509EVFmKi3fsCMQGgF4fFRUeDoSEdOwYWLcFI/J/ZnPHji1bAnp9ZGR4uOo03ldcvHPnvn2qUxARVaKjeFikt22bOXjIutsfKf8re7kbADqbvtgwpUsX3IUkPMbPiojIf5SUlK4ACMxPiiIjr7uuRw/VKYioMoWHDx3as6fqFCq4X8et1l27DhxQnYWIqBI9ig1422Cw6GV928COHcv74+VvANTEUNzcpYvqeRMRVTanMze3sBCw2VJTA/FaUZOpfv0aNYCgoEaNatVSnYaIrkRwcNOm9eoBQUENGgTi77PNdvToyZOA05mXF4h7uxBRAKgvDrv+7Nq1vD9W7gaA3ILbRafydxqIiHyFxbJpk/ua0cAUEXH99VwJQOTbIiKuu+7K7xbtuyyWTZt27lSdgojIg55ANbHmqqvK+2OX3QCQMkWmSJ1OrBWr5XeBeAdZIgoURUW//757t+oU6pjNHTo0aeL+5LBGDdVpiKg8TKZ69WrWBEJC2rYN5D09LJb167dtU52CiMhzRC/pwoSrrio9T7/cn7vsB6bO2p5uertZM7kNv2NrRITqCRMReYrdfuZMRkbgXgoACCEEEBl50019+6rOQkTlER09duzQoUDp73GgKV3673CcPZuerjoNEZHnyIXiQXweGXnypZ1dj9zfqNHl/txlNwDEg7KWq0v5lxgQEfmqQF8JEBLSrl2jRkBQUNOmtWurTkNEFxMc3KxZ/fpAcHCrVpd/GOh/LJZ167ZuVZ2CiMh7dKtlbeDyL9G//D0A6ogqIpkNACIKHEVF69bt2gUE6l0BSsXE3HVXIH+iSKRt7t/L6Ojbb7/uOtVZVHK/Tlss69Zx6T8RBZQB6CuzLv88/fIbAOflAhR26KB6fkRE3uJwnD+fnQ1YrQcPnjypOo06JlOdOtWqAWFhvXq1a6c6DRH9VVhY375XXw2YTHXr1qypOo06Vuv+/UePAg5HenpWluo0RETeI8+jtnymEhsAqbK7TJHBwegrlmFZ48aqJ0hE5G0FBcuXb9qkOoV6UVG33NK/P6DThYebzarTEAU2nS4iIiwMiI6++ebBg1WnUa+wcPny339XnYKIyPvEMRkhejdpkiq7y1tlcPClHn/JBoDcGXbIuLpFC/k8NiPbYFA9QSIibysqWrduzx7A5SoosFhUp1FHr4+KCg93LzXmCQeRWjExd9xx/fVljYBA5XIVFBQVARbLxo07dqhOQ0TkffJN8RS6GY26fuHbnI2bNLnU4y/ZABDHdW2lo3Vr1RMjIlJFSpvNbgcKC1ev5rWlQFhYz55t27o3G2vQQHUaosASEtKmTZMmQGhojx68MBMoLPz55w0byl6niYgCla6f2Oi66dLn7ZdeAfA57tVdzwYAEVFBwfLlf/wBBPqmgKWbjsXFPfDADTfwkgAib9DpwsLMZiAmZuLEUaNUp9EC9+twYeHKlevWqc5CRKSeNKOXfLASGgDiZ+yDsU0b1RMiIlLNbj9zJiMDKC7etevIEdVp1NPrY2MjI4HY2IkTr79edRoi/xYbe++9o0cDBkN8fEyM6jTqlZTs2LFvH+BwnD2bnq46DRGRemIXagvjFTQApBw5ct48vV7OxRKZ2KyZ6gkREWlFXt6CBWvWqE6hHWbz1Ve3bAmEhfXpwyXJRJUrPLxfvy5dALO5U6dWrVSn0Y78/O++W7lSdQoiIu2QVeDCFy1aSJkiU6Tuguf5F/yL1GFF64/E1K2LZhiEMSEhqidERKQVJSW7dx89ClitBw6cOKE6jXbExEyYcN11gMlUv36NGqrTEPm2oKD69ZOTgejou+4aMUJ1Gu2w2Q4dSk0FSkr27j10SHUaIiINuUOMwm9hYSdKtr97rEpy8oUeduHOQLxY4xJNm6qeBxGRVuXlfffdr7+qTqEdQphMBgMQH//YY7feCuj1kZGBvDs5UUXodOHhoaFAXNyUKbffDghhNPIeTGXy8ubNW7ZMdQoiIu0Sy3DGeeTC5/EXbAC4hugaiSmXvo0AEVGgslg2b96/H7DZTpw4f151Gu0wGOLjo6LKGgE8gSG6NCEMBr0eiI9/9NE77gAMhoSE2FjVqbTDbj916tw5oLh469a9e1WnISLSLl0NMVs0u/B5/AUbAGI5Zri+YwOAiOjC3LtQ5+XNm7d6teos2hMU1LRp7dpAbOx9991wA1B69wAi+iv370Vs7KRJt9wCBAc3b87ba/5TXt433/z0E8C7sBARXcIEDHY9WYEGgGyFG8RkNgCIiC6lqGjdut27Aav1yJHTp1Wn0Z7Q0B492rQBoqLGju3fX3UaIm2Jjr711qFDgdDQrl3btlWdRntstsOHT5wALJb167dtU52GiEj75Fw0w23laAD8d9fARCRiX8OGqidARKR97k+kcnI+/XTpUtVZtCsycsSInj3LvhIFssjIkSP79QMiIoYP791bdRrtys2dM+eHHwB+8k9EdJm+lneIzxo3dr9m/nPt5T8aACdKtr9rOJGczN3/iYjKp6Rk795jx9zXqB44oDqNdkVF3XLLgAFAePjgwV26qE5D5F3h4YMH9+gBREXdfPPgwarTaFdx8ZYtu3e777py8KDqNEREPuT/7wZwZsZ11465r1q1v//1PxoAri9wg25hvXqqcxMR+ars7M8+W7oUkNLpdLlUp9GumJg77xw61P0JaI8eqtMQeVZExHXX9e4NxMTcccf116tOo2Uul8vl/uR/4ULVWYiIfJe837kMM/55Xv/PSwB6iWquKmwAEBFVlN1+6lR6OlBYuHLl5s2q02iZe/Oz6Ojbbhs0CIiMHDWqb1/VmYgqV1TU6NEDB7qv9R82DOBmmBdXULB8+e+/A3b7yZPnzqlOQ0Tkw/bjZtfMy2gA6Dq6NgF166rOS0Tk63JyZs9etgxwOrOz8/NVp9G+qCh3AyA29t57R44EAL1ep7vSqkTeptPpdEBMzIQJN9wAREbeeCM3v7w0pzMnJz8fyMv78stFi1SnISLyA8tcd+ru/ed5/T9XADwiBoilXAFARHSlXC6LpaQEyM7m5oDlERbWt+9VVwEJCc88c+edgE5nNgcHq05FdHFCBAcHBQEJCU8+OX48EB4+YEC3bqpT+Y6cnFmzvv0WcLmKioqLVachIvILSa5tl7ECQBxCGzzGBgARUWUpKlq7dudOoLh4+/ZDh1Sn8R0hIa1bN2gAVKnyyiv33gsYDImJsbGqUxH9L4OhatX4eCApadq0yZOBkJB27Zo1U53KdxQXb9u2d6/7Nn/bt6tOQ0TkP+TviBaPXKQBICUgpRCyKcxIrV1bdWAiIn+TlfX++99/D0hZUmKzqU7jO0ymWrWSkoCkpLfeeughwGzu1Kl5c9WpKNCFhLRr17QpkJT0+uuPPAIYjcnJSUmqU/kOKa1Wmw3IyZk589tvVachIvJDUeIW+cVFLgE4cl//ei8nxsVhKOzYZTarzktE5G8cjvT0nBwgJ2fOnOXLVafxPaWXAsTHP/bYrbcC0dHjxg0aBAhhMOj1qtORvxPCaDQYgOjo228fPhxISHjqqQkTAJ0uNJQ3TS6/3NzPP//+e8DhOH8+M1N1GiIiP/QcgsSk8PATJwYOHD06Orr0j//bADAd0n8jg2rUUJ2TiMjf5ecvXbphg/uSAN7fuiLcu6hHRFx33TXXAImJr712//2A0Vi9ekKC6mzkb4zG6tUTE93/ziZPBiIihg7t2RPgbv4VU7rkv6Bg2bK1a1WnISLyf/oBuk/lwrLz/P82AFzDhVX+wgYAEZHnSSklkJn55pvz5gFOZ25uYaHqTL7LZKpbt3p19yUCkye77ybQrx9XBlBFue8+ER4+eHCPHkBS0vTpjzwCmEy1a1evrjqb73K58vIKC4Hs7Hfe+eILoPR1kIiIPMtZTXwof/yXBoDsKCbjJBsARETe4nS6D4izst5777vvVKfxfUKYTAYDEBnpvp1gYuLrrz/wAGAy1a/Pdze6lKCghg1r1QKSkt54Y8oUICbmzjuvv969u7/JpDqdL3Of6GdluU/8S2/3R0RE3iEexfO6R2vWLP2+7C4A0113IpuHSERE3max/PHHn3+6l8Ru3Kg6jf8wmerUqVbNvUnbAw8AsbEPPHDTTYBeHx0dEaE6Hamm18fEREYCcXGTJo0dCyQmvvrqQw+5N52sVk11Ov9RutS/uHjLlj17VKchIgo84iMMle+Vnecb/vsXEaJYtq9eXQIQvCaViMjrsrNnzVq82L3UuGpVICioUaPkZNWp/IH7Wu2wsF692rcHzObOnVu0APLzFy789VegoGDRorVrAZfLYuH9x/2XTmc2h4QAERHDhl1zTdm1/EIEBwcFqU7nf6zWAweOHQNycz/5hCuciIjUkbvQVje4Rg0A3wF/vQQgFo3FzqpVVQckIgpUUjocTieQnv7KK6VLZQsKVKfyPzpdSEhQUNleAdWqzZr15JNAZOSIEb16lf09+bbSu0ZERo4c2bev+//zs88CkZE33ti/P0/8PcXpzMnJywMyM199ddYs9+uaw6E6FRFR4BLd8bBrY9mNassuAdDDiMQqVVQHJCIKdE5ndnZ+PpCe/vLLc+aUNQbIM3S68HCzGYiKuuWWgQOBatU+//zZZ4GYmLvuGj4cMBji4qKiVKekS9Hro6LCw92Nnf79y074o6JuvnnQIECnCwvjTY49R0qn0+kEMjOnTfvkE/frWF6e6lRERCSfwEmklZ3n//cSAOhgQCwbAEREWmG1Hjhw4gSQnf3xx4sXA7Gx//nP8OGqU/m/0hUA4eGDB3ftCoSF9e/fuTNgsWzcuGcPUFi4cuWmTUBJye7dhw8D3M3c29yXdAQHt2zZsCEQHt6nT6dOQEhIx44tWvDuD6rk5MyaNX8+YLXu23fkiOo0RERUSryB+mJY2Y2SxdYt4+/66EOjMSbvXPuMB6xW1MESPH3xO9t6+kDH1+v70jwu9n/aF/KrrO8v82B9bYxzOfVjYu64Y/Bg97XLXbt6Z950YQ7H+fNZWUBR0a+/btsGFBX9/vuOHYDdfupUWtq//4wW/h2VKf9d7FXkNxqTk5OSgNDQq69u3RoIDe3Ro317wGCoUiU21rN56NIKChYt+uUXICfn008v91p/bf0eaHcc1ldb31/m8W/1y//qr638vjiO0vrr5Swscblq3JifcCY/KEicmj7w4Au/VKtmH657GBtPn9b8BHygvi/Ngw0A7Y/D+mrra2se7k8+4+Mffnj0aCA0tGvXli29M3+6fHb7iRPnzgEWy6ZNe/YAxcXbth04AFithw6dOAEALpfL5ZmxfbMBoNPpdEBQUIMGNWsCISFt2zZpApjN7k/0jcaaNcuuXCStsFh+/33rViAzc/r0zz4DyrMSRhuvp9ofh/XV1veXebABoI1xtFDfsVzOkgsTEw3OJP0LrtSEBED+ZUMAIiLSHvcBdmbmW299+637muewMCA4uHnzunVVZ6NSpZ9YR0aWfr3xxr59AZeroMBiKbt0oKRk375jxwCrdf/+1FTAZktNPXMGAJxOTzUI1NDrdTr3bRmrVweCgxs3rlMHCApyfw0ObtGifn1eo+8rSkp27z54EMjKevvtOXMAXgJDROQbTG8DQJUqIjV+0Nbn5/btK/8QU8XRFSsu54e10MHQcn1fmgdXAGh/HNZXW1/L8yjd5Twx8dVXJ04ETKbk5MRE7zwfVPmktFptNsBuP3ny/Hl3Q+DsWcBmc68ocDjOncvIAByOtLScHPfXrCxASpvNbi+tUZ4RK7YCQAiTyWgsW4Jf+tVorFo1Pr7sE/vS21kajTVqJCYCQgQFmUyqn2WqKLv9+PEzZ4C0tMcff+ONK7ttphZfT7U4Duurre8v8+AKAG2Mo4X68jVXdTGqd28DXsNSsTY6GgBQzbPBiIio8rhcFktJCZCW9swzs2YBiYkvvDBhgvuEq2yrF/IVpSfIJlP9+jVrln29FJcrP7+oCHA6CwqKitwrDdxf8/MtFkBKu91uL7ubhJQlJVbrX8d1b3oohF6v15ed4JfeHUGnCw8PDQX0+oiI0NCy7ykw2O2nTp07B6Snp6S8886VnfgTEZE6+h1ikWt1VJQBkeI1OSwqCsA1YovqWEREVF5OZ05OQQFw/vwTT3z4IZCY+OKL7kZAzZq8t4v/0+lKT8zdX4kqg91+5kxaGpCe/vTTM2YATmdubn6+6lRERFRRcqauBxpFR+tcLeSvYtr/rwAgIiKf5XTm5RUWAufPP/nkRx+5l5JfaDd6IqJ/U3bi/+STb73lbjDm5alORUREV+wx10lxMipKpzsjCvBEZKTqPEREVDnKGgFPPz1rFmC3nz6dnq46FRFpmd1++vT58+4T/zff5Ik/EZG/keNElrw7MlInR6ArUqKiVAciIqLK5XTm5OTnA+fOPfroe++5d5s/flx1KiLSEpvt8OHjx4G0tCeeKD3x51J/IiI/lCYXIDw6WideQjLu4AoAIiJ/VXr7ufPnn3lm5kzAYtmyZf9+1amISKXi4i1b9uwB0tKefPLttwGXy71yiIiI/NQa0UF8GBWlk0PwBhaFhanOQ0REniWl1Wq3A+npL774+edAQcHy5Zs2qU5FRN5UWPjLL5s2ARkZL788c2bZ7SeJiMjPTUA+GoeG6sR4FGK92aw6DxEReYvL5XIB2dkffPD990Bu7ty5K1cCgJTeut8uEXmL+/c6N/err5YsAbKyZsz44gsAcDpdLtXZiIjIa9rghOxuNhvQRkZgSkgIIADrldclIiJf4T4xyMubO3fVKve1wKdPA3FxkyePGgXodKGhISGqMxJRRbhcxcUlJUBW1ltvzZkDWCybNu3apToVEREpEyzt2BwSopOJohs2cQUAEVGgKy7eunX/fuDcucmTZ8wA7PZTp3gbQSLfYrefPZueDpw//8gjr7/OE38iInITTVEgPjObdbgZBdjGBgAREbk5HGfPZma6TyDefde9WRg3DSTStuLiLVv27gXOn588+dVX3Q28c+dUpyIiIs1oiEK8ZTbrREs0wQQu8iQiIjejsVq1+HggMnLkyJ49AZOpQYMaNVSnIqKLCQpq0qRuXSA6ety44cMBozE5uWpV1amIiEgz9GIINoSEiNTmgxe8cGt6ulyE2agfH385P+vpTaJ8vb4vzUMI386vsr6/zIP1tTGOivo6ndFoMAAhIR06NGkChIdfe23HjkBwcIsW9eoBgBAXe40gIu2z2Y4ePXkSKChYsWL9eqCo6NdfN28GgAvv/u+Pr3e+OA7rq63vL/P4t/qV+d7u68+Pv8zjcuqLexGC2mlp4tjXgx98YVB2NjriCDpGR/vKBLRc35fmwQaA9sdhfbX1/WUeUgIGQ0JCdDQQHj5w4NVXA+Hhffp06ADodGFhXAdGFBhcrsLCoiKgsHDVqo0bgcLCpUt/+w1wODIysrPdj/GH1ztv8PV5sL42xmEDQG19f5nHZdXfgy34PitLpLYb3PGFzvn5ch7iMSA83GcmoOH6vjQPNgC0Pw7rq63vy/MwmerVq14diIgYPPjqq4HQ0G7dWrcGhNDrdTrPzoeIfIX7biDFxVu3/vknkJ//3XcrVgBW6/79R496akRPz8iz9f1lHqyvjXHYAFBb31/mcVkrAFrjpPwsN9cgx6AqHtfrAdjBXWKJiHyQTqfTAaGhnTs3bw5ERAwd2rUrEBTUsGHNmqqzEZG2uS/1CQlp375Zs7KvVuuBA8eOAQUFixevXg1YLBs27NgBlDYMiIjIt8h75XrxucEgjlkG3/NCrZISnMdJ3BkUdFk/rIEOhpbr+9I8uAJA++Owvtr6WpyHEHq9Xg+Ehnbv3qpV2WZ9pZv3ERFVNofj/PnMTCA///vvV64ECgt//nnDBgBwOl2u8tXS0uuplsdhfbX1/WUeXAGgjXE0Ud+K1WhZXCxSxwx+/oX37Xb5PDYj22DwmQlouL4vzYMNAO2Pw/pq62thHkIYDO4T/m7d3Cf8N9zQqxdgNFatGhfnnfkTEf2Vw5GenpVVtkKgsHDFinXrACltNrv94j/L9wXW94X6/jIPNgC0MY4W6osH5QtYa7eLYz8PnvlCkMuFOliCpy/vn4MWJqDl+r40DzYAtD8O66utr2IepSf8YWH9+l11FRAZef3111wDGAxxcZGR3pkvEVF5lG4imJ+/YMGKFUBR0apVGzYAUjqdTuf/PpbvC6zvC/X9ZR5sAGhjHE3UXy9nYYnLdVmf+BMRkSe5r8EtvYY/KuqWW/r3B4zGpKTYWNXZiIguzWCIj4+JAWJi7r571CggIuL66/v1czcEli8HCgtXrly/HuAeAkREavESAB8ehysA1Nb3l3mwvrpxQkJatqxfH4iOHjeuf3/AZKpbt1o178yHiMib7PYTJ86eBfLyvv126VLAYlm/fvt2z4zly+8LrK+d+v4yD64A0MY4WqhfdgkANwH02XHYAFBb31/mwfreG8dkqlOnalUgJub22wcNAoKDW7SoW9c7+YmItKSkZNeuAweA3NzPPvvuO8BmS009fbpyavvS+wLra7e+v8yDDQBtjKOJ+qWbAB57c/B1LywpKsJQ2LHLbPaZCWi4vi/Ngw0A7Y/D+mrrX8k4Ol14uNkMREXddFPv3kBExMCBnTq5/0an805uIiJtc18SUFT066+bNwM5OZ99tmAB4HLl5RUWVrSit5Kzvj/X95d5sAGgjXE0Uf8TORfdCwtFarvBHV/onJ8v5yEeA8LDfWYCGq7vS/NgA0D747C+2vrlG0ev1+mA8PDevdu3B6Kixo7t1w/Q6yMiQkO9k5OIyJe5XIWFFguQl/fNN0uXAgUFP/30669AeW43qK33Bdb31fr+Mg82ALQxjhbqi9Y4KT/LzTXIh9AJMQ4HgCOejUVE5J+Cg5s1q1MHiImZMGHoUMBkSk5OTFSdiojI9+h0YWFmMxAdfeedI0cCoaG9enXqBOTkzJz57beA1bpv3xEesRIRlZucgzQR6XSK1OaDF7xwa3q6XITZqB8ff1k/rIEOhpbr+9I8uAJA++Owvtr6/zaOThcaGhICREWNHt2nDxARMWhQ585A6W7+RERU2f5+qcDHH8+f714xUFT090d6KxHr+3N9f5kHVwBoYxwt1Bf3IgS109IMKMFoNCopAdAPzkv/IBFRoDKbO3Ro3BiIifnPf4YPBwyGuLjISNWpiIgCQentUq+55qqrgODgVq0aNwZyc2fP/uEHoKhozZpNm1RnJCLSMBeWo31xsf6B0w0P9jz6n/+gECvQhnecDjT8tJLowvT66OjwcCA+ftKkkSOBqKgxY/r1A3Q6szk4WHU6IqLApdOFhAQFAWZzx46tWgEmU716yclllwhIabGUlKhOSaRNPP4PTGKxfAd3nTunw5cIR1uLRXUgIiKtCA29+urmzYFq1d5776GHALO5c+fmzVWnIiKiCwkJad++eXMgKemdd1JSgLCwfv26dlWdiohIQw4iDJMsFoM4L9eio8UiIQCr6lRERN6n10dGhoYCsbETJ153HWA2d+rUtKnqVEREVF6lK7RiYiZOHDPGfalAkyZAdvYHH3z1FeBy5edX9PaCRES+TP6JcHmbxWLAdpGPacXFuBnAA6pjERF5j9ncoUOTJkBs7L33XncdoNdHRYWFqU5F5N7szOnMzy8qAlyuggKLxf219PuiIvffWyyAlMXFJSWAlDab3V5WxeUqKioudldzbw7kvo2ay1VcbLUCpYtAS5dSl97GUgj3tdY6ndkcElJWTwiTyWAAhHCfYOn14eGhoYBOFx5uNru/hoa6b3sZFlb259wck1Qymzt3bt0aCApq3LhuXSA7+913v/gCKC7eunXPHtXpiIi8qEQY0aG42CBnIgxXWyxgN5SI/JwQwcEmExAbe9ddgwcDYWF9+rRvrzoV+RuXy33tscORlpadDTgc6enZ2YDT6f5qt58/n5VV9velf+5wZGfn5ZWd8Jc2AsqjfI8v/2l5eeu7GwnuRoDBEBMTGQkYDFWqxMYCen1CQkwMYDT+7/elf28wuL/nnhtUGfT66OiICCA+/qmnJk4ECgtXrly3zn03gXnz/tlAIyLyO9uRLH6zWAxiMR7C0MJC2RNtcEZ1KiKiymc0Vq8eHw/Exz/66JgxgMmUnJyYqDoV+Q73J+cOR0ZGTg5gt586lZYG2GxHjpw6BdhsJ0+eP1/256Vf/+0E3lu3M9IG9/xdLvdKBput9Ovx42fPXugn/vlner27cWA01qiRmAgYjTVrJiUBQUF169ao4f7e/efuvxfCZDIaVc+dtMvdmCrdIyAoqGnT+vWBzMxp02bNAuz2EyfO8HiYiPzRR4jA/qIiA4rkIpGSmwuIqXK86lRERJUnLKx373btgNjYCROGDgWECAriiQH9ncORmZmb6949/NgxwGrdv//4ccBqPXDg+HH3CcG5c4CUDoeTt8v1OqfTvTKi9GtJya5dBw8CBQX/+zghDAa9HjAak5OrVgWCgho1ql37r1+bNKlTx337zuho1bMirTAaq1dPTAQSE6dNmzIFyM7+6KNvvgGKilav3rhRdToiokp0CIfFl9nZBhTgU9eS3FwAEEtUpyIiqriyJf7/+c+wYUBYWM+ebdqoTkWq2e3uT+hLSnbvPnKk7AS/pGT//mPHAKczMzMvz/3YwPqE3r+UNmhstqNH3Ssz3F8LCpYuXbu29DFlDYDShkBQUKNGdeoAwcEtWjRoULaSgAKLEMHBQUFAbOwDD9x6KxAc3Lx5gwZlDQEpS0qs3CybiHxZHxyV/8nNNSBX94N4MTcXkO3QQnUqIqLyMxqrVYuLAxISnnjillvcB/AJCapTkbeUbmpXUrJr1+HDQEnJ9u0HDgDFxdu2HThQtnSfCHCv+MjJARyOtWu3bQOKitxfS5XuPRAS0rp148ZAcHDbtk2aACEhLVs2bFh2okj+LTS0Z89OnQCTqV695GQgI+Pllz/8EHA4zp5NT1edjoio/MRHsr74IS9PpN4yeNuLhvHj5bN4Vj770UeX88Oe/oTE1+v70jwutgWUL+RXWd9f5uHL9UNC2rVr2BCIj3/44Ztu4mZh/q70RN5iWb9+1y73Lt7797uX7qemVs4SfV/+fSh/fU9vAujp/N6tX3qJQVBQ06b16gEhIe7GQOku8wZDfDwvLfBfLldRkcUCZGVNn/7pp+4Go6fvIqDl34dAqO8v8/i3+pV5ZxZff378ZR6XU1/chkgRe8cdIrXH4DtfLLjhBvkp0uTb337rKxPQcn1fmgcbANofh/X/yr15U2Tkddd16wZER99yS79+ZX9O/sHpzMrKywMslg0b9uwBiorWr9+5s2zpfkV2x79cvvX7cKX12QCoTKWbE4aF9ejRvj0QGnrNNR06lG1iSP7C/fqTn//99ytXArm5X3zxww9lf165I3l6JqyvhXHYAFBb31/mcVkNAANWo+X114tjMwenvfhWnz7ojTtl4cqVvjIBLdf3pXmwAaD9cVgf0Onc1/bHxU2aNHKk+xO3Zs08m5s8r/R2d0VFa9fu2AEUFa1b5z7R37fv7yf6/H32RH02ADw7jrsxGRzcpEnduoDZ3KVLmzZAaGi3bu3aATpdWJjZ7J085DkWy7p1W7cCWVnvvDNnTuXuFeDrvw++Xt9f5sEGgDbG0UJ9+ZqruhjVu7dIlQPmvTiiVSuZqv9Cttqxw1cmoOX6vjQPNgC0P04g1zcY4uIiI4GEhGeeGTcOMJlq1eLmXL7IfSJfUvLnn8eOue+//ccf7k/4d+9233/b4bhUBW8lDaT6bACoGKf0NoVmc+fOrVoBYWF9+159dVmjgCuafJPNduzYqVNARsbzz7/7rvuuFe4ttivO138ffL2+v8yDDQBtjKOJ+kbnCP3PzZuLE32HZ7xYMynJ+aHjdjn+Qnfm1eAENFzfl+bBBoD2xwnE+iZTcnJiIpCQkJIyblxZI4B8g8tVWFhcXHatfn7+jz+uW+e+nd758xWryd9nT9RnA0BL4xiNVasmJLhvX9qpExAa2rt3x46AXh8ZGR7undx05UpP/DMynnvu3XcBmy019dSpitXy9d8HX6/vL/NgA0Ab42ihvr2dvoH+5ypVxBrZXaZIgyF5Vvg54xtWK3qLCSjW6bQ+AS3X96V5sAGg/XECqX5ISJs2DRoA8fGPPjp6NKDThYRwt23ts9mOHz93DsjPX7jwt98Ai8W9pL8yNuUrxd9nT9RnA0DL45RuOlh6yUB4+NChPXu6V0JVq+adeVDFuVwWS3ExkJn5yisffeS+S8n+/eWr4eu/D75e31/mwQaANsZRWn8u0hHpdNaYElTDnhkU9N///anDBt/4wtmMDPkGLPg0Lk6zE/CB+r40DzYAtD9OINQPC+vdu107IDb2nnuGDQOE0Ov1es/mooor3YwvL++779asAYqLt2zZtw/w5c35vDWOtuqzAeCL4wQFNWlSp457M9S+fd13Q2naFOClA1rldLpcQHb2Rx/NnQsUFq5YsXbt5f2kr/8++Hp9f5kHGwDaGEdlfXEvQlA7La3G4sXffv1iYqLhvz8ULN/FkPR0QNyOYRdvABARVYaoqFGjevd2f+3VS3Ua+jspnU6nEygq+u23HTuAgoKFC9euLfvE/38fqzotUWCwWvftO3oUSE/ft++DDwCTqXbtatWAiIihQ3v3LlsxAOj1F1/PSd7h/v8QEzNx4pgxgE4XEREWBuTnz5//00+qsxFRIJADEY5GaWlY7P7+vw0AFOME9qWlAQCGNWmiOigR+SP3J1QxMbfd1r8/EBExbFjXrqozURn3J/ilt9/Lyfnii2XLAIfj7NnMTNXZiOjf2GypqWfOAJmZb701ezaQm/v110uWAJGRI0b06+deYdW5M8CGgDZERd1889ChgF4fFRURAeTkfPyx+ybcnltBRUSBTXyNL7AsPb30+/82AEQ1sVHuO3dOAhBfqo5JRP5Fp9PpgLi4e+4ZPhwIC+vTx/0JFan1vyf8ublffrl8OWC3nzmTkaE6GxFVhMORnp6dDWRlvf/+3LlAfv7ixatXuxsC114LhIZ27+5+/XW/LpMa4eGDBl1zDaDThYaGhLhvIzh7NlB6yQARUaUZIuxYfu4cfnN/+9+rbB843/BUz+s7dMBtiBYnunRRnZO8g9cLkicJYTQaDEBCwpQpo0a5DzxbtVKdKpCVnvBv2vTnn0BGxrRpX34JFBQsXbphA+ByFRRYLKozkvfwHSAQuFz5+UVF7t/7XbuA4uI//ti9GzAYYmIiIwGjsXr1KlVUpwxcJlPt2tWrA0ZjtWqJiUBx8ebNu3cDgMvFRgB5Cl/9A0wreY/I/fHHN6cfWrYna/XqsksA7pB3YM+pU4BYrTojEfm20vtcJyQ8+eTNNwMhIa1b16+vOlXgstmOHDl9GsjO/vjjxYuBkpJ9+1JTeQBAFIhstuPHz5wBMjJeeumjj4CgoKZN69UDoqPvvHPECMBkqlOnRg3VKQOP2dylS7t2gBAhIcHBQGbmyy+//z4gpd3ucKhOR0Q+rbeuyHX9/9+Q9GXgv4u/xHe69lhU0TuVEhH99RP/xx4bPZon/qo4ne5P/LKzZ81avBg4e/bhh995p+zEn4iolNX6559HjgDnzz/00KuvAllZ7r0EnM6cnPx81ekCT0hI27bNmgHx8U8+ec89ZQ11IqKK0jVEMB4rO88vawA8jo/kSDYAiKj8Su9XHR9feuLfrl3DhqpTBY7S3frz85csWbcOOHNm/PhXXy37nktJiejS3JcIFRWtWfPHH8DZs//5zzPPAHl533yzdCk/ifa24ODWrZs2BeLjH3984kQ2Aoio4lzvOWIM9U+eLP3+vwtAz4QN2//Sz7Gx1t3OKa5NF9/v2Z/vk+hL41RG/YstAfaF/Crr+8s8rqR+2Sf+TzzhXurftm2DBp7NS2VKSvbsOXoUyMp6773vvgPs9gvv1s/7AGtjHG3VL/+/AG3l1159X5pHed//jcZq1apUAWJi7rlnzJiySwfIO4qLt2zZtQvIzHzllY8+AqR0OK60IeML/05V1veXefD9XxvjqKxvtwWZ7LaoqLr15i+YvyAv7x//+4+9Ofi6F5YUFWEo7NhlNmttAr5Q35fmwQaA9sfRYv3ST/zLTvz5ib83uFxFRcXFQE7OZ58tXQoUFKxatWULcDm3j+IBgDbG0VZ9NgB8dRy17//u27mGhfXt26ULEBU1btywYYBOZzaHhHh23uTeJLC0EfDhh2UrwCrCF/6dqqzvL/Pg+782xlHy//l+DEJufn6NhYvHf/1TZGTpn//jBjDie1yP144d82xEIvJN7gO/uLiHHrrhBp74e4vFsmXL/v3A2bP33ffGG0BBwcqVmzcDvG80EXmf+3WnsHDFit9/B86dmzhx6lT37UR37FCdzf+FhHTo0LIlEBv74IO33w6Uvi8TEf1DEhbivqNH//7Hhr//gayOk+L4kSMAINGsmercRKQdsbF33z10KBAa2qVL8+aq0/gvpzM3t7AQyMr64IPvvwcslo0b9+5VnYqI6J9KNwvMzHz11VmzALO5c+fWrYHo6P/856abAL0+MjI8XHVK/2M2d+3avj0QHV1QUFgI5OR89NHcuapTEZGmWKHHHPd5/V/9YwUAUrBbPvXPBxJR4IqOHju2b18gPPzaazt0UJ3GfxUX79hx6BBw9uwDD7z1Fk/8icj3lK4EOHfuvvuef9597fqePapT+a/w8AEDrrkGiIwcNWrwYNVpiEhTCmGSD15GA0A0lEUY/s+lAkQUeCIiBg7s1AmIjBw5skcP1Wn8j5Q2m8NRdru+tLRnn/3kE95+i4h8n8uVl1dYCGRkvPjihx8C2dnvv//114CUVqvNpjqd/4mMvOmmwYOB8PAhQ3r3Vp2GiDThKtlD/PTP8/p/NADkLDFLfMUGAFEgCw3t0aNVKyAmZvz4QYNUp/E/NtuxY2fPAmfPPvjgjBl/vV0fr+knIn9TtmfAunXA+fOPPPLqq4Ddfvz4mTOqs/mf6Ojbbx85EjCbu3Rp1051GiJS6iHdvSLlMhoAurGY5xrGSwCIAlFwcNOmtWoBcXH33XfddQA3F6pcpSf658498sh77wF2+6lTaWmqUxEReY/dfuLE2bNljYCCgqVLf/1VdSp/4n7fjo194IHbbgOCgho1qlNHdSYiUkHM0PfH/f88r//Hob2UKTJF6nSpS7brjE0KC9EMgzDmf2/s4o+3SfDFcXgbQLX1/WUeUgIGQ2JiTAyQlPTaa3ff7d60KTTUs+MGAiltNrsdyMp6//0ffgAKC1ev3rbtQo/1dJZ//hlvA+R/8+BtANXW96V5aO3932zu1q19eyA29p57xowBhAgODgrybI5A4HLl5xcWAufPT5nyyiuAw3HuXHq6++984d+pyvr+Mg++/2tjHK/W/0TORffCwhrPLgn9ekJEhPv/d9kj/rkHgJgqpgqXC2sQih0HDng2KhGppNOFh4eEAFWqpKSMG8cT/8pit587l5UFnDs3efK77178xJ+IiACLZe3aLVuA8+cfffS11wCH4/z5jAzVqXyfThcRERYGxMc/9dQ99wA6XViY2aw6FRF5VDuswt59+/5+4l9Kd6GfExsE8NO+farzE1HlE0Kv1+uBhIRHHx09GjAaq1WLi1OdyvcVF2/deuCA+8T/nXcAm+3EifPnVaciIvIdpXsDnD//4IMvvQRYLJs27dypOpXvMxqrV09KAuLjH3984kRACIPBYLjyukSkPWKYaIefL3wef8EGgGwvP8DzbAAQ+aOYmP/8Z/BgIDi4RYu6dVWn8WXuza1yc+fOXbUKSEt7/vnPPwdcrsLC4mLV2YiIfJfLZbGUlACZma+8MnMmkJf37bc//QRws9QrExTUrFmDBkB09B133Hij6jRE5BHTcFy+XoEGgHhHNpaCDQAifxIe3q9f+/ZlX6lipHQ4nE4gM/PNN7/91t0A+Pln99/wwJSIqDK5X1fz8r7+eskSIDPz9dc/+aRsjxWqmLCwAQN69ADCwvr06dJFdRoiqkyuFfhFhlRkBcAw1xD9NDYAiPxBUFCDBjVq8LZ+V6r0k/20tJSUjz8GCgt//XXHDtWpiIgCh8Wybt22bUB6+jPPvP122SZ3VDHR0ePHjx4NmEz169eqpToNEVUGuUjGGG+qQAOg9sLQq+tlHz2KRTCipcWieiJEVH56fVSUe/Ofxx4bNQoQwmjkNX/l53CkpWVnA+fOTZny3ntAScmePceOqU5FRBS4rNb9+48ede9uP20a4HCcPVu6uz1dPiFMJqPRfZxw992AThcZGR6uOhURVcj/7/6fHNzm3jppJ05c6GEXvgRAzJ9/ww1OJxrJJ8Q9e/aong8RXb7STf7i4x99dNQowGCIi4uMVJ3K91ithw6dOgWcO/fww++9B9jtp09zV2oiIu1wOM6dy8gA0tIef3z6dMBmO3z4+HHVqXyPXh8XFxMDxMU9/PD48e4/0emutCoReZP4VOyAY+fO/97V7wIu/YMobXsAAEeuSURBVKt9q2gla3KRK5EviYq6+ebevYHg4KZNuaSv/EpK9u49dgxIS3v66Y8/BpzOvDwuMSUi0i6nMzc3Px9IS3vqqTffBEpKdu3av191Kt8THNyiRaNGQGTkjTcOHqw6DRGVh4xFXfHhpc/bL9kAENdil9jEBgCRLwgObt68Th0gMvK667p2VZ3G9xQXb9t28CCQlvbss599BrhcxcVWq+pURER0uaQsKbFagYyM559/7z2guPiPP3btUp3K90RG3nDDwIFAcHDLlo0bq05DRJdDxGIKelz6xqmXbAC4mohieW77dtUTIqIL0+sjI0NDgfj4hx++4QYAEEII1al8h8WyefO+fUB6+ksvffEFd5cmIvJ1UtrtDgeQmTlt2qxZgMWyYQOPZsvDfRwRG/vQQ3feCej10dG8lJBI25x3AM47KmEFgOu0fVzE2D17xM0yBe/ykJhIW9xv0HFxDz00cqT7DZqb91y+oqK1a3ftAtLTX375yy/LDhiJiMg/SOlwuBsBr7328cdAUdEvv2zcqDqV79Dro6IiIoDY2PvvHzcO4AcMRNojrsde1LTZ7BvsG/NGXPoufpdsANR/d9mR+5dbrXKxuAWteDUVkZaULvUPCWndun591Wl8R2Hhzz9v3QpkZEyf/s03AOB0XnirFCIi8n0ul8sFZGW9886cOe5GwIYNqjP5juDgNm2aNQMiIoYN69tXdRoi+itZTW7Ejn376r+77MiyI5e+ePXy9/fcIyz48Y8/VE+QiACTqU6dpCQgKmrMmN69VafxHRbLhg179wKZme+99/33ACCllKpTERGR97hf97Oy3n33yy8Bi2Xt2i1bVGfyHZGRY8cOHw6YTHXrJierTkNEACCOIFa+s2nT5T7+8hsAc+RkeZoNACKVhDAaDQYgLm7SpBEjACEMBr1edSrtK73GPyPjtdfmzgX4iT8RUaArXRHw1luffw4UF2/evHu36kzaV3qb4ZiY++679Vb3cYjBoDoVUWCTT2OU2Hn55+mX3QCQS12Rulw2AIhUiooaNapnT8BkqlUrMVF1Gu0rLt6168gRICNj2rSvvwakdDqdTtWpiIhIK0rfFzIzX3115kz33WD27lWdSvtMptq1a9QAIiJuvHHQINVpiAKb8wb5qMzxwAqAOmntxtpa7tuHKJmCH/LyVE+UKJAEBTVsWKMGb+93uazWAwdOnAAyMl58cc4c967+3NyPiIgupGyzQHcjwGr988/Dh1Wn0r7IyOuv798fMJnq169dW3UaosAiWuMkFubm1kLbtg3GHzp0uT932Q0AIaaKqcLlEreLXeLU1q2qJ0wUCIQICjIay5b8Azqd7vIv3Ak4dvupU+npQFra1Kmffw64XCUlNpvqVERE5CuktFptNiAj44UX3nsPsNtPnDhzRnUqLdPrdTogNnbSpNtvB4QwmYxG1ZmIAoN8DQ3kyU2bSs/TL/fnyn8q8RMscsvlLzEgooqLiho9ulcvwGisVi0uTnUa7XI6c3IKCoC0tGef/fRTwOUqKiouVp2KiIh8lctlsZSUlDUCnM6cnPx81am0y2isXj0xEYiM5CUBRN4ib5PfipjyX6Jf7gaAuBvv6G5fv171hIn8mcmUnFylChARMWRI586q02iXlFar3Q6kp7uX+jscGRm5uapTERGRv3A40tOzs4GMjOeff/ddQMqSkkvfZCtwRUQMH37ttWV7BBCRB53QRcrR69aV98fK3QAoaS4+Nby/bp14Gh0QwatqiSqXEEIAsbH33DN0aNluu/R37t2bMzJef33uXMBqPXTo1CnVmYiIyF/ZbEePnjwJZGa+9trHHwOl70P0d+5LAmJiJk4cOxYoPa4hosojHpQvYKPdHnTQ8rv+l40by/vz5W4ANLpzcZdHGxUU4JC8G+/t3Kn6CSDyJxERAwZcdRUQFNSoUc2aqtNoV3b2rFk//ghYLH/8sW+f6jRERBQoiou3bt2zB8jO/vBD921l6d+YTA0a1KkDhIX17cvNi4kql8wRYfh269bEfqtafpFeVFTen6/4dmLVdPXljLVrVT8BRP5Ar4+ODgsDoqJuvrl3b9VptKugYNmyTZuA/PylS8vf7yQiIqochYUrVqxdCxQWrlz5+++q02hXVNS4cSNHAnp9TExUlOo0RP5BPCtaiUkVPw+veAOgn/xRV5cNAKLKEBNz550DBwI6XWhocLDqNNpjtR48ePIkkJ398cdLl6pOQ0RE5JaTM3PmN98ANtvhw8ePq06jPTqd2RwSAkRF3Xqr+25GRHSlxFt4zvmTggaAwWK70V7v99/xs/wIQbwKiqgiSpf6h4Z26dKsmeo02uN05uUVFgIZGa+++vXXgJR2O3ceISIirSh9X8rIeOWVDz8EXK68vIIC1am0JzS0e3f3JY5NmtSvrzoNkY+ai3TEOJ327/CAKWLDhoqWqXADoMbkFaeniuxs7BcN0HLXLtXPB5FvcW+KExMzfvzAgWXfk5uUTqd7k79p0+bOBRyOzMy8PNWpiIiI/p3TmZmZk+PeJHDWLPef8OOxv3If50RH33nnTTeVfU9E5dBEPoa+27bVFovEbFHx+15V/BKAUhnyLRm3apXq54PIl4SH9+nTti0QFFSvXrVqqtNoT07O558vWwaUlOzZc+yY6jRERESXp6Rkz56DB4Hc3C+++OEH1Wm0x2SqWzc5GQgN7dGjY0fVaYh8TDucwuQrP+++8gbAb/qHhIUNAKLLodOZzUFB3OzvQkp39c/PX7So/Hc1JSIi0ob8/IULV60Ciou3bNm9W3Ua7YmKGjv2uusAIYKDg4JUpyHyDeJrzHZ110ADQJzMzXN0WbcOe/EjZhUXq35iiLQsMvKGG3r0APT6qKiwMNVptMPpzMkpKACyst555/vvVachIiK6UlJK6X5fmzPH/T6Xn686k3bo9bGx0dFARMT11/fvrzoNkcb9jNuQUVRUkurIzV2zadOVlrviBkBt8ZuYKkpK0BvRQsfP7Ij+jV4fExMeDkREDBrEJW9/5T5Aysx8553vvgOczvz88t/NlIiISJtKNwXMynr77c8+A0rf98gtImLYsL59yxoCRPRPYgOsuGbNmvrvLjuy7IjVeqX1rvwSgNJgV8nnZENeCkD0b6KiRo3q2RMQwmQyGlWn0Y78/EWL1q8Hiou3bj14UHUaIiIizygp2bFj3z6goGDp0jVrVKfRDiFMJpOJKwGILsY1Sjwmu1TeeXalNQBcaTJC9+qyZWqeFiJtMhqTkmJjgbCw3r3btFGdRjvs9pMn09KAnJwvv1yxQnUaIiIi78jN/fzz774DbLbU1NOnVafRjrCwa6/t3h0wGBIT4+NVpyHSFgPkl6JO5R0xV1oDoG760luebLV3LxaiCPmpqWqeHiJtiYoaPdr9yb9er9erTqNe2f2SX3tt7lxASpvN4VCdioiIyDtK3wezst5889NPASkdDr4Plh0nRUbedNPgwarTEGmEUX6DGUePVuu1uMtX1SpvrWylNQD+a7QcK84sXerVJ4dIY0ym5OQqVYDQ0G7dWrRQnUY78vLmz//1V8BmO3EiLU11GiIiIjXs9hMnzpwB8vO/+275ctVptCM0tEePTp0Ao7FWrerVVachUixUVJOHFi2q7LKV3gAQVXQfybZsAFBgi4oaPbpXLwAQQgjVadQrXfKfl7dgwa+/qk5DRESkDfn58+cvWwbY7adPnzunOo0WuI+bIiNvvJErASjQuYzyOf3Qyj+vrvQGgOM+e2bkqjVrxA3IwDcFBd55eoi0wWisUSM+HjCbO3Zs3Fh1Gi0o3eX/vfd++MG91NHpVJ2JiIhIG0ovCcjOnjFjzhz3n/AuAYDZ3KlTmzaA0VizZtWqqtMQeZe4H4Pgys8vGhv8W0m3yr/LXqU3AOq/u+zI/cutVlmI3+T6n3/2ztNEpA1RUTfc0KMHwE/+3fLzf/xxwwbAat2//8QJ1WmIiIi0yWo9ePDYMaCwcNmy335TnUYL3MdRERHDh197reosRF52Dk3kq8uXN10wf8H8BTZbZZev/D0A/p/Yj5uxcvFizz47RNpgMCQmxsQAZnOXLs2bq06jnsORkZGbC+Tmfvklbw5KRER0eXJzv/jihx8ApzMzMztbdRr1zObu3a+6CjAYEhLi4lSnIfIOUSjri7wlSzxV32MNAEA3zzly4ULRGdsRX/mdCyItiYy8/vpu3dy72Oo8+FvlK7KzZ8368UfA5SoutlpVpyEiIvINLpfFUlIC5OR8+un8+arTqFd6d4CIiOHD+/VTnYbIs8T12Iv6NpvzJ9ft8mXP7annsVOV2mKRmCpyc+UxFItXuJiJ/JPBEBcXEQGEhfXs2aqV6jTqlZTs2XPsGGCxbNq0b5/qNERERL7JYlm/fts2wGr988/Dh1WnUS80tHfvLl0AvT46OjJSdRoiD7kJCXhx1ark5KVLv/46J8dTw3j8s0qxAjb50XffeXocIhXCwwcN6tQJEMJoNBhUp1HJ5XK5yj75JyIioiuXkzNr1jffAKXvs4FKCJPJaATCwgYMuOYa1WmIPENOFIVilOfPmz3eAJAZOKrbv3AhZuEcXuH+3+QfSt+IwsP79GnbVnUa9QoKVqzYsgWw2Y4fP39edRoiIiL/YLOlpp46BRQW/vzz+vWq06gXHt6vX/fuZcdhRH7hVXTGAw6H4X7n586rPXftfymPNwDqjF9S5clJaWkYK1eiD1+6yD+EhV1zTcuWgE4XHm42q06jjstVVFRSAuTmfv017/lBRETkGXl5X365cKF7j4DiYtVp1NHpIiPDwwGzuWvXq65SnYaocogFyJBha9ZUnfVju7kTMjM9PZ73tiuz6gbICG5nQr7OfVua8PBBgzp2VJ1Fvdzcb79dvRpwOvPyiopUpyEiIvJPTmdeXkEBkJ8/b57ntgbzHeHhgwf36qU6BVHlcG2Wo/HCggXeGs9rDQDnJ/ZMw4pvvxVPowMiHA5vjUtUmYKDW7SoXRswmZKTq1RRnUYdpzM7Oz8fKCj46ac//lCdhoiIKDAUFCxdumYN4HRmZXluizDtM5lq165ZEwgKatasYUPVaYgqpnTXf0NTvdlg8d6eeV5rANR/d9mRJ9IyMmS0vA9ZXCxMvikigp/8A+5P/tesAaS02ex21WmIiIgCQ+n7bl7eggXLlqlOo154+KBBvXurTkFUMXIx7kadZcuqFS5sPGdhVpa3xvX+HcuniTpiztdfe31coiug10dHh4UBISHt2gVyp9nhSE/PzQUKC1et2rpVdRoiIqLAVFS0cuW6dYDDkZbm+SuGtcts7tChVSveHpB81HxxDu/NnevtYb3eADD/XrIm6Lnvv8cbuAFzeNUw+YawsN6927YFhNDrdd5vm2lGbu433/zyCyClw8F7ehAREakhpcPhcAD5+YG+EsB9XBYa2qNHp06qsxBdpp9xGzKKikwNLbfqUr1/A22vn8ok9lvV8pFbiooQjlic5R3DSevcm/6FhfXu3aaN6izq2O1nz2ZlAYWFa9bs2KE6DREREQFltwd0OM6eTUtTnUadsLC+fbt1A0qP24i0TOSI63Hb998n9lvV8ot0738gruyzTHmn2KKL/eILVeMTXY7g4GbNatUCjMakpJgY1WnUyctzf/IPOJ0ul+o0RERE5OZyuVxAXt78+T/9pDqLOgZD1apVqgBBQY0b16unOg3RxcnfXedEkrrzYGUNgDp1gvbWf335cnEvnsf9p0+rykF0MeHhffq0bas6hToOR2ZmXh5QVPT773v2qE5DRERE/8Zi+e23zZsBhyMjIztbdRp1wsJ69+7aVXUKogvYLJ+D8/TpGj8E32t9b/VqVTGUNQCEmD//hhucTrkHN2P3V1+pykH0b3Q6szk4GDCbO3du0kR1GnXy8xcvXr8ekNLp5DX/RERE2lT6Pl1Y6L5NYKAym6++ul07QKcLCQkOVp2G6G/+EIWy6/+1d5/xUVVrF8DXnkmZJJQA0kkFBAHpgrTrtYCKVC9Br9gQBBFUitIhBBBBKQqI0gzNRoKQBFBEmiJFqkoRBJKgCAktPZlk5uz3Q15sV5GSmX3K+n/y502evXbkMnNW9jkTGytEXFxcnLp31uofZ9bUfcnufO89nEJnTJRSdRwi4LcLfyH8/Hx9VafxPk3Ly3M6gZyczz/n0/6JiIiMISdnw4Zt24pfx/PzVafxPiEcDn9/ICCg+NMBiHThNLrgcSnxgG2Nu/HSparjKC8AIhPW/zL6vuPHxQ5ZDq137lSdhwgAgoLatr39dtUp1MnO/uyzb74pfgNRUKA6DREREV2LK6/bOTnFHxNoVYGB7dq1aKE6BdH/2yzDMWjbttB710z/uM3Jk6rjKC8ArpDJ4hyWvvee6hxkbXZ7mTKBgYDD0ahRZKTqNN535Qhhdva6dazjiIiIjCk7OzHxiy+sewufw9G0aYMGgM1WunSpUqrTkOVNFf8Sr8TGqo5xhW4KgPxsxzZX2Mcfi2Zoh9pZWarzkDUFBrZpU78+IETx58paTV7e9u2HDhU/RCgjQ3UaIiIiuhFu98WLly8D+flff71vn+o03ieE3W63A4GBrVpZ+WOcSS3RBKexLSPDp5f2XeD++HjVea7QzSVO/fi4+BiRk4MHsQMXVqxQnYesKSioXbuGDVWnUCc7+7PPdu9WnYKIiIhKQnb2hg1ffqk6hTq8FYCUGg0HeixdWm3h2uYLFuTlqY5zhW4KgF8D1bddcA96+22cQmfE8KGA5B12e7lypUsDDkf9+mFhqtN4X1HRzz+fPw8UFBw5kpqqOg0RERGVBKfz8OEffwRcrl9+SUtTncb7HI4GDerUAez24OAyZVSnIauRq2QD+8GFC1Xn+DPdFQBhYxK2x4gjR8QQHJc5X3+tOg9ZQ2BgixZ16gCAEEKoTuN92dmff75nDwBIydqNiIjILIpf1637UECbzWYDAgLuuKNRI9VZyDKWyBcRunVr6I6kRUu3HD6sOs6f6a4AuEIGaxMw+N13VecgawgIaNGibl3VKbxPSpfL7QZyc7dsOXBAdRoiIiLyhJycTZu+/hqQsqjI5VKdxvtYAJBXBdvWy036vY7VbQHgbqQ1LpcaHy+64imsOn9edR4yJyH8/X19gYCAhg2t+NT/vLydOw8fBtzuzMzcXNVpiIiIyBM0LSsrJwfIz9+z59tvVafxPoejcePihzz7+/v5qU5DZiUGIQA90tKyv/Q7XRiyerXqPH9HtwVA7bmfnnjxM6dTPirD5S79NihkbAEBjRrVrPlbEWA1vx39JyIiIrOz6q0AVy78HY7bb7fiiU/ykpFoj4B33qkfHxcfF19YqDrO39FtAXCFfZtvmE+dd94RrbEfZfX7gyRjCgxs2dKKLwRu9+XL2dlAQcH33ycnq05DRERE3lBQcPDgkSPF7wMyM1Wn8b6AgBYtGjdWnYLMRtyB2nKi0+lq5Spj7zB/vuo8/0T3BUDY56srjjl99izOy2PYvXKl6jxkFsUP+wsIaN68+OF/1pKbu337oUMAoGmapjoNEREReUfxQwHz83futOKzfwICmje38sc9k2fITfJhMfaDDyLE+p5LxblzqvP8E90XAL8GvRc/uN+fNUt1DjIHP7/Q0EqVij/+r1Qp1Wm8Lzf3q6+++051CiIiIlIhN3f7diveAmi3V6hQrhzg61ujRtWqqtOQWdgn2Fpr3WbPVp3jWhmmAAj7fG3zGLF/v+iKOvIVK969RCXJ4Si+999qXK4LFzIzAafz2LGfflKdhoiIiFRwOo8c+fFHwO2+eDEjQ3Ua73M4Gja87TbVKcjoRBzuxubNm6vHJ4gPeh48qDrPtTJMAXCFNlq8a6vDkwB0cxyOhg0jIlSn8L68vO3bv/8euHIEkIiIiKyo+H1AXt6OHfv2qc7iff7+LADo5skpoo1wvfmm6hzXy3AFQOSjTbJdqWvWYLR8T4w/ckR1HjIau91mAxyOBg3Cw1Vn8b7c3K++Ki4AiIiIyOry8qx5K4DD0bBh8UOgbTab4a6GSDXRXw7D1qNHQy40viMybd061Xmul+H+yAsRI2KEpiFAfKR1nDlTdR4yFn//mjWrVQNstsBAh0N1Gu9xuy9ezMoCnM4TJ86cUZ2GiIiI9MDpPHbs1CnrfSqAzRYUFBgI+PlFRISEqE5DRiO3iVYYO3Xqr9elBmO4AuCKS89X/a5Kl2XLxP3YgG28m5mujcPRsGFkpOoU3pefv3//8eMAj/4TERHRb4rfFxQUHDhw+LDqLN7HZwHQdflGTkTIzz9nd/R/zPnFRx+pjnOjDFsANL9jwcL+zxUVyS1oiUzjPHWR1HI46tULC1Odwvvy8vbtKy4AiIiIiP4oP3///uKPB7YWf//bbqtVS3UKMoxHxHzsnD69fnxcfFx8YaHqODfKsAXAFYWfidf8V8yfj12ohRWXL6vOQ3olhBCAn9+tt9aooTqL90jpdmsaUFDw7bcnT6pOQ0RERHr02wkATTPegeYb5+dXt64VPxWKrlOWHIGply45PvA/77xl8WLVcW6W4QuAun0T246om52NRcjG93PmqM5D+uTrW61ahQqA3V6mTGCg6jTe43T+8MPp04Cm5eYWFKhOQ0RERHqkaTk5eXmA03n8eHKy6jTeY7eXLVumDODjU7nyLbeoTkN6JaJRGve9+WalR+Li4+JzclTnuVmGLwCukAscGX4zZ87EBXyL+lb8RFO6Gn//OnWs9Jv/K/LzefSfiIiIrk1BgTVvBfDzq1OHJwHoz0Q3OQuDMzNd8bbb7UfN84tm0xQANWvFxY8clZkJlyiFf8+dqzoP6Yu//623WvEpr/n5+/f/+KPqFERERGQE1n0WQJ06VnxINP2DXran5NKZMyNEglgqzPMLZtMUAFeIVuKwu/yMGTwJQL9ntRMAmpaX53QChYUpKefOqU5DRERERlBYeOrU6dOAlAUFTqfqNN7j73/rrSwA6Ipff/M/FF/5zDbfw+ZNVwBEiAQRIzIyxFiZjDvmzVOdh9QSwsfHbgd8fcPCKldWncZ7nM5jx06fBqz2MB8iIiK6GcUPD7baswB8fSMiQkMBwG63me7qiK7bXLEFF2fNMttv/q8w7R9xvx0+x32Oz5wpmqEdamdlqc5Davj6hoRUrPhbEWAVTufRo8UFABEREdH1cTqPHrXSLYRC+Pr6+BQ/NLpKFdVpSJnyaIlaly+7Wok+9g5vvaU6jqeYtgConrPmttH3XbyIVbKMeHLmTNV5SA0/P2v95v+KgoKjR1NTVacgIiIiI3I6jx614scH+/qGh1vpllH6k0H4Usx74w2z/ub/CtMWAFfkzQv4wlU4Ywb8kIHEtDTVeci7fH3Dw61VABQf+S8sPH78559VZyEiIiIjKiw8duzUKcBqtxL6+YWFsQCwHjEdSbiUnh54EeN8nzL/w+RNXwDUj4+LjxE5OaI6RuGWqVNV5yHv8vMLD7fSUa7CwuTkc+cATcvPt9LDe4iIiKjkaFpeXn4+UFiYmnrmjOo03sMTABb1I7KEz8SJtyQltn3vjexs1XE8zfQFwBV5UY733J/Om4c1yMX7VnqsibVZ7RYAp/PHH/mbfyIiIioJhYVWexhgeLgVPzbaqsTz2CZjU1IKahY1CX5u0SLVebzFMgVA8UmAwkKMEdXF8MmTVechz7LZgoIcDsBur1ChTBnVabyHH/tHREREJaWoyFonAHx8KlYsXx6w2QIDAwJUpyFPk5txHouio2vP/fTEnI7WOTtrmQLgiog8/4K6ZZYuRRmcRI/vvlOdhzzD17datQoVVKfwvqIiFgBERERUMgoLU1KseLLQx6dq1UqVVKcgj3lRLpR9Dh4MyfXv5dz0/vuq43ib5QoAIeLievZ0u21viQWIHDxYdR7yDB+fqlWtVQBIKWXxvXp81CURERGVhKKiKwVA8fsMq/DxqVKlYkXVKchTRDs8JNYNHixEXFxcnNutOo+3Wa4AuCJ8UmLb6IAtWzAGrcWaNWtU56GS5etbtWr58qpTeI/Ldf58Rgagabm5BQWq0xAREZEZaFpubl4e4HZfvHj5suo03sMTAOYkojAcM1auDBmWtHf5G9u2qc6jimULgCvsU7Xt7v3DhqEKQjHFOvd+mJ2PT5UqVioAeO8/EREReYrVbgXw8alShQWAiVTGcKQXFLh2iTa2iiNGqI6jmuULgLCwdetixKlT6CebyLNvvaU6D5UMqxUARUU8+k9ERESeYbWHAfr68gSAqaxDP7w6fXqESBBLRUqK6jiqWb4AuKLw37a6AemTJ+MLGY2FZ8+qzkM3x9e3WjVrFQBnz166pDoFERERmZHLdfZserrqFN7DWwBM4jw64tCZM44i/3oFU6dNUx1HL1gA/L+6fRPbjqibnY2dYicajhunOg/dGCHsdrsdsNuDg0uVUp3Ge1yutDQWAEREROQJLld6+sWLqlN4j91erlzZsgBgs9l4tWRYtidld/H8yJGVHomLj4vPyVGdRy/4R/pPIt5rOkhbFxsrbofAl3v2qM5D18duL1eu+MJfCCFUp/EelystzUoP5yEiIiLvcbnS0i5cUJ3Cm4ov/O32smVLl1adha5bPHagwu7d1Q8lVV72rPU+5u+fsAD4EyFiRIzQNPcKWy3ti8GDcQqdMcFKH3xibHZ7+fJW+otaSrdb0wCX6+LFrCzVaYiIiMiM3O7z54tPGmqapqlO4z12e/ny5cqpTkHX7DS64EkpMUf7DC+8/HLxLwN5HfdnLAD+Rq3uCTNjxI4duIwP5Na4ONV56Nr8dgLAGtzuCxcyM4v/yUovyEREROQ9Urrdbjfgcl24YKUTh3Z7+fLFtwKQEYjdoh8mrFgRmry2+fKa27erzqNXLAD+yUPu8j5PDR+OQ1iLqfn5quPQ1VntBACP/hMREZG3uN3WexZAcLDqFPSPFssP8WxODuA6Kt4eNUp1HL1jAfAPIgPXfzI2JTVVODAYATExqvPQ1dnt5cpZqwA4fz4jQ3UKIiIisgKXKz3dSs8CsNvLl2cBYAC7sQ0548aFDFtXZ1ljK31g5Y1hAXCNUtpnzdQuzpghJmACtuzbpzoP/TW7vWzZoCDVKbzH7c7M5DNNiYiIyBvc7szM7GzVKbyHDwHUuXzch+f37An51BFbEDtnjuo4RsEC4BrdLbaJGOFyIUu+LEb26SMel9GYXFSkOhf9kc1WqlRAgOoU3qNpWVl5eapTEBERkRVoWna2lX7xIESpUoGBqlPQ/5iG1hjhcmn7sEfc27+/EHFxcXFut+pYRsEC4DpFrFm7ZfwD334rI3FQps2apToP/ZHNFhTk7686hfe43SwAiIiIyDs0LSvLSgWAzRYYyAJAh+7FMhRMnRr+WOLyZXkHDqiOYzQsAG6Qb5OADWU6Tpgg+uEY7jpxQnUeKmazBQY6HKpTeA9PABAREZG3uN3Z2bm5qlN4j80WGGilk6W6956cicPHj7u7Zx62NXv1VdVxjIoFwA0KGRYXN3RXfj42ase0u559FqfQGRP4OZOq2WxBQVYqANzurCwrvRATERGROpqWlWWlZwDYbEFBLAB04DS64EkptRH4FD8PGBAhtomloqBAdSyjYgFwkyLEOhEjtm4VH0iHPBAbqzqP1dlsgYFWugVA07KzeQKAiIiIvMFqtwAIwRMAeiCek09j0vz54QFJLyxP37xZdR6jYwFQQrTRAYmOT4cOxRDUx2J+/IQqQlitAMjJyc9XnYKIiIisQNNycqz0iwebLSiIzwBQRzSQCxFx9qzre5vdtm3UKNV5zIIFQAmpWSsufuSozEzMFIfxzJAhqvNYlRB+fr6+qlN4j5SFhS6X6hRERERkBVIWFlrpM7CE8PW10vtK3Ym2VRUPDxwYIRLEUpGRoTqOWbAAKGGRNROToifExWEMWqP1mjWq81iHEEIAQthsQqjO4j1SFhWxACAiIiJvkNLlstL7DiF8fOx21SmsR8TJ15EVHx8yLEFb1nj1atV5zIYFgIfYL/r09e37/PNiKAIReOGC6jxmJ4TNZrMV/5O1CgC3W9NUpyAiIiIrsN4vHq68r7Tbbbxq8jgxHUkITU8vKo1yRZ8PGqQ6j1nxj7KHhH2+uuKY02fP4n68KG7p21d1HvPz8bHSX8xSulxud/E/8bMniIiIyDuK33dI6XYXvw+xBiHsdh8f1SlM7DS64Ckp5ftit1zQt29kv6TKH+alpamOZVYWumRSI2JAUpvoZxISsFKuRNSCBarzmJUQdruVjmj9VgAQEREReZu1TgLwVgAP+162Fs/Omxd6MaHF8vSkJNVxzI4FgJc4TuKwrDdkCL5BZVT+4QfVecxGCGudALDaCy8RERHph9WeBQCwAPAE0V8OQ+TRoz77ZZ7/fcOHq85jFTzM4iXVFq5tHiPy8lJTO+2Nlr16aYNFVzF55065A03h9vNTnc/opCwqcruBzMxVq776yttrq9hvQUFhoffXJSIiIsrKWrNm40bAZgsIcDj++mvMcoti8T74i5eSJO5AbfmW02lrZ/uXLfixx6otTBALhJU+YFItCz0uTV9Onuy0N1qOHCmEiBExr712IzNK4i/Wqz0wz9N/cRt9vln2wfn6WEfF/JJ8YKbRfz5m2cf1zb/+PwH6yq+/+UbaB1//9b8O56udb5Z96PL1/zw6ImvYsNBmic8tWzNzpmd/AvRnljo0rSeRkc2aAa+/LmJxFg02b1adh4iIiIiIyFPEHaiN+Rs3hjRt0j9i9Ztvqs5jVSwAFBEiRsQITfMJ1t73Kffkk1iBkQi4dEl1LiIiIiIiohJTHi3x4OXLtkFC2mv26XPlOkh1LKviLQA6cfLDLqWi5cMPi5bybhGzatW1fA+PAKqdb5Z9cL4+1rHkEUAdzTfLPngLgNr5RtoHX//1vw7nq51vln3o4fVfapBS69kzLDwxafmKuDjP7pj+CU8A6ETN/ybmxIhPPkF3FKHzkiWq8xAREREREd0oEYco2WPBAl746wsLAJ3Jr+0oJZu+8AJGy/dQ9cgR1XmIiIiIiIiu2Y9YL6O//963QX5D9B06VHUc+iMWADpTPz4uPkbk5CBfayT7de+OYBktozMzVeciIiIiIiL6O6IJTuPnjAxxEM3l3IcfrnL/xkbL03NzVeeiP2IBoFORCet/iRHHj4u7bAXAk0/iFDrLaLN8oioREREREZnCaXTBU1JitPgOM595JmRY4q4Vs06cUB2L/hoLAJ2L+D6xbYxITBS75EFg6lTVeYiIiIiIiH41XO4SkydNChmWoC1rvHq16jh0dSwADCJ8TLO3gbFjMVMuR9PPPlOdh4iIiIiIrEvcgdqYv3FjyNeOzLxbJk5UnYeuDT8G0GB+mnF/jWhZvnyR8LsV2LsX3RCECRERNzqPHwOk/3U4X+18s+xDDx8DpOf5ZtkHPwZQ7Xwj7YOv//pfh/PVzjfLPjzx+i9exww5NjXV7tQyizY3b15t4drmH/a/cMGzO6GSwgLAoJJlx5XRsnFjmWR/BNixAw3QCRMCAq53Dt8A6H8dzlc73yz7YAGgj3X0NZ8FgFHXYQGgdr5Z9sH5+ljHUK//lTEchQUF8pxtOvzatg0LW7Nm6dJ9+zy7AyppLAAM7lRe5/LjY594AufQRqQsW3a93883APpfh/PVzjfLPlgA6GMdfc1nAWDUdVgAqJ1vln1wvj7WMdTrf0VxCsufeSY0IOHQUi021rPJyVP4DACDiwxMujSx9/LlGIL6mDB/vuo8RERERERkIhNRFs/NncsLf3NgAWAS7hBX/KVPX3oJx2Q0JuzerToPEREREREZl5giP5bjduzIzvDPz5sxbJjqPFQyWACYRO25n56Y09HpFA9op4Bu3eDCAExITVWdi4iIiIiIjEM8gOromZxc1BRZft0efrh+fFx8XHxhoepcVDJYAJhMhFjfM0acO2e74G7hTn3wQexCLUy4fFl1LiIiIiIi0i/RTc6SszIz5SZ3K613ly6R/ZIqLzqUlqY6F5UsFgAmFd56/S2Tw48eFUfxlVbQvTuqIBQTnE7VuYiIiIiISD/EEDkZJ4qKtDZyhnjnP/8JrbruyeXphw6pzkWewQLA5CImJe2dFLBtm5yMf8k3e/fGKXTGBG89N5WIiIiIiHTpNLrgaSnlp6IuKvXtGzZn7bylYzZtUh2LPIsFgEXUnJL0yMQhH36IKfgGtkmTVOchIiIiIiJ1xCzZQkyMjg7NS/Rbuvr6P06cjIkFgMVEbEpaFCMnTMAXWIS1/D86EREREZGlHMSjaPfhhzXikxou2TJ5suo45F0sACxGCACQ8lKTqmPPNu3bF0PQDRN41IeIiIiIyNSG4XEs2bbN+XnR+DLVeve+cl2gOhZ5l1AdgNQ6eSKqx4jhZcva3yno7ri0fbschI9QvUEDwPN/HRh9vln2wfn6WEfFfFGCrwBG//mYZR/XN//6/wToK7/+5htpH1f7r2+E/Crnm2UfnK+PdbwyvzwOyjlHjuCS+3bXc23bhoWtW/fBB/yUMKtiAUAAgGTZVUbL8HBA+xewaxdSECyjK1f25JpG/wvVLPvgfH2swwJA7Xyz7IMFgNr5RtoHCwD9r8P5auebYR+iKZ6Wl86dc/3kWuHzzZ13Rgau/2TxudRUz+6I9I63ABAAIEIkiBiRkmI7rZXRxj/0EMJlNAZnZqrORURERERE106E4zT8MjLcF0R3JDz4IC/86fdYANAfhIWtWzdp0r59YhZmyO8efFC8KhfgQk6O6lxERERERHQVB1EW2/LysFhMR1iXLhEiQSwVBw+qjkX6wgKA/lL40LUfTvr3zp0iAJMQ360bNLyI7IIC1bmIiIiIiOh3MrAZ/fPz5V701/p26hT6TMJ9S8Z89ZXqWKRPLADoqsLmrJ03MX3TJnyiubC1WzeEIxSjnE7VuYiIiIiIrEwMlJORWlSEk3KQONuzZ/ikxLbLxmzZojoX6RsLALomEa+se3DigQ0bxE6xVDgee0xMRAs4XS7VuYiIiIiILGUF0hHhdmOh2CA3P/lk2MNJU2MfXrtWdSwyBhYAdF3CWyfmxIhPPpH3i2Vo1LcvNsv5cGma6lxERERERKaWii7oLSW2iZpix3PPhVZNfGWp+Ogj1bHIWPgxgHRTUn7uNGv8voEDZZHYjIS5c6/ne438sSpm2gfn62Mdfgyg2vlm2Qc/BlDtfCPtgx8DqP91OF/tfF3t4/8v/G13y3gcGzQoxJ302ZJ+8+Z55ydAZsMTAHRTwmusHTKx2dtvIxwD5J1DhqjOQ0RERERkKmHyMEqPGsULfyoJPAFAJSrl8y71on0nTZK1ZU05auzYq32tLhpVA6zD+Wrnm2UfPAGgj3X0NZ8nAIy6Dk8AqJ1vln1wvj7Wuer8UJkgY2NiwkSSWComTPDOjsnseAKASlR4h8QjMUXjxuFH1MKLI0eqzkNEREREZCxiq4ydNo0X/uQJLADIIyI6JM2aeMu0aXhb7JU9R4xQnYeIiIiISNeelZOROn58WFhC1lLBX6SRZ7AAII+KmJ54dlKD119HuBQyaMAAfmoAERERERF+fbifiER1jBs8OOzzpIZLtkyapDoWmRufAUBelVr6oZzx7/TqJXvYZskflyyR4/ENgnx8PLGWJe4N43z+d76J+XwGgPn2wWcAqJ1vpH3wGQD6X4fz1c736DorkI5abrcYKnIQ/uyzoQEJh2J7xcZ6Z0dkdTwBQF4Vlr2u1MQB778vk5GKOb16id4yGsOLilTnIiIiIiLyJNEZh9CxsBAQPsCjj/LCn1RgAUBKRGxNWjSpaOVK4WdbJx7p3h0nsRYv5OerzkVEREREVJJEQ9TGB04nPpDL8UbPnmFjErbHjomPV52LrIm3AJAuJI/r3Hxc/l13ia/hg/SkJLkYFbGodOmbmWnoo2Gcr5v5ZtkHbwHQxzr6ms9bAIy6Dm8BUDvfLPvgfC+sk4DeaJKbiy7iKXTt1i0sPCErNuyLL7yTnOiv8QQA6ULEpKS9kwK2bdMuIhhr770Xn2EkDly6pDoXEREREdH1EOE4jcoZGXhNfIWpHTrwwp/0hAUA6Urkt0mfTRq4Z4+tozYFTTp0QDgy0DktTXUuIiIiIqKrEU3xNGqdO6e9j9tte+65J+xswszYX3bsUJ2L6Pd4CwDpWkp+5zljQyMi5EY0FOPWrcPtmI7Tt912Ld9riKNhnK/7+WbZB28B0Mc6+prPWwCMug5vAVA73yz74PwSXOciGuHFw4fddV2HbQ8+9FBk4PpPFp9LTfVOQqLrwxMApGvhAUkvTD6dnGxrpL1edLJNG+yW0Ti4ZYvqXERERERkbaI77katzZu1JmKi1rhtW174kxGwACBDCAtbt27q1MuX8+IDptoSH3hA/AeLELZsmepcRERERGQxUzBPtlqyJDvS/+ucAw8+GCESxFKRkaE6FtG14C0AZEjFx7GESEFnOU5GR2MLFsI1fjwikISJxQcbdXU0jPMNO98s++AtAPpYR1/zeQuAUdfhLQBq55tlH5x/HeukoguekRLtZB+0nTgxFEkiVsTEePcdJ1HJ4AkAMqQrf+FGiCQxSUyYgHTxhojr3Vvcjf3IKCxUnY+IiIiIjE10xiF0LCxErhwu5z71VJhIErFiwgRe+JOR8QQAmUrxQwPvuUeewRuIWLUKdjRCu+BgT65p9Iab8/WxDk8AqJ1vln3wBIDa+UbaB08A6H8dzlc6v6WMvnxZCxWjtdCHHy4+4r91q2d3ROQdPAFAplL80MDNm20f20LdH7VpgyK5SI5PSVGdi4iIiIj0TUSiOpYlJ8sz9g9svm3a8MKfzIgFAJlS2JiE7a9VPXIEtbVtPr6tWiEPp9Fp1y7VuYiIiIhIX0Rr+TGe3rGjqII9qKj8nXeGt159eHG1o0dV5yLyBBYAZGoRYn3PGHHuXEq9rIP2lu3aIRzJ2DJtmupcRERERKRcFKIWLMhu5Xgie/bdd9dMXz19eXp6uupQRJ7EZwCQJZ1a0DltXMvHHxfAABk+fz7aowi1AwNvZJbB73HjfJ2sw2cAqJ1vln3wGQBq5xtpH3wGgP7X4XwPzC+L4ahQUCDXY77YP3Bg+GOJyxdveu89zyYl0hcWAGRpybLjytErGzfGevu7tuRPPkE9BCE7IuJ6ZujyBY7zDbcOCwC1882yDxYAaucbaR8sAPS/DueX3HwxDc3k8NOnxXy5U37Zo0eIO+mzJf327PFsQiJ94i0AZGkRYn3PKT0PHvR7xP62e8MddyAci2TPDRtU5yIiIiKimyPmYjgqfPqpqOl/yLauSRNe+BPxBADRHxS3yUKkbOw8ZOzXw4fjJ/kKVk+ZgntEfzhstr//Hk9n4nxV882yD54A0Mc6+prPEwBGXYcnANTON8s+TDk/FV3QR0qEiaGyxuuvh4Y2zgwNHT1aiBgRIzTNs4mIjIEFANFVnOraeeTYpZ06iRn4AO8tXw47GqFdcPDvv8aUL6Ccb7p9sADQxzr6ms8CwKjrsABQO98s+zDTfPEUOqF/VpZWSzwnGz/9dPiiBC3Wf/VqzyYgMibeAkB0FZEJSVMnP7V2rfa6dKNjixZiLh7FmEOHVOciIiIisjrxX9yPIT/8oE2xvyVC7ryTF/5E/4wFANE1qLlg7ZnJI378MTfVsdruaNUKk2SUfIlPjSUiIiLyNtEU3yFh4UK/6Py2Rfc2bx7eevXhxdWOHlWdi8gIeAsA0U1I2dGl1NiUhx+Wn8gCuWvBAgzEg/i+QoWSXMNMR/SMON8s++AtAPpYR1/zeQuAUdfhLQBq55tlH0aaL8JxGq0zMvALesmHBgwIrZr4yntVPvrIszsgMicWAEQlIFl2XBktq1TB97YOruqxsSgtnkDvBx4oidlGeoE243yz7IMFgD7W0dd8FgBGXYcFgNr5ZtmHEeaL2xAPn02bxCR3ctGAp54KGbauzrLGZ854NjmRubEAICpBv36KwPouA8ZOe/FFdJQ2GTVtGlJwGov9/W98pqczc77qdVgAqJ1vln2wAFA730j7YAGg/3WsOF8MlJORUVQkk3A74qdMCUVT1MDEiXyKP1HJYQFA5EEnKz20bHTDBg3sLUU9kfnBB3K2iMHjt99+PTP0+AJtpflm2QcLAH2so6/5LACMug4LALXzzbIPPc0XLeQw/HL0qDZLLEJhr17hjyUuX7zpwAHPJiSyJj4EkMiDaqave3LKd4cO2f8dMC3vw5YtxaPojWqzZyMZnTHWW29RiIiIiHSosliLesuX+y0rCC7cd8cdvPAn8jyeACBSIPmNhz4dPe/++9HNdkIMWrIEPvgco6pU+auv1VNDb8X5ZtkHTwDoYx19zecJAKOuwxMAauebZR9K5o/FcNQ7f16sF35o3KdP6MWEFovvTUrybBIi+j0WAEQKpXbofn50StWq8mzRFyj77rsyUXwgpnfp8vuvMeUbAAPNN8s+WADoYx19zWcBYNR1WAConW+WfXhzvvgv5iBq1SrX09IhXh44MLJfUuVFh9LSPJuAiP4KCwAiHTl1skvnMaOjomyvy0C8N2+eHIk8+cwtt3hyTTO9wTDyOiwA1M43yz5YAKidb6R9sADQ/zpGni+a4mn533Pn5FAxUxx64YWwMQnbF70UH+/ZHRHRteAzAIh0JLJmYtKrU+Li3Kt9QnzO1q8vXkWE2Ll8uepcRERERH8rFV3wrJSoLNaKzcuXi9H+H+Jg/fq88CfSH54AIDKAU6M6NR51tkcP8YzoY6s+Zw588Lkc+dfPDLheRv4Ngzfmm2UfPAGgj3X0NZ8nAIy6Dk8AqJ1vln2UyJ+jsUjHf48dE5+jjezVr19IWuKMxee+/NKzyYnoZvAEAJEBRL629uBrVePjNeHY5nq5bl3xKHrLR2bPxns4iyFut+p8REREZAGvorWc5XIBYqt8ato097LMnUX3NG7MC38i4+AJACIDS+3Qae/olKZNtSpCoNqCBYjBBExo1ux6ZhjhNwwq55tlHzwBoI919DWfJwCMug5PAKidb5Z9XM980REu3HfggFxv88MXzz4bFrZmzaJF+/Z5NiEReQILACIT2Lun37P9nvX1rXD5bKlbWg0dihSkYtn48WiPIrQODLza9+rpDYYe55tlHywA9LGOvuazADDqOiwA1M43yz6uOj8BvdEjN1esl/44NnZsyKeO2Mztc+YIERcXF8eTh0RGxgKAyIR+mvHQsTF3V6/uPmp7G3jtNTkGybLVE0/81dea+g2MgdZhAaB2vln2wQJA7Xwj7YMFgP7X8er8Kw/xC0UCqsfHuyu5fGXzV16JDFz/yeJzqameTUJE3sQCgMgCUsZ12T668t13I0+mYujs2XIQPkJmgwaAyd7AGHgdFgBq55tlHywA1M430j5YAOh/Ha/MP45UjN+7Fz8jXaYNHhzWO/Hs4ju+/tqzKxORSiwAiCxki7xLRksfn/D1ZZ8vajtwIDpqfeSTMTFIETFIKVvWE2sa/Q2SWfbBAkAf6+hrPgsAo67DAkDtfEPv4zKyEPXLLygnZ8iVMTGhoU2bVl+4aJEQMSJGaJpnd0REesACgMjCTi3onDb6xcqVbQtkGayfOFE+KNrJr/r0wTOoitl2e0msYcg3SCbcBwsAfayjr/ksAIy6DgsAtfMNtY+yGI4GBQXSXx6Q98+Y4fiy4F/Of732WpX7NzZanp6b65UfFBHpCgsAIvpVsuy0d9T8unXF0wCenjhRThAxmBAVdTMzDfEGSQfrsABQO98s+2ABoHa+kfbBAkD/69zU/Ip4DLXXrpVCnpddXnwxPCDphUV1k5O985MhIj1jAUBEf+tUSNcyI0fcd584rY0RvadPRwq2Y2mjRtczQ9dvkHS0DgsAtfPNsg8WAGrnG2kfLAD0v851f0xfzIED4gJus/1n8OCQtMQZ83d++aV3fhJEZCQsAIjoH0kZFRUVZben9shvVqvck0/KeNEQm6OjkYJ3EBUWdvXv9XQ2b/0MzDefBYD59sECQO18I+2DBYD+17nafBGJ6rglORn+eEt2nDAhJLeJb/W2K1bwXn4i+icsAIjouh3uEdUjWvr5BQYWjHKOevppjMMO8VJMDHzwOWZXqfL7r+UbPf3OZwFgvn2wAFA730j7YAGg/3X+MH8xwpF+4QL6SDv2Tp+uhWbNLPz5rbcixDaxVBQUeGfHRGQGLACI6Kad29D+25cfDwrKF44lPjUGDUIkVom3Ro6EHY3kS8HBnlzblG/0vDSfBYD59sECQO18I+2DBYC+1xHRcMo62dkyRuxElXnzCt8orOQoN2VK7bmfnpjTMSvLOzskIjNiAUBEJe6HRV22D7+1dGn/ULnK9vDzzyMSq+T44kJATCzZQsAMb/RUzWcBYL59sABQO99I+2ABoK91RDScaFF8wS8D5s0DXO18tk+bFha2bt0771y+7J0dEZEVsAAgIo/7n0IAADBiBGrjBFCu3M3MNuIbPb3MZwFgvn2wAFA730j7YAGgdh1e8BORKiwAiMjrkmVXGS2Dg7HFPd+Z9dJLOCZuR8CLL+IBTMX48uWvZ5YR3ujpdT4LAPPtgwWA2vlG2gcLAC+vsxl75JsXL+JDuUEMfust1zzHRMjZs2vWiotfsDAz0zuJiYhYABCRDiTLu2S0dDjQvfQ9BYd69sRqsUsEjx6NFNyHt+vUudr36vKNnkHmswAw3z5YAKidb6R9sADw7DqiKZ6WM8+dkxdkdwTNn+866YgS/WbN4gU/EanGAoCIdEfKaBktbbbkrftGFqx56CHxFZqLeiNH4gmxDLGtW//xa72VyXzzWQCYbx8sANTON9I+WACU8DobYMeIEyfEAFSRi+bOdQ4o2uho9+67xQ/tczq9k4iI6J+xACAiwzh5otPeEcPbtrXliI0YN2wY9smnMLRLF9wj+qO8zebJtY3+hpUFgD7W0dd8FgBGXYcFgNr5ACBG4aiUW7Zgg3hfrJw1K+RCQov5GWvXFv9cvfUnjYjo+rEAICLDSk196KGRIyMjZU9bH7z90kuyD1bI4L590R5FeCwwsCTXMvobVhYA+lhHX/NZABh1HRYA3psvOuMQXioslImoj3IJCfYm4ns5fsaMGpcTUhYs3L3bszshIip5LACIyDR+HPRgrVFnK1b0KecTrBUMGCDel2vx08CBcpN4FusqVbqZ2UZ6w3qt81kAmG8fLADUzjfSPlgA/DXxHwSge1qa3CM/wv3vvuteiHT37e+8E9kvqfKiQ2lpnk1OROR5LACIyLQO94jqES39/AKmOZ3OkV272t7XHpfL+vWTbUUmjtx7LyKQhKnXdhGk5zesNzqfBYD59sECQO18I+2DBcCvXx0to/ftK/7nBQts8Y6pQSnLl4cMi4ub1To/37NJiYi8jwUAEVlO8u1dtg+/tU4dfCefw+DevfEKfhAb+/bFQDyIWytU+Kvv0dcb1pKZzwLAfPtgAaB2vpH2YbUCQPxbzkJwZqbcKnag/ccf2+KFkB/PnRsyLOHxBQu//96ziYiI9IMFABFZ3rkN7b99+fGgoPwOjsn25VFRogdeFRWfeUYOxFb5Y9u2iECSfK0kL5f/FwsAtfPNsg8WAGrnG2kfpi0AUtFF9pcSs1EGjb/8UqxHN4x77z2fXtp3Mj0+vtrCtc0XLMjL8+wOiYj0iwUAEdHfOLG669Axb4eE2IM0WfTFY4+hCN/i5f79UQ9BSIiIKMm1WAConW+WfbAAUDvfSPswTQGwDx1hP3MGzcRwWWPFClu8rGevuWhRyLDEXfN6njjh2Z0QERkPCwAiomskZbSMljZbyvS9n+W72rdHvD0KHzzxBO6W7+Bit27oj5U4FxR0Y7M9nf1//x0LAPPtgwWA2vlG2ofRCgARDSe6Z2fLd8VGzF6zRjyqnZXzli8PWd20UpXQTZuEiBExQtM8m5yIyPhYABAR3aRkeZeMlg6H3Fp6ZMGa9u1tSxAl73/iCWwTXdG+a1e5BU3Rxs/vajNYAKidb5Z9sABQO99I+9BtAbAC6WjtdqMXDuC5LVtEPWTLocuXO2L9H7M3/OSTSo/Exc/rmZPj2YRERObFAoCIyEPOlOp2dNQ9FSoULnffoQX26IH9qKu93rMnAAifu+7CM6iKRXY7wAJA9Xyz7IMFgNr5RtqH8gLgVbRGrMuF0YiGfetWrMUbMnXlSpvT/yvXslWrQobFxS0edumSZ5MQEVkPCwAiIi/7acb9NYbsKF/e9ZVvbZ8enTqJO4UT9aOi8C5ScalDB7kFTXHP1U8MXC8WAPpYR1/zWQAYdR1DFQArkI52bjdeQm3U3rVLlEUpzR0X53pHTnD3/eijyH5JlRcdSkvz7E+MiIiuYAFARKQTybKrfEkGB8t8rYL/k507i454WLbs2lXYcAhHO3SQi1ERgaVL38hsFgD6WEdf81kAGHUdPRYA4il0wtasLLkESbhrwwZMkovQIzHRNcox0P1xUlLNWnHxCxZmZnr2J0NERP+EBQARkc5JGRUVFWW3nzqZPyIyolUrW03xtPtfnTohCW+L17p0we2Yjta33Xb1Gf/771gAmG8fLADUzjfSPm64AJAYDnnqFASSIb74QjQVdUTh2rXZd/u9fj5zw4b68XHxcfGFhZ79CRAR0Y1iAUBEZHDJstPeYU3r1gVEunjqgQcwEhXEd+3bQ+A4Qu+6C/2xUmb/76cTsAAw3z5YAKidb6R9/O1//Tflh/JyTo5YI+7FmW3bcBpNxA8bN9oDbC+KpE8/rZ6z5ra3Wx4/7tkdEhGRp7AAICIyqcM9onpESz+/wLi8uBy0bo1XxUDxeocOIgcTMaZ9ewSIB7C/SRM8hapYVvwwwhtlhAsePayjr/ksAIy6zk3NX4p0/NvtFhXwGL7Zv1/2kQItPv/cPg9LpWvjxqydjvALn+zcyd/kExGZEwsAIiKLSv84qsfzK0uVym9Z+Hlg4J13amFapnyobVsxSa4UT7RpI94XQ3HwX/+SG9AUD+jvYwyNuI6+5rMAMOo6V53//xf4CJVvAwcP4l2kynu//lp8LGIxZvt22yp/R2HtTZv4lH0iImtiAUBERH/pSkGQOyh/ZNDjrVuL5wBZt21bESwSUKZlS0ySXeHfsqU8KGJk47JlPZnFEhduXp/PAsCQ65TFaRmbkSFelhtk4u7d2iJUwr27dtlSbWUxYPt2/2N5XwXl7NxZ5f6NjaavyM31zo6JiMgoWAAQEdENkTJaRkub7fSUg+1yDtStK/e7O4nuLVsiFS/JHnfeKfzEbLRr2RKl5L3wrVdPLhAx2Ozre2NreWtPVprPAkBP64h+cjKqFhVhPyqjwuHDWIBZaLp7t9YdJ2Xqrl1ip88RjNm9O6zV6sPzfvzhh+L/et7aERERmQULACIi8qi9e/o92+9ZX99KL52VQZ/deisOypPivmbNtNvFC3i6WTO8hN5o2KwZNssfRHajRhgr+uGtUqV+P0PPF27Gnc8CwCvrTJYfIiAnB23wA0YcO4avbXdg2pEjtljZX2Tu24dQrY/Wft8+MShgmn+NfftChsXFzWqdn++dpEREZDUsAIiISFdOv9Jl+/Bbq1WTA0VHbWa9eqKm7CUX1a+vNdFmasPr1cNQUUXcVr++iMNt6NawoZyFimhWunRJrG30C1AWAJ6fL+qgNvKcTvkZ4rDr5EksQSPcffiwXCIT5dwjR2ypoosYdPiweExWlpuPHAn5uunCW44cPSpEjIgRmubZHRIREV0dCwAiIjKk4os5IU6u6Tp06LYaNXz2y4fxSq1aYrfmEK6aNbUN4mm5pFYtsRl3YletWuIRvCoG1KyJdugq29as+VfFgREuQEtuvrULANEdnXAhKws/ya4Ye+qUHI3LMvfECVEVZ0XnEycQa1skXzx5UtuAFRhz4oTvbPuDtk9PnKj+4iefzel45gyP4BMRkRGxACAiIktKTX3ooZEjy5Wzxfv819mlRg0tQjsktoaFyVgxHcEhIeIXzSmdNWrIJmIIWoaE4EE0wl3VqmEHHMKvcmXxAd6ViypWlFPlx4ivWBF3if4Itdmutqa+LqANVgBskwtxXNPESPEi8s6fl4/hVeScP4/WCJWb09LwqXCIar/8Ig7Ic1j100/aXhyX7/70k221XCvH/PyzLdnWQHROTXUNRS972k8/RYgE8ZbIyPDsjoiIiPSFBQAREdFNkDIqKirKbk9BblS4rFjRZ6ZvoWtoxYru57XLcl3FimKmXIz7y5fHNixCanAwvhdDkBYcLE+hJy4HB+MM7kV2cDDSRQvkBgeL/8iL8oXAQDlArhFDSpdGkdiD9x0OROK/CAwIEM/jHekKCpKrcacY7OeHb/EchpUti/vwgizzFwWEE29irMOBauiESgEBv/0PfyoAfsFmpOfnwx+jMLmg4H/mfIG5cqemoRHi0D8zU3THt1hTWCjnyTuRlJuLtSiNAXl5aCRuR5DTKd6RWXglO1uuEhUwNi8PleQ3SMnIQHVswg8ZGSISK7E3I0OeQk9x7PJl0RhTXV9lZMiDGCk+vHzZPs9WDmPPn3cNLfLT5p4/H447oipGpafzKD0REdGN+z/c4Mk27ZjjIAAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMS0wNS0wNVQwNToxODowNyswMDowMFW2QDcAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjEtMDUtMDVUMDU6MTg6MDcrMDA6MDAk6/iLAAAAAElFTkSuQmCC"
                        alt="Header Avatar">

                </button>

                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" onClick="showProfile()"><i class="mdi mdi-account-circle font-size-17 align-middle mr-1">
                        </i> <?php echo Translation::of('Profile'); ?></a>

                    <div class="dropdown-divider"></div>
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="dashboard_api\logout.php"><i
                            class="bx bx-power-off font-size-17 align-middle mr-1 text-danger"></i>
                        <?php echo Translation::of('Logout'); ?></a>

                </div>

            </div>



        </div>

    </div>

</header>

<div class="modal fade" id="Edit_User_Modal" tabindex="-1" role="dialog" aria-labelledby="Edit_User_Modal_Lebel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Edit_User_Modal_Lebel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                <div align='center'>
                    <img class="rounded-circle" height="64" src="public/images/users/user.png" alt="Header Avatar"><br/>
                    <span id="UserName"> UserName </span>
                </div>

                    <input type="hidden" id="Edit_modal_User_id" name="Edit_modal_User_id" value="000">
                    <div class="form-group"> <label class="control-label">User
                            Name</label>&nbsp;&nbsp;<input id="Edit_modal_User_Name" type="text" name="label"
                            class="form-control" placeholder="" required="">
                    </div>
                    <div class="form-group"> <label class="control-label">Email
                        </label>&nbsp;&nbsp;<input id="Edit_modal_Email" type="text" name="label" class="form-control"
                            placeholder="" required="">
                    </div>

                    <div class="form-group"> <label class="control-label">Password
                        </label>&nbsp;&nbsp;<input id="Edit_modal_Password" type="password" name="label" class="form-control"
                            placeholder="" required="">
                    </div>
                    <div class="form-group"> <label class="control-label">Confirm Password
                        </label>&nbsp;&nbsp;<input id="Edit_modal_Confirm_Password" type="password" name="label" class="form-control"
                            placeholder="" required="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="Update_User()" class="btn btn-primary">Update
                    </button>
            </div>
        </div>
    </div>
</div>

<!-- LicenseModal -->
<div class="modal fade" id="LicenseModal" tabindex="-1" aria-labelledby="LicenseModalModalLabel" aria-hidden="true" 
    data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-4">
                                    <div class="avatar-md mx-auto mb-4">
                                        <div class="avatar-title rounded-circle h1">
                                            <i class="mdi mdi-flash"></i>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">
                                        <div class="col-xl-10">
                                            <h4 class="text-primary">License !</h4>
                                            <p class="text-muted font-size-14 mb-4">Add License Code To Unlock the Admin Panel.</p>

                                            <div class="input-group rounded">
                                                <input type="text" class="form-control border-0" id="LicenseCode_text" placeholder="Enter License Code" aria-label="License Code" aria-describedby="License Code">
                                                
                                                <button class="btn btn-primary" type="button" id="LicenseCode_Btn" 
                                                onClick="setLicense();">
                                                    <i class="typcn typcn-flash"></i>
                                                </button>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- ========== Left Sidebar Start ========== -->

<div class="vertical-menu">



    <div data-simplebar class="h-100">



        <!--- Sidemenu -->

        <div id="sidebar-menu">

            <!-- Left Menu Start -->

            <ul class="metismenu list-unstyled" id="side-menu">

                <li>

                    <a href="index.php" class="waves-effect">

                        <i class="typcn typcn-home"></i>

                        <span><?php echo Translation::of('Dashboard'); ?></span>

                    </a>

                </li>



                <li class="menu-title"><?php echo Translation::of('Contents'); ?></li>



                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-movie-open"></i>

                        <span><?php echo Translation::of('Movies'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="typcn typcn-plus" href="add_movie.php">
                                <?php echo Translation::of('Add Movies'); ?></a></li>

                        <li><a class="typcn typcn-th-list" href="all_movies.php">
                                <?php echo Translation::of('All Movies'); ?></a></li>

                    </ul>

                </li>


                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-movie-roll"></i>

                        <span><?php echo Translation::of('Web Series'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="typcn typcn-plus" href="add_web_series.php">
                                <?php echo Translation::of('Add Web Series'); ?></a></li>

                        <li><a class="typcn typcn-th-list" href="all_web_series.php">
                                <?php echo Translation::of('All Web Series'); ?></a></li>

                    </ul>

                </li>

                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-youtube-tv"></i>

                        <span><?php echo Translation::of('Live TV'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="typcn typcn-plus" href="add_channel.php">
                                <?php echo Translation::of('Add Channels'); ?></a></li>

                        <li><a class="typcn typcn-th-list" href="all_channels.php">
                                <?php echo Translation::of('All Channels'); ?></a></a></li>

                    </ul>

                </li>

                <li class="menu-title"><?php echo Translation::of('Special'); ?></li>
                <li>

                    <a href="genres.php" class="waves-effect">

                        <i class="fab fa-trello"></i>

                        <span><?php echo Translation::of('Genres'); ?></span>

                    </a>

                </li>

                <li class="menu-title">Import</li>
                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="fa fa-search"></i>

                        <span>Search</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="mdi mdi-movie-open" href="search_movie.php">
                                Movies</a></li>

                        <li><a class="mdi mdi-movie-roll" href="search_webseries.php">
                                WebSeries</a></li>

                    </ul>

                </li>
                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="fas fa-magic"></i>

                        <span>Bulk</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="mdi mdi-movie-open" href="add_bulk_movie.php">
                                Movies</a></li>

                        <li><a class="mdi mdi-movie-roll" href="add_bulk_webseries.php">
                                WebSeries</a></li>

                    </ul>

                </li>

                <li class="menu-title"><?php echo Translation::of('Push Notification'); ?></li>

                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-movie-roll"></i>

                        <span><?php echo Translation::of('Notification'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="dripicons-broadcast" href="announcement.php">
                                <?php echo Translation::of('Announcement'); ?></a></li>

                        <li><a class="dripicons-rocket" href="notification_movie.php">
                                <?php echo Translation::of('Movies'); ?></a></li>
                        <li><a class="dripicons-rocket" href="notification_web_series.php">
                                <?php echo Translation::of('Web Series'); ?></a></li>

                        <li><a class="mdi mdi-web-box" href="notification_web_view.php">
                                <?php echo Translation::of('Web View'); ?></a></li>

                        <li><a class="mdi mdi-web" href="notification_external_browser.php">
                                <?php echo Translation::of('External Browser'); ?></a></li>

                        <li><a class="typcn typcn-cog" href="notification_setting.php">
                                <?php echo Translation::of('Setting'); ?></a></li>

                    </ul>

                </li>

                <li class="menu-title"><?php echo Translation::of('SUBSCRIPTION'); ?></li>
                <li>
                    <a href="coupon_manager.php" class="waves-effect">

                        <i class="typcn typcn-ticket"></i>

                        <span><?php echo Translation::of('Coupon Manager'); ?></span>

                    </a>

                </li>


                <li class="menu-title"><?php echo Translation::of('MISCELLANEOUS'); ?></li>

                <li>
                    <a href="manage_user.php" class="waves-effect">

                        <i class="fas fa-user"></i>

                        <span><?php echo Translation::of('User Manager'); ?></span>

                    </a>

                    <a href="report_manager.php" class="waves-effect">

                        <i class="typcn typcn-flag"></i>

                        <span><?php echo Translation::of('Report Manager'); ?></span>

                    </a>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="dripicons-duplicate"></i>

                        <span><?php echo Translation::of('Slider'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="typcn typcn-image" href="custom_slider.php">
                                <?php echo Translation::of('Custom Slider'); ?></a></li>

                        <li><a class="typcn typcn-cog" href="slider_settings.php">
                                <?php echo Translation::of('Slider Settings'); ?></a></li>

                    </ul>

                </li>

                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="typcn typcn-cog"></i>

                        <span><?php echo Translation::of('Settings'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a class="typcn typcn-flash" href="api_setting.php">
                                <?php echo Translation::of('API Setting'); ?></a></li>
                        <li><a class="typcn typcn-vendor-android" href="android_setting.php">
                                <?php echo Translation::of('ANDROID Setting'); ?></a></li>
                        <li><a class="typcn typcn-device-desktop" href="dashboard_setting.php">
                                <?php echo Translation::of('Dashboard Setting'); ?></a></li>
                        <li><a class="mdi mdi-currency-usd" href="ads_setting.php">
                                <?php echo Translation::of('ADS Setting'); ?></a></li>
                        <li><a class="mdi mdi-email-multiple" href="email_setting.php">
                                <?php echo Translation::of('EMAIL Setting'); ?></a></li>

                        <li><a class="typcn typcn-clipboard" href="terms_and_conditions.php">
                                <?php echo Translation::of('Terms & Conditions'); ?></a></li>
                        <li><a class="mdi mdi-post-outline" href="privacy_policy.php">
                                <?php echo Translation::of('Privacy Policy'); ?></a></li>
                    </ul>

                </li>


                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="dripicons-device-desktop"></i>

                        <span><?php echo Translation::of('System'); ?></span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">

                        <li><a class="ion ion-md-git-compare" href="update.php">
                                <?php echo Translation::of('Update'); ?></a></li>

                    </ul>

                </li>

            </ul>

            </ul>

        </div>

        <!-- Sidebar -->

    </div>

</div>

<!-- Left Sidebar End -->

<!-- Sweet Alerts js -->
<script src="public/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Sweet alert init js-->
<script src="public/js/pages/sweet-alerts.init.js"></script>

<script>
    function On_Load() {
        $.ajax({
            type: 'POST',
            url: "dashboard_api/get_config.php",
            contentType: 'application/json',
            dataType: 'json',
            headers: {
                'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
            },
            success: function (response100) {
                if(response100.license_code == "") {
                    $('#LicenseModal').modal('show');
                } else {
                    dmVyaWZ5(response100.license_code);
                }
            }
        });
    }

    function dmVyaWZ5(license_code) {
        $.ajax({
            type: 'POST',
            url: "dashboard_api/verify.php?code="+license_code,
            contentType: 'application/json',
            success: function (response0) {
                if(response0 != false){
                    if(response0 == "Invalid purchase code") {
                        $('#LicenseModal').modal('show');
                    } else if(response0 == "Inactive purchase code") {
                        $('#LicenseModal').modal('show');
                    } else {
                       
                    }
                    
                } else {
                    $('#LicenseModal').modal('show');
                }
            }
        });
    }

    function setLicense() {
        var LicenseCode_text = document.getElementById("LicenseCode_text").value;
        if(LicenseCode_text != "") {
            var jsonObjects = {
                "license_code": LicenseCode_text
            };
            $.ajax({

                type: 'POST',
                url: "dashboard_api/update_license_code.php",
                contentType: 'application/json',
                data: JSON.stringify(jsonObjects),
                dataType: 'text',
                headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                success: function (response) {
                    if (response == "License Updated successfully") {
                        swal.fire({
                            title: 'Successful!',
                            text: 'License Code Updated successfully!',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#556ee6',
                            cancelButtonColor: "#f46a6a"
                        }).then(function () {
                            location.reload();
                        });
                    } else if (response == "Invalid purchase code") {
                        swal.fire({
                            title: 'Invalid!',
                            text: 'Invalid purchase code!',
                            type: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#556ee6',
                            cancelButtonColor: "#f46a6a"
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        swal.fire({
                            title: 'Error',
                            text: 'Something Went Wrong :(',
                            type: 'error'
                        }).then(function () {
                            location.reload();
                        });
                    }

                }

            });
        } else {
                swal.fire({
                title: 'Invalid License Code',
                text: 'Please Enter a valid License Code!',
                type: 'warning'
            }).then(function () {
                swal.close();
            }); 
        }
    }
</script>

<script>
    function setLanguage(Language, icon) {
        //$("#mainLanguageButton").html(Language);
        //document.getElementById("mainLanguageButtonImage").src=icon;

        if(Language == "") {
            admin_panel_language = "";
        } else if(Language == "English") {
            admin_panel_language = "en-US";
        } else if(Language == "Chinese") {
            admin_panel_language = "zh-CN";
        } else if(Language == "Bengali") {
            admin_panel_language = "bn-BD";
        } else if(Language == "Hindi") {
            admin_panel_language = "hi-IN";
        } else if(Language == "Spanish") {
            admin_panel_language = "es-ES";
        } else if(Language == "Russian") {
            admin_panel_language = "ru-RU";
        } else if(Language == "Turkish") {
            admin_panel_language = "tr-TR";
        }

        var jsonObjects = {

            "admin_panel_language": admin_panel_language
        };
        $.ajax({

            type: 'POST',
            url: "dashboard_api/update_panel_language.php",
            contentType: 'application/json',
            data: JSON.stringify(jsonObjects),
            dataType: 'text',
            success: function (response) {
                if (response == "Admin Panel Language Updated successfully") {
                    swal.fire({
                        title: 'Successful!',
                        text: 'Admin Panel Language Updated successfully!',
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#556ee6',
                        cancelButtonColor: "#f46a6a"
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    languageError();
                }

            }

        });
    }

    function languageError() {

        swal.fire({
            title: 'Error',
            text: 'Something Went Wrong :(',
            type: 'error'
        }).then(function () {
            location.reload();
        });

    }
</script>

<script>
function showProfile() {
    var jsonObjects = {
        "userID": <?php echo $_SESSION['ID']; ?>
    };
    $.ajax({
        type: 'POST',
        url: "dashboard_api/get_user_Details.php",
        contentType: 'application/json',
        data: JSON.stringify(jsonObjects),
        dataType: 'json',
        success: function (response) {
            if(response != "") {
                document.getElementById("UserName").textContent = response.name;

                $("#Edit_modal_User_id").val(response.id);
                $("#Edit_modal_User_Name").val(response.name);
                $("#Edit_modal_Email").val(response.email);

                $("#Edit_modal_Password").val(response.password);
                $("#Edit_modal_Confirm_Password").val(response.password);
            }
        }
    });

    $('#Edit_User_Modal').modal('show');
}

function Update_User() {
        var Edit_modal_User_id = document.getElementById("Edit_modal_User_id").value;
        var Edit_modal_User_Name = document.getElementById("Edit_modal_User_Name").value;
        var Edit_modal_Email = document.getElementById("Edit_modal_Email").value;
        var Edit_modal_Password = document.getElementById("Edit_modal_Password").value;
        var Edit_modal_Confirm_Password = document.getElementById("Edit_modal_Confirm_Password").value;

        if(Edit_modal_Password == Edit_modal_Confirm_Password) {
            if(Edit_modal_Password != "" && Edit_modal_Confirm_Password != "") {
                var jsonObjects = {
                    "Edit_modal_User_id": Edit_modal_User_id,
                    "Edit_modal_User_Name": Edit_modal_User_Name,
                    "Edit_modal_Email": Edit_modal_Email,
                    "Edit_modal_Password": Edit_modal_Password
                };
            $.ajax({
                    type: 'POST',
                    url: "dashboard_api/update_self_data.php",
                    contentType: 'application/json',
                    data: JSON.stringify(jsonObjects),
                    dataType: 'text',
                    headers: {
                      'x-api-key': '<?php echo $_SESSION['api_key']; ?>'
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == "User Updated successfully") {
                            swal.fire({
                                title: 'Successful!',
                                text: 'User Updated successfully!',
                                type: 'success',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                window.location.replace('dashboard_api/logout.php');
                            });
                        }else  if (response == "Email Already Regestered") { 
                            swal.fire({
                                title: 'Warning!',
                                text: 'Email Already Regestered!',
                                type: 'warning',
                                showCancelButton: false,
                                confirmButtonColor: '#556ee6',
                                cancelButtonColor: "#f46a6a"
                            }).then(function() {
                                swal.close()
                            });
                        } else {
                            Error_Response();
                        }

                    }
            });
            } else {
                swal.fire({
                    title: 'Warning',
                    text: 'Please Enter Password!',
                    type: 'warning'
                }).then(function() {
                    swal.close()
                });
        }
            
        } else {
            swal.fire({
            title: 'Warning',
                      text: 'Password and Confirm password Not Matching!',
                      type: 'warning'
                }).then(function() {
                    swal.close()
                });
        }
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