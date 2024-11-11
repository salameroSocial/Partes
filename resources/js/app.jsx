import React from 'react';
import ReactDOM from 'react-dom/client';
import Dashboard from './components/Dashboard';
import UserSearch from './components/UserSearch';
import UserRegistrationChart from './components/UserRegistrationChart';

// Renderizar el Dashboard
const dashboardElement = document.getElementById('dashboard');
if (dashboardElement) {
    const dashboardRoot = ReactDOM.createRoot(dashboardElement);
    dashboardRoot.render(<Dashboard />);
} else {
    console.error('El elemento con ID "dashboard" no se encontró en el DOM.');
}

// Renderizar el UserSearch
const searchBarElement = document.getElementById('searchBar');
if (searchBarElement) {
    const searchBarRoot = ReactDOM.createRoot(searchBarElement);
    searchBarRoot.render(<UserSearch />);
} else {
    console.error('El elemento con ID "searchBar" no se encontró en el DOM.');
}

// Renderizar el ChartComponent
const chartElement = document.getElementById('chartElement'); // Asegúrate de que este ID esté en tu HTML
if (chartElement) {
    const chartRoot = ReactDOM.createRoot(chartElement);
    chartRoot.render(
        <div>
            <UserRegistrationChart
                endpoint="http://127.0.0.1:8000/admin/chart/index"
                chartType="bar"
                title="Usuarios Registrados a lo Largo del Tiempo"
                label="Usuarios Registrados"
            />
            <UserRegistrationChart
                endpoint="http://127.0.0.1:8000/admin/chart/index"
                chartType="pie"
                title="Distribución de Usuarios por Rol"
                label="Usuarios por Rol"
            />
            <UserRegistrationChart
                endpoint="http://127.0.0.1:8000/admin/chart/index"
                chartType="line"
                title="Tendencias de Registro de Usuarios"
                label="Tendencias"
            />
        </div>
    );
} else {
    console.error('El elemento con ID "chartElement" no se encontró en el DOM.');
}
