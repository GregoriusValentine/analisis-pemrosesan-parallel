@extends('layouts.app')

@section('content')
<div class="flex flex-row flex-wrap flex-grow mt-2">
    <div class="w-full p-3">
        <div class="bg-white border rounded shadow">
            <div class="border-b p-3 px-5">
                <h5 class="font-bold uppercase text-gray-600">Data Perbandingan Hasil <span class="text-indigo-600 hover:text-indigo-500">Percobaan</span></h5>
            </div>
            <div class="p-5">
                <div data-te-datatable-init>
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Execution Time Parallel</th>
                        <th>Execution Time Basic</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->execution_time }}</td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('helper.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
@endpush

@push('style')
<style>
    .list-reset a {
        padding: 0.75rem 0 !important; 
    }
</style>
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
@endpush