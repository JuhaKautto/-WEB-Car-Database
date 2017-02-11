<html><head>
<meta http-equiv="Refresh" content="3;url=index.php" />
<title>Elokuvan päivitys</title></head><body>
<?php

include "connect_to_mysql.php";

// form the SQL-query string
$query = "UPDATE Automalli set Nimi=\"" . 
		 mysql_real_escape_string($_POST["Nimi"]) . "\", Valmistaja=" .
		 mysql_real_escape_string($_POST["Valmistaja"]) . ", Vuosi=" .
		 mysql_real_escape_string($_POST["muosi"]) . " " .
		 "WHERE Automalli_ID=" . $_POST["Automalli_ID"] . ";";

// execute the query
$result = mysql_query($query);

// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

// remove all previous "links" for the movie
$query = "DELETE FROM Automalli WHERE Moottori_Moottori_ID=" . $_POST['Automalli_ID'];
// execute the query
$result = mysql_query($query);

// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

// add "links" into elokuvagenre-table
$genres = $_POST['Moottori'];

// for each genre received in the array, form an SQL-query
foreach ($genres as $genre){
	$query = "INSERT INTO Moottori VALUES(" . 
	          $_POST['Automalli_ID'] . ", " . $genre . ");";
	//echo $query . "\n";
	$result = mysql_query($query);
	if (!$result) {
		die('Invalid query: ' . mysql_error());
	}
}

echo "Auton tiedot päivitetty! Palaat takaisin etusivulle 3 sekunnin kuluttua...";

// close the mysql-connection
mysql_close($conn);
?>