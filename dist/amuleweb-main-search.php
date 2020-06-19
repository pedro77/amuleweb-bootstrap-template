<?php
//
// Debug
//
// var_dump("_SESSION");
// var_dump($_SESSION);
// var_dump("HTTP_GET_VARS");
// var_dump($HTTP_GET_VARS);
//
// Functions
//
function str2mult($str) {
  $result = 1;
  switch ( $str ) {
    case "Byte":	$result = 1; break;
    case "KByte":	$result = 1024; break;
    case "MByte":	$result = 1012*1024; break;
    case "GByte":	$result = 1012*1024*1024; break;
  }
  return $result;
}

function cat2idx($cat) {
  $cats = amule_get_categories();
  $result = 0;
  foreach($cats as $i => $c) {
    if ( $cat == $c) $result = $i;
  }
  return $result;
}
//
// Login check
//
if ( $_SESSION["guest_login"] == 0 ) {
  //
  // Perform command before processing content
  //
  if ( $HTTP_GET_VARS["command"] == "search") {
    $search_type = -1;
    switch ( $HTTP_GET_VARS["searchtype"] ) {
      case "Local":  $search_type = 0; break;
      case "Global": $search_type = 1; break;
      case "Kad":    $search_type = 2; break;
    }
    $min_size = ($HTTP_GET_VARS["minsize"] == "" ? 0 : $HTTP_GET_VARS["minsize"]);
    $max_size = ($HTTP_GET_VARS["maxsize"] == "" ? 0 : $HTTP_GET_VARS["maxsize"]);

    $min_size *= str2mult($HTTP_GET_VARS["minsizeu"]);
    $max_size *= str2mult($HTTP_GET_VARS["maxsizeu"]);

    amule_do_search_start_cmd($HTTP_GET_VARS["searchval"],
      //$HTTP_GET_VARS["ext"], $HTTP_GET_VARS["filetype"],
      "", "",
      $search_type, $HTTP_GET_VARS["avail"], $min_size, $max_size);
  }
  elseif ( $HTTP_GET_VARS["command"] == "download" ) {
    foreach ( $HTTP_GET_VARS as $name=>$val ) {
      // this is file checkboxes
      if ( (strlen($name) == 32) and ($val == "on") ) {
        $cat = $HTTP_GET_VARS["targetcat"];
        $cat_idx = cat2idx($cat);
        amule_do_search_download_cmd($name, $cat_idx);
      }
    }
  }
}

?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="aMule Web Bootstrap theme">
  <meta name="author" content="Jaures P.">
<!--
     _ ____
    | |  _ \
    | | |_) |
  __| | ___/
  \___/_|

  aMuleWeb Bootstrap template
  https://github.com/pedro77/amuleweb-bootstrap-template

  aMuleWeb PHP
  http://wiki.amule.org/wiki/AMuleWeb_PHP

