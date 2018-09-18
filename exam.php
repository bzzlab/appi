<!DOCTYPE html>
<html lang="de">
<head>
    <title>LB-Beilage</title>
    <meta charset="UTF-8">
    <?php
    include_once(__DIR__ . "/inc/exam.inc");
    require_once(__DIR__ . '/lib/Teacher.php');
    ?>
    <style type="text/css">
        .gotop {
            float: right;
            font-size: 14px;
        }
        div.flex-container{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: flex-start;
            align-items: stretch;
        }
        div.flex-container > iframe.example {
            margin: 0px;
            padding: 0px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav" style="float:right;">
                <li><button type="button" class="btn btn-link" onclick="history.back(-1)">Zurück</button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script id="tpl-web1" type="text/x-handlebars-template">
    <a class="gotop" href="#top">top</a>
    <a id="{{id}}"></a>
    <h3>{{id}} - Ausgangslage</h3>
    <figure>
        <iframe class="example"  scrolling="no" onload="resizeIframe(this)"
                src="view_code2.php?file={{path}}/{{start}}&browser=no">
            <p>Your browser does not support iframes.</p></iframe>
    </figure>
</script>

<script id="tpl-img1" type="text/x-handlebars-template">
    <a class="gotop" href="#top">top</a>
    <a id="{{id}}"></a>
    <h3>{{id}} - Ausgangslage</h3><figure><img class="{{size}}" src="{{path}}/{{file}}"/></figure>
</script>

<script id="tpl-sol1" type="text/x-handlebars-template">
    <a class="gotop" href="#top">top</a>
    <a id="{{id}}"></a>
    <h3>{{id}} - Mögliche Lösungen</h3>
    <!-- Lösungen  -->
    <div class="flex-container">
        <!-- Teil-Lösungen  -->
        <iframe class="example" style="width:{{w1}};"
                scrolling="no" onload="resizeIframe(this)"
                src="view_code2.php?file={{path}}/{{a1}}&browser=no&style=exam">
            <p>Your browser does not support iframes.</p>
        </iframe>
        <iframe class="example" style="width:{{w1}};"
                scrolling="no" onload="resizeIframe(this)"
                src="view_code2.php?file={{path}}/{{a2}}&browser=no&style=exam">
            <p>Your browser does not support iframes.</p>
        </iframe>
        <iframe class="example" style="width:{{w1}};"
                scrolling="no" onload="resizeIframe(this)"
                src="view_code2.php?file={{path}}/{{a3}}&browser=no&style=exam">
            <p>Your browser does not support iframes.</p>
        </iframe>
        <iframe class="example" style="width:{{w1}};"
                scrolling="no" onload="resizeIframe(this)"
                src="view_code2.php?file={{path}}/{{a4}}&browser=no&style=exam">
            <p>Your browser does not support iframes.</p>
        </iframe>
    </div>
</script>

<script id="tpl-sol2" type="text/x-handlebars-template">
    <a class="gotop" href="#top">top</a>
    <a id="{{id}}"></a>
    <h3>{{id}} - Mögliche Lösungen</h3>
    <figure>
        <iframe class="example"  scrolling="no" onload="resizeIframe(this)"
                src="view_code2.php?file={{path}}/{{start}}&browser=no">
            <p>Your browser does not support iframes.</p></iframe>
    </figure>
</script>

<?php
    if (isset($_GET["inc"])) {
        $file = $_GET["inc"];
        include_once($file);
    }
?>
<?php include_once(__DIR__ . "/inc/footer.inc"); ?>

</body>
