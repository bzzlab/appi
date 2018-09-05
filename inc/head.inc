<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Mediamatiker EFZ, Bildungszentrum Zürichsee, Horgen">
<meta name="author" content="daniel.garavaldi@bzz.ch">
<!-- Bootstrap -->
<?php
require_once(__DIR__ . '/../lib/SiteURL.php');
$siteURL = new SiteURL();
require_once(__DIR__ . '/../lib/Navigation.php');
$nav = new Navigation();
echo $nav->getSiteTitle();
if ($siteURL->getRemoteAssets()) {
    ?>
    <link href="http://www.bzzlab.ch/inc/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="http://www.bzzlab.ch/inc/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://www.bzzlab.ch/inc/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <script src="http://www.bzzlab.ch/inc/bootstrap/js/jquery-2.2.2.min.js"></script>
    <script>window.jQuery || document.write('<script src="http://www.bzzlab.ch/inc/bootstrap/js/jquery-2.2.2.min.js"><\/script>')</script>
    <script src="http://www.bzzlab.ch/inc/bootstrap/js/bootstrap.min.js"></script>
    <link href="http://www.bzzlab.ch/css/highlight.agate.css" media="screen" rel="stylesheet"/>
    <script type="text/javascript" src="http://www.bzzlab.ch/lib/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
<?php } else { ?>
    <link href="inc/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="inc/vendor/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="inc/vendor/bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
<!--    <script src="inc/vendor/bootstrap/js/jquery-2.2.2.min.js"></script>-->
    <script src="inc/vendor/jquery/jquery-3.2.1.js"></script>
    <script>window.jQuery || document.write('<script src="inc/vendor/bootstrap/js/jquery-2.2.2.min.js"><\/script>')</script>
    <script src="inc/vendor/bootstrap/js/bootstrap.min.js"></script>
    <link href="inc/vendor/highlight/css/highlight.agate.css" media="screen" rel="stylesheet"/>
    <script type="text/javascript" src="inc/vendor/highlight/js/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
<?php } ?>

<!-- Custom styles for this template -->
<link href="./inc/theme.css" rel="stylesheet">
<!-- Custom scripts (JavaScripts) for this template -->
<script src="./inc/script/ui.js" type="text/javascript"></script>
