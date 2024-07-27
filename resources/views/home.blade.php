@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold text-center">Welcome to the Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Users</h2>
            <canvas id="totalUsersChart" width="400" height="200"></canvas>
        </div>
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Tasks</h2>
            <canvas id="taskChart" width="400" height="200"></canvas>
        </div>
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold">Total Projects</h2>
            <canvas id="projectChart" width="400" height="200"></canvas>
        </div>
    </div>

@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('totalUsersChart').getContext('2d');

            var totalUsersChart = new Chart(ctx, {
                type: 'bar', // You can use 'line', 'pie', etc.
                data: {
                    labels: @json($months),
                    datasets: [{
                        label: 'Total Users',
                        data: @json($userCounts),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Users: ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx2 = document.getElementById('taskChart').getContext('2d');

            var taskChart = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: @json($taskMonths),
                    datasets: [{
                        label: 'Tasks',
                        data: @json($taskCounts),
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Tasks: ' + tooltipItem.raw;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctx3 = document.getElementById('projectChart').getContext('2d');

            var projectChart = new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: @json($projectLabel),
                    datasets: [{
                        label: 'Total Projects',
                        data: @json($projectCounts),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return 'Projects: ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>

@endpush
