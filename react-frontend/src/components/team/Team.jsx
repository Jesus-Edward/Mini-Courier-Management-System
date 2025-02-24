import React from "react";
import { FaFacebook, FaInstagramSquare } from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";
import { SiGmail } from "react-icons/si";
import Card from "./card";

export default function Team() {
    return (
        <>
            <section
                className="min-h-[400px] container mx-auto py-5 mt-4"
                id="teamPage"
            >
                <div className="flex justify-center text-2xl font-mono font-bold mt-2 mb-5 text-orange-400">
                    <h2>Our Team</h2>
                </div>
                <div className="flex justify-center">
                    <div className="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 gap-5">

                        <Card image='logo.png' name='August' specialty='Admin' />
                        <Card image='logo.png' name='Jorgi' specialty='Data Entry' />
                        <Card image='logo.png' name='Eddy' specialty='Deliver' />
                        <Card image='logo.png' name='Ebuka' specialty='Deliver' />
                    </div>
                </div>
            </section>
        </>
    );
}
