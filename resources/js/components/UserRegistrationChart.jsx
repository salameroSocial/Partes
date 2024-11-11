// ChartComponent.js
import React, { useEffect, useState } from 'react';
import { Bar, Line, Pie } from 'react-chartjs-2'; // Asegúrate de importar los tipos de gráfico que necesitas
import axios from 'axios';

const ChartComponent = ({ endpoint, chartType, title, label }) => {
    const [chartData, setChartData] = useState(null);

    useEffect(() => {
        const fetchData = async () => {
            try {
                const response = await axios.get(endpoint);
                const data = response.data;

                const labels = data.map(item => item.date);
                const counts = data.map(item => item.count);

                setChartData({
                    labels: labels,
                    datasets: [
                        {
                            label: label,
                            data: counts,
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.6)', // Color para la primera barra
                                'rgba(255, 99, 132, 0.6)', // Color para la segunda barra
                                'rgba(255, 206, 86, 0.6)', // Color para la tercera barra
                                'rgba(54, 162, 235, 0.6)', // Color para la cuarta barra
                                // Agrega más colores si es necesario
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)', // Color del borde para la primera barra
                                'rgba(255, 99, 132, 1)', // Color del borde para la segunda barra
                                'rgba(255, 206, 86, 1)', // Color del borde para la tercera barra
                                'rgba(54, 162, 235, 1)', // Color del borde para la cuarta barra
                            ],
                            borderWidth: 1,
                            hoverBackgroundColor: 'rgba(255, 205, 86, 0.8)', // Color al pasar el mouse
                            hoverBorderColor: 'rgba(255, 205, 86, 1)', // Color del borde al pasar el mouse
                        },
                    ],
                });
            } catch (error) {
                console.error('Error fetching chart data:', error);
            }
        };

        fetchData();
    }, [endpoint]);

    const renderChart = () => {
        switch (chartType) {
            case 'bar':
                return <Bar data={chartData} options={{ responsive: true }} />;
            case 'line':
                return <Line data={chartData} options={{ responsive: true }} />;
            case 'pie':
                return <Pie data={chartData} options={{ responsive: true }} />;
            default:
                return null;
        }
    };

    return (
        <div>
            <h2>{title}</h2>
            {chartData ? renderChart() : <p>Cargando datos del gráfico...</p>}
        </div>
    );
};

export default ChartComponent;
