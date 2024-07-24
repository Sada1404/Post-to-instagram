<?php
include("Database.php");

$query = "SELECT * FROM offers";
$data = mysqli_query($conn, $query);

if ($data) {
    while ($row = mysqli_fetch_assoc($data)) {
        
        echo '<div class="card" style="     height: 450px;
                                            width: 300px;
                                            background-image: linear-gradient(144deg, #9400ff, #140090 50%, #00ff68);
                                            border-radius: 25px;
                                            padding: 10px;
                                            margin: 35px;
                                            overflow: hidden;">
                                            
                <div class="card__content" style="  height: 100%;
                                                    width: 100%;
                                                    background: #3e4340;
                                                    border-radius: 20px;
                                                    overflow: hidden;
                                                    display: flex;
                                                    flex-direction: column;
                                                    align-items: center;">';

        echo '<h1 style="    position: absolute; z-index: 1; width: 270px; margin: 10px 15px; text-shadow: 3px 3px 4px black;">' . $row['offer_name'] . '</h1>';

        echo '<img src="' . $row['offer_image'] . '" alt="Offer Image" style="  height:100%;
                                                                                display: flex;
                                                                                filter: brightness(0.5);
                                                                                justify-content: center;">';

        echo '<p class="description" style="text-shadow: 3px 3px 4px black;">' . $row['offer_description'] . '</p>';

        echo '</div></div>';
    }
} else {
    echo "No offers found";
}
?>
