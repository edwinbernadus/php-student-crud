import { StudentsApi } from './api.js';
import { state } from './state.js';
import { applyFilters, uniqueValues } from './filters.js';
import { applySort, toggleSort } from './sort.js';
import { paginate } from './paging.js';
import { escapeHtml, renderRows, renderSortHeaders, renderPager } from './table.js';
import { StudentModal } from './modal.js';
import { initials } from './avatar.js';

const dom = {
    body: document.querySelector('#table-body'),
    info: document.querySelector('#pager-info'),
    pages: document.querySelector('#pager-pages'),
    search: document.querySelector('#search'),
    gender: document.querySelector('#filter-gender'),
    desa: document.querySelector('#filter-desa'),
    add: document.querySelector('#add-btn'),
    reset: document.querySelector('#reset-btn'),
    appbarAvatar: document.querySelector('[data-avatar]'),
    desaOptions: document.querySelector('#desa-options'),
    elemenOptions: document.querySelector('#elemen-options'),
};

const modal = new StudentModal({
    root: document.querySelector('#student-modal'),
    form: document.querySelector('#student-form'),
    title: document.querySelector('#modal-title'),
    error: document.querySelector('#form-error'),
});

function render() {
    const filtered = applyFilters(state.rows, state);
    const sorted = applySort(filtered, state.sortKey, state.sortDir);
    const pageInfo = paginate(sorted, state.page, state.perPage);
    state.page = pageInfo.page;

    dom.body.innerHTML = renderRows(pageInfo.items);
    renderSortHeaders(state.sortKey, state.sortDir);
    renderPager({
        infoEl: dom.info,
        pagesEl: dom.pages,
        pageInfo,
        onPage: (page) => {
            state.page = page;
            render();
        },
    });
}

function renderDatalists() {
    const option = (value) => `<option value="${escapeHtml(value)}"></option>`;

    dom.desaOptions.innerHTML = uniqueValues(state.rows, 'desa').map(option).join('');
    dom.elemenOptions.innerHTML = uniqueValues(state.rows, 'elemen').map(option).join('');
}

function renderDesaFilter() {
    const current = state.desa;
    const options = uniqueValues(state.rows, 'desa')
        .map((desa) => `<option value="${escapeHtml(desa)}">${escapeHtml(desa)}</option>`)
        .join('');

    dom.desa.innerHTML = `<option value="">Semua Desa</option>${options}`;
    dom.desa.value = current;
}

async function load() {
    const { data } = await StudentsApi.list();
    state.rows = data;

    renderDesaFilter();
    renderDatalists();
    render();
}

function resetPage() {
    state.page = 1;
}

dom.search.addEventListener('input', (event) => {
    state.query = event.target.value;
    resetPage();
    render();
});

dom.gender.addEventListener('change', (event) => {
    state.gender = event.target.value;
    resetPage();
    render();
});

dom.desa.addEventListener('change', (event) => {
    state.desa = event.target.value;
    resetPage();
    render();
});

document.querySelectorAll('th[data-sort]').forEach((header) => {
    header.addEventListener('click', () => {
        const next = toggleSort(state, header.dataset.sort);
        state.sortKey = next.sortKey;
        state.sortDir = next.sortDir;
        resetPage();
        render();
    });
});

dom.body.addEventListener('click', async (event) => {
    const button = event.target.closest('button[data-action]');

    if (!button) {
        return;
    }

    const id = Number(button.dataset.id);

    if (button.dataset.action === 'edit') {
        const student = state.rows.find((row) => row.id === id);

        if (student) {
            modal.open(student);
        }

        return;
    }

    if (confirm('Hapus student ini?')) {
        await StudentsApi.remove(id);
        await load();
    }
});

dom.add.addEventListener('click', () => modal.open());

document.querySelector('#student-form').addEventListener('submit', async (event) => {
    event.preventDefault();

    const values = modal.values();

    try {
        if (values.id) {
            await StudentsApi.update(values.id, values);
        } else {
            await StudentsApi.create(values);
        }

        modal.close();
        await load();
    } catch (error) {
        modal.showErrors(error.errors ?? {});
    }
});

dom.reset.addEventListener('click', async () => {
    if (!confirm('Kembalikan data ke 50 student awal?')) {
        return;
    }

    await StudentsApi.reset();
    resetPage();
    await load();
});

if (dom.appbarAvatar) {
    dom.appbarAvatar.textContent = initials(dom.appbarAvatar.dataset.avatar);
}

load();
