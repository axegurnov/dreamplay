<?
    setcookie('userLogin','');
    setcookie('userPassword','');
    unset($_COOKIE['userLogin']);
    unset($_COOKIE['userPassword']);
    session_destroy();
    header('Location: /feed');
?>