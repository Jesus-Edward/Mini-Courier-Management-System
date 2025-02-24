import React from "react";
import { Link } from "react-router-dom";

export default function Logo() {
    return (
        <>
            <Link to='/'>
                <div className="w-14 h-14 logo flex">
                    <img src="logo.png" className="" alt="Cheetah CS" />
                    <h2 className="ml-2 font-bold text-white">Cheetah CS</h2>
                </div>
            </Link>
        </>
    );
}
