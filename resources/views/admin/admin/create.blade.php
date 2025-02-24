@extends('admin.layouts.master')

@section('title')
    Create Admins
@endsection

@section('contents')
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-lg" method="POST" action="{{ route('admin.admin.store-admin') }}">
            @csrf
            <div class="mb-5">
                <label class="block text-sm text-gray-600" for="name">Admin Name</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('name') }}" id="name"
                    name="name" type="text" placeholder="Name" aria-label="Name">
            </div>
            @if ($errors->has('name'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('name') }}</strong>
                </small>
            @endif
            <div class="mb-5">
                <label class="block text-sm text-gray-600" for="name">Admin Email</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('phone') }}" id="phone"
                    name="email" type="text" placeholder="Email" aria-label="Name">
            </div>
            @if ($errors->has('email'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('email') }}</strong>
                </small>
            @endif
            <div class="">
                <label class="block text-sm text-gray-600" for="name">Admin Password</label>
                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="phone"
                    name="password" type="password" placeholder="Password" aria-label="Name">
            </div>
            @if ($errors->has('password'))
                <small class="text-red-500">
                    <strong>{{ $errors->first('password') }}</strong>
                </small>
            @endif

            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded"
                    type="submit">Create</button>
            </div>

        </form>
    </div>
@endsection
