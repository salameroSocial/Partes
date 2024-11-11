import React, { useEffect, useRef, createRoot } from 'react';
import { Chart, registerables } from 'chart.js';

Chart.register(...registerables);

const ChartComponent = ({ labels, data }) => {
    const chartRef = useRef(null);

    useEffect(() => {
        const ctx = chartRef.current.getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Tipo de gráfico
            data: {
                labels: labels, // Labels desde props
                datasets: [{
                    label: 'Mis Datos',
                    data: data, // Datos desde props
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Limpieza para evitar fugas de memoria
        return () => {
            myChart.destroy();
        };
    }, [labels, data]); // Dependencias

    return <canvas ref={chartRef} width="400" height="200"></canvas>;
};

export default ChartComponent;