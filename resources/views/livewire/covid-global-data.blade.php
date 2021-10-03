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
                                <a id="list_by_country" wire:click.prevent="TabSelectData('list_by_country')" class="">{{__('app.list_by_country')}}</a>
                            </li>
                            @else 
                            <li>
                              <a id="list_global_per_day"wire:click.prevent="TabSelectData('list_global_per_day')" class="">{{__('app.list_global_per_day')}}</a>
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
                        <a id="list_by_country" wire:click.prevent="TabSelectData('list_by_country')" class="btn btn-ghost btn-sm rounded-btn">
                            {{__('app.list_by_country')}}
                        </a> 
                    </div>
                    @else
                    <div class="items-stretch hidden md:flex">
                      <a id="list_global_per_day" wire:click.prevent="TabSelectData('list_global_per_day')" class="btn btn-ghost btn-sm rounded-btn">
                          {{__('app.list_global_per_day')}}
                      </a> 
                      <a class="btn btn-sm rounded-btn">
                          {{__('app.list_by_country')}}
                      </a> 
                  </div>
                  @endif


                </div>

                <div class="flex justify-end">
                  {{-- Selección actual --}}
                  @if(empty($country_id))
                  <div class="flex-1 lg:flex">
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
            {!! $view_covid_table_by_country !!}

        </div>
      </div>
      
      @push('scripts')
        @livewireChartsScripts
      @endpush
</div>
