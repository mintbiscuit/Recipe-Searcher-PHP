<?php
include 'header.php';
?>


<?php

    // Create connection
    $connect = mysql_connect(localhost,****,****);     // Omitted all passwords, etc. :)
    mysql_select_db(****, $connect);

    // Check connection
    if (!$connect) {
      die('Could not connect: ' . mysql_error());
    }


if (isset($_GET['id']) and is_numeric($_GET['id']) and ($_GET['id'] > 0)) {
  $recipe_id = $_GET['id'];

  $output=null;
  $query = "SELECT * FROM Recipe WHERE RecipeID=$recipe_id"; 
  $result = mysql_query($query) or die ("Problems with $query"); 

  if ($row = mysql_fetch_array($result)) {
    // info from database
    $name = $row['RecipeName'];
    $ingredients = $row['RecipeIngredients'];
    $sweet = $row['Sweet'];
    $salty = $row['Salty'];
    $savory = $row['Savory'];
    $hot = $row['Hot'];
    $cold = $row['Cold'];
    $GF = $row['GlutenFree'];
    $SF = $row['SugarFree'];
    $DF = $row['DairyFree'];
    $directions = $row['Directions'];
    $notes = $row['Notes'];
    $img = $row['img'];

      // Sweet?
        if ($sweet == 1) {
          $sw = "Sweet";}
        else {$sw = "";}

      // Salty?
        if ($salty == 1) {
          $sa = "Salty";}
        else {$sa = "";}

      // Savory?
        if ($savory == 1) {
          $sav = "Savory";}
        else {$sav = "";}

      // Hot?
        if ($hot == 1) {
          $heat = "Hot";}
        else {$heat = "";}

      // Cold?
        if ($cold == 1) {
          $icy = "Cold";}
        else {$icy = "";}

      // Extra Concerns
        if($GF == 1) {
          $glfr = "Gluten-Free ";}
        if($SF == 1) {
          $sgfr = "Sugar-Free ";}
        if($DF == 1) {
          $drfr = "Dairy-Free";}

        if ($GF == 1 OR $SF == 1 OR $DF == 1) {
          $add = "&nbsp; | &nbsp;<b>Other:</b> $glfr $sgfr $drfr";}


  $output = "<table align='center' class='item'>
            <tr>
              <td class='item-td2'>$img</td>
            </tr>
            <tr>
              <td class='item-td'><h1>$name</h1></td>
            </tr>
            <tr>
              <td class='item-td' style='text-align: center; font-size: 14px;'><b>Type:</b> $sw $sa $sav &nbsp;|&nbsp; 
                <b>Temperature:</b> $heat $icy
                $add
              </td>
            </tr>
            <tr>
              <td class='item-td'><br><div class='h2'>Ingredients:</div>$ingredients</td>
            </tr>
            <tr>
              <td class='item-td'><br><div class='h2'>Directions:</div>$directions</td>
            </tr>
            <tr>
              <td class='item-td'><br><div class='h2'>Notes:</div>$notes</td>
            </tr>

            </table>

            <h3> </h3>
            Not what you're looking for? Try another <a href='index.php'>search</a>.";
    } 
  else { 
   $output = "<p>No results were found with that query.</p>"; 
   } 

}
 echo $output;

?>


<?php
include 'footer.php';
?>