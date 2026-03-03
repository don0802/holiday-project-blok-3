<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht</title>
</head>
<body>
    <header>
        <h1>Overzicht</h1>
        <p>Welkom op de overzichtspagina!</p>
    </header>

    <main>
        <section>
            <div>
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

            <div>
                <label for="type">Type vakantie:</label>
                <select name="type" id="type">
                    <option value="">Selecteer type</option>
                    <option value="zon">Zonvakantie</option>
                    <option value="stedentrip">Stedentrip</option>
                    <option value="natuur">Natuur</option>
                    <option value="cultuur">Cultuur</option>
                </select>
            </div>

            <div>
                <label for="zoek">Zoek:</label>
                <input id="zoek" type="text" placeholder="Bijv. Spanje, Duitsland, Bangkok..."><br>
                <button type="button" id="zoekButton">Zoek</button>
            </div>
        </section>
    </main>
</body>
</html>