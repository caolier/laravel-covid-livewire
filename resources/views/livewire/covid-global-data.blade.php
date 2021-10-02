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
                            <li>
                                <a class="">{{__('app.list_global_per_day')}}</a>
                            </li> 
                            <li>
                                <a class="">{{__('app.list_by_country')}}</a>
                            </li>
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
                    <div class="items-stretch hidden md:flex">
                        <a class="btn btn-ghost btn-sm rounded-btn">
                            {{__('app.list_global_per_day')}}
                        </a> 
                        <a class="btn btn-ghost btn-sm rounded-btn">
                            {{__('app.list_by_country')}}
                        </a> 
                    </div>
                </div>

                {{-- Selección actual --}}
                <div class="flex-1 lg:flex-none hidden">
                    <div class="badge badge-neutral mr-5 h-10">
                        # {{$country_id}} #
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 mr-2 stroke-current">   
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                       
                        </svg>
                    </div> 
                </div>
                {{-- Busqueda --}}
                <div class="flex-none justify-end">
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
              
              

            <div class="overflow-x-auto">
                <table class="table w-full table-compact">
                  <thead>
                    <tr>
                      <th></th> 
                      <th>Name</th> 
                      <th>Job</th> 
                      <th>company</th> 
                      <th>location</th> 
                      <th>Last Login</th> 
                      <th>Favorite Color</th>
                    </tr>
                  </thead> 
                  <tbody>
                    <tr>
                      <th>1</th> 
                      <td>Cy Ganderton</td> 
                      <td>Quality Control Specialist</td> 
                      <td>Littel, Schaden and Vandervort</td> 
                      <td>Canada</td> 
                      <td>12/16/2020</td> 
                      <td>Blue</td>
                    </tr>
                    <tr>
                      <th>2</th> 
                      <td>Hart Hagerty</td> 
                      <td>Desktop Support Technician</td> 
                      <td>Zemlak, Daniel and Leannon</td> 
                      <td>United States</td> 
                      <td>12/5/2020</td> 
                      <td>Purple</td>
                    </tr>
                    <tr>
                      <th>3</th> 
                      <td>Brice Swyre</td> 
                      <td>Tax Accountant</td> 
                      <td>Carroll Group</td> 
                      <td>China</td> 
                      <td>8/15/2020</td> 
                      <td>Red</td>
                    </tr>
                    <tr>
                      <th>4</th> 
                      <td>Marjy Ferencz</td> 
                      <td>Office Assistant I</td> 
                      <td>Rowe-Schoen</td> 
                      <td>Russia</td> 
                      <td>3/25/2021</td> 
                      <td>Crimson</td>
                    </tr>
                    <tr>
                      <th>5</th> 
                      <td>Yancy Tear</td> 
                      <td>Community Outreach Specialist</td> 
                      <td>Wyman-Ledner</td> 
                      <td>Brazil</td> 
                      <td>5/22/2020</td> 
                      <td>Indigo</td>
                    </tr>
                    <tr>
                      <th>6</th> 
                      <td>Irma Vasilik</td> 
                      <td>Editor</td> 
                      <td>Wiza, Bins and Emard</td> 
                      <td>Venezuela</td> 
                      <td>12/8/2020</td> 
                      <td>Purple</td>
                    </tr>
                    <tr>
                      <th>7</th> 
                      <td>Meghann Durtnal</td> 
                      <td>Staff Accountant IV</td> 
                      <td>Schuster-Schimmel</td> 
                      <td>Philippines</td> 
                      <td>2/17/2021</td> 
                      <td>Yellow</td>
                    </tr>
                    <tr>
                      <th>8</th> 
                      <td>Sammy Seston</td> 
                      <td>Accountant I</td> 
                      <td>O'Hara, Welch and Keebler</td> 
                      <td>Indonesia</td> 
                      <td>5/23/2020</td> 
                      <td>Crimson</td>
                    </tr>
                    <tr>
                      <th>9</th> 
                      <td>Lesya Tinham</td> 
                      <td>Safety Technician IV</td> 
                      <td>Turner-Kuhlman</td> 
                      <td>Philippines</td> 
                      <td>2/21/2021</td> 
                      <td>Maroon</td>
                    </tr>
                    <tr>
                      <th>10</th> 
                      <td>Zaneta Tewkesbury</td> 
                      <td>VP Marketing</td> 
                      <td>Sauer LLC</td> 
                      <td>Chad</td> 
                      <td>6/23/2020</td> 
                      <td>Green</td>
                    </tr>
                    <tr>
                      <th>11</th> 
                      <td>Andy Tipple</td> 
                      <td>Librarian</td> 
                      <td>Hilpert Group</td> 
                      <td>Poland</td> 
                      <td>7/9/2020</td> 
                      <td>Indigo</td>
                    </tr>
                    <tr>
                      <th>12</th> 
                      <td>Sophi Biles</td> 
                      <td>Recruiting Manager</td> 
                      <td>Gutmann Inc</td> 
                      <td>Indonesia</td> 
                      <td>2/12/2021</td> 
                      <td>Maroon</td>
                    </tr>
                    <tr>
                      <th>13</th> 
                      <td>Florida Garces</td> 
                      <td>Web Developer IV</td> 
                      <td>Gaylord, Pacocha and Baumbach</td> 
                      <td>Poland</td> 
                      <td>5/31/2020</td> 
                      <td>Purple</td>
                    </tr>
                    <tr>
                      <th>14</th> 
                      <td>Maribeth Popping</td> 
                      <td>Analyst Programmer</td> 
                      <td>Deckow-Pouros</td> 
                      <td>Portugal</td> 
                      <td>4/27/2021</td> 
                      <td>Aquamarine</td>
                    </tr>
                    <tr>
                      <th>15</th> 
                      <td>Moritz Dryburgh</td> 
                      <td>Dental Hygienist</td> 
                      <td>Schiller, Cole and Hackett</td> 
                      <td>Sri Lanka</td> 
                      <td>8/8/2020</td> 
                      <td>Crimson</td>
                    </tr>
                    <tr>
                      <th>16</th> 
                      <td>Reid Semiras</td> 
                      <td>Teacher</td> 
                      <td>Sporer, Sipes and Rogahn</td> 
                      <td>Poland</td> 
                      <td>7/30/2020</td> 
                      <td>Green</td>
                    </tr>
                    <tr>
                      <th>17</th> 
                      <td>Alec Lethby</td> 
                      <td>Teacher</td> 
                      <td>Reichel, Glover and Hamill</td> 
                      <td>China</td> 
                      <td>2/28/2021</td> 
                      <td>Khaki</td>
                    </tr>
                    <tr>
                      <th>18</th> 
                      <td>Aland Wilber</td> 
                      <td>Quality Control Specialist</td> 
                      <td>Kshlerin, Rogahn and Swaniawski</td> 
                      <td>Czech Republic</td> 
                      <td>9/29/2020</td> 
                      <td>Purple</td>
                    </tr>
                    <tr>
                      <th>19</th> 
                      <td>Teddie Duerden</td> 
                      <td>Staff Accountant III</td> 
                      <td>Pouros, Ullrich and Windler</td> 
                      <td>France</td> 
                      <td>10/27/2020</td> 
                      <td>Aquamarine</td>
                    </tr>
                    <tr>
                      <th>20</th> 
                      <td>Lorelei Blackstone</td> 
                      <td>Data Coordiator</td> 
                      <td>Witting, Kutch and Greenfelder</td> 
                      <td>Kazakhstan</td> 
                      <td>6/3/2020</td> 
                      <td>Red</td>
                    </tr>
                  </tbody> 
                  <tfoot>
                    <tr>
                      <th></th> 
                      <th>Name</th> 
                      <th>Job</th> 
                      <th>company</th> 
                      <th>location</th> 
                      <th>Last Login</th> 
                      <th>Favorite Color</th>
                    </tr>
                  </tfoot>
                </table>
              </div>

        </div>
      </div>
      
      @push('scripts')
        @livewireChartsScripts
      @endpush
</div>