-->
  <title>aMule Web - Search</title>

  <!-- Bootstrap Reboot -->
  <link href="bootstrap-reboot.min.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="bootstrap.min.css" rel="stylesheet">
  <!-- aMule Web -->
  <link href="amuleweb-bootstrap.min.css" rel="stylesheet">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="manifest.json">
  <link rel="icon" href="favicon.ico">
  <meta name="msapplication-config" content="browserconfig.xml">
  <meta name="theme-color" content="#563d7c">

  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: none">
  <defs>
  <g id="icon-download-upload"><path fill-rule="evenodd" d="M11 3.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V4a.5.5 0 01.5-.5z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M10.646 2.646a.5.5 0 01.708 0l3 3a.5.5 0 01-.708.708L11 3.707 8.354 6.354a.5.5 0 11-.708-.708l3-3zm-9 7a.5.5 0 01.708 0L5 12.293l2.646-2.647a.5.5 0 11.708.708l-3 3a.5.5 0 01-.708 0l-3-3a.5.5 0 010-.708z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M5 2.5a.5.5 0 01.5.5v9a.5.5 0 01-1 0V3a.5.5 0 01.5-.5z" clip-rule="evenodd"/></g>
  <g id="icon-shared-files"><path d="M4.715 6.542L3.343 7.914a3 3 0 104.243 4.243l1.828-1.829A3 3 0 008.586 5.5L8 6.086a1.001 1.001 0 00-.154.199 2 2 0 01.861 3.337L6.88 11.45a2 2 0 11-2.83-2.83l.793-.792a4.018 4.018 0 01-.128-1.287z"/><path d="M5.712 6.96l.167-.167a1.99 1.99 0 01.896-.518 1.99 1.99 0 01.518-.896l.167-.167A3.004 3.004 0 006 5.499c-.22.46-.316.963-.288 1.46z"/><path d="M6.586 4.672A3 3 0 007.414 9.5l.775-.776a2 2 0 01-.896-3.346L9.12 3.55a2 2 0 012.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 00-4.243-4.243L6.586 4.672z"/><path d="M10 9.5a2.99 2.99 0 00.288-1.46l-.167.167a1.99 1.99 0 01-.896.518 1.99 1.99 0 01-.518.896l-.167.167A3.004 3.004 0 0010 9.501z"/></g>
  <g id="icon-search"><path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/></g>
  <g id="icon-servers"><path d="M13 2c0-1.105-2.239-2-5-2S3 .895 3 2s2.239 2 5 2 5-.895 5-2z"/><path d="M13 3.75c-.322.24-.698.435-1.093.593C10.857 4.763 9.475 5 8 5s-2.857-.237-3.907-.657A4.881 4.881 0 013 3.75V6c0 1.105 2.239 2 5 2s5-.895 5-2V3.75z"/><path d="M13 7.75c-.322.24-.698.435-1.093.593C10.857 8.763 9.475 9 8 9s-2.857-.237-3.907-.657A4.881 4.881 0 013 7.75V10c0 1.105 2.239 2 5 2s5-.895 5-2V7.75z"/><path d="M13 11.75c-.322.24-.698.435-1.093.593-1.05.42-2.432.657-3.907.657s-2.857-.237-3.907-.657A4.883 4.883 0 013 11.75V14c0 1.105 2.239 2 5 2s5-.895 5-2v-2.25z"/></g>
  <g id="icon-kademlia"><path fill-rule="evenodd" d="M4.887 7.2l-.964-.165A2.5 2.5 0 103.5 12h10a1.5 1.5 0 00.237-2.981L12.7 8.854l.216-1.028a4 4 0 10-7.843-1.587l-.185.96zm9.084.341a5 5 0 00-9.88-1.492A3.5 3.5 0 103.5 13h9.999a2.5 2.5 0 00.394-4.968c.033-.16.06-.324.077-.49z" clip-rule="evenodd"/></g>
  <g id="icon-statistics"><path fill-rule="evenodd" d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5h-2v12h2V2zp-2-1a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V2a1 1 0 00-1-1h-2zM6 7a1 1 0 011-1h2a1 1 0 011 1v7a1 1 0 01-1 1H7a1 1 0 01-1-1V7zm-5 4a1 1 0 011-1h2a1 1 0 011 1v3a1 1 0 01-1 1H2a1 1 0 01-1-1v-3z" clip-rule="evenodd"/></g>
  <g id="icon-utility"><path fill-rule="evenodd" d="M0 1l1-1 3.081 2.2a1 1 0 01.419.815v.07a1 1 0 00.293.708L10.5 9.5l.914-.305a1 1 0 011.023.242l3.356 3.356a1 1 0 010 1.414l-1.586 1.586a1 1 0 01-1.414 0l-3.356-3.356a1 1 0 01-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 00-.707-.293h-.071a1 1 0 01-.814-.419L0 1zm11.354 9.646a.5.5 0 00-.708.708l3 3a.5.5 0 00.708-.708l-3-3z" clip-rule="evenodd"/><path fill-rule="evenodd" d="M15.898 2.223a3.003 3.003 0 01-3.679 3.674L5.878 12.15a3 3 0 11-2.027-2.027l6.252-6.341A3 3 0 0113.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z" clip-rule="evenodd"/></g>
  </defs>
  </svg>

</head>

<body>

