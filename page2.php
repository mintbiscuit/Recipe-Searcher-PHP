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
    //echo "We connected!";

    // Set "Sweet"
      if (isset($_POST['sweet'])) {
        $sweet = 1;
      } else {
        $sweet = 0;
      }
    // Set "Salty"
      if (isset($_POST['salt'])) {
        $salt = 1;
      } else {
        $salt = 0;
      }
    // Set "Savory"
      if (isset($_POST['savory'])) {
        $savory = 1;
      } else {
        $savory = 0;
      }


    // Set Hot
      if (isset($_POST['hot'])) {
        $hot = 1;
      } else {
        $hot = 0;
      }

    // Set Cold
      if (isset($_POST['cold'])) {
        $cold = 1;
      } else {
        $cold = 0;
      }
            

        // if Hot/Cold aren't selected
    if ($hot == 0 AND $cold == 0) {
      $result = mysql_query("SELECT * FROM Recipe WHERE (Sweet=$sweet AND Salty=$salt AND Savory=$savory)");
    }
        // if sweetsaltsavory aren't selected, but Hot/Cold are
    elseif (($sweet == 0 AND $salt == 0 AND $savory == 0) AND ($hot != 0 OR $cold != 0)) {
      $result = mysql_query("SELECT * FROM Recipe WHERE Hot=$hot AND Cold=$cold");
    }
    else{
     $result = mysql_query("SELECT * FROM Recipe WHERE (Sweet=$sweet AND Salty=$salt AND Savory=$savory) AND (Hot=$hot AND Cold=$cold)");
    }

    if(mysql_num_rows($result)==0){
    // If there are no recipes for the query
      echo "I'm sorry, it looks like there aren't any recipes with those options.
            <br><br> Please <a href='/Recipes/Test.php'>go back</a> and try again.
        <div style='height:200px'>&nbsp;</div>";
    }
    else {
    echo "Here are a few recipes that match your options!<br><br>
          <table align='center'>
            <tr>
            <th>Recipe</th>
            <th>Description</th>
            </tr>";

            while($row = mysql_fetch_array($result))
              {
              echo "<tr>";
              echo "<td>
                    <a href='page3.php?id=" . $row['RecipeID'] . "'>" . $row['RecipeName'] . "</a> </td>";
              echo "<td>" . $row['ShortDesc'] . "</td>";
              echo "</tr>";
              }
    echo "</table>";
    echo "<br><br><b>Don't like any of these options? Feel free to <a href='index.php'>go back</a> and try again!";
  }

      mysql_close($connect);

  ?>

      <br><br>


<?php
include 'footer.php';
?>