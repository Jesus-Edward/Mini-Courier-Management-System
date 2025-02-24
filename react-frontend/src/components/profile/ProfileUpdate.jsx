import React, { useState } from "react";
import renderErrors from "../custom/useValidation";
import { Link, useNavigate } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { axiosRequest, getConfig } from "../../helpers/config";
import { setCurrentUser } from "../../redux/slices/userSlice";
import { toast } from "react-toastify";

export default function ProfileUpdate() {

    const [loading, setLoading] = useState(false)
    const { user, token } = useSelector(state => state.user);
    const [form, setForm] = useState({
        address: user?.address,
        country: user?.country,
        city: user?.city,
        phone: user?.phone_number,
        zip_code: user?.zip_code,
    });
    const [validationError, setValidationError] = useState([]);
    const navigate = useNavigate();
    const dispatch = useDispatch();

    const handleSubmit  = async (e) => {

        e.preventDefault();

        try {
            const response = await axiosRequest.put(
                "update/profile/user",
                form,
                getConfig(token)
            );

            dispatch(setCurrentUser(response.data.user));

            setLoading(false);

            toast.success(response.data.message);

            navigate("/profile");
        } catch (error) {

            if (error?.response?.status == 422) {
                setValidationError(error.response.data.errors);
            }
            console.log(error);

            setLoading(false);

            navigate("/profile");
        }
    }

    return (
        <div className="my-10 w-full min-h-96 mx-auto">
            <p className="flex justify-center items-center font-bold text-2xl my-5">
                Update Profile Info
            </p>

            <div className="flex justify-center items-center">
                <div className="min-h-[430px] w-[600px]  bg-gray-100 rounded-2xl shadow-lg pt-5">


                    <form onSubmit={handleSubmit} className="">
                        <div className="mx-7">
                            <div className="mb-3">
                                <div className="mb-1">
                                    <label
                                        htmlFor="address"
                                        className="text-slate-600 font-sans"
                                    >
                                        Address:*
                                    </label>
                                </div>
                                <input
                                    id="address"
                                    type="text"
                                    placeholder="Enter Address"
                                    className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600  rounded-md focus:outline-none"
                                    value={form.address}
                                    onChange={(e) =>
                                        setForm({
                                            ...form,
                                            address: e.target.value,
                                        })
                                    }
                                />
                            </div>
                            {renderErrors(validationError, "address")}
                            <div className="mb-3">
                                <div className="flex justify-between">
                                    <label
                                        htmlFor="country"
                                        className="text-slate-600 font-sans mb-1"
                                    >
                                        Country:*
                                    </label>

                                </div>
                                <input
                                    id="country"
                                    type="text"
                                    placeholder="Enter Country"
                                    className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600 rounded-md focus:outline-none"
                                    value={form.country}
                                    onChange={(e) =>
                                        setForm({
                                            ...form,
                                            country: e.target.value,
                                        })
                                    }
                                />
                            </div>
                            {renderErrors(validationError, "country")}
                            <div className="mb-3">
                                <div className="flex justify-between">
                                    <label
                                        htmlFor="city"
                                        className="text-slate-600 font-sans mb-1"
                                    >
                                        City:*
                                    </label>

                                </div>
                                <input
                                    id="city"
                                    type="text"
                                    placeholder="Enter City"
                                    className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600 rounded-md focus:outline-none"
                                    value={form.city}
                                    onChange={(e) =>
                                        setForm({
                                            ...form,
                                            city: e.target.value,
                                        })
                                    }
                                />
                            </div>
                            {renderErrors(validationError, "city")}
                            <div className="mb-3">
                                <div className="flex justify-between">
                                    <label
                                        htmlFor="phone"
                                        className="text-slate-600 font-sans mb-1"
                                    >
                                        Phone:*
                                    </label>

                                </div>
                                <input
                                    id="phone"
                                    type="text"
                                    placeholder="Enter Phone Number"
                                    className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600 rounded-md focus:outline-none"
                                    value={form.phone}
                                    onChange={(e) =>
                                        setForm({
                                            ...form,
                                            phone: e.target.value,
                                        })
                                    }
                                />
                            </div>
                            {renderErrors(validationError, "phone")}
                            <div className="mb-3">
                                <div className="flex justify-between">
                                    <label
                                        htmlFor="zip_code"
                                        className="text-slate-600 font-sans mb-1"
                                    >
                                        Zip Code:*
                                    </label>

                                </div>
                                <input
                                    id="zip_code"
                                    type="text"
                                    placeholder="Enter Zip Code"
                                    className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600 rounded-md focus:outline-none"
                                    value={form.zip_code}
                                    onChange={(e) =>
                                        setForm({
                                            ...form,
                                            zip_code: e.target.value,
                                        })
                                    }
                                />
                            </div>
                            {renderErrors(validationError, "zip_code")}


                            <div className="my-7">
                                <button
                                    type="submit"
                                    disabled={loading}
                                    className="w-full text-center py-2 bg-orange-400 border border-orange-400 rounded-md text-white hover:bg-transparent hover:text-orange-400"
                                >
                                    <span>
                                        {loading ? "Updating..." : "Update Profile"}
                                    </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}
