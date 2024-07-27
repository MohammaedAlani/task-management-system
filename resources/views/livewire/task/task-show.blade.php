<div>
    <div class="container mx-auto px-1 py-1">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Main 3/4 Column -->
            <div class="md:col-span-3 flex flex-col space-y-4">
                <!-- First 3/4 Section -->
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800 mb-3">Task Details</h1>
                    <div class="w-full mx-auto p-5 bg-white rounded-lg shadow-xl">
                        <div class="flex justify-between items-center">
                            <div class="flex items center space-x-2">
                                <div class="block">
                                    <div class="text-sm text-gray-600">
                                        <a href="{{route('project.show', $taskInfo->project->id)}}" wire:navigate
                                           class="hover:underline text-primary">{{$taskInfo->project->name}}</a>
                                    </div>
                                </div>
                                <div class="block">
                                    <div class="text-sm text-gray-600">{{$taskInfo->creator->name}}</div>
                                </div>
                                <div class="block">
                                    <div class="text-sm text-gray-600">{{$taskInfo->created_at->diffForHumans()}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex -space-x-1 overflow-hidden mt-3">
                            @foreach($taskInfo->users as $user)
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                     src="{{$user->logo}}" title="{{$user->name}}" alt="">
                            @endforeach
                        </div>

                        <div class="mt-3">
                            <div class="flex items center space-x-2">
                                <div class="block">
                                    <div class="text-sm text-gray-600">Due Date</div>
                                </div>
                                <div class="block">
                                    <div class="text-sm text-gray-600">{{$taskInfo->due_date}}</div>
                                </div>
                            </div>
                            <div class="flex items center space-x-2">
                                <div class="block">
                                    <div class="text-sm text-gray-600">Status</div>
                                </div>
                                <div
                                    class="text-sm @if($taskInfo->is_complete) text-green-600 @else text-red-600 @endif">
                                    @if($taskInfo->is_complete)
                                        Completed
                                    @else
                                        Incomplete
                                    @endif
                                </div>
                            </div>
                            <h1 class="text-2xl font-semibold text-gray-800">{{$taskInfo->name}}</h1>
                            <p class="mt-2 text-gray-600">{{$taskInfo->description}}</p>
                        </div>
                    </div>
                </div>
                <!-- End First 3/4 Section -->

                <!-- New 3/4 Section -->
                <div>
                    <h1 class="text-2xl font-semibold text-gray-800 mb-3">History</h1>
                    <div class="w-full mx-auto p-5 bg-white rounded-lg shadow-xl">
                        @foreach($taskInfo->history as $history)
                            <div class="flex justify-between items-center">
                                <div class="flex items center space-x-2">
                                    <div class="block">
                                        <img src="{{$history->user->logo}}"
                                             alt=""
                                             class="h-8 w-8 object-fill rounded-full">
                                        <div class="text-sm text-gray-600">
                                            {{$history->user->name}}
                                        </div>
                                    </div>
                                </div>
                                <div class="block">
                                    <div class="text-sm text-gray-600">{{$history->created_at->diffForHumans()}}</div>
                                </div>
                            </div>
                            <div class="flex -space-x-1 overflow-hidden mt-3 mb-3">
                                Action: {{$history->action}}
                            </div>

                            @if($history->description)
                                <div class="flex -space-x-1 overflow-hidden mt-3 mb-3">
                                    Changes:
                                    @foreach($history->description as $key => $value)
                                        <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                                            <div class="font-medium">
                                                {{$key}}
                                            </div>
                                            <div class="md:text-sm">{{$value}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
                <!-- End New 3/4 Section -->
            </div>
            <!-- End Main 3/4 Column -->

            <!-- 1/4 Section (Comments) -->
            <div class="md:col-span-1">
                <h1 class="text-2xl font-semibold text-gray-800 mb-3">Comments</h1>
                <div class="w-full mx-auto p-5 bg-white rounded-lg shadow-xl">
                    <div id="comments-container">
                        <!-- Comment Wrapper -->
                        <div class="w-full pt-5 md:pt-8 flex flex-col space-y-2">
                            @foreach($taskInfo->comments as $comment)
                                <!-- Start Comment Item -->
                                <div class="flex items-center space-x-2">
                                    <div class="flex flex-shrink-0 self-start cursor-pointer">
                                        <img src="{{$comment->user->logo}}"
                                             alt=""
                                             class="h-8 w-8 object-fill rounded-full">
                                    </div>

                                    <div class="block">
                                        <div class="bg-gray-100 w-auto rounded-xl px-2 pb-2">
                                            <div class="font-medium">
                                                <a href="#"
                                                   class="hover:underline text-sm text-primary">{{$comment->user->name}}</a>
                                            </div>
                                            <div class="md:text-sm">{{$comment->comment}}</div>
                                        </div>

                                        <div class="flex justify-start items-center text-xs w-full">
                                            <div
                                                class="font-semibold text-gray-700 px-2 flex items-center justify-center space-x-1">
                                                <a href="#"
                                                   class="hover:underline">{{$comment->created_at->diffForHumans()}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Comment Item -->
                            @endforeach
                        </div>

                        <!-- Comment Form -->
                        <div class="w-full pt-5 md:pt-8">
                            <form wire:submit.prevent="addComment()">
                                <div class="flex flex-col space-y-2">
                                    <input wire:model="taskId" type="hidden" name="task_id" value="{{$taskInfo->id}}">
                                    <textarea wire:model="comment" name="comment" id="comment" cols="30" rows="3"
                                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary"
                                              placeholder="Add a comment"></textarea>
                                    @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                    <div class="flex justify-end">
                                        <button type="submit"
                                                class="px-4 py-2 bg-blue-400 text-white rounded-lg hover:bg-primary-dark">
                                            Add Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End 1/4 Section (Comments) -->
        </div>
    </div>
</div>
