<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 08B</title>
</head>
<body>
<h1>Hello World</h1>
    <?php
        error_reporting( E_ALL );
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        echo "<h2>Types and Type Casting</h2>\n";
        $mode = rand(1,4);
        if ($mode == 1)
        $randvar = rand();
        elseif ($mode == 2)
        $randvar = (string) rand();
        elseif ($mode == 3)
        $randvar = rand()/(rand()+1);
        else
        $randvar = (bool) $mode;
        echo "Random scalar: $randvar<br>\n"; 
        if (is_int($randvar)){
            echo "<br>This is an integer<br>\n";
        } elseif (is_float($randvar)){
            echo "<br>This is a floating poin number<br>\n";
        } elseif (is_string($randvar)){
            echo "<br>This is a string<br>\n";
        } else {
            echo "<br>I don't know what this is<br>\n";
        }
        echo "<br>$randvar is ", gettype($randvar), "<br>\n";
    ?>
</body>
</html>