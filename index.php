<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=scandiweb_products','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM scandiweb_products ORDER BY id');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($products);
// echo '</pre>';

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>Product List</title>
  </head>
  <body>
    <h1>Product List</h1>
    <button type="button" class="btn btn-primary">ADD</button>
    <button type="button" id="#delete-product-btn" class="btn btn-danger">MASS DELETE</button>
    <hr>
        <div class="container">
            <div class="row">
                <div class="col">
                Column
                </div>
                <div class="col">
                Column
                </div>
                <div class="col">
                Column
                </div>
                <div class="col">
                Column
                </div>
            </div>
        </div>
        <hr>
      <footer id="footer">Scandiweb Test Assignment</footer>
  </body>
</html>
