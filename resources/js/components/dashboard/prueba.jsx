import React, { useState } from 'react';
import { BarChart, Bar, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts';
import { Users, Settings, BarChart2, Shield, LogOut, Search, Edit, Trash2, X } from 'lucide-react';
import { Dialog, DialogContent, DialogHeader, DialogTitle, DialogFooter } from "@/components/ui/dialog"
import { Input } from "@/components/ui/input"
import { Button } from "@/components/ui/button"
import { Label } from "@/components/ui/label"
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "@/components/ui/select"
import { Switch } from "@/components/ui/switch"

// Datos de ejemplo para el gráfico
const userData = [
    { month: 'Ene', users: 400 },
    { month: 'Feb', users: 300 },
    { month: 'Mar', users: 500 },
    { month: 'Abr', users: 280 },
    { month: 'May', users: 200 },
    { month: 'Jun', users: 600 },
];

// Datos de ejemplo para la tabla de usuarios
const usersData = [
    { id: 1, name: 'Juan Pérez', email: 'juan@example.com', role: 'Admin', status: 'Activo' },
    { id: 2, name: 'María García', email: 'maria@example.com', role: 'Editor', status: 'Activo' },
    { id: 3, name: 'Carlos López', email: 'carlos@example.com', role: 'Usuario', status: 'Inactivo' },
    { id: 4, name: 'Ana Martínez', email: 'ana@example.com', role: 'Editor', status: 'Activo' },
    { id: 5, name: 'Pedro Sánchez', email: 'pedro@example.com', role: 'Usuario', status: 'Activo' },
];

// Datos de ejemplo para permisos
const permissionsData = [
    { id: 1, name: 'Gestionar usuarios', description: 'Crear, editar y eliminar usuarios' },
    { id: 2, name: 'Gestionar contenido', description: 'Crear, editar y eliminar contenido del sitio' },
    { id: 3, name: 'Gestionar configuración', description: 'Modificar la configuración del sitio' },
    { id: 4, name: 'Ver estadísticas', description: 'Acceder a las estadísticas y reportes' },
    { id: 5, name: 'Gestionar permisos', description: 'Asignar y revocar permisos a roles' },
];

export default function AdminDashboard() {
    const [activeTab, setActiveTab] = useState('dashboard');
    const [searchTerm, setSearchTerm] = useState('');
    const [editingUser, setEditingUser] = useState(null);
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);

    const filteredUsers = usersData.filter(user =>
        user.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        user.email.toLowerCase().includes(searchTerm.toLowerCase()) ||
        user.role.toLowerCase().includes(searchTerm.toLowerCase())
    );

    const handleEditUser = (user) => {
        setEditingUser(user);
        setIsEditModalOpen(true);
    };

    const handleCloseEditModal = () => {
        setEditingUser(null);
        setIsEditModalOpen(false);
    };

    const handleUpdateUser = (updatedUser) => {
        // Aquí iría la lógica para actualizar el usuario en el backend
        console.log('Usuario actualizado:', updatedUser);
        handleCloseEditModal();
    };

    const renderContent = () => {
        switch (activeTab) {
            case 'dashboard':
                return (
                    <div>
                        <h2 className="text-2xl font-bold mb-4">Panel de Control</h2>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                            <StatCard title="Total Usuarios" value="1,234" />
                            <StatCard title="Nuevos Usuarios (Mes)" value="56" />
                            <StatCard title="Usuarios Activos" value="890" />
                        </div>
                        <div className="bg-white p-4 rounded-lg shadow">
                            <h3 className="text-lg font-semibold mb-4">Usuarios Registrados por Mes</h3>
                            <ResponsiveContainer width="100%" height={300}>
                                <BarChart data={userData}>
                                    <CartesianGrid strokeDasharray="3 3" />
                                    <XAxis dataKey="month" />
                                    <YAxis />
                                    <Tooltip />
                                    <Legend />
                                    <Bar dataKey="users" fill="#8884d8" />
                                </BarChart>
                            </ResponsiveContainer>
                        </div>
                    </div>
                );
            case 'users':
                return (
                    <div>
                        <h2 className="text-2xl font-bold mb-4">Gestión de Usuarios</h2>
                        <div className="mb-4 flex justify-between items-center">
                            <div className="relative">
                                <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" />
                                <Input
                                    type="text"
                                    placeholder="Buscar usuarios..."
                                    className="pl-10 pr-4 py-2 w-64"
                                    value={searchTerm}
                                    onChange={(e) => setSearchTerm(e.target.value)}
                                />
                            </div>
                            <Button>Añadir Usuario</Button>
                        </div>
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <table className="min-w-full divide-y divide-gray-200">
                                <thead className="bg-gray-50">
                                    <tr>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rol</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                        <th className="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody className="bg-white divide-y divide-gray-200">
                                    {filteredUsers.map((user) => (
                                        <tr key={user.id}>
                                            <td className="px-6 py-4 whitespace-nowrap">{user.name}</td>
                                            <td className="px-6 py-4 whitespace-nowrap">{user.email}</td>
                                            <td className="px-6 py-4 whitespace-nowrap">{user.role}</td>
                                            <td className="px-6 py-4 whitespace-nowrap">
                                                <span className={`px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${user.status === 'Activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}`}>
                                                    {user.status}
                                                </span>
                                            </td>
                                            <td className="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <Button variant="ghost" size="sm" onClick={() => handleEditUser(user)}>
                                                    <Edit className="h-4 w-4 mr-2" />
                                                    Editar
                                                </Button>
                                                <Button variant="ghost" size="sm" className="text-red-600 hover:text-red-900">
                                                    <Trash2 className="h-4 w-4 mr-2" />
                                                    Eliminar
                                                </Button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>
                        </div>
                    </div>
                );
            case 'permissions':
                return (
                    <div>
                        <h2 className="text-2xl font-bold mb-4">Gestión de Permisos</h2>
                        <div className="bg-white p-6 rounded-lg shadow">
                            <h3 className="text-lg font-semibold mb-4">Roles y Permisos</h3>
                            <div className="space-y-6">
                                {['Admin', 'Editor', 'Usuario'].map((role) => (
                                    <div key={role} className="border rounded-lg p-4">
                                        <h4 className="text-lg font-medium mb-2">{role}</h4>
                                        <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            {permissionsData.map((permission) => (
                                                <div key={permission.id} className="flex items-center justify-between">
                                                    <div>
                                                        <p className="font-medium">{permission.name}</p>
                                                        <p className="text-sm text-gray-500">{permission.description}</p>
                                                    </div>
                                                    <Switch id={`${role}-${permission.id}`} />
                                                </div>
                                            ))}
                                        </div>
                                    </div>
                                ))}
                            </div>
                        </div>
                    </div>
                );
            default:
                return null;
        }
    };

    return (
        <div className="flex h-screen bg-gray-100">
            {/* Sidebar */}
            <div className="w-64 bg-white shadow-md">
                <div className="p-4">
                    <h1 className="text-2xl font-bold text-gray-800">Admin Panel</h1>
                </div>
                <nav className="mt-4">
                    <a
                        href="#"
                        className={`flex items-center px-4 py-2 text-gray-700 ${activeTab === 'dashboard' ? 'bg-gray-200' : ''}`}
                        onClick={() => setActiveTab('dashboard')}
                    >
                        <BarChart2 className="mr-3 h-5 w-5" />
                        Dashboard
                    </a>
                    <a
                        href="#"
                        className={`flex items-center px-4 py-2 text-gray-700 ${activeTab === 'users' ? 'bg-gray-200' : ''}`}
                        onClick={() => setActiveTab('users')}
                    >
                        <Users className="mr-3 h-5 w-5" />
                        Usuarios
                    </a>
                    <a
                        href="#"
                        className={`flex items-center px-4 py-2 text-gray-700 ${activeTab === 'permissions' ? 'bg-gray-200' : ''}`}
                        onClick={() => setActiveTab('permissions')}
                    >
                        <Shield className="mr-3 h-5 w-5" />
                        Permisos
                    </a>
                    <a
                        href="#"
                        className="flex items-center px-4 py-2 text-gray-700"
                    >
                        <Settings className="mr-3 h-5 w-5" />
                        Configuración
                    </a>
                    <a
                        href="#"
                        className="flex items-center px-4 py-2 text-gray-700 mt-auto"
                    >
                        <LogOut className="mr-3 h-5 w-5" />
                        Cerrar Sesión
                    </a>
                </nav>
            </div>

            {/* Main content */}
            <div className="flex-1 overflow-y-auto p-8">
                {renderContent()}
            </div>

            {/* Modal de edición de usuario */}
            <Dialog open={isEditModalOpen} onOpenChange={handleCloseEditModal}>
                <DialogContent>
                    <DialogHeader>
                        <DialogTitle>Editar Usuario</DialogTitle>
                    </DialogHeader>
                    {editingUser && (
                        <form onSubmit={(e) => {
                            e.preventDefault();
                            handleUpdateUser(editingUser);
                        }}>
                            <div className="space-y-4">
                                <div>
                                    <Label htmlFor="name">Nombre</Label>
                                    <Input
                                        id="name"
                                        value={editingUser.name}
                                        onChange={(e) => setEditingUser({ ...editingUser, name: e.target.value })}
                                    />
                                </div>
                                <div>
                                    <Label htmlFor="email">Email</Label>
                                    <Input
                                        id="email"
                                        type="email"
                                        value={editingUser.email}
                                        onChange={(e) => setEditingUser({ ...editingUser, email: e.target.value })}
                                    />
                                </div>
                                <div>
                                    <Label htmlFor="role">Rol</Label>
                                    <Select
                                        value={editingUser.role}
                                        onValueChange={(value) => setEditingUser({ ...editingUser, role: value })}
                                    >
                                        <SelectTrigger>
                                            <SelectValue placeholder="Selecciona un rol" />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="Admin">Admin</SelectItem>
                                            <SelectItem value="Editor">Editor</SelectItem>
                                            <SelectItem value="Usuario">Usuario</SelectItem>
                                        </SelectContent>
                                    </Select>
                                </div>
                                <div>
                                    <Label htmlFor="status">Estado</Label>
                                    <Select
                                        value={editingUser.status}
                                        onValueChange={(value) => setEditingUser({ ...editingUser, status: value })}
                                    >
                                        <SelectTrigger>
                                            <SelectValue placeholder="Selecciona un estado" />
                                        </SelectTrigger>
                                        <SelectContent>
                                            <SelectItem value="Activo">Activo</SelectItem>
                                            <SelectItem value="Inactivo">Inactivo</SelectItem>
                                        </SelectContent>
                                    </Select>
                                </div>
                            </div>
                            <DialogFooter className="mt-6">
                                <Button type="button" variant="outline" onClick={handleCloseEditModal}>Cancelar</Button>
                                <Button type="submit">Guardar Cambios</Button>
                            </DialogFooter>
                        </form>
                    )}
                </DialogContent>
            </Dialog>
        </div>
    );
}

function StatCard({ title, value }) {
    return (
        <div className="bg-white p-4 rounded-lg shadow">
            <h3 className="text-lg font-semibold text-gray-500">{title}</h3>
            <p className="text-3xl font-bold">{value}</p>
        </div>
    );
}