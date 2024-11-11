import React from 'react';
import { usePopup } from './PopupContext'; // Asegúrate de importar el hook

const OpenPopupButton = ({ component }) => {
    const { openPopup } = usePopup();

    return (
        <button
            onClick={() => openPopup(component)}
            className="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600"
        >
            Añadir Usuario
        </button>
    );
};

export default OpenPopupButton;
