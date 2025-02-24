import React from 'react';

export default function FormField({type, placeHolder, classes, onChangeText, value}) {
    return (
        <div className="my-4 w-full">
            <input
                type={type}
                className={`py-2 px-5 lg:w-[50%] md:w-[70%] bg-slate-500 text-white
                focus:outline-none focus:ring-1 focus:outline-orange-400 ${classes}`}
                placeholder={placeHolder}
                onChange={onChangeText}
                value={value}
                required
            />
        </div>
    );
}
