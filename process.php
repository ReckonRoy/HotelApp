<?php session_start();?>

<!DOCTYPE html>
<html lang="en-US">
<head>

<link href="https://fonts.googleapis.com/css?family=Baloo+2&display=swap" rel="stylesheet">
<style type="text/css">

*
{
    padding: 0px;
    margin: 0px;
}

#container
{
    width: 80%;
    background-color: white;
    padding: 5%;
	margin: 0 auto;
	font-family: 'Baloo 2', cursive;
	
}

#user
{
	background-color: 	#ffeab4;
	width: 75%;
	padding: 3%;
	margin-bottom: 5%;
	color: grey;
	border: 1px solid gray;
}

.div_hotel
{
	border: 1px solid #3d1b89;
	background-color: white;
	width: 75%;
	margin-bottom: 5%;
	padding: 3%;
	padding-left: 1%;
	padding-bottom: 0;
	padding-top: 0;
}

.div_hotel table
{
	cellpadding: 30;
	border-collapse: collapse;
	padding-left: 0px;
	background-color: purple;
	color: white;
	width: 50%;
}

th
{
	text-transform: uppercase;
	letter-spacing: 0.1em;
	font-size: 90%;
	text-align: left;
}

		
tr. even
{
	background-color: grey;
}		
		
tr:hover
{
	background-color: grey;
}

li
{
	list-style: none;
}

/* --------------------------------------------------------
Footer
-----------------------------------------------------------*/
.footer_bottom{
    background: #222222;
    padding: 15px 0;
    position: relative;
}
.footer_bottom p{
    margin: 0;
    font-size: 11px;
    color: #f2f0f0;
    line-height: 20px;
    text-transform: uppercase;
}
.footer_menu ul{
    margin: 0;
    text-align: right;
}

.footer_menu ul li:last-child{
    border-right: 0px;
}
.footer_menu ul li{
    display: inline-block;
    border-right: 1px solid #f2f0f0;
    line-height: 10px;
}
.footer_menu ul li a{
    display: block;
    text-transform: uppercase;
    color: #f2f0f0;
    font-size: 11px;
    margin: 0 15px;
}
.footer_menu ul li a:hover,.main_header ul.nav.navbar-nav li > a:hover{
    color: #3a0ba8;
}

.back_nav{
    background: rgba(41, 7, 163, 0.95);
    overflow: hidden;
}
.back_nav h2{
    font-size: 18px;
    margin: 0 0 0 15px;
    color: #fff;
    text-transform: uppercase;
    line-height: 39px;
    letter-spacing: 1px;
}
.back_nav ul{
    margin: 0 15px 0 0;
}
.back_nav ul li{
    display: inline-block;
    font-family: 'Playfair Display';
    color: #fff;
    text-transform: uppercase;
    line-height: 39px;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0 19px;
}
.back_nav ul li a{
    display: block;
    color: #fff;
    position: relative;
}
.back_nav ul li a:hover{
    color: #000;
}
.back_nav ul li a:after {
  content: "/";
  position: absolute;
  right: -17px;
  top: 1px;
    color: #fff;
}

