<?php
/* TODO 04.01.2018-14:41:31
    das else wird nie durchlaufen, weil $siteURL->getRemoteAssets() auf bzzlab.ch zeigt
*/
require_once(__DIR__.'/../lib/SiteURL.php');
$siteURL = new SiteURL();
if ($siteURL->getRemoteAssets()){
    ?>
    <link href="http://www.bzzlab.ch/inc/highlight/css/highlight.agate.css" media="screen" rel="stylesheet"/>
    <link href="http://www.bzzlab.ch/inc/highlight/css/highlightjs.line-numbers.css" media="screen" rel="stylesheet"/>
    <script type="text/javascript" src="http://www.bzzlab.ch/inc/highlight/js/highlight.pack.js"></script>
<script type="text/javascript" src="http://www.bzzlab.ch/inc/highlight/js/highlightjs-line-numbers.min.js"></script
    <script>hljs.initHighlightingOnLoad();hljs.initLineNumbersOnLoad();</script>
<?php } else { ?>
    <link href="../../inc/highlight/css/highlight.agate.css" media="screen" rel="stylesheet"/>
    <link href="../../inc/highlight/css/highlightjs.line-numbers.css" media="screen" rel="stylesheet"/>
    <script type="text/javascript" src="../../inc/highlight/js/highlight.pack.js"></script>
    <script type="text/javascript" src="../../inc/highlight/js/highlightjs-line-numbers.min.js"></script>
    <script>hljs.initHighlightingOnLoad();hljs.initLineNumbersOnLoad();</script>
<?php } ?>

<!-- Custom styles for this template -->
<style>
body {
	font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size: 14px;
	line-height: 1.42857143;
	color: #333;
	background-color: #fff;
}
</style>