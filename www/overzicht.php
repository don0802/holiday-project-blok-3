<?php
include 'database.php';

$query = "SELECT * FROM destinations";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Overzicht</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Vakantiebestemmingen</h1>
    <p>Ontdek de mooiste vakantieplekken ter wereld</p>
</header>

<main>
    <div class="filters">
        <div class="filter-groep">
            <label>Continent:</label>
            <select id="continent">
                <option value="">Alle continenten</option>
                <option value="europa">Europa</option>
                <option value="azie">Azië</option>
                <option value="afrika">Afrika</option>
                <option value="amerika">Amerika</option>
                <option value="oceanie">Oceanië</option>
            </select>
        </div>

        <div class="filter-groep">
            <label>Type vakantie:</label>
            <select id="type">
                <option value="">Alle types</option>
                <option value="strand">Strand</option>
                <option value="stad">Stad</option>
                <option value="natuur">Natuur</option>
                <option value="cultuur">Cultuur</option>
                <option value="rondreis">Rondreis</option>
            </select>
        </div>

        <div class="filter-groep">
            <label>Zoeken:</label>
            <input type="text" id="zoekInput" placeholder="Zoek bestemming...">
        </div>

        <div class="filter-groep">
            <label>Sorteren:</label>
            <select id="sort">
                <option value="">Geen sortering</option>
                <option value="laag">Prijs laag naar hoog</option>
                <option value="hoog">Prijs hoog naar laag</option>
            </select>
        </div>
    </div>

    <button id="zoekButton" style="display: none;">Zoeken</button>

    <div class="destinations">
        <?php while ($bestemming = mysqli_fetch_assoc($result)) { ?>
            <a class="id" href="detailpagina.php?id=<?php echo $bestemming['id']; ?>">
                <div class="destination-card">
                    <img src="https://picsum.photos/seed/<?php echo $bestemming['thumbnail_name']; ?>/300/200">
                    <div class="destination-card-content">
                        <h2><?php echo $bestemming['naam']; ?></h2>
                        <p><?php echo $bestemming['beschrijving']; ?></p>
                        <div class="meta">
                            <span class="continent"><?php echo $bestemming['continent']; ?></span>
                            <span class="land"><?php echo $bestemming['land']; ?></span>
                            <span class="vakantietype"><?php echo $bestemming['vakantietype']; ?></span>
                            <span class="prijs">€<?php echo $bestemming['prijs']; ?></span>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
    </div>
</main>

<script src="main.js"></script>
</body>
</html>