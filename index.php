<?php
declare(strict_types=1);

require 'currency.php';

$currency = new Currency();

$amount = $_POST['amount'];


?>



<head>
    <link rel="stylesheet" href="style.css">
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
            <fieldset>
                
                <legend class="legend">Currency</legend>
                <div class="mb-3">
                    <label for="amount" class="form-label">UZS => USD</label>
                    <input class="form-control" id="amount" type="text" name="amount">
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">USD</label>
                    <input class="form-control" type="text" id="amount" value="<?php echo $currency->exchange((float) $amount) ?>">
                </div>
                
                <button type="submit" class="btn btn-outline-primary">Exchange</button>

            </fieldset>

        </form>
    </div>
</body> 