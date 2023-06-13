<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class = "container my-5">
        <h2>List of Users</h2>
        <a class="btn btn-primary" href="/Enment/create.php" role="button">New User</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php

use LDAP\Result;

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "enment";
                
                $connection = new mysqli($servername, $username, $password, $database);

                if($connection->connect_error){
                    echo "$connection->connect_error";
                    die("Connection Failed : ". $connection->connect_error);
                }
                $sql = "SELECT * FROM signup";
                $result = $connection->query($sql);
                if(!$result){
                    die("Invalid query : ". $connection->connect_error);
                }
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                    <td>$row[Fullname]</td>
                    <td>$row[Email]</td>
                    <td>$row[Address]</td>
                    <td>$row[Phone]</td>
                    <td>$row[Password]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='/Enment/edit.php?email=$row[email]'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='/Enment/delete.php?email=$row[email]'>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>
                
            </tbody>
        </table>

    </div>
</body>
</html>