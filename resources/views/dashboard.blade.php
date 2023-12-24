<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <div class="mt-6 flex items-center justify-end gap-x-6">
            <div class="pull-right">
                <a class="btn btn-primary rounded-md  bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('contacts.create') }}"> Add Contact</a>
            </div>
        </div>
    </x-slot>
            <div class="py-4 bg-gray-200">
                <div class="mx-auto max-w-7xl sm:px-2 lg:px-3">
                    <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
                    <div class="flex justify-between items-center mt-4">
                        <div>
                            <label for="showEntries" class="text-xs px-5">Show entries:</label>
                            <select class="bg-white-500 text-gray-700 text-xs px-5 py-1 rounded-md ml-2" id="showEntries" onchange="changeEntries()">
                                <option class="bg-white-500 text-gray-700 text-xs px-5 py-1 rounded-md ml-2" value="10">10</option>
                                <option class="bg-white-500 text-gray-700 text-xs px-5 py-1 rounded-md ml-2" value="20">20</option>
                                <option class="bg-white-500 text-gray-700 text-xs px-5 py-1 rounded-md ml-2" value="50">50</option>
                                <option class="bg-white-500 text-gray-700 text-xs px-5 py-1 rounded-md ml-2" value="100">100</option>
                            </select>
                        </div>
                        <div>
                            <input type="text" id="searchInput" class="px-3 py-1 text-xs border rounded-md" placeholder="Search...">
                            <button onclick="searchTable()" class="bg-blue-500 text-white text-xs px-3 py-1 rounded-md ml-2 mr-2">Search</button>
                        </div>
                    </div>
                        <div class="p-2">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden text-xs sm:text-sm md:text-base">
                                    <caption class="caption-top">List of all employees currently at SBAC Bank</caption>
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Branch</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Branch Code</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Department</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Name</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Employee ID</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Designation</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Mobile Number</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Telephone Number</th>
                                            <th class="px-3 hover:bg-blue-100 py-2 text-left text-xs font-semibold text-gray-700">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($datas['contacts'] as $index => $contact)
                                        <tr class="{{ $index % 2 === 0 ? 'bg-gray-200' : 'bg-white-200'  }} hover:bg-blue-500">
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->branch }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->branch_code }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->department }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">
                                                <div class="flex items-center whitespace-nowrap">
                                                    @php
                                                        // Find the user with the matching empid
                                                        $user = $datas['users']->firstWhere('empid', $contact->empid);
                                                    @endphp
                                                    @if ($user && $user->img && file_exists(public_path($user->img)))
                                                        <img src="{{ $user->img }}" alt="{{ $user->img }}" class="w-8 h-8 rounded-full mr-2">
                                                    @else
                                                        <img src="/images/default.jpg" alt="Default Image" class="w-8 h-8 rounded-full mr-2">
                                                    @endif
                                                    {{ $contact->name }}
                                                </div>                                               
                                            </td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->empid }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->designation }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->mobile_number }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->telephone_number }}</td>
                                            <td class="px-3 text-xs hover:bg-blue-100 py-2 whitespace-nowrap">{{ $contact->email }}</td>
                                            <td class="flex justify-center mt-4">
                                                <a class="mr-2 bg-yellow-500 text-white text-xs px-3 py-1 rounded-md" href="{{ route('contacts.edit', ['id' => $contact['id']]) }}">Edit</a>
                                                @if (auth()->user()->isAdmin() || auth()->user()->isBranchAdmin())
                                                <form method="POST" action="{{ route('contacts.delete', ['id' => $contact['id']]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-500 text-white text-xs px-3 py-1 rounded-md">Delete</button>
                                                </form>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="flex justify-center mt-4">
                            <button id="prevPageBtn" class="mr-2 bg-blue-500 text-white text-xs px-3 py-1 rounded-md" onclick="prevPage()">Previous</button>
                            <button id="nextPageBtn" class="bg-blue-500 text-white text-xs px-3 py-1 rounded-md" onclick="nextPage()">Next</button>
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
