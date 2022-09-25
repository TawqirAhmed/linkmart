<?php

namespace App\Http\Livewire\Web\Service;

use Livewire\Component;

use App\Models\ServiceCategory;
use App\Models\AdverticeCategory;

class WebServiceComponent extends Component
{
    public function render()
    {

        $topDeals = AdverticeCategory::with('service')->where('id',1)->first();
        $bestDeals = AdverticeCategory::with('service')->where('id',2)->first();
        $featuredDeals = AdverticeCategory::with('service')->where('id',3)->first();

        // dd($topDeals, $bestDeals, $featuredDeals);

        return view('livewire.web.service.web-service-component',compact('topDeals','bestDeals','featuredDeals'))->layout('web.base.base');
    }
}
