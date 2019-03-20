<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location: dashboard.php');
}
$title="Admin Login";
$message=false;
$type="success";
if(isset($_POST['login'])){
    $email=strtolower(trim($_POST['email']));
    $password=trim($_POST['password']);
    require_once '../database/connection.php';
    $sql='SELECT `id`,`email`,`password`,`role` FROM `admin-register` WHERE email=:email';
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    $user=$stmt->fetch();
    if($user){
        if(password_verify($password,$user['password'])===true){
            $_SESSION['id']=$user['id'];
            $_SESSION['email']=$user['email'];
            $_SESSION['role']=$user['role'];
            header('Location:dashboard.php');
        }else{
            $message='Undefined user';
            $type = 'danger';
        }

    }else{
        $message ='user not found';
        $type = 'danger';

    }
}
require_once "../partials/_header.php"?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">
            <div class="card mt-lg-5 mb-lg-5">
                <div class="card-body">
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo $type;?>">
                            <?php echo $message; ?>
                        </div>
                    <?php endif ; ?>
                    <form class="form-signin" method="post" enctype="multipart/form-data">
                        <h1 class="h3 mb-3 font-weight-normal text-center">Admin Login</h1>
                        <label for="inputEmail" class="lead">Email address :</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                        <label for="inputPassword" class="lead">Password :</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
                        <p class="mt-2 mb-2 text-muted">&copy; 2017-2019</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "../partials/_footer.php"?>

