<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;


class CovidGlobalData extends Component
{

    public $selected_table;

    public function mount(){
        $this->selected_tab= 'lista_by_country';
        $this->selected_country= 'lista_by_country';
        $this->selected_day= now();
    }
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
