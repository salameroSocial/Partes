import React, { useState } from 'react';
import { motion, AnimatePresence } from 'framer-motion';
import { Search, UserPlus, Users, X } from 'lucide-react';
import axios from 'axios';

const UserSearchBar = () => {
    const [searchTerm, setSearchTerm] = useState('');
    const [showAllUsers, setShowAllUsers] = useState(false);
    const [showCreateUser, setShowCreateUser] = useState(false);
    const [newUser, setNewUser] = useState({ name: '', email: '', password: '' });
    const [users, setUsers] = useState([]);

    const handleSearch = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.get(`http://127.0.0.1:8000/admin/usuarios/all?search=${searchTerm}`);
            setUsers(response.data); // Asume que la respuesta es un array de usuarios
            setShowAllUsers(true); // Muestra el modal de usuarios
        } catch (error) {
            console.error('Error searching users:', error);
            // Manejar el error aquí (e.g., mostrar un mensaje)
        }
    };


    const handleCreateUser = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post('http://127.0.0.1:8000/users', newUser);
            console.log('User created:', response.data);
            setShowCreateUser(false);
            setNewUser({ name: '', email: '', password: '' });
            // Podrías querer refrescar la lista de usuarios aquí
        } catch (error) {
            console.error('Error creating user:', error);
            // Manejar el error (e.g., mostrar mensaje al usuario)
        }
    };

    const handleShowAllUsers = async () => {
        try {
            const response = await axios.get('http://127.0.0.1:8000/admin/usuarios/all');
            setUsers(response.data); // Obtiene todos los usuarios
            setShowAllUsers(true); // Muestra el modal de todos los usuarios
        } catch (error) {
            console.error('Error fetching all users:', error);
            // Manejar el error aquí
        }
    };

    return (
        <div className="w-full max-w-5xl mx-auto p-4">
            <div className="bg-white shadow-lg rounded-lg overflow-hidden">
                <div className="p-4">
                    <form onSubmit={handleSearch} className="flex items-center space-x-4">
                        <div className="relative flex-grow">
                            <input
                                type="text"
                                value={searchTerm}
                                onChange={(e) => setSearchTerm(e.target.value)}
                                placeholder="Search users..."
                                className="w-full pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            />
                            <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" size={20} />
                        </div>
                        <motion.button
                            type="submit"
                            whileHover={{ scale: 1.05 }}
                            whileTap={{ scale: 0.95 }}
                            className="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                        >
                            Search
                        </motion.button>
                    </form>
                </div>
                <div className="bg-gray-100 px-4 py-3 flex justify-between items-center">
                    <motion.button
                        onClick={() => setShowCreateUser(true)}
                        whileHover={{ scale: 1.05 }}
                        whileTap={{ scale: 0.95 }}
                        className="flex items-center space-x-2 bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                    >
                        <UserPlus size={20} />
                        <span>Create User</span>
                    </motion.button>
                    <motion.button
                        onClick={handleShowAllUsers}
                        whileHover={{ scale: 1.05 }}
                        whileTap={{ scale: 0.95 }}
                        className="flex items-center space-x-2 bg-purple-500 text-white px-4 py-2 rounded-full hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50"
                    >
                        <Users size={20} />
                        <span>View All Users</span>
                    </motion.button>
                </div>
            </div>

            <AnimatePresence>
                {showAllUsers && (
                    <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
                    >
                        <motion.div
                            initial={{ scale: 0.9 }}
                            animate={{ scale: 1 }}
                            exit={{ scale: 0.9 }}
                            className="bg-white rounded-lg shadow-xl p-6 w-full max-w-2xl"
                        >
                            <div className="flex justify-between items-center mb-4">
                                <h2 className="text-2xl font-bold text-gray-800">All Users</h2>
                                <button
                                    onClick={() => setShowAllUsers(false)}
                                    className="text-gray-500 hover:text-gray-700 focus:outline-none"
                                >
                                    <X size={24} />
                                </button>
                            </div>
                            <div className="max-h-96 overflow-y-auto">
                                {users.length > 0 ? (
                                    users.map(user => (
                                        <a href="">
                                            <div key={user.id} className="p-2 border-b">
                                                {user.name} - {user.email}
                                            </div>
                                        </a>
                                    ))
                                ) : (
                                    <div className="p-2 text-gray-600">No users found.</div>
                                )}
                            </div>
                        </motion.div>
                    </motion.div>
                )}

                {showCreateUser && (
                    <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        className="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50"
                    >
                        <motion.div
                            initial={{ scale: 0.9 }}
                            animate={{ scale: 1 }}
                            exit={{ scale: 0.9 }}
                            className="bg-white rounded-lg shadow-xl p-6 w-full max-w-md"
                        >
                            <div className="flex justify-between items-center mb-4">
                                <h2 className="text-2xl font-bold text-gray-800">Create New User</h2>
                                <button
                                    onClick={() => setShowCreateUser(false)}
                                    className="text-gray-500 hover:text-gray-700 focus:outline-none"
                                >
                                    <X size={24} />
                                </button>
                            </div>
                            <form onSubmit={handleCreateUser} className="space-y-4">
                                <div>
                                    <label htmlFor="name" className="block text-sm font-medium text-gray-700">Name</label>
                                    <input
                                        type="text"
                                        id="name"
                                        value={newUser.name}
                                        onChange={(e) => setNewUser({ ...newUser, name: e.target.value })}
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required
                                    />
                                </div>
                                <div>
                                    <label htmlFor="email" className="block text-sm font-medium text-gray-700">Email</label>
                                    <input
                                        type="email"
                                        id="email"
                                        value={newUser.email}
                                        onChange={(e) => setNewUser({ ...newUser, email: e.target.value })}
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required
                                    />
                                </div>
                                <div>
                                    <label htmlFor="password" className="block text-sm font-medium text-gray-700">Password</label>
                                    <input
                                        type="password"
                                        id="password"
                                        value={newUser.password}
                                        onChange={(e) => setNewUser({ ...newUser, password: e.target.value })}
                                        className="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                        required
                                    />
                                </div>
                                <motion.button
                                    type="submit"
                                    whileHover={{ scale: 1.05 }}
                                    whileTap={{ scale: 0.95 }}
                                    className="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50"
                                >
                                    Create User
                                </motion.button>
                            </form>
                        </motion.div>
                    </motion.div>
                )}
            </AnimatePresence>
        </div>
    );
};

export default UserSearchBar;
