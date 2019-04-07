<?php
//session_start();
require_once "database/connection.php";
if(isset($_POST['continueCheakout'])){
    $firstName=trim($_POST['firstName']);
    $lastName=trim($_POST['lastName']);
    $userName=trim($_POST['userName']);
    $email=trim($_POST['email']);
    $address=trim($_POST['address']);
    $country=$_POST['country'];
    $sql='INSERT INTO users(`first_name`,`last_name`,`username`,`email`,`address`,`country`) VALUES (:first_name,:last_name,:username,:email,:address,:country)';
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(':first_name',$firstName);
    $stmt->bindParam(':last_name',$lastName);
    $stmt->bindParam(':username',$userName);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':address',$address);
    $stmt->bindParam(':country',$country);
    $response=$stmt->execute();
    var_dump($response);die();
}

?>
<?php $title = 'Checkout'; ?>
<?php require_once 'partials/_header.php'; ?>
<main role="main">
    <div class="container">
        <br>
        <p class="text-center">Checkout</p>
        <hr>
<!--======================================your cart============================================-->
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['cart']); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    if(isset($_POST['cheakout'])){
                        foreach ($_SESSION['cart'] as $cartData) {
                        ?>

                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                <h6 class="my-0"><?php echo $cartData['name']; ?></h6>
                                <small class="text-muted">Brief description</small>
                            </div>
                            <span class="text-muted"><?php echo $cartData['total_price']?></span>
                        </li>

                        <?php

                        }
                    }else{
                        header('Location: index.php');
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong><?php echo $total_price=array_sum(array_column($_SESSION['cart'],'total_price'))?></strong>
                    </li>

                </ul>
            </div>
            <!--============================================end your cart=================================-->
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form class="needs-validation" novalidate action="cheakout.php" method="post">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required name="firstName">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required name="lastName">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control" id="username" placeholder="Username" required name="userName">
                            <div class="invalid-feedback" style="width: 100%;">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required name="address">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required name="country">
                                <option value="">Choose...</option>
                                <option selected>Bangladesh</option>
                                <option>America</option>
                                <option>Japan</option>
                                <option>Chine</option>
                                <option>koria</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit" name="continueCheakout">Continue to checkout</button>
                </form>
            </div>
        </div>

    </div>
    <!--container.//-->
</main>

<?php require_once 'partials/_footer.php'; ?>