<div>
    <div class="sm:px-6 w-full">
        <div class="px-4 md:px-10 py-4 md:py-7">
            <div class="flex items-center justify-between">
                <p tabindex="0"
                   class="focus:outline-none text-base sm:text-lg md:text-xl lg:text-2xl font-bold leading-normal text-gray-800">
                    Projects</p>
                <div
                    class="py-3 px-4 flex items-center text-sm font-medium leading-none text-gray-600 bg-gray-200 hover:bg-gray-300 cursor-pointer rounded">
                    <p>Sort By:</p>
                    <select aria-label="select" class="focus:text-indigo-600 focus:outline-none bg-transparent ml-1"
                            id="sort" wire:model.live="sortValue">
                        <option class="text-sm text-indigo-800" selected value="desc">Newest</option>
                        <option class="text-sm text-indigo-800" value="asc">Oldest</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
            <div class="flex items-center">
                <div class="flex">
                    <div class="relative flex items-start py-4 ml-2">
                        <input id="1" type="radio" class="hidden peer" name="filter" value="all" wire:model.live="selectedFilter">
                        <label for="1" class="inline-flex items-center justify-between w-auto p-2 font-medium tracking-tight border rounded-lg cursor-pointer bg-brand-light text-brand-black border-violet-500 peer-checked:border-violet-400 peer-checked:bg-violet-700 peer-checked:text-white peer-checked:font-semibold peer-checked:underline peer-checked:decoration-brand-dark decoration-2">
                            <div class="flex items-center justify-center w-full">
                                <div class="text-sm text-brand-black">All</div>
                            </div>
                        </label>
                    </div>

                    <div class="relative flex items-start py-4 ml-2">
                        <input id="2" type="radio" class="hidden peer" name="filter" value="active" wire:model.live="selectedFilter">
                        <label for="2" class="inline-flex items-center justify-between w-auto p-2 font-medium tracking-tight border rounded-lg cursor-pointer bg-brand-light text-brand-black border-violet-500 peer-checked:border-violet-400 peer-checked:bg-violet-700 peer-checked:text-white peer-checked:font-semibold peer-checked:underline peer-checked:decoration-brand-dark decoration-2">
                            <div class="flex items-center justify-center w-full">
                                <div class="text-sm text-brand-black">Active</div>
                            </div>
                        </label>
                    </div>

                    <div class="relative flex items-start py-4 ml-2">
                        <input id="3" type="radio" class="hidden peer" name="filter" value="inactive" wire:model.live="selectedFilter">
                        <label for="3" class="inline-flex items-center justify-between w-auto p-2 font-medium tracking-tight border rounded-lg cursor-pointer bg-brand-light text-brand-black border-violet-500 peer-checked:border-violet-400 peer-checked:bg-violet-700 peer-checked:text-white peer-checked:font-semibold peer-checked:underline peer-checked:decoration-brand-dark decoration-2">
                            <div class="flex items-center justify-center w-full">
                                <div class="text-sm text-brand-black">Inactive</div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-4">
                <div class="relative">
                    <input type="text" class="focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent w-72 sm:w-96 h-12 pl-4 pr-10 rounded-full text-sm text-gray-600 bg-gray-100"
                           placeholder="Search Projects" wire:model.live="search">
                </div>
            </div>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center">
                    <p tabindex="0"
                       class="focus:outline-none text-sm sm:text-base md:text-lg lg:text-xl font-medium leading-none text-gray-600">
                        Projects</p>
                </div>
                <div class="flex items center">
                    <a href="{{route('project.create')}}" wire:navigate
                       class="focus:outline-none bottom-auto text-sm sm:text-base md:text-lg lg:text-xl font-medium leading-none text-indigo-600 hover:text-indigo-800">
                        Create Project
                    </a>
                </div>
            </div>

            <div class="mt-7 overflow-x-auto">
                <table class="w-full whitespace-nowrap">
                    <tbody>
                    @foreach($projects as $project)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{$project->name}}</p>
                                <a href="{{ route('project.show', $project->id) }}" target="_blank"
                                   class="focus:outline-none text-sm leading-none text-indigo-600"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                                                                                        fill="none">
                                        <path
                                            d="M6.66669 9.33342C6.88394 9.55515 7.14325 9.73131 7.42944 9.85156C7.71562 9.97182 8.02293 10.0338 8.33335 10.0338C8.64378 10.0338 8.95108 9.97182 9.23727 9.85156C9.52345 9.73131 9.78277 9.55515 10 9.33342L12.6667 6.66676C13.1087 6.22473 13.357 5.62521 13.357 5.00009C13.357 4.37497 13.1087 3.77545 12.6667 3.33342C12.2247 2.89139 11.6251 2.64307 11 2.64307C10.3749 2.64307 9.77538 2.89139 9.33335 3.33342L9.00002 3.66676"
                                            stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path
                                            d="M9.33336 6.66665C9.11611 6.44492 8.8568 6.26876 8.57061 6.14851C8.28442 6.02825 7.97712 5.96631 7.66669 5.96631C7.35627 5.96631 7.04897 6.02825 6.76278 6.14851C6.47659 6.26876 6.21728 6.44492 6.00003 6.66665L3.33336 9.33332C2.89133 9.77534 2.64301 10.3749 2.64301 11C2.64301 11.6251 2.89133 12.2246 3.33336 12.6666C3.77539 13.1087 4.37491 13.357 5.00003 13.357C5.62515 13.357 6.22467 13.1087 6.66669 12.6666L7.00003 12.3333"
                                            stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="flex items-center">
                                <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm leading-none text-gray-600 ml-2">{{$project->owner->name}}</p>
                            </div>
                        </td>
                        <td class="pl-24">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path
                                        d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                                        stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round"></circle>
                                </svg>
                                <p class="text-sm leading-none text-gray-600 ml-2">{{$project->tasks_count}}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path d="M7.5 5H16.6667" stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                          stroke-linejoin="round"></path>
                                    <path d="M7.5 10H16.6667" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.5 15H16.6667" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.16669 5V5.00667" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.16669 10V10.0067" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M4.16669 15V15.0067" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="text-sm leading-none text-gray-600 ml-2">{{$project->start_date->format('Y M d h:i A')}}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            @if ($project->is_active)
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">
                                    Active
                                </div>
                            @else
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                    InActive
                                </div>
                            @endif
                        </td>
                        <td class="pl-5">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path
                                        d="M3.33331 17.4998V6.6665C3.33331 6.00346 3.59671 5.36758 4.06555 4.89874C4.53439 4.4299 5.17027 4.1665 5.83331 4.1665H14.1666C14.8297 4.1665 15.4656 4.4299 15.9344 4.89874C16.4033 5.36758 16.6666 6.00346 16.6666 6.6665V11.6665C16.6666 12.3295 16.4033 12.9654 15.9344 13.4343C15.4656 13.9031 14.8297 14.1665 14.1666 14.1665H6.66665L3.33331 17.4998Z"
                                        stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M10 9.1665V9.17484" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.66669 9.1665V9.17484" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.3333 9.1665V9.17484" stroke="#52525B" stroke-width="1.25"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <p class="text-sm leading-none text-gray-600 ml-2">{{$project->comments_count}}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            @if ($project->after_due_date)
                            <div
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                {{$project->end_date->diffForHumans()}}
                            </div>
                            @else
                            <div
                                class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">
                                {{$project->end_date->diffForHumans()}}
                            </div>
                            @endif
                        </td>
                        <td class="pl-4">
                            <a href="{{route('project.show', ['project' => $project->id])}}" wire:navigate
                               class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                View
                            </a>
                        </td>
                        <td class="pl-4">
                            <a href="{{route('project.edit', ['project' => $project->id])}}" wire:navigate class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                Edit
                            </a>
                        </td>
                        <td class="pl-4">
                            <button
                                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none" wire:click="delete({{$project->id}})">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr class="h-3"></tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $projects->links() }}
            </div>
        </div>
    </div>
    <style>.checkbox:checked + .check-icon {
            display: flex;
        }
    </style>
    <script>function dropdownFunction(element) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            let list = element.parentElement.parentElement.getElementsByClassName("dropdown-content")[0];
            list.classList.add("target");
            for (i = 0; i < dropdowns.length; i++) {
                if (!dropdowns[i].classList.contains("target")) {
                    dropdowns[i].classList.add("hidden");
                }
            }
            list.classList.toggle("hidden");
        }
    </script>
</div>
