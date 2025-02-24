import React from 'react';

export default function CustomButton({name, isLoading, otherStyles, type}) {
    return (
        <div className="-mt-14 flex justify-center">
            <button
                type={type}
                disabled={isLoading}
                className={`${otherStyles} w-[70%] py-2 text-center
             bg-orange-400 text-black text-xl hover:bg-orange-700 hover:text-white`}
            >
                {name}
            </button>
        </div>
    );
}
