document.addEventListener('DOMContentLoaded', () => {
    
    // Monthly Progress Line Chart
    const monthlyCtx = document.getElementById('monthlyProgressChart');
    if (monthlyCtx) {
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [
                    {
                        label: 'Trees Planted',
                        data: [650, 800, 1100, 950, 1300, 1450],
                        borderColor: '#008f75',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        borderWidth: 2
                    },
                    {
                        label: 'Waste Collected (tons)',
                        data: [120, 140, 160, 180, 200, 210],
                        borderColor: '#ff9900',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        borderWidth: 2
                    },
                    {
                        label: 'Volunteers Joined',
                        data: [80, 90, 85, 110, 130, 200],
                        borderColor: '#0dacc1',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 1500
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    }

    // Waste Management Pie Chart
    const wasteCtx = document.getElementById('wasteDistributionChart');
    if (wasteCtx) {
        new Chart(wasteCtx, {
            type: 'pie',
            data: {
                labels: ['Recycled 45%', 'Composted 25%', 'Energy Recovery 10%', 'Landfill 20%'],
                datasets: [{
                    data: [45, 25, 10, 20],
                    backgroundColor: [
                        '#008f75', // green
                        '#4CAF50', // light green
                        '#0dacc1', // teal
                        '#ff9900'  // orange
                    ],
                    borderWidth: 1,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12
                        }
                    }
                }
            }
        });
    }

    // Air Quality Index Area Chart
    const airqCtx = document.getElementById('airQualityChart');
    if (airqCtx) {
        new Chart(airqCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'AQI Level',
                    data: [45, 38, 42, 35, 40, 32, 28],
                    borderColor: '#0dacc1',
                    backgroundColor: 'rgba(13, 172, 193, 0.2)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 60
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    // Water Usage Bar Chart
    const waterCtx = document.getElementById('waterUsageChart');
    if (waterCtx) {
        new Chart(waterCtx, {
            type: 'bar',
            data: {
                labels: ['Residential', 'Commercial', 'Industrial', 'Agriculture'],
                datasets: [{
                    label: 'Millions of Liters',
                    data: [45, 25, 20, 10],
                    backgroundColor: '#0dacc1',
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0,
                        max: 60
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

});
