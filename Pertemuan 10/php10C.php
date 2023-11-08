<?php
session_start();
// not necessary but convenient
if (isset($_REQUEST['address'])) {
    $_SESSION['address'] = $_REQUEST['address'];
}
if (isset($_SESSION['start'])) {
    $_SESSION['start'] = time();
}
// session dihapus seteah 666 detik (11 menit)
if (isset($_SESSION['start']) && time() - $_SESSION['start'] > 666) {
    session_unset();
    session_destroy();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP10C</title>
</head>

<body>
    <?php
    echo $_SESSION['item'], "<br>";
    echo $_SESSION['address'];

    // once we do not need the data anymore, get rid of it
    // session_unset();
    // session_destroy();
    ?>
</body>

</html>