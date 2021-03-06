<?php
require_once(__DIR__ . '/lib/Teacher.php');
$teacher = new Teacher();
require_once(__DIR__ . '/lib/Semester.php');
$semester = new Semester();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <?php include_once("inc/head_src.inc"); ?>
</head>
<body>
<?php


if (isset($_GET["file"])) {
   	$style = "hljs xml";
   	//V2.0 feature - add new teacher (lp)
    //expression means if not found then
    $file = $teacher->getNewPath($_GET["file"],
        $teacher->getSessionValue(),
        $semester->getSessionValue()
    );


    if (isset($_GET["style"])) {
        $style = $_GET["style"];
        if ($style == "exam") {
            //for exams to show possible solutions
            printf("<style>.hljs-comment {color: #97e4b3;}</style><pre><code>%s</code></pre>", 
            htmlspecialchars(file_get_contents($file)));
        } else {
            //when style=css
            printf("<pre><code class='%s'>%s</code></pre>",
                $style, htmlspecialchars(file_get_contents($file)));
        }
    }
    else {
        printf("<pre><code>%s</code></pre>", 
        htmlspecialchars(file_get_contents($file)));
    }
}

$browser_link = sprintf("So sieht es im <a href='%s' target='tab'>Browser</a> aus.",$file);

if (isset($_GET["browser"])) {
    if ($_GET["browser"]=="no") { 
        /* keinen Linke für den Browser anzeigen */
        $browser_link="";
    }
}

if (isset($_GET["file2"])) {
    $file2 = $teacher->getNewPath($_GET["file2"],
        $teacher->getSessionValue(),
        $semester->getSessionValue()
    );

    $browser_link = sprintf("So sieht es im <a href='%s' target='tab'>Browser</a> aus.",$file2);
}


printf("<p>%s</p>",$browser_link);
?>
</body>
</html>