<?php
$f = '';
$c = '';

if(isset($_POST['f']))
{
    $f = sanitizeString($_POST['f']);
}

if(isset($_POST['c']))
{
    $c = sanitizeString($_POST['c']);
}

if($f != '')
    {
        $c = intval((5 / 9) * ($f - 32));
        $out = "$f °f equals $c °c";
    }
else if( $c != '')
{
    $f = intval((9 / 5) * $c + 32);
    $out = "$c °c equals $f °f";
}

else $out = "";
   
?>

<html>
<body>
/b&gt;
<br>
Enter either Fahrenheit or Celsius and click on Convert
<br>
<?php echo "<br>".$out."<bt>"; ?>
<form action="newfile.php" method="POST">
	<label for="f">fahrenheight: </label><br><input type="text" name="f" size="7">
	<br>
	<br>
	<label for="c">celsius</label><br>
	<input type="text" name="c" size="7">
	<br><br>
	<input type="submit" value="convert">
</form>

</body>
</html>

<?php 

function sanitizeString( $var )
{
    $var = stripslashes($var);
    $var = htmlentities($var);
    $var = strip_tags($var);
    return $var;
}

?>
