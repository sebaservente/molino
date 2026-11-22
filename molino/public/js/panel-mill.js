const menu = document.querySelector('.panel-menu');
if (menu) {
    const desktop = window.matchMedia('(min-width: 1000px)');
    menu.open = desktop.matches;
    desktop.addEventListener('change', () => { menu.open = desktop.matches; });
}
const carta = document.getElementById('carta_producto');
const categoria = document.getElementById('categoria_id');
if (carta && categoria) {
    const filtrar = () => {
        for (const option of categoria.options) {
            const permitida = !option.value || option.dataset.carta === 'ambas' || option.dataset.carta === carta.value;
            option.hidden = !permitida;
            option.disabled = !permitida;
        }
        if (categoria.selectedOptions[0]?.disabled) categoria.value = '';
    };
    carta.addEventListener('change', filtrar);
    filtrar();
}
const dialog = document.getElementById('confirm-dialog');
let pendingForm = null;
document.querySelectorAll('form[data-confirm]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        if (form.dataset.confirmed === 'yes') return;
        const message = form.dataset.confirm;
        if (dialog && typeof dialog.showModal === 'function') {
            event.preventDefault();
            pendingForm = form;
            document.getElementById('confirm-message').textContent = message;
            dialog.returnValue = 'cancel';
            dialog.showModal();
        } else if (!window.confirm(message)) event.preventDefault();
    });
});
dialog?.addEventListener('close', () => {
    const form = pendingForm;
    pendingForm = null;
    if (dialog.returnValue === 'confirm' && form) {
        form.dataset.confirmed = 'yes';
        form.requestSubmit();
    }
});
// Las confirmaciones definitivas requieren además la casilla del formulario.
// La sesión conserva la posición del listado al volver de editar o guardar.
const listKey = 'mill-panel-scroll:' + location.pathname + location.search;
if (document.querySelector('.product-table')) {
    try {
        const saved = sessionStorage.getItem(listKey);
        if (saved !== null) requestAnimationFrame(() => window.scrollTo(0, Number(saved)));
        window.addEventListener('pagehide', () => sessionStorage.setItem(listKey, String(window.scrollY)));
    } catch { /* El panel funciona aunque el navegador no permita sessionStorage. */ }
}
