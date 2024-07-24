<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="Home.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    
    <a href="AddOffer.php">Add New Offer</a>
    <h2>Existing Offers</h2>
    <div class="Offer-container" style="
                                            display: flex;
                                            margin: 20px;
                                            justify-content: center;
                                            flex-wrap: wrap;
                                            align-content: flex-start;
                                        ">
        <?php include("MyOffers.php"); ?>
    </div>
</body>
</html>
