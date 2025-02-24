@extends('admin.layouts.master')

@section('title')
    Update Parcels
@endsection

@section('contents')
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-lg" method="POST" action="{{ route('admin.parcel.update', $parcel->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Parcel Name</label>
                <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" value="{{ $parcel->name }}" id="name"
                    name="name" type="text" placeholder="Name of Products" aria-label="Name">
            </div>
            @if ($errors->has('name'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('name') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Quantity</label>
                <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" value="{{ $parcel->qty}}" id="name"
                    name="qty" type="number" placeholder="Quantity" aria-label="Name">
            </div>
            @if ($errors->has('qty'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('qty') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Parcel Size</label>
                <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" value="{{ $parcel->size }}" id="name"
                    name="size" type="text" placeholder="Size" aria-label="Name">
            </div>
            @if ($errors->has('size'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('size') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Price</label>
                <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" value="{{ $parcel->price }}" id="name"
                    name="price" type="Number" placeholder="Price" aria-label="Name">
            </div>
            @if ($errors->has('price'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('price') }}</strong>
                </small>
            @endif

            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Receiver Name</label>
                <input rows="10" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name"
                    name="receiver_name" type="text" placeholder="Receiver Name" aria-label="Name" value="{{ $parcel->receiver_name }}" />

            </div>
            @if ($errors->has('receiver_name'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('receiver_name') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Receiver Location</label>
                <input rows="10" class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name"
                    name="receiver_location" type="text" placeholder="Receiver Location" aria-label="Name" value="{{ $parcel->receiver_location }}" />

            </div>
            @if ($errors->has('receiver_location'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('receiver_location') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Estimated Delivery Date</label>
                <input  class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="name"
                    name="estimated_delivery_date" type="date" placeholder="Estimated Delivery Date" aria-label="Name" value="{{ $parcel->estimated_delivery_date }}" />

            </div>
            @if ($errors->has('estimated_delivery_date'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('estimated_delivery_date') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="status">Courier</label>
                <select name="courier" id="courier" class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded">
                    @foreach($couriers as $courier)
                        <option @selected($parcel->courier_id === $courier->id)
                        value="{{ $courier->id }}">{{ $courier->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('courier'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('courier') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="status">Status</label>
                <select name="user" id="status" class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded">
                    @foreach($users as $user)
                        <option @selected($parcel->user_id === $user->id) value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('user'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('user') }}</strong>
                </small>
            @endif
            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="status">Status</label>
                <select name="status" id="status" class="w-full px-5 py-3 text-gray-700 bg-gray-200 rounded">
                    @foreach(['In Store' => 'In Store', 'Shipped' => 'Shipped', 'On Transit' => 'On Transit', 'Delivered' => 'Delivered'] as $key => $value)
                        <option @selected($parcel->status === $value) value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('status'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('status') }}</strong>
                </small>
            @endif

            <div class="mt-3">
                <label class="block text-sm text-gray-600" for="name">Parcel Image</label>
                <input class="w-full px-5 py-2 text-gray-700 bg-gray-200 rounded" id="parcel_image"
                    name="parcel_image" type="file" placeholder="Name of Products" aria-label="Name">
            </div>
            @if ($errors->has('parcel_image'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('parcel_image') }}</strong>
                </small>
            @endif
            <div class="mt-2">
                <img src="{{ asset($parcel->parcel_image) }}" id="parcel_image_preview" class="w-20 h-20 rounded mb-2">
            </div>

            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                    type="submit">Update</button>
            </div>

        </form>
    </div>
@endsection
