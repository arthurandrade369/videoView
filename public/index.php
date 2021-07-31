<html>

<body>

    <pre>
    <?php

    require_once("./video.php");
    require_once("./grasshoper.php");
    require_once("./views.php");

    $v[0] = new Video("Aula 01 PHP<br>");
    $v[1] = new Video("Aula 02 PHP<br>");
    $v[2] = new Video("Aula 03 PHP<br>");
    $v[3] = new Video("Aula 04 PHP<br>");

    $p[0] = new Grasshopper("Jonas", 36, "M", "jonas123");
    $p[1] = new Grasshopper("João", 32, "M", "joao123");
    $p[2] = new Grasshopper("Maria", 28, "F", "maria123");

    $vws[0] = new Views($p[0], $v[0]);
    $vws[1] = new Views($p[0], $v[1]);
    $vws[2] = new Views($p[0], $v[2]);
    $vws[3] = new Views($p[0], $v[3]);
    // $vws[0]->rateGrade(10);
    // $vws[0]->likes();
    // $vws[1]->rate();
    // $vws[1]->likes();
    // $vws[2]->ratePercent(45);
    print_r($p[0]);

    ?>
    </pre>
</body>

</html>