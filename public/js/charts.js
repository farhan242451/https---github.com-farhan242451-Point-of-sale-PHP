document.addEventListener('DOMContentLoaded', function () {
    // Get data from hidden inputs
    const dailySalesLabels = JSON.parse(document.getElementById('dailySalesLabels').value);
    const dailySalesData = JSON.parse(document.getElementById('dailySalesData').value);
    const monthlySalesLabels = JSON.parse(document.getElementById('monthlySalesLabels').value);
    const monthlySalesData = JSON.parse(document.getElementById('monthlySalesData').value);

    // Get the context of the canvas elements
    const ctxDailySales = document.getElementById('dailySalesChart').getContext('2d');
    const ctxMonthlySales = document.getElementById('monthlySalesChart').getContext('2d');

    // Create the daily sales line chart
    new Chart(ctxDailySales, {
        type: 'line',
        data: {
            labels: dailySalesLabels,
            datasets: [{
                label: 'Penjualan Harian',
                data: dailySalesData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(75, 192, 192, 1)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500, // Durasi animasi dalam milidetik
                easing: 'easeInOutQuad' // Jenis easing animasi
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tanggal'
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Total Penjualan'
                    },
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)', // Warna latar belakang tooltip
                    callbacks: {
                        title: function (context) {
                            return `Penjualan pada ${context[0].label}`;
                        },
                        label: function (context) {
                            return `Total: ${context.raw.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}`;
                        }
                    }
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true,
                animationDuration: 400 // Durasi animasi hover dalam milidetik
            }
        }
    });

    // Create the monthly sales line chart
    new Chart(ctxMonthlySales, {
        type: 'line',
        data: {
            labels: monthlySalesLabels,
            datasets: [{
                label: 'Penjualan Bulanan',
                data: monthlySalesData,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 2,
                pointBackgroundColor: 'rgba(153, 102, 255, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(153, 102, 255, 1)',
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500, // Durasi animasi dalam milidetik
                easing: 'easeInOutQuad' // Jenis easing animasi
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Total Penjualan'
                    },
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)', // Warna latar belakang tooltip
                    callbacks: {
                        title: function (context) {
                            return `Penjualan Bulanan pada ${context[0].label}`;
                        },
                        label: function (context) {
                            return `Total: ${context.raw.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })}`;
                        }
                    }
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true,
                animationDuration: 400 // Durasi animasi hover dalam milidetik
            }
        }
    });
});
