import Logo from "./Logo";
import Nav from "./Nav";
export default function Header() {
    return (
        <div className="bg-orange-400 sticky top-0 flex-wrap first-header shadow-lg h-[120px] w-full z-20 flex mx-auto justify-between items-center p-8">
            <Logo />
            <Nav />
        </div>
    );
}
