import React from "react";
import { BrowserRouter, Route, Routes } from "react-router-dom";
import Header from "./components/layouts/Header.jsx";
import Footer from "./components/layouts/Footer.jsx";
import About from "./components/About.jsx";
import Home from "./components/Home.jsx";
import Team from "./components/team/Team.jsx";
import Register from "./components/profile/Register.jsx";
import Login from "./components/profile/Login.jsx";
import Profile from "./components/profile/Profile.jsx";
import ProfileUpdate from "./components/profile/ProfileUpdate.jsx";
import UserParcels from "./components/profile/UserParcels.jsx";

export default function App() {
    return (
        <div className="-mt-[16px]">
            <BrowserRouter>
                <Header />
                <Routes>
                    <Route path="/" element={<Home />} />
                    <Route path="/team" element={<Team />} />
                    <Route path="/about" element={<About />} />
                    <Route path="/register" element={<Register />} />
                    <Route path="/login" element={<Login />} />
                    <Route path="/profile" element={<Profile />} />
                    <Route path="/update/profile" element={<ProfileUpdate />} />
                    <Route path="/user/parcels" element={<UserParcels />} />
                </Routes>
                <Footer />
            </BrowserRouter>
        </div>
    );
}
