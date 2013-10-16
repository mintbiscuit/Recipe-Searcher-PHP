<?php
include 'header.php';
?>


    <form action="page2.php" method="post">

      <b>What do you have a taste for?</b>

      <br><br>

    <div id="pretty"> <!-- because everyone loves pretty options -->
      <label>
          <input type="checkbox" name="sweet" value="$sweet"><span><img src="images/small_ic.png">&nbsp; Sweet</span>
      </label>
      &nbsp;&nbsp;&nbsp;
      <label>
          <input type="checkbox" name="salt" value="$salt"><span><img src="images/saltshaker.png">&nbsp; Salty</span>
      </label>
      &nbsp;&nbsp;&nbsp;
      <label>
          <input type="checkbox" name="savory" value="$savory"><span><img src="images/fishy.png">&nbsp; Savory</span>
      </label>
    </div>

      <br><br>

      <b>How about temperature?</b>

      <br><br>
      
      <div id="temp">
      <label>
          <input type="checkbox" value="1" name="hot" value="$hot"><span><img src="images/fire.png">&nbsp; Hot</span>
      </label>
      &nbsp;&nbsp;&nbsp;&nbsp; 
      <label>
          <input type="checkbox" name="cold" value="$cold"><span><img src="images/snowflake.png">&nbsp; Cold</span>
      </label>
    </div>

      <br><br>

      <b>Any other concerns?</b>

      <br><br>

      <input type="checkbox" id="Test1" name="Test1"><label for="Test1"><span></span>Gluten-Free</label>&nbsp;&nbsp; 
      <input type="checkbox" id="Test2" name="test2"><label for="Test2"><span></span>Sugar-Free</label>&nbsp;&nbsp; 
      <input type="checkbox" id="Test3" name="test3"><label for="Test3"><span></span>Dairy-Free</label>


      <p>

      <input type="submit" id="submit" value="Find Recipes!">
    </form>

<?php
include 'footer.php';
?>