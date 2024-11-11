import React from 'react';
import { Button } from "@/components/ui/button"; // Asegúrate de que el botón esté correctamente importado

export default function AddUserButton({ onOpen }) {
    return (
        <Button onClick={onOpen} className="bg-green-500 hover:bg-green-600 text-white">
            Añadir Usuario
        </Button>
    );
}
