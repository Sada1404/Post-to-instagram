<?php
include("Database.php");
include("InstagramController.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offer_name = $_POST['offer_name'];
    $offer_image = $_POST['offer_image'];
    $offer_description = $_POST['offer_description'];

    $query = "INSERT INTO offers (offer_name, offer_image, offer_description) VALUES ('$offer_name', '$offer_image', '$offer_description')";
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Offer Added";

        // Post to Instagram
        $caption = "Here is our new offer {$offer_name}, {$offer_description}";
        postToInstagram($offer_image, $caption);
    } else {
        echo "Failed to Add Offer";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Offer</title>
    <link rel="stylesheet" type="text/css" href="Home.css">
    <script>
        function previewImage() {
            var url = document.getElementById("offer_image").value;
            document.getElementById("image_preview").src = url;
        }
    </script>
</head>
<body>
    <h1>New Offer</h1>
        <div id="form-ui">
            <form action="AddOffer.php" method="POST" enctype="multipart/form-data" id="form">
            <div id="form-body">
                <div id="welcome-lines">
                <div id="welcome-line-1">Add New Offer</div>
                <div id="welcome-line-2">Add Details...<div style="width: 200px;"><img id="image_preview" src="" alt="Image Preview"></div></div>
                </div>
                <div id="input-area">
                    
                    <div class="form-inp" style="width: 200px;">
                        <label for="offer_name">Offer Name:</label>
                        <input placeholder="Enter Offer Name" id="offer_name" type="text" name="offer_name" required>
                    </div>
                    <div class="form-inp" style="width: 530px;">
                        <label for="offer_image">Offer Image:</label>
                        <input placeholder="Enter Image URL" id="offer_image" type="url" name="offer_image" required oninput="previewImage()">
                    </div>
                    <div class="form-inp" style="width: 530px;">
                        <label for="offer_description">Offer Description:</label>
                        <textarea placeholder="Enter Offer Description" id="offer_description" name="offer_description" required></textarea>
                    </div>
                </div>
                <div id="submit-button-cvr">
                    <button id="submit-button" type="submit" value="Register" name="register">Save Offer</button>
                </div>
            </div>
        </form>
    </div>
  





</body>
</html>
