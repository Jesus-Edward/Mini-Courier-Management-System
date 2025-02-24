import React, { useState } from "react";
import ProfileUpdate from "./ProfileUpdate";
import { useDispatch, useSelector } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import { axiosRequest, getConfig } from "../../helpers/config";
import {
    setCurrentUser,
    setIsLoggedInOut,
    setToken,
} from "../../redux/slices/userSlice";
import { toast } from "react-toastify";
import { CameraIcon } from "@heroicons/react/24/solid";
import useValidation from "../custom/useValidation";
import '../../../public/styles.css'

export default function Profile() {
    const { user, token } = useSelector((state) => state.user);

    const dispatch = useDispatch();
    const navigate = useNavigate();
    const [file, setFile] = useState(null);
    const [image, setImage] = useState("");
    const [loading, setLoading] = useState(false);
    const [validationErrors, setValidationErrors] = useState([]);

    const logoutUser = async () => {
        try {
            const response = await axiosRequest.post(
                "user/logout/",
                null,
                getConfig(token)
            );

            dispatch(setCurrentUser(null));
            dispatch(setToken(" "));
            dispatch(setIsLoggedInOut(false));
            toast.success(response.data.message);
            navigate("/");
        } catch (error) {
            console.log(error);
        }
    };

    function handleImageSave(e) {
        setImage(e.target.files[0]);
    }

    function handleImageChange(e) {
        setFile(URL.createObjectURL(e.target.files[0]));
    }

    const handleImageUpload = async () => {
        setValidationErrors([]);
        setLoading(true);

        const formData = new FormData();
        formData.append("profile_image", image);
        formData.append("_method", "PUT");

        try {
            const response = axiosRequest.post(
                "update/profile/user",
                formData,
                getConfig(token, "multipart/form-data")
            );
            dispatch(setCurrentUser((await response).data.user));
            setImage(" ");
            setLoading(false);
            toast.success((await response).data.message);
        } catch (error) {
            if (error?.response?.status == 422) {
                setValidationErrors(error.response.data.errors);
            }
            console.log(error);
            setLoading(false);
            // navigate("/login");
        }
    };

    return (
        <div className="min-h-96 bg-purple-950 overflow-hidden">
            <div className="pb-10">
                <div className="px-10 py-5">
                    <span className="text-white font-sans text-3xl font-semibold">
                        Profile
                    </span>
                </div>

                <div className="mx-10 bg-purple-900 pt-10 rounded-lg shadow-lg">
                    <div className="bg-gradient-to-l from-orange-800 via-orange-300 to-orange-500 mx-10 h-[150px] rounded-lg shadow-lg"></div>
                    <div className="flex justify-center items-center -mt-12">
                        <img
                            src={file ? file : user?.profile_image}
                            alt={user?.name}
                            className="h-24 w-24 rounded-full z-10 shadow-lg"
                        />
                    </div>
                    <div className="absolute lg:left-[730px] lg:bottom-[115px] md:left-[500px] md:top-[410px] topPosition z-10">
                        <label htmlFor="cameraInput">
                            <CameraIcon className="w-5 h-5 cursor-pointer text-white" />
                        </label>
                    </div>
                    <input
                        type="file"
                        name=""
                        id="cameraInput"
                        hidden
                        onChange={(e) => {
                            handleImageSave(e), handleImageChange(e);
                        }}
                    />
                    {useValidation(validationErrors, "profile_image")}

                        <button
                            disabled={!image}
                            onClick={(e) => handleImageUpload()}
                            className="bg-orange-500 text-white -mb-2 p-1 rounded-lg cursor-pointer absolute right-[360px] top-[420px] lg:right-[600px] buttonPosition"
                        >
                            {loading ? 'Uploading...' : 'Upload'}
                        </button>

                    <div className="justify-center items-center flex pb-5 pt-3">
                        <div>
                            <p className="text-2xl text-white font-serif">
                                {user?.name}
                            </p>
                            <p className="text-white text-xl">{user?.email}</p>
                        </div>
                    </div>
                </div>

                <div className="mx-10 bg-purple-900 pt-5 rounded-lg mt-10 min-h-52 shadow-lg">
                    <h2 className="text-2xl text-white font-semibold px-10 mb-5">
                        Preferences
                    </h2>

                    <div className="w-full">
                        <div className="flex justify-center items-center ">
                            <div>
                                <Link
                                    to="/update/profile"
                                    className="bg-orange-500 text-white px-10 py-2.5 rounded-lg mr-5"
                                >
                                    Update Profile
                                </Link>
                                <button
                                    onClick={logoutUser}
                                    className="bg-orange-500 text-white px-10 py-2 rounded-lg"
                                >
                                    Logout
                                </button>
                            </div>
                        </div>
                        <div className=" flex justify-center items-center my-5">
                            <Link to='/user/parcels' className="bg-orange-500 text-white px-10 py-2 rounded-lg mr-5">
                                All Parcels
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
