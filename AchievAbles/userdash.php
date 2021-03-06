<?php
// Start the session
session_start();

if ($_SESSION['group'] === 'admin') {
    header('Location:admindash.php');
    die;
} else if (!$_SESSION['login']) {
    header('Location:index.php');
    die;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="main.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">
        <title>AchievAbles</title>
    </head>
    <body class="landing">
        <?php
// Include database connections
        include './dbfunctions.php';
        $db = dbconnect();
        $user = $_SESSION['user'];
        $pointsarray = getPoints($user);
        $imgarray = findImg($user);
        $_SESSION['points'] = $pointsarray['points'];
        $_SESSION['img'] = $imgarray['user_img'];
        ?>

        <!-- Top Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <img src="images/achieveables_logo.png" class="achieve-logo" />
                <ul>
                    <li class="inside-links"><a href="userdash.php">Dashboard</a></li>
                    <li class="inside-links"><a href="goals.php">Goals</a></li>
                    <li class="inside-links"><a href="rewards.php">Rewards</a></li>
                </ul>
                <div class='user'><a href='account.php'><img src="<?php echo $_SESSION['img'] ?>" class='user-img'/></a></div>
                <div class="user2">
                    <p class="username"><?php echo $user ?></p>
                    <h4 class="points"><?php echo $_SESSION['points'] ?></h4></div>

            </div>
        </nav>

        <img src="images/toa-heftiba-464644.jpg" class="banner" />
        <div class='container-fluid'>
            <h2 class='header'>My Dashboard</h2><br />
            <a href="account.php"><div class='left-dash dash-button'><img src="images/account.png" class="dash-img" alt="My Account"/>
                    <h4 class="dash-text">My Account</h4>
                </div></a>
            <a href="goals.php"><div class="dash-button"><img src="images/goal.png" class="dash-img" alt="Goals" />
                    <h4 class="dash-text">Goals</h4>
                </div></a>
            <a href="rewards.php"><div class="dash-button"><img src="images/reward.png" class="dash-img" alt="Rewards" />
                    <h4 class="dash-text">Rewards</h4>
                </div></a>
            <div class="dash-button" onclick="contactUs()"><img src="images/568541-200.png" class="dash-img" alt="Help" />
                <h4 class="dash-text">Admin Help</h4>

            </div>
        </div>
        <footer class="foot">
            AchievAbles &copy; Valerie Montalvo, 2018
        </footer>
    </body>

</html>
