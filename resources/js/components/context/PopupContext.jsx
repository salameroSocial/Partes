import React, { createContext, useContext, useState } from 'react';

// Crear el contexto
const PopupContext = createContext();

// Proveedor del contexto
export const PopupProvider = ({ children }) => {
    const [popupComponent, setPopupComponent] = useState(null);

    const openPopup = (component) => {
        setPopupComponent(component);
    };

    const closePopup = () => {
        setPopupComponent(null);
    };

    return (
        <PopupContext.Provider value={{ popupComponent, openPopup, closePopup }}>
            {children}
            {popupComponent}
        </PopupContext.Provider>
    );
};

// Hook para usar el contexto
export const usePopup = () => useContext(PopupContext);
