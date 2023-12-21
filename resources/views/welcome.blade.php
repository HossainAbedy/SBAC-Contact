<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SBAC CONTACTS</title>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-2 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="py-4 bg-gray-200">
                <div class="mx-auto max-w-7xl sm:px-2 lg:px-3">
                    <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
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
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
