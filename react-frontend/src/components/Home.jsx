import React from "react";
import About from "./About";
import Team from "./team/Team";
import Search from "./tracking/Search";

export default function Home() {
    return (
        <div>
            <Search />
            <Team />
            <About />
        </div>
    );
}
