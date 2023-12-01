@extends('layouts.app')

@section('content')
<div class="flex flex-row flex-wrap flex-grow mt-2">
    <div class="w-full md:w-1/2 p-3">
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3 px-5">
                <h5 class="font-bold uppercase text-gray-600">Import Data Mode <span class="text-indigo-600 hover:text-indigo-500">Parallel</span></h5>
            </div>
            <div class="p-4">
                <form action="">
                    <div class="sm:col-span-3">
                       <label for="parallel-file" class="block text-sm font-medium leading-6 text-gray-900">File (csv/xlsx)</label>
                       <div class="mt-2">
                           <input type="file" name="parallel-file" id="parallel-file" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                       </div>
                   </div>
                   <div class="mt-6 flex items-center justify-center gap-x-6">
                        <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Reset</button>
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-full md:w-1/2 p-3">
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3 px-5">
                <h5 class="font-bold uppercase text-gray-600">Import Data Mode <span class="text-green-600 hover:text-green-500">Basic</span></h5>
            </div>
            <div class="p-4">
                <form action="">
                    <div class="sm:col-span-3">
                       <label for="basic-file" class="block text-sm font-medium leading-6 text-gray-900">File (csv/xlsx)</label>
                       <div class="mt-2">
                           <input type="file" name="basic-file" id="basic-file" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                       </div>
                   </div>
                   <div class="mt-6 flex items-center justify-center gap-x-6">
                        <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Reset</button>
                        <button type="submit" class="rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection