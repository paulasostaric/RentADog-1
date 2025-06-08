"use strict";

// Filtering functionality for psi.php

document.addEventListener('DOMContentLoaded', () => {
  const sizeFilter = document.getElementById('sizeFilter');
  const ageFilter = document.getElementById('ageFilter');
  const tempFilter = document.getElementById('tempFilter');
  const resetBtn = document.getElementById('resetFilters');
  const dogCards = document.querySelectorAll('#dogsGrid .dog-card');

  function applyFilters() {
    const size = sizeFilter.value;
    const age = ageFilter.value;
    const temp = tempFilter.value;

    dogCards.forEach(card => {
      const matchesSize = !size || card.dataset.size === size;
      const matchesAge = !age || card.dataset.age === age;
      const matchesTemp = !temp || card.dataset.temp === temp;
      card.style.display = matchesSize && matchesAge && matchesTemp ? '' : 'none';
    });
  }

  // Attach filter handlers
  sizeFilter.addEventListener('change', applyFilters);
  ageFilter.addEventListener('change', applyFilters);
  tempFilter.addEventListener('change', applyFilters);

  resetBtn.addEventListener('click', () => {
    sizeFilter.value = '';
    ageFilter.value = '';
    tempFilter.value = '';
    applyFilters();
  });
});
