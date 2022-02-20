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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <?php
        $wallet_address = "";
        $shirt_size = "";
        $hoodie_size = "";
        $alias = "";
        $shipping_address = "";
        $email = "";
    ?>

    <div class="container">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="card" style="width: 50rem;">
                <div class="card-header"> Redeem Merch</div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                            <label for="wallet_address">Wallet Address</label>       
                            <div class="col-md-12">
                                <input type="text" name="wallet_address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shirt_size">Shirt Size</label>
                            <div class="col-md-12">
                                <input type="text" name="shirt_size" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="hoodie_size">Hoodie Size</label>
                            <div class="col-md-12">
                                <input type="text" name="hoodie_size" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alias">Name / Alias</label>
                            <div class="col-md-12">
                                <input type="text" name="alias" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shipping_address">Shipping Address</label>
                            <div class="col-md-12">
                                <textarea type="textarea" name="shipping_address" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="col-md-12">
                                <input type="text" name="email" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-success mt-3" name="redeem" type="submit"> Redeem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php 
    
    if(isset($_POST['redeem'])) {
    
        include('dbconnect.php');


        $sql = "INSERT INTO orders (wallet_address,shirt_size,hoodie_size,alias,shipping_address,email)
                VALUES ('" . $_POST['wallet_address'] . "',
                '" . $_POST['shirt_size'] . "',
                '" . $_POST['hoodie_size'] . "',
                '" . $_POST['alias'] . "',
                '" . $_POST['shipping_address'] . "',
                '" . $_POST['email'] . "')";

        if ($conn->query($sql)===TRUE) {
      
            echo '<script type="text/javascript">'
            . '$( document ).ready(function() {'
            . '$("#redeemModal").modal("show");'
            . '});'
            . '</script>';
    ?>

        

       <!-- Modal -->
       
        <div class="modal fade" id="redeemModal" tabindex="-1" aria-labelledby="redeemModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header" style="border-bottom:0px">
                <h5 class="modal-title" id="redeemModalLabel">Redeem</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Redeem Successful</h3>
            </div>
            <div class="modal-footer" style="border-top:0px">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                
            </div>
            </div>
        </div>
        </div>

    <?php

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

    
</body>

</html>