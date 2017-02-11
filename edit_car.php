<?php
include "header.php";

echo "<a href=\"index.php\">Etusivu</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"add.php\">Lisää</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"search.php\">Hae</a>";
echo "<br />";
echo "<hr />";

include "connect_to_mysql.php";

// Put the SQL-query into a variable, get the movie info
$query = "SELECT * FROM Automalli WHERE Automalli_ID=" . $_GET['id'] . ";";

// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

// Fetch the row data for the movie
$row = mysql_fetch_assoc($result);
// Print out the form and put the movie data into the "value"-fields
echo "<h4>Muokkaa</h4>";
echo "<form action=\"save_car.php\" method=\"post\">\n";
echo "<input type=\"hidden\" name=\"automalli_ID\" value=\"" . $_GET['id'] . "\" />\n";
echo "Nimi: <input type=\"text\" name=\"Nimi\" value=\"" . stripslashes($row['Nimi']) . "\" /><br />\n";
echo "Vuosi: <input type=\"text\" name=\"Vuosi\" value=\"" . $row['Vuosi'] . "\" /><br />\n";
echo "Pituus: <input type=\"text\" name=\"Valmistaja\" value=\"" . $row['Valmistaja'] . "\" /><br />\n";

// Genret:
echo "Genre(t): ";
echo "<select multiple=\"multiple\" name=\"genre[]\">\n";
$query = "SELECT * FROM genre";
// Perform the query
$result_genres = mysql_query($query);
// Check the result
if (!$result_genres) {
    die('Invalid query: ' . mysql_error());
}

// Genres from the movie
$query = "SELECT idgenre, nimi FROM genre, elokuvagenre WHERE elokuva_idelokuva=" . $_GET['id'] . " AND genre_idgenre=idgenre;";

// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

// Form an array of the results, so it can be used again and again
$resultset = array();
while ($resultset[] = mysql_fetch_assoc($result));
// Loop through all genres
while ($row_genre = mysql_fetch_assoc($result_genres)){
	echo "<option value=\"" . $row_genre['idgenre'] . "\"";

	// Loop through the movie's genres and check if there's a match
	foreach ($resultset as $row){
		if (!strcmp($row_genre['idgenre'], $row['idgenre'])){
			echo " selected=\"selected\""; // print "selected", if a match is found
			break; // break the foreach-loop, since we already found a match
		}
	}
	echo ">" . $row_genre['nimi'] . "</option>\n";
}
echo "</select>\n";
echo "<input type=\"submit\" name=\"submit\" value=\"Tallenna\" /><br />";
echo "</form>";

	
mysql_close($conn);

include "footer.php";
?>
