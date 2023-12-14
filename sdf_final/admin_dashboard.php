<?php
include "dbcon.php";

$sql = "SELECT * FROM tb_admin";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Close the database connection
$conn->close();

?>

<!doctype html>
<html lang="en">
 <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

   <title>| Welcome |</title>
 </head>
 <body>

   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Welcome to the Dashboard!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex ms-auto" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
   		<input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
   		<button class="btn btn-outline-success" type="submit">Search</button>
	</form>
		<a class="nav-link ms-2" href="profile.php">Profile</a>
        <a class="nav-link ms-2" href="logout.php">Log Out</a>
      </div>
    </div>
   </nav>

   <?php
include "dbcon.php";

$sql = "SELECT * FROM tb_reglog";
$result = $conn->query($sql);

$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    ?>

   </header><br><br>
   <table align = "center" border = "1" cellpadding = "3" cellspacing = "0">
   <center><h1>Account User</h1><br>
   		<tr>
   			<th>ID</th>
   			<th>Username</th>
            <th>Edit User</th>
            </tr>

                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                </tr>
                <?php endforeach; ?> 
<?php
    }
  }
  $conn->close();
  ?>
 

</tbody>
</table>

</body>
</html>
   

