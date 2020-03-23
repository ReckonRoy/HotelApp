<?php
session_start();

if(isset($_POST['hotel']))
{
    echo $_SESSION['name_s']."<br>";
    echo $_SESSION['surname_s']."<br>";
    echo $_SESSION['email_s']."<br>";
    echo $_SESSION['checkIn_s']."<br>";
    echo $_SESSION['checkOut_s']."<br>";
    echo $_POST['hotel']."<br>";
    echo $_SESSION['nod'];
    
    
}

?>
