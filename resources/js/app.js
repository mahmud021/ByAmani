import 'preline';

document.addEventListener('DOMContentLoaded', () => {
    window.HSStaticMethods.autoInit(); // Add this
});

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();
