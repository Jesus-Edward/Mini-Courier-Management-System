import React from 'react';

export default function useValidation(errors, field) {

    const renderErrors = (field) => {

        return errors?.[field]?.map((error, index) => (
            <div key={index} className='-mt-3'>
                <small  className="text-red-500 ml-1">
                    {error}
                </small>
            </div>
        ));
    }

    return renderErrors(field)
}
