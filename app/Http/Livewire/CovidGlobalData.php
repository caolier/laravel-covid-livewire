<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Support\Facades\Http;
use PHPUnit\Util\Json;

class CovidGlobalData extends Component
{
    protected $listeners = ['updateCountry' => 'updateCountry'];
    public $selected_table;
    

    # list_global_per_day 
    public function TabSelectData($selected_tab = null, $selected_country = null){
        switch($selected_tab){
            case 'list_global_per_day':
                $this->selected_tab= 'list_global_per_day';
                break;
            case 'list_by_country':
            default:
                $this->selected_tab= 'lista_by_country';
                break;
        }

    }

    public function updateCountry($country){
        $this->country_id=key($country);
    }

    public function mount(){
        // $file = file_get_contents(base_path().'/utils/countries.js');

        // $countryData = collect(json_decode($file,true));
        // $countryD2 = $countryData->map(function($tag){
        //     return [
        //         'description' => $tag['country'],
        //         'value' => $tag['iso3']
        //     ];
        // })->toArray();

        // { "country": "Afghanistan", 
        //     "iso2": "AF", 
        //     "iso3": "AFG", 
        //     "id": 4, 
        //     "lat": 33, 
        //     "long": 65 
        // }

// dd($countryData, $countryD2);
        $this->selected_tab= 'list_global_per_day';
        $this->selected_country= null;
        $this->selected_day= now();
        $this->country_id='';
    }

    public function render()
    {
        
        $newPerDayModel = $this->newPerDayModel();
        $recoveredPerDayModel = $this->recoveredPerDayModel();
        $deathsPerDayModel = $this->deathsPerDayModel();


        return view('livewire.covid-global-data')->with([
            'newPerDayModel' => $newPerDayModel,
            'recoveredPerDayModel' => $recoveredPerDayModel,
            'deathsPerDayModel' => $deathsPerDayModel
        ]);
    }


    public function getCovidGlobalData(){
        $response = Http::get('https://disease.sh/v3/covid-19/all');
        dd($response->json());
    }

    public function getCovidByCountryData($country_id){
        $response = Http::get('https://disease.sh/v3/covid-19/countries',[
            'country' => $country_id,
        ]);
        dd($response->json());
    }

    public function getCountryInfo(){
        $info = file_get_contents("utils/countries.json");  
        dd($info->json());
    }




    public function newPerDayModel(){
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
        ;

        return $columnChartModel;
        
    }

    public function recoveredPerDayModel(){
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
        ;

        return $columnChartModel;
        
    }

    public function deathsPerDayModel(){
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4')
        ;

        return $columnChartModel;
        
    }


}
