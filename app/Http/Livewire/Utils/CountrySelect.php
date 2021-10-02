<?php

namespace App\Http\Livewire\Utils;

use Livewire\Component;
use Asantibanez\LivewireSelect\LivewireSelect;
use Illuminate\Support\Collection;

class CountrySelect extends LivewireSelect
{
    public $collectionCountries;
    // public $selectedOption;

    public function setCollectionCountries()
    {
        $file = file_get_contents(base_path().'/utils/countries.js');
        $collectionData = collect(json_decode($file,true))
            ->map(function($tag){
                    return [
                        'value' => $tag['iso3'],
                        'description' => $tag['country']
                    ];    
            })->toArray();
        // { "country": "Afghanistan", 
        //     "iso2": "AF", 
        //     "iso3": "AFG", 
        //     "id": 4, 
        //     "lat": 33, 
        //     "long": 65 
        // }
        return new Collection($collectionData);

    }

    public function options($searchTerm = null) : Collection 
    {
        if(is_null($this->collectionCountries)){
            $this->collectionCountries = $this->setCollectionCountries();
        }
        $searchTerm = strtolower($searchTerm);

        $collectionData = $this->collectionCountries
            ->filter(function ($tag) use ($searchTerm){
                if(strpos(strtolower($tag['description']),$searchTerm)!==false){
                    return true;    
                }
            })->toArray();
            // ->map(function($tag) use ($searchTerm){
            //     if(strpos(strtolower($tag['description']),$searchTerm)!==false){
            //         return $tag;    
            //     }
            // })->toArray();

            // if($searchTerm=='col'){
                // dd($collectionData);
            // }
        // ->map(function($tag) use ($searchTerm){
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
        return collect($collectionData);
    }

    public function selectedOption($value){
        // dd($value);
        // selectedOption
        if(is_null($this->collectionCountries)){
            $this->collectionCountries = $this->setCollectionCountries();
        }

        $selectedOption = $this->collectionCountries
            ->first(function ($tag) use ($value) {
                return (strcmp($value,$tag['value'])==0);
            });
        // $this->emit('updateCountry', [$value => $selectedOption]);
        return $selectedOption;
    }
    // public function render()
    // {
    //     return view('livewire.utils.country-select');
    // }



}
