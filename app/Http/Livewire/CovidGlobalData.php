<?php

namespace App\Http\Livewire;

use Livewire\Component;

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
        return view('livewire.covid-global-data');
    }
}