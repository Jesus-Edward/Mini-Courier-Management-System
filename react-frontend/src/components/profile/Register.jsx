import React, { useEffect, useState } from "react";
import { axiosRequest } from "../../helpers/config";
import { Link, Navigate, useNavigate } from "react-router-dom";
import { toast } from "react-toastify";
import renderErrors from "../custom/useValidation";
import { useSelector } from "react-redux";

export default function Register() {
    const { isLoggedIn } = useSelector((state) => state.user);

    const navigate = useNavigate();
    const [form, setForm] = useState({
        name: "",
        email: "",
        password: "",
    });
    const [loading, setLoading] = useState(false);
    const [validationError, setValidationError] = useState([]);
    const [error, setError] = useState(null);

    const handleSubmit = async (e) => {
        e.preventDefault();
        setLoading(true);

        try {
            const response = await axiosRequest.post("user/create", form);
            setLoading(false);
            toast.success(response.data.message);
            setValidationError([]);
            setError(null);
            setForm({
                name: "",
                email: "",
                password: "",
            });
            navigate("/login");
            // console.log(response.data.message);
        } catch (error) {
            if (error?.response?.status == 422) {
                setValidationError(error.response.data.errors);
            }
            if (error?.response.status === 500) {
                setError("Email already taken.");
            }
            // console.log(error);
            setForm({
                name: "",
                email: "",
                password: "",
            });
            setLoading(false);

            navigate("/register");
        }
    };

    useEffect(() => {
        if (isLoggedIn) {
            navigate("/");
        }
    }, [isLoggedIn]);

    return (
        <div className="bg-blue-900">
            <div className="flex justify-center items-center">
                <div className="my-28">
                    <div className="mb-7 flex justify-center items-center">
                        <img src="logo.png" alt="Logo" className="h-10 w-40" />
                    </div>
                    <div className="flex justify-center items-center">
                        <div className="min-h-[430px] w-[600px]  bg-gray-100 rounded-2xl">
                            <h2 className="my-9 text-xl font-serif font-semibold text-center">
                                Register
                            </h2>

                            <form onSubmit={handleSubmit}>
                                <div className="mx-7">
                                    <div className="mb-3">
                                        <div className="mb-1">
                                            <label
                                                htmlFor="name"
                                                className="text-slate-600 font-sans"
                                            >
                                                Name:*
                                            </label>
                                        </div>
                                        <input
                                            id="name"
                                            type="text"
                                            placeholder="Enter Name"
                                            className="w-full border border-orange-400 px-4 py-2 placeholder-slate-600 rounded-md focus:outline-none"
                                            value={form.name}
                                            onChange={(e) =>
                                                setForm({
                                                    ...form,
                                                    name: e.target.value,
                                                })
                                            }
                                            // required
                                        />
                                    </div>
                                    {renderErrors(validationError, "name")}
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
                                            // required
                                        />
                                    </div>
                                    {renderErrors(validationError, "email")}
                                    <div className="text-red-500 text-sm -mt-2">
                                        {error}
                                    </div>
                                    <div className="mb-3">
                                        <div className="mb-1">
                                            <label
                                                htmlFor="password"
                                                className="text-slate-600 font-sans"
                                            >
                                                Password:*
                                            </label>
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
                                                    password: e.target.value,
                                                })
                                            }
                                            // required
                                        />
                                    </div>
                                    {renderErrors(validationError, "password")}
                                    <div className="my-4 flex justify-between">
                                        <p className="text-slate-600">
                                            Do you have an account ?{" "}
                                        </p>
                                        <Link
                                            to="/login"
                                            className="text-blue-500 text-decoration: underline hover:text-blue-700"
                                        >
                                            Login
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
                                                    ? "Registering"
                                                    : "Sign Up"}
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
    );
}
