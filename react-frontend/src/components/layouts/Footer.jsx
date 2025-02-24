import React from "react";
import "../../../public/styles.css";
import { FaFacebook, FaInstagramSquare } from "react-icons/fa";
import { FaXTwitter } from "react-icons/fa6";
import { SiGmail } from "react-icons/si";

export default function Footer() {
    return (
        <footer className="footer bg-orange-400">
            <div className="footer_section_padding px-16 py-16 flex flex-col">
                <div className="footer_links_div flex justify-between items-start flex-row flex-wrap w-full text-left mb-8">
                    <div className="footer_links w-[150px] m-4 flex justify-start flex-col text-white">
                        <h4>For Business</h4>
                        <a href="">Employer</a>
                        <a href="">Individual</a>
                        <a href="">Health Plan</a>
                        <a href="">Everyone</a>
                    </div>
                    <div className="footer_links w-[150px] m-4 flex justify-start flex-col text-white">
                        <h4>For Resources</h4>
                        <a href="">Accurate</a>
                        <a href="">Over Burden</a>
                        <a href="">Need for it</a>
                        <a href="">Features</a>
                    </div>
                    <div className="footer_links w-[150px] m-4 flex justify-start flex-col text-white">
                        <h4>For Locations</h4>
                        <a href="">Home</a>
                        <a href="">Office Burden</a>
                        <a href="">Fitness</a>
                        <a href="">Hobbies</a>
                    </div>
                    <div className="footer_links w-[150px] m-4 flex justify-start flex-col text-white">
                        <h4>For Casual</h4>
                        <a href="">Indoors</a>
                        <a href="">Outdoors</a>
                        <a href="">Meets</a>
                        <a href="">Just for you</a>
                    </div>
                    <div className="footer_links w-[150px] m-4 flex justify-start flex-col text-white">
                        <h4 className="mb-2">Coming soon on</h4>
                        <div className="footer_social_media flex flex-row cursor-pointer">
                            <p className="pr-[10px]">
                                <SiGmail className="h-8 w-8 text-orange-400 rounded-full bg-black " />
                            </p>
                            <p className="pr-[10px]">
                                <FaFacebook className="h-8 w-8 text-orange-400 rounded-full bg-black " />
                            </p>
                            <p className="pr-[10px]">
                                <FaXTwitter className="h-8 w-8 text-orange-400 rounded-full bg-black " />
                            </p>
                            <p>
                                <FaInstagramSquare className="h-8 w-8 text-orange-400 rounded-full bg-black " />
                            </p>
                        </div>
                    </div>
                </div>
                <div className="flex justify-end md:relative md:right-0 md:bottom-20 newsletter">
                    <div>
                        <input
                            type="text"
                            className="newsletter-input md:w-60 sm:w-48 px-2 py-1.5 bg-slate-500 focus:outline-none text-white"
                        />
                    </div>
                    <div>
                        <button className="bg-slate-500 px-2 py-1.5 ml-1 rounded-sm text-white hover:bg-black">
                            Subscribe
                        </button>
                    </div>
                </div>
                <hr className="bg-white w-full" />
                <div className="md:flex justify-between sm:block">
                    <div className="footer_below flex flex-row mt-1">
                        <div className="footer_below_copyright">
                            <p className="text-base text-gray-100 font-semibold">
                                @{new Date().getFullYear()} Cheetah CS. All
                                rights reserved
                            </p>
                        </div>
                    </div>
                    <div className="footer_below flex flex-row mt-1">
                        <a href="" className="pr-[10px]">
                            <div>Terms & Conditions</div>
                        </a>
                        <a href="" className="pr-[10px]">
                            <div>Privacy Policies</div>
                        </a>
                        <a href="" className="pr-[10px]">
                            <div>Security</div>
                        </a>
                        <a href="" className="pr-[10px]">
                            <div>Cookie Declaration</div>
                        </a>
                        <a href="">
                            <div>Pages</div>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    );
}
