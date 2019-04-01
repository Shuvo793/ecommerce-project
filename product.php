<?php
require_once 'database/connection.php';
$id=(int)$_GET['id'];
if($id===0){
    header('Location: index.php');
}

$query='SELECT id,name,image,price From products WHERE id=:id';
$stmt=$connection->prepare($query);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();
$products=$stmt->fetch();

?>



<?php $title = 'Product';
require_once 'partials/_header.php';
?>

<main role="main">
    <div class="container">
        <br>
        <p class="text-center"><?php echo $products['name'];?> </p>
        <hr>

        <div class="card">
            <div class="row">
                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div>
                            <img src="<?php echo $products['image'];?>" class="card-img-top" alt="">
                        </div> <!-- slider-product.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>

                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3"><?php echo $products['name'];?></h3>

                        <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span class="currency">BDT </span>
                                <span class="num">
                                    <?php echo  $products['price']; ?>
                                </span>
                            </span>
                        </p> <!-- price-detail-wrap .// -->

                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electroni</p></dd>
                        </dl>
                        <hr>


                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->

    </div>
    <!--container.//-->
</main>

<?php require_once 'partials/_footer.php'; ?>