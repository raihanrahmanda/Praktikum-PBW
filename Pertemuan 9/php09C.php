<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP09C</title>
</head>
<body>
    <?php
        echo 'Item: ', $_REQUEST['item'], '<br>';
        echo 'Address: ', $_REQUEST['address'], '<br>';
    ?>
    <a href="php09A.php">
        <input type="button" value="Back">
    </a>
</body>
</html>