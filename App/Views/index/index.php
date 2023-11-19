<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Json Server free</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container-fluid">
        <h1>Json server</h1>
        <form action="/save-json" class="form-control d-flex flex-column gap-2" id="form-json" method="POST">
            <textarea name="jsonValue" id="jsonInput" class="form-control" cols="30" rows="10" required
                placeholder="Paste your json here"></textarea>
            <button type="submit" class="btn btn-primary">
                save json
            </button>
        </form>
        <hr>
        <div class="hidden  text-center" id=result-area>
            Click Below to Copy <input type="text" readonly id="result" class="form-control">
        </div>
    </div>
    <footer>
        <p>Yrllan</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="./javascript/validateJson.js" type="module"></script>
    <script src="./javascript/handler.js" type="module"></script>
    <script src="./javascript/copyUrl.js" type="module"></script>
</body>

</html>