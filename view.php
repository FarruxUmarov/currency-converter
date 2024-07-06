<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <title>Current</title>
</head>

<body>
<div class="container">
    <h2>Current</h2>
    <form action="index.php" method="post">
        <select class="form-select">
            <?php
            foreach ($currency->customCurrencies() as $currencyName => $rate) {
                $i++;
                if ($i <= 10) {
                    echo "<option>$currencyName</option>";
                }
            } 
            ?>
        </select>
        <label for="amount" class="form-label">UZS => USD</label>
        <input class="form-control" type="text" name="amount">
        <button type="button" name="amount" class="btn btn-primary">Primary</button>

    </form>
    </div>
</body>

</html>