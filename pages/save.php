<?php include('dbconnect.php');


$sql = "INSERT INTO orders (wallet_address,shirt_size,hoodie_size,alias,shipping_address,email)
VALUES ('". $_POST['wallet_address'] ."',
'". $_POST['shirt_size'] ."',
'". $_POST['hoodie_size'] ."',
'". $_POST['alias'] ."',
'". $_POST['shipping_address'] . "',
'". $_POST['email'] ."')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
