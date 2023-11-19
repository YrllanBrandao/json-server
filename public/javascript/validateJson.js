import { handler } from "./handler.js";
const jsonTextArea = document.getElementById("jsonInput");
const formJson = document.getElementById("form-json");
const resultArea = document.getElementById("result-area");
const result = document.getElementById("result");
formJson.addEventListener('submit', async (e) => {
    e.preventDefault();

    const isValid = validateJson();

    if (isValid) {
        const jsonValue = jsonTextArea.value;
        const res = await handler(jsonValue);
        result.value = res.generated_url;
        resultArea.classList.remove('hidden');
    }
    else {
        alert("not valid json")
    }
})

function validateJson() {

    const jsonValue = jsonTextArea.value;

    try {

        if (jsonValue === '' || jsonValue === undefined) {
            throw new Error();
        }

        const stringfiedJson = JSON.parse(jsonValue);
        return true;
    }
    catch (error) {
        console.error(error);
        return false;

    }
}
