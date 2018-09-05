<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Mediamatiker EFZ, Bildungszentrum Zürichsee, Horgen">
<meta name="author" content="daniel.garavaldi@bzz.ch">
<title>Appi - BZZ</title>
<!-- Bootstrap -->
<?php
require_once(__DIR__ . '/../lib/SiteURL.php');
$siteURL = new SiteURL();
if ($siteURL->getRemoteAssets()) {
    ?>
    <link href="http://www.bzzlab.ch/inc/highlight/css/highlight.agate.css" media="screen" rel="stylesheet"/>
    <script type="text/javascript" src="http://www.bzzlab.ch/inc/highlight/js/highlight.pack.js"></script>
    <script type="text/javascript" src="http://www.bzzlab.ch/inc/highlight/js/highlightjs-line-numbers.min.js"></script>
<?php } else { ?>
    <link href="inc/vendor/highlight/css/highlight.agate.css" media="screen" rel="stylesheet"/>
    <script type="text/javascript" src="inc/vendor/highlight/js/highlight.pack.js"></script>
    <script type="text/javascript" src="inc/vendor/highlight/js/highlightjs-line-numbers.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
<?php } ?>


<script src="inc/script/ui.js" type="text/javascript"></script>
<script>hljs.initHighlightingOnLoad();hljs.initLineNumbersOnLoad();</script>
<!-- Custom styles for this template -->
<style>
body {
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 14px;
	line-height: 1.42857143;
	color: #333;
	background-color: #fff;
}

/* for block of numbers */
td.hljs-ln-numbers {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

    text-align: center;
    color: #ccc;
    border-right: 1px solid #CCC;
    vertical-align: top;
    padding-right: 5px;

    /* your custom style here */
}

/* for block of code */
td.hljs-ln-code {
    padding-left: 15px;
}

</style>