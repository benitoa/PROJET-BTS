<?php
include ('connect.php');

if (isset ( $_POST ['search'] ) && ! empty ( $_POST ['search'] )) {
	
	$search = mysql_real_escape_string ( htmlentities ( $_POST ['search'] ) );
	
	$query = $connect->query ( "SELECT * FROM eleves WHERE nom LIKE'$search%'" );
	
	while( $row = $query->fetch () ) {
		echo"<li><a href='#'>".$row['nom']." ".$row['prenom']."</a></li>";
	}
}

?>