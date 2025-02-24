@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('contents')
    <div class="flex items-center">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            <div class="rounded-lg shadow-lg w-70 h-40 bg-white">
                <div class="p-5 flex flex-col ">
                    <div class="rounded-lg overflow-hidden">
                        <h2 class="text-2xl">
                            Today's Parcels
                        </h2>
                        <hr class="mt-5">
                        <p class="mt-5">
                            <span class="text-xl">{{ $todaysParcels->count() }} Parcel(s)</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg w-70 h-40 bg-white">
                <div class="p-5 flex flex-col">
                    <div class="rounded-lg overflow-hidden">
                        <h2 class="text-2xl">
                            Yesterday's Parcels
                        </h2>
                        <hr class="mt-5">
                        <p class="mt-5">
                            <span class="text-xl">{{ $yesterdaysParcels->count() }} Parcel(s)</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg w-70 h-40 bg-white">
                <div class="p-5 flex flex-col">
                    <div class="rounded-lg overflow-hidden">
                        <h2 class="text-2xl">
                            Weekly Parcels
                        </h2>
                        <hr class="mt-5">
                        <p class="mt-5">
                            <span class="text-xl">{{ $weeklyParcels->count() }} Parcel(s)</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg w-70 h-40 bg-white">
                <div class="p-5 flex flex-col ">
                    <div class="rounded-lg overflow-hidden">
                        <h2 class="text-2xl">
                            Monthly Parcels
                        </h2>
                        <hr class="mt-5">
                        <p class="mt-5">
                            <span class="text-xl">{{ $monthlyParcels->count() }} Parcel(s)</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-lg shadow-lg w-70 h-40 bg-white">
                <div class="p-5 flex flex-col ">
                    <div class="rounded-lg overflow-hidden">
                        <h2 class="text-2xl">
                            Yearly Parcels
                        </h2>
                        <hr class="mt-5">
                        <p class="mt-5">
                            <span class="text-xl">{{ $yearlyParcels->count() }} Parcel(s)</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
