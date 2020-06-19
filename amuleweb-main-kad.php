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
  <title>aMule Web - Kademlia</title>

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
  <g id="icon-connect"><path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/> <path d="M6.764 6.5H7c.364 0 .706.097 1 .268A1.99 1.99 0 0 1 9 6.5h.236A3.004 3.004 0 0 0 8 5.67a3 3 0 0 0-1.236.83z"/><path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/><path d="M8 11.33a3.01 3.01 0 0 0 1.236-.83H9a1.99 1.99 0 0 1-1-.268 1.99 1.99 0 0 1-1 .268h-.236c.332.371.756.66 1.236.83z"/></g>
  <g id="icon-remove"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></g>
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
      <li class="nav-item active">
        <a class="nav-link" href="amuleweb-main-kad.php" title="Kademlia">
          <svg class="bi" viewBox="0 0 16 16"><use xlink:href="#icon-kademlia"></use></svg>
          <span class="d-sm-none d-md-inline-block">Kademlia</span> <span class="sr-only">(current)</span>
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
  <form action="amuleweb-main-kad.php" method="post" id="mainform" name="mainform" class="mb-3 amule kad">

  <h5 class="text-center">Kademlia</h5>

  <div class="container-fluid bg-light border border-dark rounded amule-list amule-kad">
    <div class="row p-1 border-bottom border-secondary">
      <div class="col-12 col-lg-6 p-2">
        <img src="amule_stats_kad.png" class="img-fluid" alt="stats_kad">
        <p class="mt-2">Number of nodes</p>
      </div>

      <div class="col-12 col-lg-4 p-2">
        <div class="row">
          <div class="col-12 text-center">
            <h6><strong>Bootstrap from node</strong></h6>
          </div>
          <div class="col-12">
            <div class="form-group form-inline amule-ip">
              <label for="ip32" class="mr-1">IP</label>
              <input type="number" id="ip32" name="ip3" class="form-control mr-1" placeholder="123"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
              <input type="number" id="ip23" name="ip2" class="form-control mr-1" placeholder="123"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
              <input type="number" id="ip13" name="ip1" class="form-control mr-1" placeholder="123"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
              <input type="number" id="ip03" name="ip0" class="form-control mr-1" placeholder="123"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group form-inline">
              <label for="port3" class="mr-1">Port</label>
              <input type="number" id="port3" name="port" class="form-control mr-5" placeholder="4567"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>
              <button type="submit" name="Submit" class="btn btn-primary" value="Connect"<?php echo ($_SESSION["guest_login"]==0 ? "" : " disabled"); ?>>Connect</button>
            </div>
          </div>
        </div>
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
<?php

if ( $_SESSION["auto_refresh"] > 0 ) {
  echo 'function reloadPage(){ window.location.reload(); };';
  echo 'window.addEventListener("load", (event) => { setInterval(reloadPage, ' . ($_SESSION["auto_refresh"]*1000) . ' ) });';
}

?>
</script>
</body>
</html>
