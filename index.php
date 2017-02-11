<?php
include "header.php";

echo "<b>Etusivu</b>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"add.php\">Lisää</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"search.php\">Hae</a>";
echo "<br />";
echo "<hr />";

include "connect.php";

//
// print all the movies:
//

// Put the SQL-query into a variable
$query = "SELECT * FROM Automalli;";

// Perform the query
$result = mysql_query($query);

// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

echo "<h3>Autot:</h3>\n";
// print the rows from the result
while ($row = mysql_fetch_assoc($result)) {
    // Form a link from the movie names, include the id in the link
	echo "<a href=\"view_movie.php?id=";
	echo $row['Automalli_ID'] . "\">";
    //echo $row['nimi'];
    echo stripslashes($row['Nimi']);
	echo ', ';
    echo $row['Vuosi'];
	echo "</a><br />\n";
}

// close the connection
mysql_close($conn);


include "footer.php";
?>