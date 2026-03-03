const type = document.getElementById('type');
const continent = document.getElementById('continent');
const zoekInput = document.getElementById('zoekInput');

function filterDestinations() {
    const searchTerm = zoekInput.value.toLowerCase();
    const typeValue = type.value.toLowerCase();
    const continentValue = continent.value.toLowerCase();
    
    let visibleCount = 0;
    
    document.querySelectorAll('.destination-card').forEach(card => {
        const naam = card.querySelector('h2').textContent.toLowerCase();
        const land = card.querySelector('.land').textContent.toLowerCase();
        const cardType = card.querySelector('.vakantietype').textContent.toLowerCase();
        const cardContinent = card.querySelector('.continent').textContent.toLowerCase();

        const matches = (naam.includes(searchTerm) || cardrdContinent.includes(searchTerm) || land.includes(searchTerm)) &&
                        (!typeValue || cardType.includes(typeValue)) &&
                        (!continentValue || cardContinent.includes(continentValue));

        card.style.display = matches ? 'block' : 'none';
        if (matches) {
            visibleCount++;
        }
    });
    
    let noResults = document.querySelector('.no-results');
    if (visibleCount === 0) {
        if (!noResults) {
            noResults = document.createElement('div');
            noResults.className = 'no-results';
            noResults.textContent = 'Geen bestemmingen gevonden. Probeer andere filters.';
            document.querySelector('.destinations').appendChild(noResults);
        }
        noResults.style.display = 'block';
    } else if (noResults) {
        noResults.style.display = 'none';
    }
}

[zoekInput, type, continent, document.getElementById('zoekButton')].forEach(element => 
    element.addEventListener(element === zoekInput ? 'input' : 'change', filterDestinations)
);