<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "enment";

$connection = new mysqli($servername, $username, $password, $database);

$fullname = "";
$email="";
$address="";
$phone="";
$pass="";


$errorMessage = "";
$successMessage = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $fullname =$_POST['fullname'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    do{
        if(empty($fullname)|| empty($email)|| empty($address)||empty($phone)||empty($pass)){
            $errorMessage = "All the fields are required";
            break;
        }
        //new user
         $sql = "INSERT INTO book(fullname, email, phone, address, pass)" .
           "VALUES('$fullname', '$email' , '$address', '$phone', '$pass')";
         $result = $connection->query($sql);

         if(!$result){
                $errorMessage = "Invalid query: ". $connection->connect_error;
         break;
         }

        $fullname = "";
        $email="";
        $address="";
        $phone="";
        $pass="";

        $successMessage = "User added successfully";

        header("location: /Enment/user.php");
        exit;
    
    } while(false);
    
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container my-5">
        <h2>New User</h2>
        <?php
            if(!empty($errorMessage)){
                echo "
                <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                </div>";
            }
            ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fullname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pass" value="<?php echo $pass; ?>">
                    </div>
            </div>
            
            <?php
            if(!empty($successMessage)){
                echo "
                <div class='row mb-3'>
                        <div class='offset-sm-3 col-sm-6'>
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        </div>
                </div>";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/Enment/user.php" role="button">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>