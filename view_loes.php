<?php
require_once(__DIR__ . '/lib/Content.php');
require_once(__DIR__ . '/lib/Teacher.php');
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <?php include_once("inc/head.inc"); ?>
    <script>
        function show(elements, specifiedDisplay) {
            var computedDisplay, element, index;

            elements = elements.length ? elements : [elements];
            for (index = 0; index < elements.length; index++) {
                element = elements[index];

                // Remove the element's inline display styling
                element.style.display = '';
                computedDisplay = window.getComputedStyle(element, null).getPropertyValue('display');

                if (computedDisplay === 'none') {
                    element.style.display = specifiedDisplay || 'block';
                }
            }
        }
    </script>
</head>
<body>

<div class="container theme-showcase" role="main">

    <?php
    //fix new lp
    if (isset($_GET["file"])) {
        $teacher = new Teacher();
        $semester = new Semester();
        //V2.0 feature - add new teacher (lp)
        //expression means if not found then
        $file = $teacher->getNewPath($_GET["file"],
            $teacher->getSessionValue(),
            $semester->getSessionValue()
            );

        if (strlen($file) > 0) {
            $content = new Content();
            $content->show($file);
            echo "<script>show(document.querySelectorAll('.solution'));</script>";
        }
    }
    ?>


</div>
</body>
</html>