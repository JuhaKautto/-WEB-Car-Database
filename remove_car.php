<?php 

include "connect_to_mysql.php";

// Put the SQL-query into a variable
$query = "SELECT * FROM Automalli WHERE Automalli_ID=" . $_GET['id'] . ";";

// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

// Fetch the row data
$row = mysql_fetch_assoc($result);

echo "Poistetaan <b>" . $row['Nimi'] . "</b> - oletko varma? <br />\n";
?>

<form name="kylla" action="do_remove_movie.php" method="post">
<?php
echo "<input type=\"hidden\" value=\"" . $_GET['id'] . "\" name=\"Automalli_ID\" />";
?>
<input type="submit" name="Submit" value="Kyllä" />
</form>

<form name="ei" action="index.php" method="get">
<input type="submit" name="Submit" value="Ei" />
</form>

