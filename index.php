<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h1>Login</h1>
    <form action="login_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" value="Login">
    </form>

    <!-- make signup form -->
    <h1>Sign Up</h1>
    <form action="signup_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" value="Sign Up">

    <!-- <br><br>
    <a href="./scraper.php">scraper</a> -->
  <?php
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $database = 'chat_app';

    $connection = mysqli_connect($host, $dbusername, $dbpassword, $database);

  ?>


<?php
class User{
    public $fname;
    public $lname;
    public $age;
    public function __construct($fname,$lname,$age){
        $this->fname = $fname;
        $this->lname = $lname;
        $this->age = $age;
    }
    public function initials(){
        return $this->fname[0] . $this->lname[0];
    }
    public function fullname(){
        return $this->fname . ' ' . $this->lname;
    }
} 
$userA = new User('John','Brown',30);
$userB = new User('Jane','Doe',20);
// echo $userA->age;
class Team{
    public $memberA;
    public $memberB;
    public function __construct($memberA,$memberB){
        $this->memberA = $memberA;
        $this->memberB = $memberB;
    }
    public function age_average(){
        return ( $this->memberA->age + $this->memberB->age ) / 2;
    }

}
$superduo = new Team($userA,$userB);

echo '<br>';

echo '<br>' . $superduo->age_average();
echo '<br>' . $userA->initials();
echo '<br>' . $userA->fullname();
echo '<br>' . $userA->age;
echo '<br>' . $userB->fullname();
echo '<br>' . $userB->age;


// :   =>
// in JS we have : and .  whereas in PHP we have => and ->
// .   ->
?>

</body>
</html>