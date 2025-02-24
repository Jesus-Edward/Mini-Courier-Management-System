@extends('admin.layouts.master')

@section('title')
    Create Couriers
@endsection

@section('contents')
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-lg" method="POST" action="{{ route('admin.courier.store') }}">
            @csrf
            <div class="mb-5">
                <label class="block text-sm text-gray-600" for="name">Courier Name</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('name') }}" id="name"
                    name="name" type="text" placeholder="Name of Courier" aria-label="Name">
            </div>
            @if ($errors->has('name'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('name') }}</strong>
                </small>
            @endif
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Courier Phone</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('phone') }}" id="phone"
                    name="phone" type="text" placeholder="Phone of Courier" aria-label="Name">
            </div>
            @if ($errors->has('phone'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('phone') }}</strong>
                </small>
            @endif

            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                    type="submit">Create</button>
            </div>

        </form>
    </div>
@endsection
