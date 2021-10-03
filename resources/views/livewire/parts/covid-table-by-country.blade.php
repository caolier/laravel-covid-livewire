<div>@php $paginator= $CovidDataTable @endphp
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($page<1)
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
                @if(count($CovidDataData)==$CovidDataTable->perPage())
                {{-- @if ($paginator->hasMorePages()) --}}
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
        <th>{{$index+1}}</th> 
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