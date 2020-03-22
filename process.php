<?php
    /*
     * process.php handles the processing of all user inputs, thats retrieving 
     * data and sending out data and throws certain responses
     * 
     * @version php v7.1
     * @auther Le-Roy
     * 
     */

    class User
    {
        public $name, $surname, $email, $checkInDate, $checkOutDate, $non, $hotelInfo_array, $hotel_array, $cim, $cid, $ciy ,$com, $cod, $coy= '';
        
        function __construct($name, $surname, $email, $cid, $cod, $non, $hotelInfo_array, $hotel_array)
        {
            $this -> name = $name;
            $this -> surname = $surname;
            $this -> email = $email;
            $this -> checkInDate = $cid;
            $this -> checkOutDate = $cod;
            $this -> non = $non;
            $this -> hotelInfo_array = $hotelInfo_array;
            $this -> hotel_array = $hotel_array;
            
        }
        
        function getUser()
        {
            return "<ul><li>Name: ".$this -> name."</li><li>Surname: ".$this -> name."</li><li>Email: ".$this -> name."</li></ul>";
        }
        
        function getCheckInDate()
        {
            return $this -> checkInDate;
        }
        
        function getCheckOutDate()
        {
            return $this -> checkOutDate;
        }
        
        function getDays()
        {
            $this -> cid = date('d', $this -> checkInDate);
            $this -> cod = date('d', $this -> checkOutDate);
        }
        
        function getMonths()
        {
            $this -> cim = date('m', $this -> getCheckInDate());
            $this -> com = date('m', $this -> getCheckOutDate());
        }
        
        function Number_of_years()
        {
            
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
    }
?>