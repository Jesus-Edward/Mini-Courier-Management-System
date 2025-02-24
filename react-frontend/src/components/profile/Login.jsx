import React, { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import { axiosRequest } from "../../helpers/config";
import renderErrors from "../custom/useValidation";
import {
    setCurrentUser,
    setIsLoggedInOut,
    setToken,
} from "../../redux/slices/userSlice";

export default function Login() {

    const dispatch = useDispatch();
    const [loading, setLoading] = useState(false);
    const { isLoggedIn } = useSelector((state) => state.user);

    const navigate = useNavigate();
    const [form, setForm] = useState({
        email: "",
        password: "",
    });
    const [validationError, setValidationError] = useState([]);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setValidationError([]);
        setLoading(true);

        try {
            const response = await axiosRequest.post("user/login", form);
            setLoading(false);
            dispatch(setCurrentUser(response.data.user));
            dispatch(setToken(response.data.accessToken));
            dispatch(setIsLoggedInOut(true));
            toast.success(response.data.message);
            setValidationError([]);
            setForm({
                email: "",
                password: "",
            });
            navigate("/profile");
            console.log(response);

        } catch (error) {
            if (error?.response?.status == 422) {
                setValidationError(error.response.data.errors);
            }

            if (error?.response.status === 401) {
                toast.error(error?.response?.data.error);
            }
            // console.log(error);
            setForm({
                email: "",
                password: "",
            });
            setLoading(false);

            navigate("/login");
        }
    };

    useEffect(() => {
        if (isLoggedIn) {
            navigate("/profile");
        }
    }, [isLoggedIn]);

    return (
        <div>
            <div className="bg-blue-900">
                <div className="flex justify-center items-center">
                    <div className="my-28">
                        <div className="mb-7 flex justify-center items-center">
                            <img
                                src="logo.png"
                                alt="Logo"
                                className="h-10 w-40"
                            />
                        </div>
                        <div className="flex justify-center items-center">
                            <div className="h-[430px] w-[600px]  bg-gray-100 rounded-2xl">
                                <h2 className="my-9 text-xl font-serif font-semibold text-center">
                                    Sign In
                                </h2>

                                <form onSubmit={handleSubmit}>
                                    <div className="mx-7">
                                        <div className="mb-3">
                                            <div className="mb-1">
                                                <label
                                                    htmlFor="email"
                                                    className="text-slate-600 font-sans"
                                                >
                                                    Email:*
                                                </label>
                                            </div>
                                            <input
                                                id="email"
                                                type="text"
                                                placeholder="Enter Email"
                                                className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600  rounded-md focus:outline-none"
                                                value={form.email}
                                                onChange={(e) =>
                                                    setForm({
                                                        ...form,
                                                        email: e.target.value,
                                                    })
                                                }
                                            />
                                        </div>
                                        {renderErrors(validationError, "email")}
                                        <div className="mb-3">
                                            <div className="flex justify-between">
                                                <label
                                                    htmlFor="password"
                                                    className="text-slate-600 font-sans mb-1"
                                                >
                                                    Password:*
                                                </label>
                                                <a
                                                    href="#"
                                                    className="text-blue-500"
                                                >
                                                    Forget Password ?
                                                </a>
                                            </div>
                                            <input
                                                id="password"
                                                type="password"
                                                placeholder="Enter Password"
                                                className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600 rounded-md focus:outline-none"
                                                value={form.password}
                                                onChange={(e) =>
                                                    setForm({
                                                        ...form,
                                                        password:
                                                            e.target.value,
                                                    })
                                                }
                                            />
                                        </div>
                                        {renderErrors(validationError, "password")}
                                        <div className="my-4 flex justify-between">
                                            <p className="text-slate-600">
                                                Are you new here ?{" "}
                                            </p>
                                            <Link
                                                to="/register"
                                                className="text-blue-500 text-decoration: underline hover:text-blue-700"
                                            >
                                                Register
                                            </Link>
                                        </div>

                                        <div className="my-7">
                                            <button
                                                type="submit"
                                                disabled={loading}
                                                className="w-full text-center py-2 bg-orange-400 border border-orange-400 rounded-md text-white hover:bg-transparent hover:text-orange-400"
                                            >
                                                <span>
                                                    {loading
                                                        ? "Logging in..."
                                                        : "Login"}
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
