<?php

session_start ();

switch ($_POST ['radio']) // on indique sur quelle variable on travaille
{
	case '1' : // dans le cas où $note vaut 0
		header ( 'Location:formtab.php' );
		break;
	
	case '2' : // dans le cas où $note vaut 5
		header ( 'Location:formtab4.php' );
		break;
	
	case '3' : // dans le cas où $note vaut 7
		header ( 'Location:formtab8.php' );
		break;
}

?>
