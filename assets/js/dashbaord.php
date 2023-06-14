<?php
function animateCount(elementId, targetValue, duration) {
    const element = document.getElementById(elementId);
    const startValue = 0;
    const range = targetValue - startValue;
    const startTime = performance.now();

    function updateCount(currentTime) {
        const elapsedTime = currentTime - startTime;
        if (elapsedTime >= duration) {
            element.textContent = targetValue;
        } else {
            const progress = elapsedTime / duration;
            const currentValue = Math.floor(progress * range + startValue);
            element.textContent = currentValue;
            requestAnimationFrame(updateCount);
        }
    }

    requestAnimationFrame(updateCount);
}

// Déclencher les animations de décompte au chargement de la page
window.addEventListener('DOMContentLoaded', function() {
    animateCount('clientsCount', <?= $nombreClients ?>,1000000);
    animateCount('ventesCount', <?= $nombreVente?>, 1500);
    animateCount('commandesCount', 78, 1500);
});

?>