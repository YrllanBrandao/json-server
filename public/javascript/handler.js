export async function handler(json) {
    const body = {
        jsonValue: json
    };

    const url = 'http://localhost:8080/save-json';

    const options = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    };

    try {
        const response = await fetch(url, options);
        const responseBody = await response.json();

        return responseBody;
    } catch (error) {
        throw new Error('Ocorreu um erro.');
    }
}
