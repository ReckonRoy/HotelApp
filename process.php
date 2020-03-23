<?php session_start();?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<style type="text/css">

*
{
    padding: 0px;
    margin: 0px;
}

</style>
</head>
<body>

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
         $day = $userObject -> getDays();
         $year = $userObject -> getYears();
         
         $_SESSION['nod'] = $userObject -> getNum_of_days($month, $day, $year);
        
         $_SESSION['ci'] = $userObject -> getCheckInDate();
         $_SESSION['co'] = $userObject -> getCheckOutDate();

    


    class User
    {
        public $name, $surname, $email, $checkInDate, $checkOutDate, $non, $hotelInfo_array, $hotel_array, $cim, $cid, $ciy ,$com, $cod, $coy= '';
        
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
            return "<ul><li>Name: ".$this -> name."</li><li>Surname: ".$this -> surname."</li><li>Email: ".$this -> email."</li></ul>";
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
            return "Check Out Date: ".$checkOut."<br>";
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
            
            $this -> hotelInfo_array = array( 
                'Park Inn by Radisson Cape Town Foreshore' => array(
                    'Hotel Name' => "Park Inn by Radisson Cape Town Foreshore",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => 2222
                ),
                
                'Mandela Rhodes Place Hotel' => array(
                    'Hotel Name' => "Mandela Rhodes Place Hotel",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "yes",
                    'breakfast' => "no", 
                    'wifi' => "no",
                    'air conditioning' => "yes",
                    'total' => 2428
                ),
                'Icon Luxury Apartments' => array(
                    'Hotel Name' => "Icon Luxury Apartments",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "yes",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => 2552
                ),
                'Taj Cape Town' => array(
                    'Hotel Name' => "Taj Cape Town",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "yes",
                    'breakfast' => "yes",
                    'air conditioning' => "yes",
                    'total' => 5646
                ),
                'City Lodge Hotel Victoria And Alfred Waterfront' => array(
                    'Hotel Name' => "City Lodge Hotel Victoria And Alfred Waterfront",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => 3474
                ),
                'Southern Sun Cape Sun' => array(
                    'Hotel Name' => "Southern Sun Cape Sun",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => 4590
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
                            
                            if($value_key == "total")
                            {
                                if($this -> getYears() >= 1)
                                {
                                    $_SESSION['cost'] = ((365 * $this -> getYears()) + $this -> getMonths() + $this -> getDays()) * $this_val;
                                }else 
                                {
                                    $_SESSION['cost'] = ($this -> getMonths() + $this -> getDays()) * $this_val;
                                }
                            }
                            
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
<?php 

	?>
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

<input type="submit" value="Book Now">
</form>

</body>
</html>  