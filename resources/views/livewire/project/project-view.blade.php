<div class="sm:px-6 w-full">
    <div class="px-4 md:px-10 py-4 md:py-7">
        <div class="flex flex-col space-y-4">
            <!-- Project Name Section -->
            <div class="flex items-center w-full">
                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-lg lg:text-xl font-medium leading-none text-gray-600">
                    {{$project->name}}
                </p>
            </div>

            <!-- Project Dates Section -->
            <div class="flex flex-col md:flex-row items-start md:items-center w-full space-y-2 md:space-y-0 md:space-x-4">
                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-gray-600">
                    Start: <span class="text-green-600">{{$project->start_date}}</span>
                </p>
                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-gray-600">
                    End: <span class="text-red-600">{{$project->end_date}}</span>
                </p>
                <span tabindex="0"
                      class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-gray-600">
                Duration: <span class="text-green-600">{{Carbon\Carbon::parse($project->start_date)->diffInDays(Carbon\Carbon::parse($project->end_date))}}</span>
            </span>
                <span tabindex="0"
                      class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-gray-600">
                Remaining: <span class="text-red-600">{{$project->end_date->diffForHumans()}}</span>
            </span>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center w-full space-y-2 md:space-y-0 md:space-x-4">
                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-black-600">
                    Description: <span class="text-gray-700-600">{{$project->description}}</span>
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-start md:items-center w-full space-y-2 md:space-y-0 md:space-x-4">
                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-black-600">
                    Status: <span class="@if($project->is_active) text-green-600 @else text-red-600 @endif">{{$project->is_active ? 'Active' : 'In Active'}}</span>
                </p>

                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-black-600">
                    Created By: <span class="text-blue-400">{{$project->creator->name}}</span>
                </p>

                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-black-600">
                    Owner: <span class="text-green-700">{{$project->owner->name}}</span>
                </p>

                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-sm lg:text-sm font-medium leading-none text-black-600">
                    Created At: <span class="text-pink-800">{{$project->created_at->format('Y M d h:i A')}}</span>
                </p>
            </div>

            <!-- Sort By Section -->
            <div class="flex items-center w-44 py-3 px-4 text-sm font-medium leading-none text-gray-600 bg-gray-200 hover:bg-gray-300 cursor-pointer rounded">
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
                    <input id="1" type="radio" class="hidden peer" name="filter" value="all"
                           wire:model.live="selectedFilter">
                    <label for="1"
                           class="inline-flex items-center justify-between w-auto p-2 font-medium tracking-tight border rounded-lg cursor-pointer bg-brand-light text-brand-black border-violet-500 peer-checked:border-violet-400 peer-checked:bg-violet-700 peer-checked:text-white peer-checked:font-semibold peer-checked:underline peer-checked:decoration-brand-dark decoration-2">
                        <div class="flex items-center justify-center w-full">
                            <div class="text-sm text-brand-black">All</div>
                        </div>
                    </label>
                </div>

                <div class="relative flex items-start py-4 ml-2">
                    <input id="2" type="radio" class="hidden peer" name="filter" value="complete"
                           wire:model.live="selectedFilter">
                    <label for="2"
                           class="inline-flex items-center justify-between w-auto p-2 font-medium tracking-tight border rounded-lg cursor-pointer bg-brand-light text-brand-black border-violet-500 peer-checked:border-violet-400 peer-checked:bg-violet-700 peer-checked:text-white peer-checked:font-semibold peer-checked:underline peer-checked:decoration-brand-dark decoration-2">
                        <div class="flex items-center justify-center w-full">
                            <div class="text-sm text-brand-black">Completed</div>
                        </div>
                    </label>
                </div>

                <div class="relative flex items-start py-4 ml-2">
                    <input id="3" type="radio" class="hidden peer" name="filter" value="incomplete"
                           wire:model.live="selectedFilter">
                    <label for="3"
                           class="inline-flex items-center justify-between w-auto p-2 font-medium tracking-tight border rounded-lg cursor-pointer bg-brand-light text-brand-black border-violet-500 peer-checked:border-violet-400 peer-checked:bg-violet-700 peer-checked:text-white peer-checked:font-semibold peer-checked:underline peer-checked:decoration-brand-dark decoration-2">
                        <div class="flex items-center justify-center w-full">
                            <div class="text-sm text-brand-black">In Progress</div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center">
                <p tabindex="0"
                   class="focus:outline-none text-sm sm:text-base md:text-lg lg:text-xl font-medium leading-none text-gray-600">
                    Tasks</p>
            </div>
            <div class="flex items center">
                <a href="{{route('task.create', ['project' => $project->id])}}" wire:navigate
                   class="focus:outline-none bottom-auto text-sm sm:text-base md:text-lg lg:text-xl font-medium leading-none text-indigo-600 hover:text-indigo-800">
                    New Task
                </a>
            </div>
        </div>

        <div class="mt-7 overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tbody>
                @foreach($tasks as $task)
                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                        <td class="">
                            <div class="flex items-center pl-5">
                                <p class="text-base font-medium leading-none text-gray-700 mr-2">{{$task->name}}</p>
                                <a href="{{ route('project.show', $project->id) }}" target="_blank"
                                   class="focus:outline-none text-sm leading-none text-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
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
                        <td class="w-full min-w-60">
                            <div class="flex -space-x-1 overflow-hidden">
                                @foreach($task->users as $user)
                                    <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                         src="{{$user->logo}}" title="{{$user->name}}" alt="">
                                @endforeach
                            </div>
                        </td>
                        <td class="pl-24">
                            <div class="flex items-center">
                                @if ($task->is_complete)
                                    <div
                                        class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">
                                        Completed
                                    </div>
                                @else
                                    <div
                                        class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                        In Progress
                                    </div>
                                @endif
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
                                <p class="text-sm leading-none text-gray-600 ml-2">{{$task->due_date->format('Y M d h:i A')}}</p>
                            </div>
                        </td>
                        <td class="pl-5">
                            @if ($task->after_due_date)
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-red-700 bg-red-100 rounded">
                                    {{$task->due_date->diffForHumans()}}
                                </div>
                            @else
                                <div
                                    class="py-3 px-3 text-sm focus:outline-none leading-none text-green-700 bg-green-100 rounded">
                                    {{$task->due_date->diffForHumans()}}
                                </div>
                            @endif
                        </td>
                        <td class="pl-4">
                            <a href="{{route('task.show', ['task' => $task->id])}}"
                               class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                View
                            </a>
                        </td>
                        <td class="pl-4">
                            <a href="{{route('task.edit', ['task' => $task->id])}}"
                               class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none">
                                Edit
                            </a>
                        </td>
                        <td class="pl-4">
                            <button
                                class="focus:ring-2 focus:ring-offset-2 focus:ring-red-300 text-sm leading-none text-gray-600 py-3 px-5 bg-gray-100 rounded hover:bg-gray-200 focus:outline-none"
                                wire:click="deleteTask({{$task->id}})">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr class="h-3"></tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
