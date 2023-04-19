<?php
require_once __DIR__ . '/controller.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boolshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css
">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">
        <header class="my-4">
            <h1>Pet Shop Boys</h1>
        </header>

        <?php if (count($errors)) : ?>
            <ul class="list-unstyled">
                <?php foreach ($errors as $error) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($products_model as $product) : ?>
                <div class="col-12 col-md-3  mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $product->get_name(); ?></h3>
                            <h4>ID: <?php echo $product->get_id(); ?></h4>
                            <h4><?php echo $product->get_category()->get_category_info(); ?></h4>
                            <p class="card-text"><?php echo $product->get_description(); ?></p>
                            <?php if (method_exists($product, 'get_ingredients')) : ?>
                                <?php /** @var Food $product */ ?>
                                <p>Ingredients: <?php echo $product->get_ingredients(); ?></p>
                            <?php endif; ?>
                            <?php if (method_exists($product, 'get_expire_date')) : ?>
                                <?php /** @var Food $product */ ?>
                                <p>Expire Date: <?php echo $product->get_expire_date(); ?></p>
                            <?php endif; ?>
                            <p>Price: <?php echo $product->get_price_formatted(); ?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>