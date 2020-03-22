<?php
    /*
     * process.php handles the processing of all user inputs, thats retrieving 
     * data and sending out data and throws certain responses
     * 
     * @version php v7.1
     * @auther Le-Roy
     * 
     */
     
    $user_object;
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['checkIn']) && isset($_POST['checkOut']) && isset($_POST['hotels']))
     {
         $name = $_POST['name'];
         $surname = $_POST['surname'];
         $email = $_POST['email'];
         $checkIn = strtotime($_POST['checkIn']);
         $checkOut = strtotime($_POST['checkOut']);
         $hotels = $_POST['hotels'];
         
         $userObject = new User($name, $surname, $email, $checkIn, $checkOut, $hotels);
         echo $userObject -> getUser();
         echo $userObject -> getCheckInDate();
         echo $userObject -> getCheckOutDate();
         $userObject -> getHotels();
         $month = $userObject -> setMonths();
         echo "<br>";
         echo $month;
         $day = $userObject -> setDays();
         echo $day."<br>";
         $year = $userObject -> setYears();
         echo $year."<br>";
         echo $userObject -> getNum_of_days($month, $day, $year);
     }


    


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
            return $checkIn;
        }
        
        //getCheckOutDate returns the check out date
        function getCheckOutDate()
        {
            $checkOut = date('l-d-F', $this -> checkOutDate);
            return $checkOut;
        }
        
        function setDays()
        {
            $this -> cid = date('d', $this -> checkInDate);
            $this -> cod = date('d', $this -> checkOutDate);
            return ($this -> cod - $this -> cid);
        }
        
        function setMonths()
        {
            $this -> cim = date('m', $this -> checkInDate);
            $this -> com = date('m', $this -> checkOutDate);
            return ($this -> com - $this -> cim);
        }
        
        function setYears()
        {
            $this -> ciy = date('Y', $this -> checkInDate);
            $this -> coy = date('Y', $this -> checkOutDate);
            return ($this -> coy - $this -> ciy);
            
        }
        
        function getNum_of_days($m, $d, $y)
        {
            if($y > 0 && $m > 0 && $d > 0)
            {
                return "Number of nights at which your accomodation last is: ". $y. " year(s) ".$m." month(s), ".$d." day(s)";
            }
            
            else if($y <= 0 && $m > 0 && $d > 0)
            {
                return "Number of nights at which your accomodation last is: ".$m." month(s), ".$d." day(s)";
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
                'park' => array(
                    'Hotel Name' => "Park Inn by Radisson Cape Town Foreshore",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => "2 222"
                ),
                
                'mandela' => array(
                    'Hotel Name' => "Mandela Rhodes Place Hotel",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "yes",
                    'breakfast' => "no", 
                    'wifi' => "no",
                    'air conditioning' => "yes",
                    'total' => "2 428"
                ),
                'icon' => array(
                    'Hotel Name' => "Icon Luxury Apartments",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "yes",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => "2 552"
                ),
                'taj' => array(
                    'Hotel Name' => "Taj Cape Town",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "yes",
                    'breakfast' => "yes",
                    'air conditioning' => "yes",
                    'total' => "5 646"
                ),
                'city' => array(
                    'Hotel Name' => "City Lodge Hotel Victoria And Alfred Waterfront",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => "3 474"
                ),
                'southern' => array(
                    'Hotel Name' => "Southern Sun Cape Sun",
                    'parking' => "yes",
                    'pool' => "yes",
                    'gym' => "yes",
                    'kitchen' => "no",
                    'wifi' => "no",
                    'breakfast' => "no",
                    'air conditioning' => "yes",
                    'total' => "4 590"
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
                                    $value_key $this_val;
                                </div>   
                                _END;
                            
                        }
                    }
                    
               }
           }
           
        }
        
    }
?>