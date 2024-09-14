document.addEventListener('DOMContentLoaded', function () {
    // Get data from hidden inputs
    const dailySalesLabels = JSON.parse(document.getElementById('dailySalesLabels').value);
    const dailySalesData = JSON.parse(document.getElementById('dailySalesData').value);

    // Get the context of the canvas element
    const ctxDailySales = document.getElementById('dailySalesChart').getContext('2d');

    // Create the daily sales bar chart
    new Chart(ctxDailySales, {
        type: 'bar', // Change type to 'bar' for bar chart
        data: {
            labels: dailySalesLabels,
            datasets: [{
                label: 'Penjualan Harian',
                data: dailySalesData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color for bars
                borderColor: 'rgba(75, 192, 192, 1)', // Border color for bars
                borderWidth: 1 // Width of border
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1500, // Duration of animation in milliseconds
                easing: 'easeInOutQuad' // Type of easing for animation
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
                    },
                    ticks: {
                        callback: function (value) {
                            return 'Rp ' + value.toLocaleString('id-ID'); // Format y-axis values
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)', // Background color of tooltip
                    callbacks: {
                        title: function (context) {
                            return `Penjualan pada ${context[0].label}`;
                        },
                        label: function (context) {
                            // Format tooltip label as Rupiah
                            return `Total: Rp ${context.raw.toLocaleString('id-ID')}`;
                        }
                    }
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true,
                animationDuration: 400 // Duration of hover animation in milliseconds
            }
        }
    });
});
