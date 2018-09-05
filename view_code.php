<!DOCTYPE html>
<html lang="de">
<head>
    <?php include_once("inc/head_src.inc"); ?>
</head>
<body>
<?php
if (isset($_GET["file"])) {
    $contents = file_get_contents($_GET["file"]);
    echo "<pre><code class=\"hljs xml bash\">" . htmlspecialchars($contents) . "</code></pre>";
}
?>
</body>
</html>