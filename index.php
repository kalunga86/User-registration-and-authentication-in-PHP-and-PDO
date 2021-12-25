<?php
    require_once('assets/config.php');

    // If you are not logged, redirects to login page.
    $session = new USER();
    if(!$session->is_loggedin()) {
        $session->redirect('login.php');
    }

    $auth_user = new USER();
    $user_id = $_SESSION['user_session'];
    $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
    $stmt->execute(array(":user_id"=>$user_id));
    $userRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Welcome</title>
        <link href="assets/styles.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h1>Hello, <?php echo $userRow['user_name'];?>! - <a href="logout.php">Logout</a></h1>
            <hr/>
            <p>This is the user area, this content is private.</p>
        </div>
    </body>
</html>
