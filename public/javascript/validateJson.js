const jsonTextArea = document.getElementById("jsonInput");
const formJson = document.getElementById("form-json");


formJson.addEventListener('submit', (e) => {
    e.preventDefault();

    const isValid = validateJson();

    if (isValid) {
        formJson.submit();
    }
    else {
        alert("não válido")
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
        return false;

    }
}