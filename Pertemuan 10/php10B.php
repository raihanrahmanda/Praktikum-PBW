<?php
session_start();
if (isset($_REQUEST['item'])) {
    $_SESSION['item'] = $_REQUEST['item'];
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
    <title>PHP10B</title>
</head>

<body>
    <form action="php10C.php" method="post">
        <!-- <input type="hidden" name="item" value="',$_REQUEST['item'], '">  -->
        <label for="">Address: <input type="text" name="address"></label>
        <!-- no hidden input required -->
        <input type="submit" value="Send">
    </form>
</body>

</html>