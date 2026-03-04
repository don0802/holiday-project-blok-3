<?php
include 'database.php';

$id = $_GET['id'];

$query = "SELECT * FROM destinations WHERE id = $id";
$result = mysqli_query($conn, $query);
$bestemming = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Detailpagina</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1><?php echo $bestemming['naam']; ?></h1>
    <p>Alle details over deze vakantiebestemming</p>
</header>

<main>
    <div class="detail-container">
        <div class="detail-content">
            
            <img src="https://picsum.photos/seed/<?php echo $bestemming['thumbnail_name']; ?>/600/400" class="detail-image">

            <div class="detail-info">
                <h2><?php echo $bestemming['naam']; ?></h2>

                <div class="detail-meta">
                    <span class="detail-badge continent"><?php echo $bestemming['continent']; ?></span>
                    <span class="detail-badge land"><?php echo $bestemming['land']; ?></span>
                    <span class="detail-badge vakantietype"><?php echo $bestemming['vakantietype']; ?></span>
                </div>

                <p class="detail-description"><?php echo $bestemming['beschrijving']; ?></p>

                <div class="detail-footer">
                    <span class="detail-price">€<?php echo $bestemming['prijs']; ?></span>
                    <a href="overzicht.php" class="btn-terug">Terug naar overzicht</a>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
</html>