import React from "react";
import { FaFacebook } from "react-icons/fa";
import { FaInstagramSquare } from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";
import { FaCloudDownloadAlt } from "react-icons/fa";
import "../../public/styles.css";

export default function About() {
    return (
        <>
            <section className="lg:h-[400px] md:h-[520px] mb-5" id="aboutPage">
                <div className="w-1/2 mx-auto my-5">
                    <h2 className="flex justify-center text-slate-500 text-3xl">
                        About Cheetah Courier Service
                    </h2>
                </div>

                <img
                    src="logo.png"
                    alt=""
                    className="ssss md:mr-20 md:float-right h-80 w-80 md:rounded-l-full ring-2 ring-orange-400 aboutImage"
                />

                <div className="md:ml-20 sssss">
                    <h3 className="text-orange-400 font-semibold text-2xl">
                        Pickup, Delivery, what else do you want?
                    </h3>
                    <div className="text-slate-500 my-3">
                        <p>
                            Cheetah Courier Service is the fastest courier service you could ever imagine
                            that offers a safe and convenient courier service. We've been in service over the years
                            and can only get better by serving you.
                        </p>
                        <p>
                            With our dedicated team, serving you is seamless as you're just a call away and we make
                            a pickup at the comfort of home, we also make door to door delivery and affords pay on delivery
                            method.
                        </p>
                    </div>
                    <div className="flex">
                        <button
                            type="button"
                            className="flex bg-orange-400 py-2 px-3 text-slate-500 rounded-sm
                            hover:bg-black hover:text-white"
                        >
                            Visit our handles{" "}
                            <FaCloudDownloadAlt className="text-black ml-2 mt-1 h-4 w-6" />
                        </button>
                        <div className="ml-3 mt-3 inline-flex cursor-pointer">
                            <a href="">
                                <FaFacebook className="h-5 w-8 text-orange-400 hover:bg-black " />
                            </a>
                            <a href="">
                                <FaInstagramSquare className="h-5 w-8 text-orange-400 hover:bg-black " />
                            </a>
                            <a href="">
                                <FaXTwitter className="h-5 w-8 text-orange-400 hover:bg-black " />
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}
