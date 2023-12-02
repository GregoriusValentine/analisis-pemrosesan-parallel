@extends('layouts.app')

@section('content')
<div class="flex flex-row flex-wrap flex-grow mt-2">
    <div class="w-full p-3">
        <div class="bg-white border rounded shadow mb-5">
            <div class="border-b p-3 px-5">
                <h5 class="font-bold uppercase text-gray-600">Data Perbandingan Hasil <span class="text-blue-800 hover:text-blue-700">Percobaan</span></h5>
            </div>
            <div class="p-5">
                <div data-te-datatable-init>
                <table>
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th class="mx-auto">Execution Time Parallel</th>
                        <th class="mx-auto">Execution Time Basic</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($comparison as $item)
                        <tr>
                            <td>Percobaan ke-{{ $item['num'] }}</td>
                            <td class="mx-auto">{{ $item['p_exec_time'] }} detik</td>
                            <td class="mx-auto">{{ $item['b_exec_time'] }} detik</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="w-full mb-3 flex flex-wrap gap-5">
            <div class="w-full md:w-1/2 bg-white border rounded shadow mb-3">
                <div class="border-b p-3 px-5">
                    <h5 class="font-bold uppercase text-gray-600">Data Percobaan <span class="text-indigo-600 hover:text-indigo-500">Parallel</span></h5>
                </div>
                <div class="p-5">
                    <div data-te-datatable-init>
                    <table>
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th class="mx-auto">Execution Time</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($parallel as $item)
                            <tr>
                                <td>Percobaan ke-{{ $item->number }}</td>
                                <td class="mx-auto">{{ $item->execution_time }} detik</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 bg-white border rounded shadow mb-3">
                <div class="border-b p-3 px-5">
                    <h5 class="font-bold uppercase text-gray-600">Data Percobaan <span class="text-green-600 hover:text-green-500">Basic</span></h5>
                </div>
                <div class="p-5">
                    <div data-te-datatable-init>
                    <table>
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th class="mx-auto">Execution Time</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($basic as $item)
                            <tr>
                                <td>Percobaan ke-{{ $item->number }}</td>
                                <td class="mx-auto">{{ $item->execution_time }} detik</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <button id="delete" type="button" class="bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded-lg shadow-lg mb-3">Clear Research Data</button>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('helper.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click','#delete',function(e){
            e.preventDefault();
            let confirmKey = prompt("Masukkan kode untuk menghapus semua data.");
            Ajax.delete(`{{ route('result.delete.all') }}?confirm_key=${confirmKey}`, 
                (response) => {
                    alert(response?.message ?? 'Berhasil reset!');
                    location.reload();
                },
                (error) => {
                    alert(error?.responseJSON?.message ?? 'Gagal!');
                }
            );

        })

    });
</script>
@endpush

@push('style')
<style>

.list-reset a {padding: 0.75rem 0 !important;}
</style>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
<style>
    
    
    @media (min-width: 320px){
        .container {
            max-width: 100% !important;
        }
    }
    @media (min-width: 768px) {
        .container {
            max-width: 768px!important;
        }
    }
    @media (min-width: 1024px) {
        .container {
            max-width: 1024px!important;
        }
    }
    @media (min-width: 1280px) {
        .container {
            max-width: 1280px!important;
        }
    }
    @media (min-width: 1536px){
        .container {
            max-width: 1536px!important;
        }
    }
    
    
    
</style>
@endpush