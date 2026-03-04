const typeFilter = document.getElementById("type");
const continentFilter = document.getElementById("continent");
const zoekVeld = document.getElementById("zoekInput");
const zoekKnop = document.getElementById("zoekButton");
const sorteerFilter = document.getElementById("sort");

function verwijderAccenten(tekst) {
    return tekst.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
}

function filterBestemmingen() {
    const zoekTekst = zoekVeld.value.toLowerCase();
    const gekozenType = typeFilter.value.toLowerCase();
    const gekozenContinent = continentFilter.value.toLowerCase();
    const sorteerWaarde = sorteerFilter.value;

    const container = document.querySelector(".destinations");
    const links = container.querySelectorAll("a");
    let aantalZichtbaar = 0;

    for (let i = 0; i < links.length; i++) {
        const link = links[i];
        const kaart = link.querySelector(".destination-card");

        const naam = verwijderAccenten(kaart.querySelector("h2").textContent.toLowerCase());
        const land = verwijderAccenten(kaart.querySelector(".land").textContent.toLowerCase());
        const type = verwijderAccenten(kaart.querySelector(".vakantietype").textContent.toLowerCase());
        const continent = verwijderAccenten(kaart.querySelector(".continent").textContent.toLowerCase());

        let toonKaart = true;

        if (zoekTekst != "" && !naam.includes(zoekTekst) && !land.includes(zoekTekst) && !continent.includes(zoekTekst)) {
            toonKaart = false;
        }

        if (gekozenType != "" && !type.includes(gekozenType)) {
            toonKaart = false;
        }

        if (gekozenContinent != "" && !continent.includes(gekozenContinent)) {
            toonKaart = false;
        }

        if (toonKaart) {
            link.style.display = "block";
            aantalZichtbaar++;
        } else {
            link.style.display = "none";
        }
    }

    if (sorteerWaarde == "laag" || sorteerWaarde == "hoog") {
        const linksArray = Array.from(links);

        linksArray.sort(function(a, b) {
            const prijsA = parseFloat(a.querySelector(".prijs").textContent.replace(/[^0-9.]/g, ""));
            const prijsB = parseFloat(b.querySelector(".prijs").textContent.replace(/[^0-9.]/g, ""));
            if (sorteerWaarde == "laag") {
                return prijsA - prijsB;
            } else {
                return prijsB - prijsA;
            }
        });

        for (let i = 0; i < linksArray.length; i++) {
            container.appendChild(linksArray[i]);
        }
    }

    let geenResultaat = document.querySelector(".no-results");

    if (aantalZichtbaar == 0) {
        if (geenResultaat == null) {
            geenResultaat = document.createElement("div");
            geenResultaat.className = "no-results";
            geenResultaat.textContent = "Geen bestemmingen gevonden. Probeer andere filters.";
            container.appendChild(geenResultaat);
        }
        geenResultaat.style.display = "block";
    } else {
        if (geenResultaat != null) {
            geenResultaat.style.display = "none";
        }
    }
}

zoekVeld.addEventListener("input", filterBestemmingen);
typeFilter.addEventListener("change", filterBestemmingen);
continentFilter.addEventListener("change", filterBestemmingen);
sorteerFilter.addEventListener("change", filterBestemmingen);
zoekKnop.addEventListener("click", filterBestemmingen);
