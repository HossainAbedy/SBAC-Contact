<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Contacts') }}
        </h2>
       <div class="mt-6 flex items-center justify-end gap-x-6">   
          
            <div class="pull-right">
                <a class="btn btn-primary rounded-md  bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('contacts.store') }}"> Add Contacts</a>
            </div>
        </div> 
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="myForm" action="{{ route('contacts.update', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')            
                        <div class="border-b border-gray-900/10 pb-12">
                            <div class="flex flex-col items-center">
                                <h2 class="text-base font-semibold leading-7 text-gray-900">Edit Contact Information</h2>
                                <p class="mt-1 text-sm leading-6 text-gray-600">Enter web links for link section</p>
                            </div>
                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="branch" class="block text-sm font-medium leading-6 text-gray-900">Branch</label>
                                    <div class="mt-2">
                                        <input type="text" name="branch" id="branch" value="{{ $contact->branch }}" autocomplete="branch" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="branch_code" class="block text-sm font-medium leading-6 text-gray-900">Branch Code</label>
                                    <div class="mt-2">
                                        <input type="text" name="branch_code" id="branch_code" value="{{ $contact->branch_code }}" autocomplete="branch_code" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="department" class="block text-sm font-medium leading-6 text-gray-900">Department</label>
                                    <div class="mt-2">
                                        <input type="text" name="department" id="department" value="{{ $contact->department }}" autocomplete="department" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" value="{{ $contact->name }}" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="empid" class="block text-sm font-medium leading-6 text-gray-900">Employee ID</label>
                                    <div class="mt-2">
                                        <input type="text" name="empid" id="empid" value="{{ $contact->empid }}" autocomplete="empid" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="designation" class="block text-sm font-medium leading-6 text-gray-900">Designation</label>
                                    <div class="mt-2">
                                        <input type="text" name="designation" id="designation" value="{{ $contact->designation }}" autocomplete="designation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="mobile_number" class="block text-sm font-medium leading-6 text-gray-900">Mobile Number</label>
                                    <div class="mt-2">
                                        <input type="text" name="mobile_number" id="mobile_number" value="{{ $contact->mobile_number }}" autocomplete="mobile_number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="telephone_number" class="block text-sm font-medium leading-6 text-gray-900">Telephone Number</label>
                                    <div class="mt-2">
                                        <input type="text" name="telephone_number" id="telephone_number" value="{{ $contact->telephone_number }}" autocomplete="telephone_number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                                    <div class="mt-2">
                                        <input type="text" name="email" id="email" value="{{ $contact->email }}" autocomplete="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                                </div>
                            </div>    
                        </div>     
                    </form>
                    <script>
                        function resetForm() {
                            document.getElementById('myForm').reset();
                        }
                    </script>
                </div>
            </div>
        </div>
</x-app-layout>
