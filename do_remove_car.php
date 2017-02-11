<?php
include "header.php";

echo "<a href=\"index.php\">Etusivu</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"add.php\">Lisää</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"search.php\">Hae</a>";
echo "<br>";
echo "<hr>";

include "connect_to_mysql.php";

// Start transaction to ensure everything is deleted (or nothing at all)
$query = "START TRANSACTION;";
//echo $query;
// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

// Put the SQL-query into a variable
$query = "DELETE FROM Moottori WHERE Moottori_ID=" . $_POST['Moottori_ID'] . ";";
//echo $query;

// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$query = "DELETE FROM Automalli WHERE Automalli_ID=" . $_POST['Automalli_ID'] . ";";
//echo $query;
// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}


// Commit the transaction
$query = "COMMIT";
//echo $query;
// Perform the query
$result = mysql_query($query);
// Check the result
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

echo "Poistettu.<br />";
echo "<a href=\"index.php\">Palaa etusivulle</a>";
include "footer.php";
?>