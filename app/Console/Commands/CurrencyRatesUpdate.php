<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Models\CurrencyRate;

class CurrencyRatesUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-rates-update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hourly update the currency rates because the api has 1000reqs per month limit';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $client = new Client();
        $api_key = env('CURRENCY_API_KEY');

        $headers = [
            'apikey' => $api_key       
        ];

        //get currencies
        //https://apilayer.com/marketplace/exchangerates_data-api?txn=free&live_demo=show
        try {
            $response = $client->request('GET', "https://api.apilayer.com/exchangerates_data/latest?symbols=MKD&base=EUR", [
                    'headers' => $headers
                ]
            );

        } catch (\Exception $e) {
            \Log::info($e);
        }

        if(isset($response)) {
           if ($response->getStatusCode() != 200) {
                \Log::info("currency rate api status code != 200");
            }

            $content = $response->getBody()->getContents();
            $content = json_decode($content);

            if(isset($content->rates)) {
                if(isset($content->rates->MKD)) {
                    $eur_to_mkd_rate = (float)(round((float)$content->rates->MKD, 3));

                    $currency_rate = CurrencyRate::orderBy('id', 'desc')->first();

                    if(isset($currency_rate) && $currency_rate != null) {
                        $currency_rate->eur_to_mkd_rate = $eur_to_mkd_rate;
                        $currency_rate->save();
                    } else {
                        $currency_rate = new CurrencyRate;
                        $currency_rate->eur_to_mkd_rate = $eur_to_mkd_rate;
                        $currency_rate->save();
                    }

                } else {
                    \Log::info("currency rate api not set error content->rates->MKD");
                }
            } else {
                \Log::info("currency rate api not set error content->rates");
            } 
        }
        //
    }
}
