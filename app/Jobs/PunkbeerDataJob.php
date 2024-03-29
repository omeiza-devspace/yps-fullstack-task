<?php

namespace App\Jobs;

use App\Models\Beer;
use App\Models\Unit;
use App\Models\IngredientType;
use App\Transformers\PunkbeerTransformer
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PunkbeerDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $beerData;

    public function __construct($beerData)
    {
        $this->beerData = $beerData;
    }

    public function handle()
    {
        PunkbeerTransformer::transformJsonToModels($this->beerData);
    }
}