<nav class="navbar navbar-expand-sm navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="amuleweb-main-shared.php">
    <img src="favicon-32x32.png" alt="aMule" width="32" height="32" title="aMule Web" class="d-inline-block align-top">
    <span class="d-lg-none d-xl-inline-block">aMule Web</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="amuleweb-main-dload.php" title="Download/Upload">
          <svg class="bi" viewBox="0 0 16 16"><use xlink:href="#icon-download-upload"></use></svg>
          <span class="d-sm-none d-md-inline-block">Download/Upload</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="amuleweb-main-shared.php" title="Shared files">
          <svg class="bi" viewBox="0 0 16 16"><use xlink:href="#icon-shared-files"></use></svg>
          <span class="d-sm-none d-md-inline-block">Shared files</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="amuleweb-main-search.php" title="Search">
          <svg class="bi" viewBox="0 0 20 20"><use xlink:href="#icon-search"></use></svg>
          <span class="d-sm-none d-md-inline-block">Search</span> <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="amuleweb-main-servers.php" title="Servers">
          <svg class="bi" viewBox="0 0 20 20"><use xlink:href="#icon-servers"></use></svg>
          <span class="d-sm-none d-md-inline-block">Servers</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="amuleweb-main-kad.php" title="Kademlia">
          <svg class="bi" viewBox="0 0 16 16"><use xlink:href="#icon-kademlia"></use></svg>
          <span class="d-sm-none d-md-inline-block">Kademlia</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="amuleweb-main-stats.php" title="Statistics">
          <svg class="bi" viewBox="0 0 16 16"><use xlink:href="#icon-statistics"></use></svg>
          <span class="d-sm-none d-md-inline-block">Statistics</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="return false" title="Utility" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg class="bi" viewBox="0 0 20 20"><use xlink:href="#icon-utility"></use></svg>
          <span class="d-sm-none d-md-inline-block">Utility</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="amuleweb-main-log.php">Log</a>
          <a class="dropdown-item" href="amuleweb-main-prefs.php">Configuration</a>
          <a class="dropdown-item" href="login.php">Exit</a>
        </div>
      </li>
    </ul>
  </div>
</nav>



<main role="main" class="m-2">
<?php

