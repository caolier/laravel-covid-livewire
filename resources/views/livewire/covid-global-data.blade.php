<div>

    {{-- <div class="flex flex-row w-full flex-wrap-reverse"> --}}
    <div class="grid gap-4 md:grid-cols-3">
        {{-- chart:new --}}
        <div class="grid flex-grow h-60 md:h-96 scard bg-base-300 rounded-box place-items-center">
            <div style="max-height: 28rem;" class="h-60 md:h-96">
            <livewire:livewire-column-chart :column-chart-model="$newPerDayModel"/>
            </div>
        </div> 
        {{-- chart:recovered --}}
        <div class="grid flex-grow h-60 md:h-96 scard bg-base-300 rounded-box place-items-center">
            <div style="max-height: 28rem;" class="h-60 md:h-96">
            <livewire:livewire-column-chart :column-chart-model="$recoveredPerDayModel"/>
            </div>
        </div>
        {{-- chart:deaths --}}
        <div class="grid flex-grow h-60 md:h-96 scard bg-base-300 rounded-box place-items-center">
            <div style="max-height: 28rem;" class="h-60 md:h-96">
            <livewire:livewire-column-chart :column-chart-model="$deathsPerDayModel"/>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full">
        <div class="divider"></div> 
        <div class="">
            {{-- begin:navbar --}}
            <div class="navbar mb-4 shadow-lg bg-base-300 text-base-content rounded-box">
                {{-- Menú Dropdown --}}
                <div class="dropdown dropdown-right md:hidden">
                    <div tabindex="0" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">           
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>               
                        </svg>                            
                    </div> 
                    <div class="">
                        <ul tabindex="0" class="grid gap-2 gap-y-4 w-max py-1 mr-2 shadow menu dropdown-content bg-base-100 rounded-box flex-row">
                          @if($selected_tab=='list_global_per_day')
                          <li>
                                <a class="">{{__('app.list_global_per_day')}}</a>
                            </li> 
                            <li>
                                <a wire:click.prevent="TabSelectData('list_by_country')" class="">{{__('app.list_by_country')}}</a>
                            </li>
                            @else 
                            <li>
                              <a wire:click.prevent="TabSelectData('list_global_per_day')" class="">{{__('app.list_global_per_day')}}</a>
                          </li> 
                          <li>
                              <a class="">{{__('app.list_by_country')}}</a>
                          </li>
                          @endif
                        </ul>
                    </div>
                </div>

                {{-- Menú --}}
                <div class="flex-1 px-2 mx-2">
                    <div class="items-stretch flex md:hidden">
                        <a class="btn btn-ghost btn-sm rounded-btn">
                            {{__('app.'.$selected_tab)}}
                        </a> 
                    </div>
                    @if($selected_tab=='list_global_per_day')
                    <div class="items-stretch hidden md:flex">
                        <a class="btn btn-sm rounded-btn">
                            {{__('app.list_global_per_day')}}
                        </a> 
                        <a wire:click.prevent="TabSelectData('list_by_country')" class="btn btn-ghost btn-sm rounded-btn">
                            {{__('app.list_by_country')}}
                        </a> 
                    </div>
                    @else
                    <div class="items-stretch hidden md:flex">
                      <a wire:click.prevent="TabSelectData('list_global_per_day')" class="btn btn-ghost btn-sm rounded-btn">
                          {{__('app.list_global_per_day')}}
                      </a> 
                      <a class="btn btn-sm rounded-btn">
                          {{__('app.list_by_country')}}
                      </a> 
                  </div>
                  @endif


                </div>

                <div class="flex-none justify-end">
                  {{-- Selección actual --}}
                  @if(!empty($country_id))
                  <div class="flex-1 lg:flex-none">
                      <div class="badge badge-neutral mr-5 h-10">
                          {{$country_id}} {{$selected_tab}}
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 mr-2 hidden stroke-current">   
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                       
                          </svg>
                      </div> 
                  </div>
                  @endif
                  {{-- Busqueda --}}
                    <div class="form-control w-28 sm:w-40 md:w-60">
                        {{-- <div wire:loading.delay.long > --}}
                        <livewire:utils.country-select name="country_id" :value="$country_id" placeholder="{{__('Search')}}"  :searchable="true" class="input input-ghost bg-base-200" />
                        {{-- </div> --}}
                    </div>
                    <button class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">             
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>             
                        </svg>
                    </button>
                </div> 
            </div>
            {{-- end:navbar --}}
              
              

              <div>@php $paginator= $CovidDataTable @endphp
                   @if ($paginator->hasPages())
                       <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                           <span>
                               {{-- Previous Page Link --}}
                               @if ($paginator->onFirstPage())
                                   <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                       {!! __('pagination.previous') !!}
                                   </span>
                               @else
                                   <button wire:click="$set('page',{{$page-1}})"  rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                       {!! __('pagination.previous') !!}
                                   </button>
                               @endif
                           </span>
                
                           <span>
                               {{-- Next Page Link --}}
                               @if ($paginator->hasMorePages())
                                   <button wire:click="$set('page',{{$page+1}})"  rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                       {!! __('pagination.next') !!}
                                   </button>
                               @else
                                   <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                       {!! __('pagination.next') !!}
                                   </span>
                               @endif
                           </span>
                       </nav>
                   @endif
               </div>                

               <div class="overflow-x-auto">
                <table class="table w-full table-compact">
                  <thead>
                    <tr>
                      <th>&nbsp;</th> 
                      <th>{{__('country')}}</th> 
                      <th>{{__('cases')}}</th> 
                      <th>{{__('todayCases')}}</th> 
                      <th>{{__('deaths')}}</th> 
                      <th>{{__('todayDeaths')}}</th> 
                      <th>{{__('recovered')}}</th> 
                      <th>{{__('todayRecovered')}}</th> 
                      <th>{{__('active')}}</th> 
                      <th>{{__('critical')}}</th> 
                      <th>{{__('tests')}}</th> 
                      <th>{{__('updated')}}</th> 
                    </tr>
                  </thead> 
                  <tbody>
                    @forelse ($CovidDataData as $index => $CountryData)
                    <tr>
                      <th>{{$index}}</th> 
                      <td>{{$CountryData['country']}}</td> 
                      <td>{{$CountryData['cases']}}</td> 
                      <td>{{$CountryData['todayCases']}}</td> 
                      <td>{{$CountryData['deaths']}}</td> 
                      <td>{{$CountryData['todayDeaths']}}</td> 
                      <td>{{$CountryData['recovered']}}</td> 
                      <td>{{$CountryData['todayRecovered']}}</td> 
                      <td>{{$CountryData['active']}}</td> 
                      <td>{{$CountryData['critical']}}</td> 
                      <td>{{$CountryData['tests']}}</td> 
                      <td>{{$this->dateForHumans($CountryData['updated'])}}</td> 
                    </tr>
                    {{-- 0 => array:23 [
                      "updated" => 1633161656879
                      "country" => "Afghanistan"
                      "countryInfo" => array:6 
                      "cases" => 155239
                      "todayCases" => 0
                      "deaths" => 7211
                      "todayDeaths" => 0
                      "recovered" => 125021
                      "todayRecovered" => 0
                      "active" => 23007
                      "critical" => 1124
                      "tests" => 761015 --}}
                    @empty
                    <tr>
                      <th>&nbsp;</th> 
                      <td>{{__('No Results Found.')}}</td> 
                      <td>&nbsp;</td> 
                    </tr>
                    @endforelse
                  </tbody> 
                </table>
              </div>

        </div>
      </div>
      
      @push('scripts')
        @livewireChartsScripts
      @endpush
</div>
