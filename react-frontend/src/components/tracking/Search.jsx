import React, { useState } from "react";
import FormField from "../FormField";
import '../../../public/styles.css'
import CustomButton from "../CustomButton";
import {axiosRequest} from '../../helpers/config.js';
import TrackingData from '../tracking/TrackingData.jsx'
import Spinner from "../../Spinner.jsx";

export default function Search() {
    const [trackingNumber, setTrackingNumber] = useState("");
    const [trackingData, setTrackingData] = useState(null)
    const [isLoading, setIsLoading] = useState(false);
    const [error, setError] = useState("");

    const handleSubmit = async(e) => {
        e.preventDefault();
        setIsLoading(true)
        try {
            const response = await axiosRequest.get(`tracking/${trackingNumber}`);
            setTrackingData(response.data);
            setIsLoading(false)
            setTrackingNumber("")
            setError("");
            // console.log(response.data);

        } catch (error) {
            setError(error.response.data);
            setIsLoading(false);
             setTrackingNumber("");
            console.log(error);

        }
    }

    return (
        <>
            <div className="min-h-60">
                <div className="mt-10 -mb-5 flex justify-center">
                    <h1 className="text-2xl font-semibold font-mono underline">
                        Track your Parcel
                    </h1>
                </div>
                <p className="font-bold text-orange-400 flex justify-center mt-4">
                    Know where your parcel is and be safe.
                </p>
                <form onSubmit={handleSubmit}>
                    <div
                        className={`bg-white h-[200px] -mt-10 flex justify-center items-center
                            md:ml-48 fullScreenMargin smallScreenMargin tabScreenMargin`}
                    >
                        <FormField
                            placeHolder="Tracking Number"
                            type="text"
                            onChangeText={(e) =>
                                setTrackingNumber(e.target.value)
                            }
                            value={trackingNumber}
                            classes="rounded-full"
                        />
                    </div>
                    <CustomButton
                        type="submit"
                        isLoading={isLoading}
                        name={isLoading ? "Tracking..." : "Track Parcel"}
                        otherStyles="rounded-full"
                    />
                </form>

                {error && (
                    <div className="flex justify-center mt-5">
                        <div className=" bg-red-500 text-white px-3 py-3 flex justify-center items-center rounded-md w-96">
                            {error.error}
                        </div>
                    </div>
                )}

                {trackingData && <TrackingData data={trackingData} />}
            </div>
        </>
    );
}
