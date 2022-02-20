<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HEARTBREAK CLUB</title>
  <meta name="description" content="Interactive NFT on Cardano" />
  <meta name="keywords" content="Heartbreak Club, NFT, developer, cardano, studio, team" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body>
  <?php include('dbconnect.php');


  $sql = "INSERT INTO orders (wallet_address,shirt_size,hoodie_size,alias,shipping_address,email)
VALUES ('" . $_POST['wallet_address'] . "',
'" . $_POST['shirt_size'] . "',
'" . $_POST['hoodie_size'] . "',
'" . $_POST['alias'] . "',
'" . $_POST['shipping_address'] . "',
'" . $_POST['email'] . "')";

  if ($conn->query($sql) === TRUE) {
  ?>
    <div class="container">
      <div class="d-flex align-items-center justify-content-center vh-100">
        <h1 class="text-white text-center">New record created successfully</h1>
      </div>
    </div>
  <?php
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
  ?>
</body>

</html>