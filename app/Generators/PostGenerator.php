<?php

namespace App\Generators;

use App\Services\Api\DataApi;
use Illuminate\Support\Collection;

//use App\Models\MortgageProduct;

class PostGenerator
{
    public function __construct(protected DataApi $dataApi)
    {
    }

    public function generate(): Collection
    {
        return $this->dataApi->getData();

        // DB::transaction(function () use ($products) {
        //     $products->each(function (MortgageOffer $product) {
        //         MortgageProduct::create([
        //             'provider_name' => $product->providerName,
        //             'product_name' => $product->productName,
        //             'payment_per_term' => $product->paymentPerTerm,
        //             'payment_frequency' => $product->paymentFrequency,
        //             'total_payment' => $product->totalPayment,
        //             'interest_rate' => $product->interestRate,
        //             'provider_id' => $product->providerId,
        //         ]);
        //     });
        // });
    }
}
