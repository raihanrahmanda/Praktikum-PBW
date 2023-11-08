<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP10F header</title>
    <style>
        nav {
            background-color: rgb(50, 50, 50);
            overflow: hidden;
        }

        nav ul {
            list-style: none;
            width: 100%;
            margin: 0;
        }

        nav li {
            float: left;
            margin: 0;
        }

        nav a {
            display: inline-block;
            /* cari cara supaya konten bisa di tengah secara horizontal dan vertikal */
            /* height: 30px; */
            padding: 5px 1.5em;
            color: white;
            text-decoration: none;
            text-align: center;
        }

        /* nav a:hover {
    background-color: #c74451;
} */
        .active {
            background-color: #c74451;
        }

        ol {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#" class="active">Data Meeting</a></li>
                <li><a href="php10F_logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>