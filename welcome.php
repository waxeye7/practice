<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
    <p>You have successfully logged in.</p>
    <a href="logout.php">Logout</a>

    <?php
        $myAssociatedArray = array(
        'keyA' => 'valueA',
        'keyB' => 'valueB'
        );
        echo $myAssociatedArray['keyA'];
        echo ' has a length of: ' . strlen($myAssociatedArray['keyA']);
        echo '<br>';
        echo var_dump($myAssociatedArray);
        echo '<br>';
        echo var_dump($_SESSION);
        echo '<br>';
        echo var_dump($_COOKIE);
        echo '<br>';
        echo var_dump($_POST);
        echo '<br>';
        echo var_dump($_GET);
        echo '<br>';
        echo var_dump($_REQUEST);
        echo '<br>';
        echo var_dump($_SERVER);
        echo '<br>';
        echo var_dump($_ENV);
        echo '<br>';
        echo var_dump($GLOBALS);
        echo '<br>';
    ?>
</body>
</html>