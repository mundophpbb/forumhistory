// ForumHistory ACP Custom JS

document.addEventListener('DOMContentLoaded', function() {
  const translations = document.getElementById('forumhistory-translations');
  const yesText = translations.dataset.yes || 'Yes';
  const noText = translations.dataset.no || 'No';

  // Random toggle
  const randomToggle = document.getElementById('forumhistory_random_toggle');
  const randomHidden = document.getElementById('forumhistory_random_hidden');
  if (randomToggle && randomHidden) {
    updateToggleState(randomToggle, randomHidden.value === '1', yesText, noText);
    randomToggle.addEventListener('click', function() {
      const isActive = randomHidden.value === '1';
      randomHidden.value = isActive ? '0' : '1';
      updateToggleState(this, !isActive, yesText, noText);
    });
  }

  function updateToggleState(button, isActive, onText, offText) {
    button.textContent = isActive ? onText : offText;
    if (isActive) {
      button.classList.add('active');
    } else {
      button.classList.remove('active');
    }
  }
});