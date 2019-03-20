<?php
$title="register";
require_once "../database/connection.php";

$message=false;
if(isset($_POST['register'])){
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim(strtolower($_POST['email']));
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    if(!empty($_FILES['files']['tmp_name'])){
        $name=$_FILES['files']['name'];
        $file_parts=explode('.',$name);
        $last_parts=end($file_parts);
        $new_file_name = uniqid('PPI_',true).time().'.'.$last_parts;
        move_uploaded_file($_FILES['files']['tmp_name'],'photo/uploads/profile_photos/'.$new_file_name);
    }

    $sql = 'INSERT INTO `admin-register` (`first_name`,`last_name`,`email`,`password`,`files`) VALUES (:first_name,:last_name,:email,:password,:files)';
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(':first_name',$firstName);
    $stmt->bindParam(':last_name',$lastName);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':files',$new_file_name);
    $response=$stmt->execute();
    if($response){
        $message="success";
    }else{
        $message='unsucess';
    }

}
require_once '../partials/_header.php'; ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card mt-lg-5 mb-lg-5">
                <div class="card-body">
                    <?php if ($message): ?>
                        <div class="alert alert-success">
                            <?php echo $message; ?>
                        </div>
                    <?php endif ; ?>
                    <form class="form-signin" method="post" enctype="multipart/form-data">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Admin Register</h1>
                        <label for="firstName" class="lead">First Name :</label>
                        <input type="text" id="firstName" class="form-control" placeholder="First Name" name="first_name" required autofocus>
                        <label for="lastName" class="lead">Last Name :</label>
                        <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="last_name" required autofocus>
                        <label for="inputEmail" class="lead">Email address :</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                        <label for="inputPassword" class="lead">Password :</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                        <label for="uploadFile" class="lead">Upload file :</label>
                        <input type="file" id="uploadFile" class="form-control" name="files" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>
                        <p class="mt-2 mb-2 text-muted">&copy; 2017-2019</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once '../partials/_footer.php'; ?>

