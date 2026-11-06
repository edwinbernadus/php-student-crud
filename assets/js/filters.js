export function applyFilters(rows, state) {
    const query = state.query.trim().toLowerCase();

    return rows.filter((row) => {
        if (state.gender && row.jenis_kelamin !== state.gender) {
            return false;
        }

        if (state.desa && row.desa !== state.desa) {
            return false;
        }

        if (query === '') {
            return true;
        }

        return [row.nama, row.desa, row.elemen, row.jenis_kelamin]
            .some((value) => String(value).toLowerCase().includes(query));
    });
}

export function uniqueValues(rows, key) {
    return [...new Set(rows.map((row) => row[key]))]
        .sort((a, b) => String(a).localeCompare(String(b), 'id'));
}
