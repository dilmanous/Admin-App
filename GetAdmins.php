<?php

  // Create DB connection
  include 'config.php';
  $conn = new mysqli("localhost", DB_USERNAME, DB_PASSWORD, MYSQL_DB);
  // Check connection
  if ($conn->connect_error) {
      die("<br>Connection failed: " . $conn->connect_error);
  }
  $sqlLookup="
   SELECT * FROM admin";
  $lookupResult = $conn->query($sqlLookup);
  // If patientId doesn't already exist , Register the patient
  $json = array();
  if (!$lookupResult)
  {
  	if ($conn->connect_error) {
  	    die("<br>Connection failed: " . $conn->query_error);
  	}
  } else
  {
    if ($lookupResult->num_rows===0) { echo 'NoAdminFound';}
    else
    {
      while($row = $lookupResult->fetch_assoc())
        {
            $json[] = $row;
        }
        echo json_encode($json);
    }
  }
  $conn->close();
?>
