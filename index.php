<?php
include 'includes/database.php';
include 'includes/queries.php';
include 'includes/login.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vehicle Booking Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="300">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
<body>

<?php
if (!is_admin($attributes['urn:mace:dir:attribute-def:cwlLoginName'][0], $auth['saml']['admin']['urn:mace:dir:attribute-def:cwlLoginName'])) {
  print("<h1>Admin users only</h1>");
  exit();
}
?>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
        <img src="./images/ubc-logo-2018-crest-blue-rgb72.jpg" width="30" height="36">
        LFS Vehicles Booking Dashboard
        </a>
    </div>
</nav>


<?php
  $result = get_bookings($pending_q);
  $row = $result->fetch_assoc();
?>

<div class="pt-1">
<div class="col-md-8 offset-md-2">
  <h2>Pending:</h2>
  <p>There are <a href="../web/pending.php?site=vehicles"><?php echo $row['cnt']; ?></a> requests for review.
</div>
</div>

<?php
foreach($query as $k => $v) {
?>

<div class="pt-1">
<div class="col-md-8 offset-md-2">

<?php
  print "<h2>$k</h2>"; 
  $result = get_bookings($v);

  if ($result->num_rows > 0) {
?>
  
    <table class='table table-striped'>
    <thead>
    <tr>
    <th scope='col'>Date/Time</th>
    <th scope='col'>Item</th>
    <th scope='col'>Notes</th>
    <th scope='col'>Email</th>
    <th scope='col'>Picked Up</th>
    </tr>
    </thead>
    <tbody>
  
<?php
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>
  
      <tr>
      <td><?php echo $row['date_time']; ?></td>
      <td><?php echo $row['room_name']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['user_email']; ?></td>
      <td><input type="checkbox" id="<?php echo $row['id']; ?>"
           name="<?php echo $row['id']; ?>" />
      </td>
      </tr>
  
<?php
    }
?>
  
    </tbody>
    </table>
  
<?php
  } else {
    
      echo "<p>There are no bookings.";
  
  }
?>
 
</div>
</div>

<?php
}  // end foreach
?>

</body>
</html>
