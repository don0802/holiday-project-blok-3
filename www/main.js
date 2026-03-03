document.getElementById('zoekButton').addEventListener('click', function() {
    const zoekInput = document.getElementById('zoekInput').value.toLowerCase();
    const destinations = document.querySelectorAll('.destination');

    destinations.forEach(destination => {
        const naam = destination.querySelector('h2').textContent.toLowerCase();
        if (naam.includes(zoekInput)) {
            destination.style.display = 'block';
        } else {
            destination.style.display = 'none';
        }
    });
});