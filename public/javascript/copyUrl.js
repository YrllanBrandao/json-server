const result = document.getElementById("result");


result.addEventListener("click", () => {
    try {
        const url = result.value;
        navigator.clipboard.writeText(url);
        alert("copied!!!");
    }
    catch (error) {
        alert("Permission to copy is required");
    }
})