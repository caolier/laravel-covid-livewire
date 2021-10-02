<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use PHPUnit\Util\Json;

use Asantibanez\LivewireCharts\Models\ColumnChartModel;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Pagination\Paginator;
use Livewire\WithPagination;

use Carbon\CarbonInterface;
use Carbon\Carbon;

class CovidGlobalData extends Component
{
    protected $listeners = [
        // 'updateCountry' => 'updateCountry',
        'country_idUpdated' => 'updateCountry',
        ];
    public $selected_tab;
    public $country_id;
    public $collectionCovidGraphicData,$collectionCovidByCountryData;
    public $pageID;

    # list_global_per_day 
    public function TabSelectData($selected_tab = null){
        switch($selected_tab){
            case 'list_global_per_day':
                $this->selected_tab= 'list_global_per_day';
                break;
                case 'list_by_country':
                    default:
                    $this->selected_tab= 'list_by_country';
                break;
        }

    }

    public function updateCountry($country=null, $value=null){
        // dd($country,$value);
        if(is_null($country) || !key_exists('value',$country) || empty($country['value'])){
            $this->country_id='';
            $this->selected_country= $country;
        }else{
            $this->country_id=$country['value'];
            $this->selected_country= $country;

        }
    }

    public function mount(){
// dd($countryData, $countryD2);
        $this->selected_tab= 'list_by_country';
        $this->selected_country= null;
        $this->selected_day= now();
        $this->country_id='';

        $this->pageID =0;
        $this->loadData();
    }

    public function updatedPageID(){
        $this->hydrate();
    }

    public function boot(){

    }

    public function render()
    {
        
        $newPerDayModel = $this->newPerDayModel();
        $recoveredPerDayModel = $this->recoveredPerDayModel();
        $deathsPerDayModel = $this->deathsPerDayModel();

        $CovidDataTable = $this->collectionCovidByCountryData;

        return view('livewire.covid-global-data')->with([
            'newPerDayModel' => $newPerDayModel,
            'recoveredPerDayModel' => $recoveredPerDayModel,
            'deathsPerDayModel' => $deathsPerDayModel,
            'CovidDataTable' => new Paginator($CovidDataTable,15,$this->pageID)
            
        ]);
    }
    public function loadData(){
        // selected_tab selected_country selected_day country_id
        // list_global_per_day list_by_country

        if($this->selected_tab == 'list_by_country' && empty($this->country_id)){
            # DATOS GLOBALES
            $this->collectionCovidByCountryData = $this->getCovidByCountryData();
        }
        if(empty($this->country_id)){
            $this->collectionCovidGraphicData = $this->getCovidGraphicData();
            // dd($this->collectionCovidGraphicData);
        }


    }

    public function getCovidGraphicData(){
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->get('https://disease.sh/v3/covid-19/all?allowNull=1'),
            $pool->get('https://disease.sh/v3/covid-19/all?yesterday=1&allowNull=1'),
            $pool->get('https://disease.sh/v3/covid-19/all?&twoDaysAgo=1&allowNull=1'),
        ]);
        
        return [ 0 => $responses[0]->json() ,
                 1 => $responses[1]->json() ,
                 2 => $responses[2]->json()
                ];        
        // dd($response->json());
    }

    public function getCovidByCountryData(){

        if(strlen($this->country_id)==3){
            $response = Http::get('https://disease.sh/v3/covid-19/countries',[
                'country' => $this->country_id,
            ]);    
        }else{
            $response = Http::get('https://disease.sh/v3/covid-19/countries');

        }

        return json_decode($response,true);

    }

    public function getCountryInfo(){
        $info = file_get_contents("utils/countries.json");  
        dd($info->json());
    }




    public function newPerDayModel(){
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('newPerDay')
            ->addColumn('Today', 
                        $this->collectionCovidGraphicData[0]['todayCases'], 
                        '#f6ad55')
            ->addColumn('Yesterday', 
                        $this->collectionCovidGraphicData[1]['todayCases'], 
                        '#fc8181')
            ->addColumn('ToDaysAgo', 
                        $this->collectionCovidGraphicData[2]['todayCases'], 
                        '#90cdf4')
        ;

        return $columnChartModel;
        
    }

    public function recoveredPerDayModel(){
        $columnChartModel = (new ColumnChartModel())
        ->setTitle('recoveredPerDay')
        ->addColumn('Today', 
                    $this->collectionCovidGraphicData[0]['todayRecovered'], 
                    '#f6ad55')
        ->addColumn('Yesterday', 
                    $this->collectionCovidGraphicData[1]['todayRecovered'], 
                    '#fc8181')
        ->addColumn('ToDaysAgo', 
                    $this->collectionCovidGraphicData[2]['todayRecovered'], 
                    '#90cdf4')
    ;

        return $columnChartModel;
        
    }

    public function deathsPerDayModel(){
        $columnChartModel = (new ColumnChartModel())
        ->setTitle('deathsPerDay')
        ->addColumn('Today', 
                    $this->collectionCovidGraphicData[0]['todayDeaths'], 
                    '#f6ad55')
        ->addColumn('Yesterday', 
                    $this->collectionCovidGraphicData[1]['todayDeaths'], 
                    '#fc8181')
        ->addColumn('ToDaysAgo', 
                    $this->collectionCovidGraphicData[2]['todayDeaths'], 
                    '#90cdf4')
        ;

        return $columnChartModel;
        
    }

    public function dateForHumans($date)
    {
        
        return date("Y-m-d H:i:s", substr("1621157545307", 0, 10));
        // return Carbon::now()->diffForHumans($date, CarbonInterface::DIFF_ABSOLUTE);
    }

}
