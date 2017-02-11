<?php
include "header.php";

echo "<a href=\"index.php\">Etusivu</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"add.php\">Lisää</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"search.php\">Hae</a>";
echo "<br />";
echo "<hr />";

include "connect.php";

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

echo "Valmistaja" . $row['Valmistaja'] . "<br />";
echo "Nimi: " . $row['Nimi'] . "<br />";
echo "Vuosi: " . $row['Vuosi'] . " minuuttia<br />";

/*echo "Genre(t): ";
$query = "SELECT nimi FROM genre, elokuvagenre WHERE elokuva_idelokuva=" . $_GET['id'] . " AND genre_idgenre=idgenre;";

// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_assoc($result)){
	echo $row['nimi'] . " ";
}*/

mysql_close($conn);

echo "<br /><br /><a href=\"remove_movie.php?id=" .  $_GET['id'] . "\">Poista elokuva</a>";
echo "&nbsp; &nbsp; <a href=\"edit_movie.php?id=" .  $_GET['id'] . "\">Muokkaa elokuvaa</a>";

include "footer.php";
?>