</style>
</head>
<body>
<div id="container">
<?php
    /*
     * process.php handles the processing of all user inputs, thats retrieving 
     * data and sending out data and throws certain responses
     * 
     * @version php v7.1
     * @auther Le-Roy
     * 
     */

         $userObject = new User($_SESSION['name_s'],  $_SESSION['surname_s'], $_SESSION['email_s'], $_SESSION['checkIn_s'], $_SESSION['checkOut_s'], $_SESSION['hotels']);
         
         echo $userObject -> getUser();
         echo $userObject -> getCheckInDate();
         echo $userObject -> getCheckOutDate();
         
         echo $userObject -> getHotels();
         
         $month = $userObject -> getMonths();
		 $_SESSION['month'] = $month;
		 
         $day = $userObject -> getDays();
		 $_SESSION['day'] = $day;
		 
         $year = $userObject -> getYears();
		 $_SESSION['year'] = $year;
         
         $_SESSION['nod'] = $userObject -> getNum_of_days($month, $day, $year);
        
         $_SESSION['ci'] = $userObject -> getCheckInDate();
         $_SESSION['co'] = $userObject -> getCheckOutDate();
		 $_SESSION['array'] = $userObject -> hotelInfo_array;
		 $_SESSION['hotel_cost'] = $userObject -> hotel_cost;
    


    class User
    {
        public $name, $surname, $email, $checkInDate, $checkOutDate, $non, $hotelInfo_array, $hotel_cost, $hotel_array, $cim, $cid, $ciy ,$com, $cod, $coy= '';
        
        //class User constructor, with params
        function __construct($name, $surname, $email, $cid, $cod, $hotel_array)
        {
            $this -> name = $name;
            $this -> surname = $surname;
            $this -> email = $email;
            $this -> checkInDate = $cid;
            $this -> checkOutDate = $cod;
            $this -> hotel_array = $hotel_array;
            
        }
        
        
        //getUser returns name, surname, and email
        function getUser()
        {
            return "<div id=\"user\"><ul><li>Name: ".$this -> name."</li><li>Surname: ".$this -> surname."</li><li>Email: ".$this -> email."</li></ul>";
        }
        
        //getCheckInDate returns the check in date
        function getCheckInDate()
        {
            $checkIn = date('l-d-F', $this -> checkInDate);
            return "Check In Date: ".$checkIn."<br>";
        }
        
        //getCheckOutDate returns the check out date
        function getCheckOutDate()
        {
            $checkOut = date('l-d-F', $this -> checkOutDate);
            return "Check Out Date: ".$checkOut."<br></div>";
        }
        
        function getDays()
        {
            $this -> cid = date('d', $this -> checkInDate);
            $this -> cod = date('d', $this -> checkOutDate);
            
            if($this -> cid > $this -> cod)
            {
                $new_cid =  $this -> cid - $this -> cod;
                return (($this -> cod + $new_cid) - $new_cid);
            }else{
                return ($this -> cod - $this -> cid);
            }
        }
        
        function getMonths()
        {
            $this -> cim = date('m', $this -> checkInDate);
            $this -> com = date('m', $this -> checkOutDate);
            
            if($this -> cim > $this -> com)
            {
                $new_cim =  $this -> cim - $this -> com;
                return (($this -> com + $new_cim) - $new_cim);
            }else{
                return ($this -> com - $this -> cim);
            }
        }
        
        
        function getYears()
        {
            $this -> ciy = date('Y', $this -> checkInDate);
            $this -> coy = date('Y', $this -> checkOutDate);
            return ($this -> coy - $this -> ciy);
            
        }
        
        function getNum_of_days($m, $d, $y)
        {
            if($y > 0 && $m > 0 && $d > 0)
            {
                return "Number of nights at which your accomodation will last is: ". $y. " year(s) ".$m." month(s), ".$d." day(s)";
            }
            
            else if($y <= 0 && $m > 0 && $d > 0)
            {
                return "Number of nights at which your accomodation will last is: ".$m." month(s), ".$d." day(s)";
            }
            
            else if($y <= 0 && $m <= 0 && $d > 0)
            {
                return "Number of nights at which your accomodation will last is: ".$d." day(s)";
            }
            else {
                return "invalid date was submitted";
            }
        }
        
        function getHotels()
        {
            $this -> hotel_cost = array( 
                'Park Inn by Radisson Cape Town Foreshore' => array(
                    'total' => 2222
                ),
                
                'Mandela Rhodes Place Hotel' => array(
                    'total'  => 2428
                ),
				
                'Icon Luxury Apartments' => array(
                    'total' => 2552 
                ),
				
                'Taj Cape Town' => array(
                    'total' => 5646
                ),
				
                'City Lodge Hotel Victoria And Alfred Waterfront' => array(
                    'total' => 3474
                ),
				
                'Southern Sun Cape Sun' => array(
                    'total' => 4590
                )
            );
			
            $this -> hotelInfo_array = array( 
                'Park Inn by Radisson Cape Town Foreshore' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><th scope="row">Hotel Name: </th>' => "<td>Park Inn by Radisson Cape Town Foreshore</tr></td>",
                    '<tr><th scope="row">Parking: </th>' => "<td>Yes</td></tr>",
                    '<tr><th scope="row">Pool: </th>' => "<td>Yes</td></tr>",
                    '<tr><th scope="row">Gym: </th>' => "<td>Yes</td></tr>",
                    '<tr><th scope="row">Kitchen: </th>' => "<td>No</td></tr>",
                    '<tr><th scope="row">Wifi: </th>' => "<td>No</td></tr>",
                    '<tr><th scope="row">Breakfast: </th>' => "<td>No</td></tr>",
                    '<tr><th scope="row">Air conditioning: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">total' => "<td> R2222 </td></tr></table></div>"
                ),
                
                'Mandela Rhodes Place Hotel' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><th scope="row">Hotel Name: </th>' => "<td>Mandela Rhodes Place Hotel</td></tr>",
                    '<tr><th scope="row">parking: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">pool: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">gym: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">kitchen: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">breakfast: </th>' => "<td>no</td></tr>", 
                    '<tr><th scope="row">wifi: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">air conditioning: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row"> total </th>' => "<td> R2428 </td></tr></table></div>"
                ),
                'Icon Luxury Apartments' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><td>Hotel Name: </td>' => "<td>Icon Luxury Apartments</td></tr>",
                    '<tr><th scope="row">parking</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">pool</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">gym</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">kitchen</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">wifi</th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">breakfast</th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">air conditioning</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row"> total </th>' => "<td> R2552 </td></tr></table></div>"
                ),
                'Taj Cape Town' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><td>Hotel Name: </td>' => "<td>Taj Cape Town</td></tr>",
                    '<tr><th scope="row">parking</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">pool</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">gym</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">kitchen</th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">wifi</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">breakfast</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">air conditioning</th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">total</th>' => "<td>R5646</td></tr></table></div>"
                ),
                'City Lodge Hotel Victoria And Alfred Waterfront' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><td>Hotel Name: </td>' => "<td>City Lodge Hotel Victoria And Alfred Waterfront</td></tr>",
                    '<tr><th scope="row">parking: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">pool: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">gym: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">kitchen: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">wifi: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">breakfast: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">air conditioning: </th' => "<td>yes</td></tr>",
                    '<tr><th scope="row">total</th>' => "<td>R3474</td></tr></table></div>"
                ),
                'Southern Sun Cape Sun' => array(
                    '<div class="div_hotel"><table cellspacing="10"><tr><td>Hotel Name: </td>' => "<td>Southern Sun Cape Sun</td></tr>",
                    '<tr><th scope="row">parking: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">pool: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">gym: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">kitchen: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">wifi: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">breakfast: </th>' => "<td>no</td></tr>",
                    '<tr><th scope="row">air conditioning: </th>' => "<td>yes</td></tr>",
                    '<tr><th scope="row">total</th>' => "<td>R4590</td></tr></table></div>"
                )
            );
            
           $temp = implode(',', $this -> hotel_array);
           $this -> hotel_array = explode(',', $temp);
           
           foreach($this -> hotelInfo_array as $hotel_key => $value)
           {
               
               foreach($this -> hotel_array as $hotel_value_j)
               {
                   
                   if($hotel_key == $hotel_value_j)
                    {
                        foreach($value as $value_key => $this_val)
                        {
                            
 echo <<<_END
<div>
<ul><li>$value_key $this_val</li></ul>
</div>
 
_END;
                            
                        }
                    }
                    
               }
           }
        }
        
    }
?>

<div id="form">
<p>
<form action="success.php" method="POST">

<select name="hotel" size="1" >
<?php 
    


foreach ($_SESSION['hotels'] as $val)
{
    
?>
<option value="<?php echo $val; ?>"><?php echo $val; ?></option>
<?php 
}
?>
</select>
</p>
<p>
<input type="submit" value="Book Now">

</p>
</form>
</div>
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
</div>
</body>
</html>  