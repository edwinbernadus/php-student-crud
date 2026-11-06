export function paginate(rows, page, perPage) {
    const totalPages = Math.max(1, Math.ceil(rows.length / perPage));
    const current = Math.min(Math.max(1, page), totalPages);
    const start = (current - 1) * perPage;

    return {
        items: rows.slice(start, start + perPage),
        page: current,
        totalPages,
        total: rows.length,
        from: rows.length === 0 ? 0 : start + 1,
        to: Math.min(start + perPage, rows.length),
    };
}
