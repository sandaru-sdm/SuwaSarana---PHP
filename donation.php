<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<?php

include "connection.php";

if (isset($_SESSION["suwasarana"]["name"])) {
?>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Suwasarana | Welfare</title>
        <link rel="icon" href="images/img/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="css/funchy.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </head>

    <body>

        <div class="content-wrapper header">
            <!-- Main content -->
            <section class="content mb-5">
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6 mx-auto">
                            <!-- general form elements -->
                            <div class="card card-primary mb-5">
                                <div class="card-header bg-primary">
                                    <h3 class="card-title">Donation</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body col-12">
                                    <div class="row d-flex container-fluid justify-content-center align-content-center">

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Name</label>
                                            <input type="text" class="form-control" id="name" name="c_name" value="<?php echo $_SESSION["suwasarana"]["name"]; ?>" required disabled />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Mobile</label>
                                            <input type="number" class="form-control" id="ph" name="phone" pattern="\d{10}" maxlength="10" required value="<?php echo $_SESSION["suwasarana"]["mobile"]; ?>" disabled />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Description</label>
                                            <input type="text" class="form-control" name="product_name" value="<?php echo $_SESSION["suwasarana"]["description"]; ?>" disabled required />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Price</label>
                                            <input type="text" class="form-control" name="price" value="<?php echo $_SESSION["suwasarana"]["price"]; ?>" required disabled />
                                        </div>

                                        <input type="hidden" name="amount" value="<?php echo $_SESSION["suwasarana"]["price"]; ?>" />
                                        <input type="hidden" name="product_name" value="<?php echo $_SESSION["suwasarana"]["description"]; ?>" />

                                        <br>

                                        <div class="form-group col-12 text-center">

                                            <button class="btn btn-success m-4 col-3" type="submit" id="payhere-payment">PayHere Pay</button>
                                        </div>


                                    </div>
                                </div>
                                <!-- /.card-body -->


                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <script>
            $('#ph').on('keypress', function() {
                var text = $(this).val().length;
                if (text > 10) {
                    return false;
                } else {
                    $('#ph').text($(this).val());
                }

            });
        </script>

        <script src="../js/script.js"></script>


    </body>

    <script>
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            window.location = "success.php";
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
            window.location = "error.php";
        };

        // Error occurred
        payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
            "sandbox": true,
            "merchant_id": "1221564", // Replace your Merchant ID
            "return_url": "http://localhost/SuwaSaranaNew/success.php", // Important
            "cancel_url": "http://localhost/SuwaSaranaNew/Error.php", // Important
            "notify_url": "http://sample.com/notify",
            "order_id": "ItemNo12345",
            "items": "<?php echo $_SESSION["suwasarana"]["description"]; ?>",
            "amount": "<?php echo $_SESSION["suwasarana"]["price"]; ?>.00",
            "currency": "LKR",
            "first_name": "<?php echo $_SESSION["suwasarana"]["name"]; ?>",
            "last_name": "",
            "email": "",
            "phone": "<?php echo $_SESSION["suwasarana"]["mobile"]; ?>",
            "address": "",
            "city": "",
            "country": "",
            "delivery_address": "",
            "delivery_city": "",
            "delivery_country": "",
            "custom_1": "",
            "custom_2": ""
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        document.getElementById('payhere-payment').onclick = function(e) {
            payhere.startPayment(payment);
        };
    </script>

</html>

<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>