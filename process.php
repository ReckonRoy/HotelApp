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
        public $name, $surname, $email, $checkInDate, $checkOutDate, $non, $hotelInfo_array, $hotel_array = '';
        
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
    }
?>