import React, { useEffect, useRef, useState } from "react";
import { GiHamburgerMenu } from "react-icons/gi";
import { FaTimes } from "react-icons/fa";
import "../../../public/styles.css";
import { ArrowLeftIcon, ArrowRightIcon, PhoneIcon, UserCircleIcon } from "@heroicons/react/24/solid";
import { Link, useNavigate } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { axiosRequest, getConfig } from "../../helpers/config";
import { setCurrentUser, setIsLoggedInOut, setToken } from "../../redux/slices/userSlice";
import { toast } from "react-toastify";

const Navlink = () => {

    const [popUp, setPopUp] = useState(false);
    const [profilePopUp, setProfilePopUp] = useState(false);

    const handlePopUp = () => {
        setPopUp(!popUp)
    }


    const handleProfilePopUp = () => {
        setProfilePopUp(!profilePopUp);
    }

    let menuRef = useRef()

    useEffect(() => {
        let handler = (e) => {
            if(!menuRef.current.contains(e.target)) {
             setProfilePopUp(false)
            }
        };

        document.addEventListener('mousedown', handler);

        return()=> {
            document.removeEventListener('mousedown', handler)
        }
    });

    return (
        <>
            <a
                href="#aboutPage"
                className="text-slate-500 hover:text-black hover:underline"
            >
                About
            </a>
            <a
                href="#servicePage"
                className="text-slate-500 hover:text-black hover:underline"
            >
                Services
            </a>
            <a
                href="#contactPage"
                className="text-slate-500 hover:text-black hover:underline"
            >
                Contact
            </a>
            <div ref={menuRef}>
                <button className="" onClick={handleProfilePopUp}>
                    <UserCircleIcon className="h-8 w-8 -mt-0.5" />
                </button>
            {profilePopUp && <ProfilePopUp />}
            </div>
            <div className="">
                <button
                    onClick={handlePopUp}
                    className="bg-slate-500 py-0.5 px-2 -mt-1 rounded-full text-white hover:bg-black"
                >
                    Call for Pickup
                </button>
                {popUp && <CallPopUp />}
            </div>
        </>
    );
};

export default function Nav() {
    const [open, setOpen] = useState(false);
    const toggleNavbar = () => {
        setOpen(!open);
    };

    return (
        <>
            <nav className="w-[30rem] flex justify-end">
                <div className="hidden w-full md:flex justify-between">
                    <Navlink />
                </div>
                <div className="md:hidden toggle">
                    <button
                        onClick={toggleNavbar}
                        className={`${open ? "bringDown" : ""}`}
                    >
                        {open ? <FaTimes /> : <GiHamburgerMenu />}
                    </button>
                </div>
            </nav>
            {open && (
                <div className="flex basis-full flex-col items-center nav_links">
                    <Navlink />
                </div>
            )}
        </>
    );
}

const CallPopUp = () => {

    return (
        <>
            <div className="bg-white h-16 w-34 rounded-md my-1 flex justify-center items-center shadow-sm absolute -bottom-6 right-1">
                <PhoneIcon className="w-5 h-5 ml-1" />
                <p className="px-2"> +2348103694508</p>
            </div>
        </>
    );
}
const ProfilePopUp = () => {

    const { isLoggedIn, token } = useSelector((state) => state.user);
    const dispatch = useDispatch();
    const navigate = useNavigate();

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

    return (
        <>
            <div className="bg-white h-16 w-34  rounded-md my-1 justify-center items-center shadow-sm absolute right-[150px] -bottom-6">
                <div className="px-5 py-1">
                    {isLoggedIn && (
                        <div className="my-1">
                            <Link to="/profile" className="flex justify-start">
                                <UserCircleIcon className="h-5 w-5" />
                                <p className="ml-1">Profile</p>
                            </Link>
                        </div>
                    )}
                    {!isLoggedIn && (
                        <div className="my-1">
                            <Link to="/login" className="flex justify-start">
                                <ArrowLeftIcon className="h-5 w-5" />
                                <p className="ml-1">Login</p>
                            </Link>
                        </div>
                    )}
                    {isLoggedIn && (
                        <div className="my-1">
                            <Link
                                to="#"
                                className="flex justify-start"
                                onClick={logoutUser}
                            >
                                <ArrowRightIcon className="h-5 w-5" />
                                <p className="ml-1">Logout</p>
                            </Link>
                        </div>
                    )}
                </div>
            </div>
        </>
    );
}
