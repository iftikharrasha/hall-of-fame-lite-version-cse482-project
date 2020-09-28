<?php

  function conectionStart()
  {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "halloffame";

    $connection = mysqli_connect($servername, $username, $password, $dbname);

    return $connection;
  }

  function conectionEnd($value)
  {
    mysqli_close($value);
  }


  function fetch($value='')
  {
    $connection = conectionStart();
    $postNo = 1;
    $sql = "SELECT * FROM user WHERE username LIKE '%".$value."%' OR fullname LIKE '%".$value."%' OR email LIKE '%".$value."%' OR phone LIKE '%".$value."%' OR date_time LIKE '%".$value."%'";
    $result = mysqli_query($connection, $sql);

    if($result) {
      while ($row = mysqlI_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$postNo."</td>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fullname']."</td>";
        echo "<td>".$row['username']."</td>";
	    	echo "<td>".$row['email']."</td>";
	    	echo "<td>".$row['phone']."</td>";
        echo "</tr>";

        $postNo++;
      }

    } else {
      echo "Error :".$sql."<br>".mysqli_error($connection);
    }

    conectionEnd($connection);
  }


  if (isset($_GET['search'])) {
    fetch($_GET['search']);
  }

 ?>
