<?php
include "header.php";

echo "<a href=\"index.php\">Etusivu</a>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<b>Lisää</b>";
echo "&nbsp;&nbsp;&nbsp;";
echo "<a href=\"search.php\">Hae</a>";
echo "<br />";
echo "<hr />";

?>

<h3>Syötä uuden auton tiedot</h3>
<form name="carinput" action="add_movie.php" method="post">
<fieldset>
    <legend>Uusi:</legend>
Valmistaja: <input type="text" name="Valmistaja" size="20" maxlength="20"/><br />
Nimi: <input type="text" name="Nimi" size="20" maxlength="20"/><br />
Vuosi: <input type="text" name="Vuosi" size="4" maxlength="4"/><br />
Vetotapa: <input type="text" name="Vetotapa" size="20" maxlength="20"/><br />

<input type="submit" value="Lisää" />
</fieldset>
</form> 

<?php
include "footer.php";
?>