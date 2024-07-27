<div>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <form class="w-full max-w-lg bg-white p-6 rounded shadow-md" wire:submit.prevent="save">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="flex flex-wrap w-full">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Task Name
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Jane" wire:model="name">
                    @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                </div>
                <div class="flex-wrap flex w-full">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="user-select">
                        Assignees
                    </label>
                    <select multiple
                            class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            wire:model="assignees" name="assignees[]">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    @error('assignees') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="flex flex-wrap w-full">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Task Description
                    </label>
                    <textarea
                        class="appearance-none block w-full text-black border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="text" placeholder="Jane" wire:model="description"></textarea>
                    @error('description') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="flex flex-wrap w-full">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                           for="grid-first-name">
                        Due Date
                    </label>
                    <input
                        class="appearance-none block w-full bg-white text-black border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        id="grid-first-name" type="date" placeholder="Jane" wire:model="due_date">
                    @error('due_date') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex items-center justify-center">
                <a href="{{ route('project.index') }}" wire:navigate
                   class="bg-red-500 mt-4 mr-4 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ">Cancel</a>
                <button
                    class="bg-blue-500 mt-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
