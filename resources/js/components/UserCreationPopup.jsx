import React, { useState } from 'react';
import { X, User, Mail, Lock, Shield } from 'lucide-react';
import axios from 'axios';

export default function UserCreationPopup({ isOpen, onClose, onSubmit }) {
    const [userData, setUserData] = useState({
        name: '',
        email: '',
        password: '',
        role: 'user'
    });
    const [errors, setErrors] = useState([]);

    const handleChange = (e) => {
        const { name, value } = e.target;
        setUserData(prev => ({ ...prev, [name]: value }));
    };

    const handleRoleChange = (e) => {
        setUserData(prev => ({ ...prev, role: e.target.value }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        // Validación básica
        const newErrors = [];
        if (!userData.name) newErrors.push('El nombre es requerido');
        if (!userData.email) newErrors.push('El correo electrónico es requerido');
        if (!userData.password) newErrors.push('La contraseña es requerida');

        if (newErrors.length > 0) {
            setErrors(newErrors);
            return;
        }

        try {
            // Enviar el nuevo usuario a la API
            const response = await axios.post('http://127.0.0.1:8000/users', userData);
            console.log('Usuario creado:', response.data);
            onSubmit(response.data); // Aquí puedes manejar la respuesta
            // Restablecer el formulario
            setUserData({ name: '', email: '', password: '', role: 'user' });
            setErrors([]);
            onClose();
        } catch (error) {
            console.error('Error al crear el usuario:', error);
            // Manejar error (por ejemplo, mostrar mensaje al usuario)
            setErrors(['Error al crear el usuario. Por favor, inténtelo de nuevo.']);
        }
    };

    if (!isOpen) return null;

    return (
        <div className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div className="w-full max-w-2xl bg-white rounded-xl shadow-lg overflow-hidden">
                <div className="bg-gradient-to-r from-blue-500 to-blue-600 px-8 py-6">
                    <div className="flex justify-between items-center">
                        <div>
                            <h2 className="text-2xl font-bold text-white">Añadir Nuevo Usuario</h2>
                            <p className="text-blue-100 mt-1">Complete el formulario para crear un nuevo usuario</p>
                        </div>
                        <button onClick={onClose} className="text-white hover:bg-blue-600/50 p-2 rounded-full">
                            <X className="h-6 w-6" />
                        </button>
                    </div>
                </div>
                <div className="p-8">
                    {errors.length > 0 && (
                        <div className="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                            <p className="text-sm font-medium text-red-800">Por favor corrija los siguientes errores:</p>
                            <ul className="text-sm text-red-700 list-disc list-inside pl-2">
                                {errors.map((error, index) => (
                                    <li key={index}>{error}</li>
                                ))}
                            </ul>
                        </div>
                    )}
                    <form onSubmit={handleSubmit} className="space-y-6">
                        <div className="space-y-2">
                            <label htmlFor="name" className="block text-sm font-medium text-gray-700">Nombre</label>
                            <div className="relative">
                                <User className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 h-5 w-5" />
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value={userData.name}
                                    onChange={handleChange}
                                    className="pl-10 w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                />
                            </div>
                        </div>
                        <div className="space-y-2">
                            <label htmlFor="email" className="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <div className="relative">
                                <Mail className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 h-5 w-5" />
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value={userData.email}
                                    onChange={handleChange}
                                    className="pl-10 w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                />
                            </div>
                        </div>
                        <div className="space-y-2">
                            <label htmlFor="password" className="block text-sm font-medium text-gray-700">Contraseña</label>
                            <div className="relative">
                                <Lock className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 h-5 w-5" />
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    value={userData.password}
                                    onChange={handleChange}
                                    className="pl-10 w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    required
                                />
                            </div>
                        </div>
                        <div className="space-y-2">
                            <label htmlFor="role" className="block text-sm font-medium text-gray-700">Rol</label>
                            <div className="relative">
                                <Shield className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 h-5 w-5 z-10" />
                                <select
                                    id="role"
                                    name="role"
                                    value={userData.role}
                                    onChange={handleRoleChange}
                                    className="pl-10 w-full rounded-md border border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 appearance-none"
                                >
                                    <option value="user">Usuario</option>
                                    <option value="admin">Administrador</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div className="flex justify-end space-x-4 p-8 pt-0">
                    <button
                        onClick={onClose}
                        className="px-4 py-2 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Cancelar
                    </button>
                    <button
                        onClick={handleSubmit}
                        className="px-4 py-2 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                    >
                        Guardar Usuario
                    </button>
                </div>
            </div>
        </div>
    );
}