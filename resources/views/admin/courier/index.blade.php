@extends('admin.layouts.master')

@section('title')
    Couriers({{ $couriers->count() }})
@endsection

@section('button')
    <a href="{{ route('admin.courier.create') }}"
        class="bg-blue-600 font-semibold
    text-white p-2 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-600">Create
        Courier</a>
@endsection

@section('contents')
    <table id="search-table">
        <thead>
            <tr>

                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        S/N
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Name
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Phone
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Action
                    </p>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($couriers as $key => $courier)
                <tr class="hover:bg-slate-50 border-b border-slate-200">
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $key + 1 }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $courier->name }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $courier->phone }}</p>
                    </td>
                    <td class=" py-5 flex mt-2">
                        <a href="{{ route('admin.courier.edit', $courier->id) }}" class="bg-indigo-500 p-1 rounded-sm">
                            <i class="fas fa-pen text-white"></i>
                        </a>
                        <a href="{{ route('admin.courier.destroy', $courier->id) }}"
                            class="delete-item bg-red-500 py-1 px-2 rounded-sm ml-2">
                            <i class="fas fa-times text-white"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
