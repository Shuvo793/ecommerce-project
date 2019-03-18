<?php $title = 'Cart'; ?>
<?php require_once 'partials/_header.php'; ?>

<main role="main">
    <div class="container">
        <br>
        <p class="text-center">Cart</p>
        <hr>

        <div class="row">
            <table class="table table-hover table-bordered">
                <thead>
                <tr>
                    <td>Sl.</td>
                    <td>Product Title</td>
                    <td>Quantity</td>
                    <td>Unit Price</td>
                    <td>Total Price</td>
                    <td>Action</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>Sample Product</td>
                    <td>2</td>
                    <td>1000</td>
                    <td>2000</td>
                    <td>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total Price</td>
                    <td>2000</td>
                    <td>
                        <a href="checkout.php" class="btn btn-success">Checkout</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div> <!-- row.// -->

    </div>
    <!--container.//-->
</main>

<?php require_once 'partials/_footer.php'; ?>