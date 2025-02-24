import React, { useEffect, useState } from 'react';
import { axiosRequest, getConfig } from '../../helpers/config';
import { toast } from 'react-toastify';
import { useSelector } from 'react-redux';
import Status from '../tracking/Status';
import { ArrowDownTrayIcon } from '@heroicons/react/24/solid';

export default function UserParcels() {

    const [userParcel, setUserParcel] = useState(null);
    const [loadParcel, setLoadParcel] = useState(false);
    const { token } = useSelector(state => state.user);
    const [isExpanded, setIsExpanded] = useState(false);
    const [parcelToShow, setParcelToShow] = useState(5);

    const loadMore = () => {
        if (parcelToShow > userParcel?.length) {
            return;
        }else {
            setParcelToShow((prevParcelToShow) => prevParcelToShow += 5)
        }
    }

    const toggleExpand = (parcelId) => {
        setIsExpanded((prevId) => prevId === parcelId ? null : parcelId);
    }

    const getUserParcel = async () => {
        // e.preventDefault();
        setLoadParcel(true);

        try {
            const response = await axiosRequest.get(
                "user/parcels",
                getConfig(token)
            );
            setUserParcel(response.data);
            setLoadParcel(false);
            // console.log(response.data);
        } catch (error) {
            // toast.error(error?.response.data.error)
            console.log(error);
            setLoadParcel(false);
        }
    };

    useEffect(() => {
        getUserParcel()
    }, [])

    return (
        <div className="w-full min-h-[350px] bg-blue-950">
            <h1 className='flex justify-center items-center font-bold text-2xl text-white py-5'>All your parcels</h1>
            {userParcel?.data.slice(0, parcelToShow).map((parcel) => (
                <div
                    key={parcel.id}
                    className="bg-blue-900 px-10 py-5 mx-10 shadow-lg cursor-pointer"
                >
                    <div
                        onClick={() => toggleExpand(parcel.id)}
                        className="text-semibold text-white mx-auto"
                    >
                        <p className="text-lg font-semibold">{parcel?.name}</p>
                    </div>
                    <div
                        className={`overflow-hidden transition-all duration-500 ease-in-out ${
                            isExpanded === parcel.id ? "min-h-[50px]" : "h-0"
                        }`}
                    >
                        <div className="bg-gray-100 p-4 rounded-lg shadow-md">
                            <table className="w-full">
                                <thead className="border-b-2">
                                    <tr className="">
                                        <th className="">Tracking Number</th>
                                        <th>Status</th>
                                        <th>Receiver Location</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>

                                <tbody className="">
                                    <tr>
                                        <td className="">
                                            {parcel.tracking_number}
                                        </td>
                                        <td>{parcel.status}</td>
                                        <td>{parcel.receiver_location}</td>
                                        <td>NGN {parcel.price}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            ))}

            {parcelToShow < userParcel?.data.length && (
                <div className="bg-blue-900 mt-5 w-32 text-center mx-auto px-2 py-2 rounded-md flex">
                    <button
                        onClick={loadMore}
                        className="text-white font-semibold mr-1"
                    >
                        Load More
                    </button>
                    <ArrowDownTrayIcon className="h-6 w-6 text-white mr-1 -mt-1" />
                </div>
            )}
        </div>
    );
}
