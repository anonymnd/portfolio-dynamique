(() => {
    const toggle = document.querySelector('[data-menu-toggle]');
    const sidebar = document.querySelector('.studio-sidebar');
    function closeMenu() { document.body.classList.remove('menu-open'); toggle?.setAttribute('aria-expanded', 'false'); }
    toggle?.addEventListener('click', () => {
        const open = document.body.classList.toggle('menu-open');
        toggle.setAttribute('aria-expanded', String(open));
        if (open) sidebar.querySelector('a')?.focus();
    });
    document.addEventListener('keydown', event => { if (event.key === 'Escape' && document.body.classList.contains('menu-open')) { closeMenu(); toggle.focus(); } });
    document.addEventListener('click', event => { if (document.body.classList.contains('menu-open') && !sidebar.contains(event.target) && !toggle.contains(event.target)) closeMenu(); });
    document.querySelectorAll('[data-template-filter]').forEach(button => button.addEventListener('click', () => {
        const category = button.dataset.templateFilter;
        document.querySelectorAll('[data-template-filter]').forEach(chip => { const active = chip === button; chip.classList.toggle('is-active',active); chip.setAttribute('aria-pressed',String(active)); });
        document.querySelectorAll('[data-template-category]').forEach(card => { card.hidden = category !== 'all' && card.dataset.templateCategory !== category; });
        const count = Array.from(document.querySelectorAll('[data-template-category]')).filter(card => !card.hidden).length;
        document.querySelector('[data-filter-status]').textContent = `${count} ${count === 1 ? 'template' : 'templates'} shown${category === 'all' ? '' : ': ' + category}.`;
    }));
    document.querySelectorAll('[data-confirm]').forEach(form => form.addEventListener('submit', event => { if (!window.confirm(form.dataset.confirm)) event.preventDefault(); }));
    document.querySelectorAll('[data-save-form]').forEach(form => form.addEventListener('submit', () => { const button = form.querySelector('button[type="submit"]'); button.disabled = true; button.textContent = 'Saving…'; }));
    document.querySelectorAll('[data-image-input]').forEach(input => {
        let objectUrl;
        input.addEventListener('change', () => {
            if (objectUrl) URL.revokeObjectURL(objectUrl);
            const file = input.files[0];
            if (!file || !['image/jpeg','image/png','image/webp'].includes(file.type)) return;
            const field = input.closest('.upload-field');
            let image = field.querySelector('img');
            if (!image) { image = document.createElement('img'); image.className = 'upload-preview'; image.width = 160; image.height = 120; image.alt = 'Selected image preview'; field.querySelector('.upload-symbol')?.remove(); field.prepend(image); }
            objectUrl = URL.createObjectURL(file); image.src = objectUrl;
        });
    });
})();
