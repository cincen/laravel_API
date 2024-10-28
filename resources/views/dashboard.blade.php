@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <div>
        <h2>Category Distribution</h2>
        <canvas id="category-chart"></canvas>
    </div>
    <div>
        <h2>Data Aggregation by Date</h2>
        <canvas id="date-chart"></canvas>
    </div>

    <script>
        const categoryChart = document.getElementById('category-chart');
        const dateChart = document.getElementById('date-chart');

        new Chart(categoryChart, {
            type: 'pie',
            data: {
                labels: @json($categories),
                datasets: [{
                    data: @json($categoryCounts),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        // ...
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        // ...
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Category Distribution'
                }
            }
        });

        new Chart(dateChart, {
            type: 'bar',
            data: {
                labels: @json($dates),
                datasets: [{
                    data: @json($dateCounts),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        // ...
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        // ...
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Data Aggregation by Date'
                }
            }
        });
    </script>
@endsection