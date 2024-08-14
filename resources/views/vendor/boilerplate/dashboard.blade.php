@extends('boilerplate::layout.index', [
    'title' => __('Dasbor'),
    'subtitle' => 'Dasbor',
    'breadcrumb' => ['Dasbor'],
])

@section('content')
    <div class="card mb-4 ">
        <div class="card-body">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2>Sistem Informasi Perumahan dan Kawasan Permukiman</h2>
                    <div>
                        {{ date_today() }}
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="{{ asset('vendor/Ninestars/assets/img/about-img.svg') }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- <hr> -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h5 class="card-title">
                            Statistik Jumlah Click 6 Bulan
                            Terakhir
                        </h5>
                    </div>
                </div>
                <!--end card-header-->
                <div class="card-body">
                    <div class="mt-0" id="surveyChart">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <span class="h4">0</span>
                                    <h6 class="text-uppercase text-muted mt-2 m-0">
                                        Total Keseluruhan
                                    </h6>
                                </div>
                                <!--end col-->
                            </div>
                            <!-- end row -->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <span class="h4">0</span>
                                    <h6 class="text-uppercase text-muted mt-2 m-0">
                                        Total Pengunjung
                                    </h6>
                                </div>
                                <!--end col-->
                            </div>
                            <!-- end row -->
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end col-->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Function to load visitor data by month using async/await
        const loadVisitorByMonth = async () => {
            let url = '{{ route('boilerplate.dashboard.visitorByMonth') }}';
            try {
                const response = await fetch(url); // Use fetch instead of axios
                if (response.ok) {
                    return await response.json(); // Return the data from the API call
                } else {
                    throw new Error("Terjadi kesalahan dalam permintaan.");
                }
            } catch (error) {
                console.error("Terjadi kesalahan dalam permintaan:", error.message);
                throw error; // Forward the error for further handling if necessary
            }
        };

        // Initialize chart data with default values
        const chartData = {
            labels: [],
            datasets: [{
                label: "Statistik",
                backgroundColor: "#f87979",
                data: [],
            }, ],
        };

        // Function to update the chart with new data
        const updateChartData = async () => {
            try {
                // Load new data from the API
                const newData = await loadVisitorByMonth();
                // Update chart labels and data
                chartData.labels = newData.labels;
                chartData.datasets[0].data = newData.data;

                // Update the chart
                renderChart(chartData);
            } catch (error) {
                console.error("Gagal memperbarui data grafik:", error.message);
            }
        };

        // Function to render or update the chart
        const renderChart = (data) => {
            // Assuming you are using Chart.js or similar library, you would update the chart here
            const ctx = document.getElementById('myChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar', // or 'line', 'pie', etc.
                data: data,
                options: {
                    // Your chart options here
                }
            });
        };

        // Run the update function when the DOM content is fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            updateChartData();
        });
    </script>
@endpush
