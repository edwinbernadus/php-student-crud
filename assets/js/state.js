export const state = {
    rows: [],
    sortKey: 'id',
    sortDir: 'asc',
    query: '',
    gender: '',
    desa: '',
    page: 1,
    perPage: window.APP_CONFIG?.perPage ?? 20,
};
