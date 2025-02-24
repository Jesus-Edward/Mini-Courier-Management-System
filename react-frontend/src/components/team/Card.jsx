import React from "react";
import { FaFacebook, FaInstagramSquare } from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";
import { SiGmail } from "react-icons/si";

export default function Card({image, name, specialty}) {
    return (
        <div>
            <div className="bg-white h-72 w-64 p-6 rounded-md shadow-lg">
                <div className="">
                    <div className="">
                        <img
                            src={image}
                            className="h-32 w-32 rounded-full ring-2 ring-orange-400 mx-auto"
                            alt=""
                        />
                    </div>
                    <h3 className="mt-2 flex justify-center font-bold text-2xl text-slate-500">
                        {name}
                    </h3>
                    <h4 className="flex justify-center font-semibold text-orange-400">
                        {specialty}
                    </h4>
                    <div className="flex justify-around p-2">
                        <button>
                            <SiGmail className="h-5 w-8 text-orange-400 hover:bg-black " />
                        </button>
                        <button>
                            <FaFacebook className="h-5 w-8 text-orange-400 hover:bg-black " />
                        </button>
                        <button>
                            <FaXTwitter className="h-5 w-8 text-orange-400 hover:bg-black " />
                        </button>
                        <button>
                            <FaInstagramSquare className="h-5 w-8 text-orange-400 hover:bg-black " />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    );
}
