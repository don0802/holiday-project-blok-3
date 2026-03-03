<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Overzicht</title>
</head>

<body>
    <header>
        <nav>
            <h1>Vakantiebestemmingen</h1>
            <p>Ontdek de mooiste vakantieplekken ter wereld</p>
        </nav>
    </header>

    <main>
        <section class="filters">
            <div class="filter-groep">
                <label for="continent">Continent:</label>
                <select name="continent" id="continent">
                    <option value="">Selecteer continent</option>
                    <option value="europa">Europa</option>
                    <option value="azie">Azië</option>
                    <option value="afrika">Afrika</option>
                    <option value="noord-amerika">Noord-Amerika</option>
                    <option value="zuid-amerika">Zuid-Amerika</option>
                    <option value="oceanie">Oceanië</option>
                </select>
            </div>

            <div class="filter-groep">
                <label for="type">Type vakantie:</label>
                <select name="type" id="type">
                    <option value="">Selecteer type</option>
                    <option value="zon">Zonvakantie</option>
                    <option value="stedentrip">Stedentrip</option>
                    <option value="natuur">Natuur</option>
                    <option value="cultuur">Cultuur</option>
                </select>
            </div>

            <div class="filter-groep">
                <label for="zoek">Zoeken:</label>
                <input id="zoek" type="text" placeholder="Bijv. Spanje, Barcelona...">
            </div>
        </section>

        <button class="search-button" id="zoekButton">Zoeken</button><br><br>

        <section class="destinations">
            <?php foreach ($destinations as $destination): ?>
                <article class="destination-card">
                    <img src="https://picsum.photos/seed/<?php echo $destination['thumbnail_name']; ?>/300/200"
                        alt="afbeelding van <?php echo $destination['naam']; ?>">
                    <div class="destination-card-content">
                        <h2><?php echo $destination['naam']; ?></h2>
                        <p><?php echo $destination['beschrijving']; ?></p>
                        <div class="meta">
                            <span class="continent"><?php echo $destination['continent']; ?></span>
                            <span class="vakantietype"><?php echo $destination['vakantietype']; ?></span>
                            <span class="prijs">€<?php echo $destination['prijs']; ?></span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>
    <script src="main.js"></script>
</body>

</html>