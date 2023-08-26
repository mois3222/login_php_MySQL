<?php
$user = $_POST['user'];
$email = $_POST['email'];
$status = TRUE;

include('connection.php');
$con = Cconnection::connectionBD();

$sql = "INSERT INTO login_table(user, email, status) VALUES('$user', '$email', $status)";
$sql1 = "SELECT * FROM login_table";

if ($con->query($sql) === TRUE) {
    echo 'NEW record crested successfully';
}


$rta = $con->query($sql1);

if ($rta->num_rows < 0) {
    echo "database empy";
    return;
};


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <?php while ($row = $rta->fetch_assoc()) : ?>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">ID: <?= $row['id'] ?></li>
            <li class="list-group-item">NAME: <?= $row['user'] ?></li>
            <li class="list-group-item">email: <?= $row['email'] ?> </li>
            <li class="list-group-item">status: <?= $row['status'] ?> </li>
        </ul>
    <?php endwhile; ?>
    <?php $con->close(); ?>
</body>

</html>