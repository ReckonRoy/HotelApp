<?php 
session_start();

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['checkIn']) && isset($_POST['checkOut']) && isset($_POST['hotels']))
     {
         $_SESSION['name_s'] = $_POST['name'];
         
         
         $_SESSION[surname_s] = $_POST['surname'];
         
         $_SESSION['email_s'] = $_POST['email'];
         
         $_SESSION['checkIn_s'] = strtotime($_POST['checkIn']);
         
         $_SESSION['checkOut_s'] = strtotime($_POST['checkOut']);
         
         $_SESSION['hotels'] = $_POST['hotels'];
         
         header('Location: process.php');
         
         $_SESSION['cost'];
         
         
     }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
		
		<style type="text/css">
			.table td{
				padding: 20px;
				background-color: white;
			}
			
			input[type=text]:focus
			{
				border: 2px solid #3d1b89;
				background-color: white;
				color:  #3d1b89;
				padding: 5px;
			}
			
			.text 
			{
				width: 400px;
				line-height: 2.5em;
				outline: none;
			}
			
			input[type=submit]
			{
				width: 100%;
				font-size: 2em;
				padding: 16px 32px;
				border: none;
				color: white;
				background-color: #3d1b89
			}
				
		</style>
        
        <!-- Google/Custom font -->
        <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
        

        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Font awesome css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">

        <!-- Favicons -->
        <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png">
        <link rel="shortcut icon" type="image/png" href="img/favi-con.png"/>  
    </head>
    
    <body>
        
        <header class="header_area" style="background-color: white;">     
            <div class="header_bottom">
                <div class="container">
                    <div class="main_header">
                        <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="logo">
                                    <a href="index.php"><img src="img/bookit.jpeg" alt="Site Logo"></a>                     
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-10 nav_area">
                                <nav class="main_menu">
                                    <div class="navbar-collapse collapse"> 
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="accommodation.php">Accommodation</a></li>
                                            <li><a href="Facilities&Services.php">Facilities</a></li>
                                            <li><a href="Location&ContactUs.php">ContactUs</a></li>
                                            <li><a href="Reservation.php">Reservation</a></li>
                                        </ul>
                                    </div>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </header>
        
   <div class="container" style="background-color: white;padding:0;">

           <section>
            <div class="container">

                <div class="back_nav">
                    <div class="col-sm-5">
                        <h2>Contact Us</h2>
                    </div>
                    <div class="col-sm-7">
                        <ul class="text_a_r" style="text-align: right;">
                            <li><a href="index.php">Home</a></li>
                            <li>Location and ContactUs</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
         <div class="container">
             <div class="hotel_reserve_box card">
         <h3> Hotel Reservation Form </h3><br>
         <form action="reservation.php" method="POST" autocomplete="off" onsubmit="return validate(this)">
             <div class="form-group">
                <label for="name">First Name: </label><br>
				<input type="text" name="name" placeholder="Enter Name:" class="text">	
             </div>
             <div class="form-group">
                <label for="surname">Surname:</label><br>
                <input type="text" name="surname" placeholder="Enter Surname" class="text">
             </div>
			 <div class="form-group">
                <label for="email">Email:</label><br>
                <input type="text" name="email" placeholder="Email: example@gmail.com" class="text">
             </div>
			 
             <div class="form-group">
                <label for="">CheckIn Date:</label><br>
				<input type="date" name="checkIn">
             </div>
             <div class="form-group">
                 <label>CheckOut Date:</label><br>
				 <input type="date" name="checkOut">
             </div>
             <div class="form-group">
                <table class="table">
				<tr><th colspan="3"><center>Select Your Hotels</center></th><tr>
				<tr><td><img src="img/familyRoom.jpg" width="100px" height="100px"></td><td>Park Inn by Radisson Cape Town Foreshore</td><td><input type="checkbox" name="hotels[]" value="Park Inn by Radisson Cape Town Foreshore"></td></tr>
				<tr><td><img src="img/grandRoom.jpg" width="100px" height="100px"></td><td>Mandela Rhodes Place Hotel</td><td><input type="checkbox" name="hotels[]" value="Mandela Rhodes Place Hotel"></td></tr>
				<tr><td><img src="img/banner.jpg" width="100px" height="100px"></td><td>Icon Luxury Apartments</td><td><input type="checkbox" name="hotels[]" value="Icon Luxury Apartments"></td></tr>
				<tr><td><img src="img/specialRoom.jpg" width="100px" height="100px"></td><td>Taj Cape Town</td><td><input type="checkbox" name="hotels[]" value="Taj Cape Town"></td></tr>
				<tr><td><img src="img/two.jpg" width="100px" height="100px"></td><td>City Lodge Hotel Victoria And Waterfront</td><td><input type="checkbox" name="hotels[]" value="City Lodge Hotel Victoria And Alfred Waterfront"></td></tr>
				<tr><td><img src="img/familyRoom.jpg" width="100px" height="100px"></td><td>Southern Sun Cape Sun</td><td><input type="checkbox" name="hotels[]" value="Southern Sun Cape Sun"></td></tr>
				
				</table>
             </div><br>
             <div class="form-group">
                 <input type="submit" value="Compare">
             </div>
         </form>
     </div>
         </div>
        </div>
        <br>

        <footer class="footer_area">
            
            <div class="footer_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <p>© 2020 BookitApp. All rights reserved</p>
                        </div>
                        <div class="col-sm-8">
                            <nav class="footer_menu">
                                <ul>
                                    
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="accommodation.php">Accommodation</a></li>
                                    <li><a href="Facilities&Services.php">Facilities</a></li>
                                    <li><a href="Location&ContactUs.php">ContactUs</a></li>
                                    <li><a href="Reservation.php">Reservation</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>

        ​​  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
        ​<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <script type="text/javascript">
        
        function finalCost(){
            var roomType = document.getElementById("room_type").value;
            var roomNum = document.getElementById("room_number").value;
            var personNum = document.getElementById("person_number").value;
            var childNum = document.getElementById("child_number").value;
            var resFacilities = document.getElementById("res_facilities").value;

            var total = (parseInt(roomType)*10) + ((roomNum)*2) + ((personNum)*3) + ((childNum)*2) + ((resFacilities)*5)

            document.getElementById("result").innerHTML = total;
        }
    </script>


	<script type="text/javascript" src="js/external.js">
    </script>
 
    </body>
</html>