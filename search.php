<?php
include "header.php";
?>

<a href="index.php">Etusivu</a>
&nbsp;&nbsp;&nbsp;
<a href="add.php">Lisää</a>
&nbsp;&nbsp;&nbsp;
<b>Hae</b>
<hr />

<p> Tämä on hakusivu. Käytä alla olevaa lomaketta hakuun.</p>

<form action="search.php" method="get">
Nimi: <input type="text" name="q"></input>
<input type="submit" value="Hae" />
</form>

<?php

if (!empty($_GET["q"])){

  include "connect.php";

  echo "Tulokset:<br />";
  
  $query = "SELECT * FROM Automalli WHERE Valmistaja LIKE '%" . $_GET["q"] . "%';";
  $result = mysql_query($query);
  // Check the result
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }

  // print the rows from the result
while ($row = mysql_fetch_assoc($result)) {
    // Form a link from the movie names, include the id in the link
	echo "<a href=\"view_car.php?id=";
	echo $row['Automalli_ID'] . "\">";
    echo $row['Valmistaja'];
	echo ', ';
    echo $row['Nimi'];
	echo ', ';
	echo $row['Vuosi'];
	echo "</a><br>\n";
}

// close the connection
mysql_close($conn);

  
}

include "footer.php";
?>