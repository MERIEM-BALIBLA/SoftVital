// script.js

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('personne-btn').addEventListener('click', function () {
        document.getElementById('personne-popup').classList.remove('hidden');
    });
    document.getElementById('personne-close').addEventListener('click', function () {
        document.getElementById('personne-popup').classList.add('hidden');
    });

    document.getElementById('profession-btn').addEventListener('click', function () {
        document.getElementById('profession-popup').classList.remove('hidden');
    });
    document.getElementById('profession-close').addEventListener('click', function () {
        document.getElementById('profession-popup').classList.add('hidden');
    });
});
