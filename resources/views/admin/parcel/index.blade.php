@extends('admin.layouts.master')

@section('title')
    Parcels({{ $parcels->count() }})
@endsection

@section('button')
    <a href="{{ route('admin.parcel.create') }}"
        class="bg-blue-600 font-semibold
    text-white p-2 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-600">Create
        parcels</a>
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
                        Image
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Name
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Tracking Number
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Courier Name
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Courier Phone
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Size
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Qty
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Price
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Estimated Delivery Date
                    </p>
                </th>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Receiver's Location
                    </p>
                </th>
                <th class="p-4 border-b border-slate-200 bg-slate-50">
                    <p class="text-sm font-normal leading-none text-slate-500">
                        Status
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
            @foreach ($parcels as $key => $parcel)
                <tr class="hover:bg-slate-50 border-b border-slate-200">
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $key + 1 }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <img src="{{ asset($parcel->parcel_image) }}" alt="{{ $parcel->name }}" class="w-20 h-20">
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->name }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->tracking_number }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->courier->name }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->courier->phone }}</p>
                    </td>

                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->size }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->qty }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">NGN {{ $parcel->price }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->estimated_delivery_date }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-slate-500">{{ $parcel->receiver_location }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-slate-500 text-sm">{{ $parcel->status }}</p>
                    </td>

                    <td class="p-4 py-5 md:flex mt-6 sm:flex lg:mt-7">
                        <a href="{{ route('admin.parcel.edit', $parcel->id) }}"
                            class="bg-indigo-500 p-2 rounded-sm
                        text-white">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="{{ route('admin.parcel.delete', $parcel->id) }}"
                            class="delete-item bg-red-500 text-white py-2 px-3 rounded-sm ml-2">
                            <i class="fas fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
