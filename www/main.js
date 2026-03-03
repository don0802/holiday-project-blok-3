const type = document.getElementById('type');
const continent = document.getElementById('continent');
const zoekInput = document.getElementById('zoekInput');

function filterDestinations() {
    const searchTerm = zoekInput.value.toLowerCase();
    const typeValue = type.value.toLowerCase();
    const continentValue = continent.value.toLowerCase();
    
    let letCount = 0;
    
    document.querySelectorAll('.destination-card').forEach(card => {
        const naam = card.querySelector('h2').textContent.toLowerCase();
        const land = card.querySelector('.land').textContent.toLowerCase();
        const cardType = card.querySelector('.vakantietype').textContent.toLowerCase();
        const cardContinent = card.querySelector('.continent').textContent.toLowerCase();

        const matches = (naam.includes(searchTerm) || land.includes(searchTerm) || cardContinent.includes(searchTerm)) &&
                        (!typeValue || cardType.includes(typeValue)) &&
                        (!continentValue || cardContinent.includes(continentValue));

        card.style.display = matches ? 'block' : 'none';
        if (matches) {
            letCount++;
        }
    });
    
    let geenResulaat = document.querySelector('.no-results');
    
    if (!geenResulaat && letCount === 0) {
        geenResulaat = document.createElement('div');
        geenResulaat.className = 'no-results';
        geenResulaat.textContent = 'Geen bestemmingen gevonden. Probeer andere filters.';
        document.querySelector('.destinations').appendChild(geenResulaat);
    }
    
    if (geenResulaat) {
        geenResulaat.style.display = letCount === 0 ? 'block' : 'none';
    }
}

zoekInput.addEventListener('input', filterDestinations);
type.addEventListener('change', filterDestinations);
continent.addEventListener('change', filterDestinations);
document.getElementById('zoekButton').addEventListener('click', filterDestinations);