export function applySort(rows, key, dir) {
    const factor = dir === 'desc' ? -1 : 1;

    return [...rows].sort((a, b) => {
        const left = a[key];
        const right = b[key];

        if (typeof left === 'number' && typeof right === 'number') {
            return (left - right) * factor;
        }

        return String(left).localeCompare(String(right), 'id') * factor;
    });
}

export function toggleSort(state, key) {
    if (state.sortKey === key) {
        return { sortKey: key, sortDir: state.sortDir === 'asc' ? 'desc' : 'asc' };
    }

    return { sortKey: key, sortDir: 'asc' };
}
