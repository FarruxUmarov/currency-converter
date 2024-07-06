<?php

declare(strict_types=1);

class Currency
{
    const CB_URL = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";

    public function exchange(float $uzs): float
    {
        $currencies = $this->customCurrencies();
        if (!isset($currencies['USD'])) {
            throw new Exception("USD currency rate is not available.");
        }

        $usd = $currencies['USD'];
        
        if ($usd == 0) {
            throw new DivisionByZeroError("USD rate is zero, cannot divide by zero.");
        }

        return $uzs / $usd;
    }

    public function getCurrencyInfo()
    {
        $currencyInfo = file_get_contents(self::CB_URL);
        return json_decode($currencyInfo);
    }

    public function customCurrencies(): array
    {
        $currencies = (array) $this->getCurrencyInfo();
        $orderedCurrencies = [];
        foreach ($currencies as $currency) {
            $orderedCurrencies[$currency->Ccy] = $currency->Rate;
        }
        return $orderedCurrencies;
    }
}


