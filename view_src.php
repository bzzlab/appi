<?php
require_once(__DIR__ . '/lib/Teacher.php');
require_once(__DIR__ . '/lib/Semester.php');
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <?php include_once("inc/head_src.inc"); ?>
</head>
<body>
    <?php
    if (isset($_GET["file"])){
        $teacher = new Teacher();
        $semester = new Semester();
        //V2.0 feature - add new teacher (lp)
        //expression means if not found then
        $file = $teacher->getNewPath($_GET["file"],
            $teacher->getSessionValue(),
            $semester->getSessionValue()
        );
    }
    echo '<xmp>'.file_get_contents($file).'</xmp>';
    ?>
</body>
</html>