import React from 'react';

export default function TrackingDataList({hardcoded, dynamic}) {
    return (
        <div className="flex justify-between">
            <h2 className="font-semibold font-mono">{hardcoded}:</h2>
            <h2 className="font-semibold font-mono">{dynamic}</h2>
        </div>
    );
}
