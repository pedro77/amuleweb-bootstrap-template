<?php
//
// Debug
//
// var_dump("_SESSION");
// var_dump($_SESSION);
// var_dump("HTTP_GET_VARS");
// var_dump($HTTP_GET_VARS);
//
// Create/refresh amule_stats_*.png
//
amule_load_vars("stats_graph");

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
  <title>aMule Web - Statistics</title>

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
  <g id="icon-folder-closed"><path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/><path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></g>
  <g id="icon-folder-opened"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/><path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/></g>
<!--   <g id="icon-item"><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></g> -->
  <g id="icon-item"><circle cx="8" cy="8" r="8"/></g>
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
      <li class="nav-item">
        <a class="nav-link" href="amuleweb-main-search.php" title="Search">
          <svg class="bi" viewBox="0 0 20 20"><use xlink:href="#icon-search"></use></svg>
          <span class="d-sm-none d-md-inline-block">Search</span>
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
      <li class="nav-item active">
        <a class="nav-link" href="amuleweb-main-stats.php" title="Statistics">
          <svg class="bi" viewBox="0 0 16 16"><use xlink:href="#icon-statistics"></use></svg>
          <span class="d-sm-none d-md-inline-block">Statistics</span> <span class="sr-only">(current)</span>
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

  <h5 class="text-center">Statistics</h5>

  <div class="container-fluid bg-light border border-dark rounded amule-list amule-stats">
    <div class="row p-1 border-bottom border-secondary">

      <div class="col-12 col-lg-6 p-2 order-lg-last">
        <img src="amule_stats_download.png" class="img-fluid" alt="stats_download">
        <p class="mt-2">Download speed</p>

        <img src="amule_stats_upload.png" class="img-fluid" alt="stats_upload">
        <p class="mt-2">Upload speed</p>

        <img src="amule_stats_conncount.png" class="img-fluid" alt="stats_connections">
        <p class="mt-2">Connections</p>
      </div>

      <div class="col-12 col-lg-6 p-2">
        <ul id="tree" class="list-unstyled">
<?php

function print_folder($key, &$arr, $ident) {
  echo '<li class="folder">';
  echo '<a data-folder="opened" href="javascript:void(0)" onclick="openCloseFolder(this); return false" class="text-dark">';
  echo '<svg class="bi" viewBox="0 0 20 20"><use xlink:href="#icon-folder-opened"></use></svg>';
  echo $key;
  echo '</a>';

  echo '<ul class="list-unstyled pl-' . $ident . '">';
  foreach ($arr as $k => $v) {
    if ( count(&$v) ) {
      print_folder($k, $v, $ident+1);
    }
    else {
      print_item($k, $ident+1);
    }
  }
  echo "</li>";
  echo "</ul>";
}

function print_item($it, $ident) {
  echo '<li class="item">';
  echo '<svg class="bi" viewBox="0 0 20 20"><use xlink:href="#icon-item"></use></svg>';
  echo $it;
  echo "</li>";
}

$stattree = amule_load_vars("stats_tree");
// var_dump("stattree");
// var_dump($stattree);

$ident=0;
foreach ($stattree as $k => $v) {
  if ( count(&$v) ) {
    print_folder($k, $v, $ident+1);
  }
  else {
    print_item($k, $ident+1);
  }
}
?>
        </ul>
      </div>

    </div>
  </div>

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

function openCloseFolder(el) {
//   console.log(el);
// $("#tree ul.pl-1 a")[0].nextSibling
// $("#tree ul.pl-1 a")[0].firstChild.firstChild.setAttribute("xlink:href")
// $("#tree ul.pl-1 a")[0].firstChild.firstChild.setAttribute("xlink:href", "#icon-folder-closed")
  if (el.getAttribute("data-folder")=="opened") {
    el.nextSibling.style.display="none";
    el.nextSibling.style.visibility="hidden";
    el.firstChild.firstChild.setAttribute("xlink:href", "#icon-folder-closed");
    el.setAttribute("data-folder", "closed");
  }
  else {
    el.nextSibling.style.display="block";
    el.nextSibling.style.visibility="visible";
    el.firstChild.firstChild.setAttribute("xlink:href", "#icon-folder-opened");
    el.setAttribute("data-folder", "opened");
  }
  return false;
}

<?php

if ( $_SESSION["auto_refresh"] > 0 ) {
  echo 'function reloadPage(){ window.location.reload(); };';
  echo 'window.addEventListener("load", (event) => { setInterval(reloadPage, ' . ($_SESSION["auto_refresh"]*1000) . ' ) });';
}

?>
</script>
</body>
</html>
