<?php

declare(strict_types=1);

class Currency
{
    public  $cb_url = "https://cbu.uz/uz/arkhiv-kursov-valyut/json/";
    private int $usdIndex = 0;

    public function exchange(float|int $uzs): float|int
    {
        $usd = $this->customCurrencies()[$_POST['current']]; 
        return $uzs / $usd;
    }

    public function getCurrencyInfo()
    {
        $currencyInfo = file_get_contents($this->cb_url);
        return json_decode($currencyInfo);
    }   

    public function customCurrencies(): array
    {
        $currencies        = (array) $this->getCurrencyInfo();
        $orderedCurrencies = [];
        foreach ($currencies as $currency) {
            $orderedCurrencies[$currency->Ccy] = $currency->Rate;
        }

        return $orderedCurrencies;
    }
}