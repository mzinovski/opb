<div class="w-full">

    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-start sm:justify-between mb-2">
        <div class="mb-2 sm:mb-0">
            <div class="w-auto relative">
                <img src="{{ Vite::asset('resources/images/icon-search.svg')}}" class="w-[20px] h-[20px] absolute left-3 top-1/2 -translate-y-1/2 z-10 inline-block">
                <input type="text"  id="search" name="" placeholder="Search" wire:model.debounce.500ms="search" class="rounded-md w-full p-1 min-h-[40px] pl-[42px] border-solid border-gray-300 text-gray-800 placeholder-gray-500 focus:border-gray-400 ring-0 focus:ring-0">
                <div wire:loading class="absolute left-[105%] top-1/2 -translate-y-1/2">
                    Processing...
                </div>
            </div>
        </div>
        <div>
            <div class="flex flex-row -mx-2 items-center">
                <div class="px-2 order-2 sm:order-1"><label for="per_page_selected" class="text-sm text-gray-500">Results per page</label></div>
                <div class="px-2 order-1 sm:order-2">
                    <select id="per_page_selected" wire:model="per_page_selected" class="rounded-md w-20 p-2 min-h-[40px] border-solid border-gray-300 text-gray-800 placeholder-gray-500 focus:border-gray-400 ring-0 focus:ring-0">
                        @foreach ($per_page as $per)
                        <option value="{{ $per }}">{{ $per }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="w-fill overflow-x-auto mb-3 min-h-[calc(100vh_-_340px)] md:min-h-[calc(100vh_-_280px)]">
        <table class="min-w-full">
            <thead class="border-b bg-blue-500 text-white">
                <tr>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">
                        ID 
                        <span class="cursor-pointer inline-block align-middle ml-1 -mt-0.5" wire:click="order_by('id')">
                            <svg class="fill-white" width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.29019 3.71C5.38315 3.80373 5.49375 3.87812 5.61561 3.92889C5.73747 3.97966 5.86817 4.0058 6.00019 4.0058C6.1322 4.0058 6.2629 3.97966 6.38476 3.92889C6.50662 3.87812 6.61722 3.80373 6.71019 3.71C6.80391 3.61704 6.87831 3.50644 6.92908 3.38458C6.97985 3.26272 7.00598 3.13201 7.00598 3C7.00598 2.86799 6.97985 2.73728 6.92908 2.61542C6.87831 2.49356 6.80391 2.38296 6.71019 2.29L4.71019 0.29C4.61508 0.198959 4.50294 0.127594 4.38019 0.0799999C4.13672 -0.0200181 3.86365 -0.0200181 3.62019 0.0799999C3.49743 0.127594 3.38529 0.198959 3.29019 0.29L1.29019 2.29C1.10188 2.4783 0.996094 2.7337 0.996094 3C0.996094 3.2663 1.10188 3.5217 1.29019 3.71C1.47849 3.8983 1.73388 4.00409 2.00019 4.00409C2.26649 4.00409 2.52188 3.8983 2.71019 3.71L3.00019 3.41V8.59L2.71019 8.29C2.52188 8.1017 2.26649 7.99591 2.00019 7.99591C1.73388 7.99591 1.47849 8.1017 1.29019 8.29C1.10188 8.4783 0.996094 8.7337 0.996094 9C0.996094 9.2663 1.10188 9.5217 1.29019 9.71L3.29019 11.71C3.38529 11.801 3.49743 11.8724 3.62019 11.92C3.73989 11.9729 3.86931 12.0002 4.00019 12.0002C4.13106 12.0002 4.26049 11.9729 4.38019 11.92C4.50294 11.8724 4.61508 11.801 4.71019 11.71L6.71019 9.71C6.80342 9.61676 6.87738 9.50607 6.92785 9.38425C6.97831 9.26243 7.00428 9.13186 7.00428 9C7.00428 8.86814 6.97831 8.73757 6.92785 8.61575C6.87738 8.49393 6.80342 8.38324 6.71019 8.29C6.61695 8.19676 6.50626 8.1228 6.38443 8.07234C6.26261 8.02188 6.13204 7.99591 6.00019 7.99591C5.86833 7.99591 5.73776 8.02188 5.61594 8.07234C5.49411 8.1228 5.38342 8.19676 5.29019 8.29L5.00019 8.59V3.41L5.29019 3.71ZM10.0002 2H20.0002C20.2654 2 20.5198 1.89464 20.7073 1.70711C20.8948 1.51957 21.0002 1.26522 21.0002 1C21.0002 0.734784 20.8948 0.48043 20.7073 0.292893C20.5198 0.105357 20.2654 0 20.0002 0H10.0002C9.73497 0 9.48061 0.105357 9.29308 0.292893C9.10554 0.48043 9.00019 0.734784 9.00019 1C9.00019 1.26522 9.10554 1.51957 9.29308 1.70711C9.48061 1.89464 9.73497 2 10.0002 2ZM20.0002 5H10.0002C9.73497 5 9.48061 5.10536 9.29308 5.29289C9.10554 5.48043 9.00019 5.73478 9.00019 6C9.00019 6.26522 9.10554 6.51957 9.29308 6.70711C9.48061 6.89464 9.73497 7 10.0002 7H20.0002C20.2654 7 20.5198 6.89464 20.7073 6.70711C20.8948 6.51957 21.0002 6.26522 21.0002 6C21.0002 5.73478 20.8948 5.48043 20.7073 5.29289C20.5198 5.10536 20.2654 5 20.0002 5ZM20.0002 10H10.0002C9.73497 10 9.48061 10.1054 9.29308 10.2929C9.10554 10.4804 9.00019 10.7348 9.00019 11C9.00019 11.2652 9.10554 11.5196 9.29308 11.7071C9.48061 11.8946 9.73497 12 10.0002 12H20.0002C20.2654 12 20.5198 11.8946 20.7073 11.7071C20.8948 11.5196 21.0002 11.2652 21.0002 11C21.0002 10.7348 20.8948 10.4804 20.7073 10.2929C20.5198 10.1054 20.2654 10 20.0002 10Z"/>
                            </svg>
                        </span>
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-left text-3.5 font-semibold">
                        Email
                        <span class="cursor-pointer inline-block align-middle ml-1 -mt-0.5" wire:click="order_by('title')">
                            <svg class="fill-white" width="21" height="12" viewBox="0 0 21 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.29019 3.71C5.38315 3.80373 5.49375 3.87812 5.61561 3.92889C5.73747 3.97966 5.86817 4.0058 6.00019 4.0058C6.1322 4.0058 6.2629 3.97966 6.38476 3.92889C6.50662 3.87812 6.61722 3.80373 6.71019 3.71C6.80391 3.61704 6.87831 3.50644 6.92908 3.38458C6.97985 3.26272 7.00598 3.13201 7.00598 3C7.00598 2.86799 6.97985 2.73728 6.92908 2.61542C6.87831 2.49356 6.80391 2.38296 6.71019 2.29L4.71019 0.29C4.61508 0.198959 4.50294 0.127594 4.38019 0.0799999C4.13672 -0.0200181 3.86365 -0.0200181 3.62019 0.0799999C3.49743 0.127594 3.38529 0.198959 3.29019 0.29L1.29019 2.29C1.10188 2.4783 0.996094 2.7337 0.996094 3C0.996094 3.2663 1.10188 3.5217 1.29019 3.71C1.47849 3.8983 1.73388 4.00409 2.00019 4.00409C2.26649 4.00409 2.52188 3.8983 2.71019 3.71L3.00019 3.41V8.59L2.71019 8.29C2.52188 8.1017 2.26649 7.99591 2.00019 7.99591C1.73388 7.99591 1.47849 8.1017 1.29019 8.29C1.10188 8.4783 0.996094 8.7337 0.996094 9C0.996094 9.2663 1.10188 9.5217 1.29019 9.71L3.29019 11.71C3.38529 11.801 3.49743 11.8724 3.62019 11.92C3.73989 11.9729 3.86931 12.0002 4.00019 12.0002C4.13106 12.0002 4.26049 11.9729 4.38019 11.92C4.50294 11.8724 4.61508 11.801 4.71019 11.71L6.71019 9.71C6.80342 9.61676 6.87738 9.50607 6.92785 9.38425C6.97831 9.26243 7.00428 9.13186 7.00428 9C7.00428 8.86814 6.97831 8.73757 6.92785 8.61575C6.87738 8.49393 6.80342 8.38324 6.71019 8.29C6.61695 8.19676 6.50626 8.1228 6.38443 8.07234C6.26261 8.02188 6.13204 7.99591 6.00019 7.99591C5.86833 7.99591 5.73776 8.02188 5.61594 8.07234C5.49411 8.1228 5.38342 8.19676 5.29019 8.29L5.00019 8.59V3.41L5.29019 3.71ZM10.0002 2H20.0002C20.2654 2 20.5198 1.89464 20.7073 1.70711C20.8948 1.51957 21.0002 1.26522 21.0002 1C21.0002 0.734784 20.8948 0.48043 20.7073 0.292893C20.5198 0.105357 20.2654 0 20.0002 0H10.0002C9.73497 0 9.48061 0.105357 9.29308 0.292893C9.10554 0.48043 9.00019 0.734784 9.00019 1C9.00019 1.26522 9.10554 1.51957 9.29308 1.70711C9.48061 1.89464 9.73497 2 10.0002 2ZM20.0002 5H10.0002C9.73497 5 9.48061 5.10536 9.29308 5.29289C9.10554 5.48043 9.00019 5.73478 9.00019 6C9.00019 6.26522 9.10554 6.51957 9.29308 6.70711C9.48061 6.89464 9.73497 7 10.0002 7H20.0002C20.2654 7 20.5198 6.89464 20.7073 6.70711C20.8948 6.51957 21.0002 6.26522 21.0002 6C21.0002 5.73478 20.8948 5.48043 20.7073 5.29289C20.5198 5.10536 20.2654 5 20.0002 5ZM20.0002 10H10.0002C9.73497 10 9.48061 10.1054 9.29308 10.2929C9.10554 10.4804 9.00019 10.7348 9.00019 11C9.00019 11.2652 9.10554 11.5196 9.29308 11.7071C9.48061 11.8946 9.73497 12 10.0002 12H20.0002C20.2654 12 20.5198 11.8946 20.7073 11.7071C20.8948 11.5196 21.0002 11.2652 21.0002 11C21.0002 10.7348 20.8948 10.4804 20.7073 10.2929C20.5198 10.1054 20.2654 10 20.0002 10Z"/>
                            </svg>
                        </span>
                    </th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">Active</th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">Created at</th>
                    <th scope="col" class="text-sm sm:text-base px-2 py-2 text-center text-3.5 font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subscribers as $subscriber)
                <tr class="border-b">
                    <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle text-center">{{ $subscriber->id }}</td>
                    <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle">{{ $subscriber->email }}</td>
                    <td class="text-sm md:text-base text-neutral-800 font-medium text-4 px-2 py-2 whitespace-nowrap align-middle text-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" {{ $subscriber->active ? 'checked' : '' }} class="sr-only peer" wire:click="set_active({{ $subscriber->id }})">
                            <div class="w-11 h-6 bg-red-500 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                    </td>
                    <td class="text-sm md:text-base text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle  text-center">{{ $subscriber->created_at }}</td>
                    <td class="text-sm text-neutral-800 font-normal text-4 px-2 py-2 whitespace-nowrap align-middle  text-center">
                        <a href="" wire:click.prevent="delete_subscriber({{ $subscriber }})" class="text-red-500 underline underline-offset-2 font-bold">Delete subscriber</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
       
    </div>
    <div>{{ $subscribers->onEachSide(3)->links('custom-pagination-links-view') }}</div>
    
</div>