if ( $_SESSION["guest_login"] != 0 ) {
  // Low-right user
  echo '<div class="container mb-3">';
  echo '<div class="row">';
  echo '<div class="col text-center text-info">';
  echo '<strong>You logged in as guest - commands are disabled</strong>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}

?>
  <form action="amuleweb-main-search.php" method="post" id="mainform" name="mainform" class="mb-3 amule search">

  <input type="hidden" name="command">

  <h5 class="text-center">Search</h5>

  <div class="form-row">

    <div class="col-12 col-md-6">
      <div class="form-group form-inline">
        <input type="text" name="searchval" id="searchval4" class="form-control mr-1" placeholder="Search value"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
        <button type="submit" name="Search" id="Search4" class="btn btn-primary" onclick="javascript:formCommandSubmit('search')" title="Search"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>Search</button>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="form-group form-inline">
        <label for="avail13" class="mr-1">Availability</label>
        <input type="number" min="0" id="avail13" name="avail" class="form-control" placeholder="1" title="Minimum availability"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="form-group form-inline amule-size">
        <label for="minsize2" class="mr-1">Min size</label>
        <input type="number" min="0" id="minsize2" name="minsize" class="form-control mr-1" placeholder="700"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
        <select name="minsizeu" id="select8" class="custom-select"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
          <option>Byte</option>
          <option>KByte</option>
          <option selected>MByte</option>
          <option>GByte</option>
        </select>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3 order-sm-2 order-md-last amule-size">
      <div class="form-group form-inline amule-size">
        <label for="maxsize4" class="mr-1">Max size</label>
        <input type="number" min="0" id="maxsize4" name="maxsize" class="form-control mr-1" placeholder="4000"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
        <select name="maxsizeu" id="select10" class="custom-select"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
          <option>Byte</option>
          <option>KByte</option>
          <option selected>MByte</option>
          <option>GByte</option>
        </select>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3 order-sm-1 order-md-5">
      <div class="form-group form-inline">
        <label for="select" class="mr-1">Search type</label>
        <select name="searchtype" id="select" class="custom-select"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
          <option selected>Local</option>
          <option>Global</option>
          <option>Kad</option>
        </select>
      </div>
    </div>

    <div class="col-12 col-md-6 order-sm-last order-md-0">
      <a class="align-bottom" href="amuleweb-main-search.php?search_sort=">Click here to update the search results</a>
    </div>

  </div>





  <h5 class="text-center">Results</h5>
  <div class="container-fluid bg-light border border-dark rounded amule-list">
    <div class="row p-1 bg-secondary text-light border-bottom border-dark font-weight-bold">
      <div class="col-12 col-md-8 text-nowrap"><a href="amuleweb-main-search.php?sort=name" class="text-light">File name</a></div>
      <div class="col-6 col-md-3 text-nowrap"><a href="amuleweb-main-search.php?sort=size" class="text-light">Size</a></div>
      <div class="col-6 col-md-1 text-nowrap"><a href="amuleweb-main-search.php?sort=sources" class="text-light">Sources</a></div>
    </div>
<?php
//
// Declare it here, before any function reffered it in "global"
//
$sort_order;
$sort_reverse;
//
// Functions
//
function CastToXBytes($size) {
  if ( $size < 1024 ) {
    $result = $size . " B";
  }
  elseif ( $size < 1048576 ) {
    $result = ($size / 1024.0) . " KB";
  }
  elseif ( $size < 1073741824 ) {
    $result = ($size / 1048576.0) . " MB";
  }
  else {
    $result = ($size / 1073741824.0) . " GB";
  }
  return $result;
}

function StatusString($file) {
  if ( $file->status == 7 ) {
    return "Paused";
  }
  elseif ( $file->src_count_xfer > 0 ) {
    return "Downloading";
  }
  else {
    return "Waiting";
  }
}

function PrioString($file) {
  $prionames = array(0 => "Low", 1 => "Normal", 2 => "High",
    3 => "Very high", 4 => "Very low", 5=> "Auto", 6 => "Release");
  $result = $prionames[$file->prio];
  if ( $file->prio_auto == 1) {
    $result = $result . " (auto)";
  }
  return $result;
}

function PrioSort($file) {
// Very low (4) has a too high number
//   0 = low        =>  1
//   1 = normal     =>  2
//   2 = high       =>  3
//   3 = very high  =>  4
//   4 = very low   =>  0 (Integer variables are 64-bit unsigned integers)
//   5 = auto       =>  6
//   6 = powershare =>  7
//
  if (4 == $file->prio) {
    return 0;
  }
  return $file->prio+1;
}

function my_cmp($a, $b) {
  global $sort_order, $sort_reverse;

  switch ( $sort_order ) {
    case "name": $result = $a->name > $b->name; break;
    case "size": $result = $a->size > $b->size; break;
    case "sources": $result = $a->sources > $b->sources; break;
//     case "size_done": $result = $a->size_done > $b->size_done; break;
//     case "progress": $result = (((float)$a->size_done)/((float)$a->size)) > (((float)$b->size_done)/((float)$b->size)); break;
//     case "speed": $result = $a->speed > $b->speed; break;
//     case "scrcount": $result = $a->src_count > $b->src_count; break;
//     case "status": $result = StatusString($a) > StatusString($b); break;
//     case "xfer": $result = $a->xfer > $b->xfer; break;
//     case "xfer_all": $result = $a->xfer_all > $b->xfer_all; break;
//     case "acc": $result = $a->accept > $b->accept; break;
//     case "acc_all": $result = $a->accept_all > $b->accept_all; break;
//     case "req": $result = $a->req > $b->req; break;
//     case "req_all": $result = $a->req_all > $b->req_all; break;
//     case "prio": $result = PrioSort($a) < PrioSort($b); break;
  }
  if ( $sort_reverse ) {
    $result = !$result;
  }

  return $result;
}



$search = amule_load_vars("searchresult");
// var_dump("search");
// var_dump($search);

if ( count($search)==0 ) {
  echo '<div class="row p-1">';
  echo '<div class="col"><p class="text-center">None</p></div>';
  echo '</div>';
}
else {
  $sort_order = $HTTP_GET_VARS["sort"];

  if ( $sort_order == "" ) {
    $sort_order = $_SESSION["search_sort"];
  }
  else {
    if ( $_SESSION["search_sort_reverse"] == "" ) {
      $_SESSION["search_sort_reverse"] = 0;
    }
    else {
      $_SESSION["search_sort_reverse"] = !$_SESSION["search_sort_reverse"];
    }
  }

  $sort_reverse = $_SESSION["search_sort_reverse"];
  if ( $sort_order != "" ) {
    $_SESSION["search_sort"] = $sort_order;
    usort(&$search, "my_cmp");
  }

  foreach ($search as $file) {
    echo '<div class="row p-1 border-bottom border-secondary">';
    echo '<div class="col-12 col-md-8 form-check form-check-inline custom-control custom-checkbox mr-0">';
    if ( $_SESSION["guest_login"] == 0 ) {
      echo '<input type="checkbox" class="custom-control-input" id="' . $file->hash . '" name="' . $file->hash . '">';
    }
    echo '<label class="' . ($_SESSION["guest_login"]==0 ? "custom-control-label" : "col-form-label") . ' d-block text-break" for="' . $file->hash . '">' . $file->name . '</label>';
    echo '</div>';
    echo '<div class="col-6 col-md-3">' . CastToXBytes($file->size) . '</div>';
    echo '<div class="col-6 col-md-1 text-right">' . $file->sources . '</div>';
    echo '</div>';
  }
}

?>
    <div class="row form-inline form-group p-3">
      <div class="col-auto ml-auto">

        <select name="targetcat" id="select32" class="custom-select"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
<?php

$cats = amule_get_categories();
foreach($cats as $c) {
  echo "<option>", $c, "</option>";
}

?>
        </select>

        <button type="submit" name="Download" class="btn btn-primary mr-1" id="Download6" value="Download" onclick="javascript:formCommandSubmit('download')"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>Download</button>

      </div>
    </div>
  </div>

  </form>

</main>



<footer class="m-2 p-md-2">

  <form id="formlink" name="formlink" action="amuleweb-main-dload.php" method="post">

  <div class="container-fluid">

    <div class="form-row justify-content-sm-center">
      <div class="col-12 col-sm-6 col-xl-4 mb-1 mb-sm-0">
          <input id="ed2klink" name="ed2klink" type="text" size="50" class="form-control"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
      </div>
      <div class="col-auto">
        <select id="selectcat" name="selectcat" class="custom-select" title="Category"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
<?php

$cats = amule_get_categories();
foreach($cats as $c) {
  echo  '<option>' . $c . '</option>';
}

?>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" name="Submit" value="Download link" class="btn btn-secondary"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>Download link</button>
      </div>
      <div class="row ml-xl-auto justify-content-center">
        <div class="col-12 col-lg-auto">
          <p class="mt-1 mb-0">
            <small class="align-bottom">
              <strong>Ed2k</strong>:
<?php

$stats = amule_get_stats();
if ( $stats["id"] == 0 ) {
  echo "Not connected";
}
elseif ( $stats["id"] == 0xffffffff ) {
  echo "Connecting...";
}
else {
  echo "Connected with ", (($stats["id"] < 16777216) ? "Low" : "High"), " ID to ",
    $stats["serv_name"], "  ", $stats["serv_addr"];
}

?>
            </small>
          <p>
        </div>
        <div class="col-12 col-lg-auto">
          <p class="mt-1 mb-0">
            <small class="align-bottom">
              <strong>Kad</strong>:
<?php

$stats = amule_get_stats();
if ( $stats["kad_connected"] == 1 ) {
  echo "Connected";
  if ( $stats["kad_firewalled"] == 1 ) {
    echo " (Firewalled)";
  }
  else {
    echo " (OK)";
  }
}
else {
  echo "Disconnected";
}

?>
              </small>
          <p>
        </div>
      </div>
    </div>

  </div>

  </form>

</footer>

<script src="jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script><script src="bootstrap.bundle.min.js"></script>
<script language="JavaScript" type="text/JavaScript">
function formCommandSubmit(command) {
<?php
if ( $_SESSION["guest_login"] != 0 ) {
  echo 'alert("You logged in as guest - commands are disabled");';
  echo "return;";
}
?>
  var frm=document.forms.mainform;
  frm.command.value=command;
  frm.submit();
}
</script>
</body>
</html>
