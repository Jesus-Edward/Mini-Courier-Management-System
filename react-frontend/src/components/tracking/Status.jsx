import React from 'react';
import {BuildingStorefrontIcon, CheckBadgeIcon, DocumentCheckIcon, TruckIcon} from '@heroicons/react/24/solid'

export default function Status({status}) {

    const initialStatus = [
        {
            name: 'In Store', icon: <BuildingStorefrontIcon className='h-8 w-8' />, pipe: '|'
        },
        {
            name: 'Shipped', icon: <DocumentCheckIcon className='h-8 w-8' />, pipe: '|'
        },
        {
            name: 'On Transit', icon: <TruckIcon className='h-8 w-8' />, pipe: '|'
        },
        {
            name: 'Delivered', icon: <CheckBadgeIcon className='h-8 w-8' />, pipe: ''
        },
        // 'In Store', 'Shipped', 'On Transit', 'Delivered'
    ]

    return (
        <div>
            <h2 className="text-center mb-2 text-2xl font-bold font-mono">
                Check your parcel's status
            </h2>
            {initialStatus.map((statuses, index) => (
                <div>
                    <p
                        key={index}
                        className={`${
                            status === statuses.name
                                ? "text-orange-500 font-bold font-mono"
                                : "text-slate-500"
                        } text-center text-xl`}
                    >
                        <p className="">{statuses.name}</p>
                        <p className='flex justify-center text-center'>{statuses.icon}</p>

                        <p className={`text-center text-2xl font-bold`}>
                            {statuses.pipe}
                        </p>
                    </p>
                </div>
            ))}
        </div>
    );
}
