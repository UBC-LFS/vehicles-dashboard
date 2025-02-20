<?php

function get_bookings($query) {

  require "../web/config.inc.php";
  require "../web/sites/vehicles/config.inc.php";

  // Create connection
//  $conn = mysqli_connect($db_host, $db_login, $db_password, $db_database);
  $conn = mysqli_init();

  if (!$conn) {
         die("mysqli_init failed");
  }

  // Set SSL options
  mysqli_ssl_set($conn, $db_options['mysql']['ssl_key'], $db_options['mysql']['ssl_cert'], $db_options['mysql']['ssl_ca'], $db_options['mysql']['ssl_capath'], NULL);

  if (!mysqli_real_connect($conn, $db_host, $db_login, $db_password, $db_database)) {
    die("Connect Error:  " . mysqli_connect_error());
  }

  $result = mysqli_query($conn, $query);

  mysqli_close($conn);

  return $result;

}
?>
