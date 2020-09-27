<?php

  $xml = new SimpleXMLElement('<form action="validate.php" method="POST"></form>');
  $table = $xml->addChild('table');
  $tr = $table->addChild('tr');
  $td = $tr->addChild('td');
  $td->addChild('label for="fname"','Name:');
  $td = $tr->addChild('td');
  $td->addChild('input type="text" id="name" name="name" value=""');
  
  $tr = $table->addChild('tr');
  $td = $tr->addChild('td');
  $td->addChild('label for="lname"','Username:');
  $td = $tr->addChild('td');
  $td->addChild('input type="text" name="username" value=""');
  
  $tr = $table->addChild('tr');
  $td = $tr->addChild('td');
  $td->addChild('label for="pass1"','Password:');
  $td = $tr->addChild('td');
  $td->addChild('input type="password" name="password" value=""');

  $tr = $table->addChild('tr');
  $td = $tr->addChild('td');
  $td->addChild('label for="email"','Email:');
  $td = $tr->addChild('td');
  $td->addChild('input type="email" id="email" name="email"');

  $tr = $table->addChild('tr');
  $td = $tr->addChild('td');
  $td->addChild('label for="contact"','Contact No:');
  $td = $tr->addChild('td');
  $td->addChild('input type="text" id="number" name="contact"');

  $tr = $table->addChild('tr');
  $td = $tr->addChild('td');
  $td = $tr->addChild('td');
  $td->addChild('input class="submit s3" type="submit" name="submit" value="Submit"');

  $xml->asXML("runxml.php");
  
?>