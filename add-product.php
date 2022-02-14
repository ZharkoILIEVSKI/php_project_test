<?php 
// phpinfo();
?>



<!DOCTYPE html>
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
 <form action="" method="POST" id="#product_form">
  <h1>Product Add</h1>
    <input type="submit" class="btn btn-primary" value="Save">
    <a href="index.php" id="#delete-product-btn" class="btn btn-danger">Cancel</a>
<hr>

  <div class="row" id="row_sku">
    <div class="col" id="SKU_label">
    <label for="inputSKU" class="col-sm-2 col-form-label">SKU</label>
    </div>
    <div class="col" id="SKU_input">
    <input type="text" class="form-control" name="sku" id="#sku" maxlength="9" size="9">
    </div>
  </div>

  <br>

  <div class="row" id="row_sku">
    <div class="col" id="SKU_label">
    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
    </div>
    <div class="col" id="SKU_input">
    <input type="text" class="form-control" name="name" id="#name" maxlength="30" size="30">
    </div>
  </div>

  <br>

  <div class="row" id="row_sku">
    <div class="col" id="SKU_label">
    <label for="inputPrice" class="col-sm-2 col-form-label">Price($)</label>
    </div>
    <div class="col" id="SKU_input">
    <input type="number" class="form-control" name="price" id="#price" maxlength="6" size="6">
    </div>
  </div>

  <br>
  <br>
  <br>
  
  <div>
    <div id="typeSwitcher_label">
      Type Switcher
    </div>
    <div id="productType">
      <select>  
        <option onclick="typeSwitcher()" value="Select">Type Switcher</option>}  
        <option id="dvd" onclick="inputDVDsize()" value="DVD">DVD</option>  
        <option id="Book" onclick="inputBooksize()"  value="Book">Book</option>  
        <option id="Furniture"  onclick="inputFurnituresize()" value="Furniture">Furniture</option>  
      </select>
    </div>  
  </div>
<br>


<div id="empty"></div>

<script>
  function typeSwitcher() {
  let x = document.getElementById('empty');
  x.innerHTML="";
  }
</script>


<script>
  function inputDVDsize() {
  let x = document.getElementById('empty');
  x.innerHTML='<p id="labelSizeDVD">Size (MB)</p>'+'<input type="number" name="size" class="form-control" id="size" maxlength="6" size="6">';
  }
</script>

<script>
  function inputBooksize() {
  let x = document.getElementById('empty');
  x.innerHTML='<p id="labelSizeDVD">Weight (kg)</p>'+'<input type="number" name="weight" class="form-control" id="weight" maxlength="6" size="6">';
  }
</script>

<script>
  function inputFurnituresize() {
  let x = document.getElementById('empty');
  x.innerHTML='<p id="labelSizeDVD">Height (cm)</p>'+'<input type="number" name="height" class="form-control" id="height" maxlength="6" size="6">'+'<br>'+'<br>'+'<p id="labelSizeDVD">Width (cm)</p>'+'<input type="number" name="width" class="form-control" id="width" maxlength="6" size="6">'+'<br>'+'<br>'+'<p id="labelSizeDVD">Lenght (cm)</p>'+'<input type="number" name="lenght" class="form-control" id="lenght" maxlength="6" size="6">'  ;
  }
</script>

  <br>
 
 </form>
 <br>
 <hr id="fooline">
<footer id="footer">Scandiweb Test Assignment</footer> 
</body>
</html>

<?php


$my_connection = new PDO('mysql:host=localhost;port=3306;dbname=scandiweb_products','root','');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$servername = "localhost";
$database = "scandiweb_products"; 
$username = "root";
$password = "";
$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];



try { 
  $my_connection = new PDO($sql, $username, $password, $dsn_Options);
  echo "Connected successfully";
} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}

echo '<pre>';
var_dump($_POST);
echo '</pre>';
// echo $_SERVER["REQUEST_METHOD"].'<br>';

$id = $_POST['id'];
$sku = $_POST['sku'];
$name1 = $_POST['name'];
$price = $_POST['price'];
$size = $_POST['size']; 
$weight1 = $_POST['weight'];
$height = $_POST['height'];
$width = $_POST['width'];
$lenght = $_POST['lenght'];

$my_Statement = $my_connection->prepare("INSERT INTO scandiweb_products TABLE scandiweb_products( id, sku, name1, price, size, weight1, height, width, lenght) VALUES ( :id, :sku, :name1, :price, :size, :weight1, :height, :width, :lenght)");



// echo '<pre>';
// var_dump($my_Statement);
// echo '</pre>';

$my_Statement->bindParam(':id',$id);
$my_Statement->bindParam(':sku',$sku);
$my_Statement->bindParam(':name',$name1);
$my_Statement->bindParam(':price',$price);
$my_Statement->bindParam(':size',$size);
$my_Statement->bindParam(':weight',$weight1);
$my_Statement->bindParam(':height',$height);
$my_Statement->bindParam(':width',$width);
$my_Statement->bindParam(':lenght',$lenght);

$my_Statement->execute();

// if ($my_Statement->execute()) {
//   echo "New record created successfully";
// } else {
//   echo "Unable to create record";
// }
// echo $s = $my_Statement->errorCode(); 

// echo '<pre>';
// var_dump($my_Statement);
// echo '</pre>';



?>

