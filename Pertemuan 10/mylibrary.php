<?php
// memulai session
session_start();

function destroy_session_and_data()
{
    session_unset();
    if (session_id() != "" || isset($_COOKIE[session_name()])) {
        setcookie(
            session_name(),
            session_id(),
            time() - 22222222,
            '/'
        );
    }
    session_destroy();
}

function count_requests()
{
    if (!isset($_SESSION['requests'])) {
        $_SESSION['requests'] = 1;
    } else {
        $_SESSION['requests']++;
    }
    return $_SESSION['requests'];
}

?>