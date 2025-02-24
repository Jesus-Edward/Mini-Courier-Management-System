import React from 'react';
import TrackingDataList from './TrackingDataList';
import Status from './Status';

export default function TrackingData({data}) {
    return (
        <div className="my-5 mx-20 w-[700px]flex justify-center items-center">
            <h2 className="flex justify-center items-center text-xl font-serif font-semibold">
                Courier Details for your tracking number{" "}
                {data?.data.tracking_number}
            </h2>

            <div className="my-2"></div>

            <TrackingDataList
                hardcoded="Parcel Name"
                dynamic={data?.data.name}
            />
            <TrackingDataList
                hardcoded="Sender Name"
                dynamic={data?.data.user?.name}
            />
            <TrackingDataList
                hardcoded="Sender Location"
                dynamic={data?.data.user?.city}
            />
            <TrackingDataList
                hardcoded="Receiver Name"
                dynamic={data?.data.receiver_name}
            />
            <TrackingDataList
                hardcoded="Receiver Location"
                dynamic={data?.data.receiver_location}
            />
            <TrackingDataList
                hardcoded="Estimated Delivery Date"
                dynamic={data?.data.estimated_delivery_date}
            />
            <TrackingDataList hardcoded="Weight" dynamic={data?.data.size} />
            <TrackingDataList
                hardcoded="Courier Fee"
                dynamic={data?.data.price}
            />
            <TrackingDataList
                hardcoded="Courier Name"
                dynamic={data.data.courier?.name}
            />
            <TrackingDataList
                hardcoded="Courier Phone"
                dynamic={data.data.courier?.phone}
            />

            <div className='h-[70%] bg-gray-200 p-5 my-4 container mx-auto w-[70%] rounded-md shadow-lg'>
                <Status status={data.data?.status} />
            </div>

        </div>
    );
}
