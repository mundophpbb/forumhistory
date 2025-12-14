document.addEventListener('DOMContentLoaded', function() {
    const translations = document.getElementById('forumhistory-translations');
    const yes = translations.dataset.yes;
    const no = translations.dataset.no;
    // Função genérica para toggles
    const toggles = document.querySelectorAll('.toggle-button');
    toggles.forEach(function(toggle) {
        const hiddenId = toggle.id.replace('_toggle', '_hidden');
        const hiddenInput = document.getElementById(hiddenId);
        // Set initial state
        if (parseInt(hiddenInput.value) === 1) {
            toggle.classList.add('active');
            toggle.textContent = yes;
        } else {
            toggle.classList.remove('active');
            toggle.textContent = no;
        }
        toggle.addEventListener('click', function() {
            const currentValue = parseInt(hiddenInput.value);
            hiddenInput.value = currentValue === 1 ? 0 : 1;
            if (hiddenInput.value == 1) {
                this.classList.add('active');
                this.textContent = yes;
            } else {
                this.classList.remove('active');
                this.textContent = no;
            }
        });
    });
});