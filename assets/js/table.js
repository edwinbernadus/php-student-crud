import { initials } from './avatar.js';

export function escapeHtml(value) {
    return String(value).replace(/[&<>"']/g, (character) => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;',
    }[character]));
}

export function renderRows(items) {
    if (items.length === 0) {
        return '<tr><td colspan="7" class="empty">Tidak ada data yang cocok.</td></tr>';
    }

    return items.map(rowTemplate).join('');
}

function rowTemplate(row) {
    return `
        <tr>
            <td class="muted">${row.id}</td>
            <td>
                <div class="cell-name">
                    <span class="avatar">${escapeHtml(initials(row.nama))}</span>
                    <span class="name">${escapeHtml(row.nama)}</span>
                </div>
            </td>
            <td>${escapeHtml(row.desa)}</td>
            <td>${row.umur}</td>
            <td>${escapeHtml(row.jenis_kelamin)}</td>
            <td><span class="badge">${escapeHtml(row.elemen)}</span></td>
            <td class="row-actions">
                <button class="btn tiny" data-action="edit" data-id="${row.id}">Edit</button>
                <button class="btn tiny" data-action="delete" data-id="${row.id}">Hapus</button>
            </td>
        </tr>`;
}

export function renderSortHeaders(key, dir) {
    document.querySelectorAll('th[data-sort]').forEach((header) => {
        header.dataset.label ??= header.textContent.trim();

        const active = header.dataset.sort === key;
        header.classList.toggle('sorted', active);
        header.textContent = header.dataset.label + (active ? (dir === 'asc' ? ' ▲' : ' ▼') : '');
    });
}

export function renderPager({ infoEl, pagesEl, pageInfo, onPage }) {
    infoEl.textContent = `Menampilkan ${pageInfo.from}-${pageInfo.to} dari ${pageInfo.total} student`;

    const buttons = [pageButton('‹', pageInfo.page - 1, pageInfo.page === 1)];

    for (let page = 1; page <= pageInfo.totalPages; page += 1) {
        buttons.push(pageButton(String(page), page, false, page === pageInfo.page));
    }

    buttons.push(pageButton('›', pageInfo.page + 1, pageInfo.page === pageInfo.totalPages));

    pagesEl.innerHTML = buttons.join('');
    pagesEl.querySelectorAll('button[data-page]').forEach((button) => {
        button.addEventListener('click', () => onPage(Number(button.dataset.page)));
    });
}

function pageButton(label, page, disabled, active = false) {
    return `<button class="page-btn${active ? ' active' : ''}" data-page="${page}" ${disabled ? 'disabled' : ''}>${label}</button>`;
}
