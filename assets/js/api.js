function jsonOptions(method, body) {
    return {
        method,
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(body),
    };
}

async function request(url, options = {}) {
    const response = await fetch(url, options);

    if (response.status === 401) {
        window.location.href = 'login.php';
        throw new Error('unauthenticated');
    }

    const payload = await response.json().catch(() => ({}));

    if (!response.ok) {
        const error = new Error('request_failed');
        error.errors = payload.errors ?? {};
        throw error;
    }

    return payload;
}

const ENDPOINT = 'api/students.php';

export const StudentsApi = {
    list: () => request(ENDPOINT),
    create: (body) => request(ENDPOINT, jsonOptions('POST', body)),
    update: (id, body) => request(`${ENDPOINT}?id=${id}`, jsonOptions('PUT', body)),
    remove: (id) => request(`${ENDPOINT}?id=${id}`, { method: 'DELETE' }),
    reset: () => request(`${ENDPOINT}?action=reset`, { method: 'POST' }),
};
