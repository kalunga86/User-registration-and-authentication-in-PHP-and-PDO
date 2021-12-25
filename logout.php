<?php
    require_once('assets/config.php');

    $user_logout = new USER();
    $user_logout->doLogout();
    $user_logout->redirect('index.php');
?>
