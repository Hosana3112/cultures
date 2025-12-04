<x-app-layout>
    @section('title', 'Tableau de Bord | Culture Béninoise')
    @section('page_title', 'Tableau de Bord')
    @section('breadcrumb', 'Tableau de Bord')

    @section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-primary text-white">
                <div class="inner">
                    <h3>{{ $stats['total_contenus'] ?? 0 }}</h3>
                    <p>Contenus Culturels</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path>
                </svg>
                <a href="{{ route('contenus.index') }}" class="small-box-footer link-light">
                    Voir détails <i class="bi bi-link-45deg"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success text-white">
                <div class="inner">
                    <h3>{{ $stats['total_utilisateurs'] ?? 0 }}</h3>
                    <p>Utilisateurs</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
                </svg>
                <a href="{{ route('utilisateurs.index') }}" class="small-box-footer link-light">
                    Voir détails <i class="bi bi-link-45deg"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning text-dark">
                <div class="inner">
                    <h3>{{ $stats['total_commentaires'] ?? 0 }}</h3>
                    <p>Commentaires</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M4.913 2.658c2.075-.27 4.19-.408 6.337-.408 2.147 0 4.262.139 6.337.408 1.922.25 3.291 1.861 3.405 3.727a4.403 4.403 0 00-1.032-.211 50.89 50.89 0 00-8.42 0c-2.358.196-4.04 2.19-4.04 4.434v4.286a4.47 4.47 0 002.433 3.984L7.28 21.53A.75.75 0 016 21v-4.03a48.527 48.527 0 01-1.087-.128C2.905 16.58 1.5 14.833 1.5 12.862V6.638c0-1.97 1.405-3.718 3.413-3.979z"></path>
                    <path d="M15.75 7.5c-1.376 0-2.739.057-4.086.169C10.124 7.797 9 9.103 9 10.609v4.285c0 1.507 1.128 2.814 2.67 2.94 1.243.102 2.5.157 3.768.165l2.782 2.781a.75.75 0 001.28-.53v-2.39l.33-.026c1.542-.125 2.67-1.433 2.67-2.94v-4.286c0-1.505-1.125-2.811-2.664-2.94A49.392 49.392 0 0015.75 7.5z"></path>
                </svg>
                <a href="{{ route('commentaires.index') }}" class="small-box-footer link-dark">
                    Voir détails <i class="bi bi-link-45deg"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger text-white">
                <div class="inner">
                    <h3>{{ $stats['total_medias'] ?? 0 }}</h3>
                    <p>Médias</p>
                </div>
                <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M4.5 4.5a3 3 0 00-3 3v9a3 3 0 003 3h8.25a3 3 0 003-3v-9a3 3 0 00-3-3H4.5zM19.94 18.75l-2.69-2.69V7.94l2.69-2.69c.944-.945 2.56-.276 2.56 1.06v11.38c0 1.336-1.616 2.005-2.56 1.06z"></path>
                </svg>
                <a href="{{ route('medias.index') }}" class="small-box-footer link-light">
                    Voir détails <i class="bi bi-link-45deg"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7 connectedSortable">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Statistiques des Contenus par Type</h3>
                </div>
                <div class="card-body">
                    <div id="contenus-chart"></div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-5 connectedSortable">
            <div class="card border-primary mb-4">
                <div class="card-header">
                    <h3 class="card-title">Répartition par Région</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm" data-lte-toggle="card-collapse">
                            <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                            <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="regions-chart" style="height: 250px"></div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Graphique des contenus par type
        const contenusChartOptions = {
            series: [{
                name: 'Nombre de contenus',
                data: @json($stats['contenus_par_type'] ?? [])
            }],
            chart: {
                height: 300,
                type: 'bar',
                toolbar: { show: false }
            },
            colors: ['#008751'],
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: false,
                }
            },
            dataLabels: { enabled: false },
            xaxis: {
                categories: @json($stats['types_contenus'] ?? [])
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " contenus"
                    }
                }
            }
        };

        const contenusChart = new ApexCharts(document.querySelector('#contenus-chart'), contenusChartOptions);
        contenusChart.render();

        // Graphique circulaire des régions
        const regionsChartOptions = {
            series: @json($stats['contenus_par_region'] ?? []),
            chart: {
                height: 250,
                type: 'donut',
            },
            labels: @json($stats['regions'] ?? []),
            colors: ['#008751', '#6c757d', '#17a2b8', '#fd7e14', '#6f42c1', '#20c997'],
            legend: { position: 'bottom' },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: { width: 200 },
                    legend: { position: 'bottom' }
                }
            }]
        };

        const regionsChart = new ApexCharts(document.querySelector('#regions-chart'), regionsChartOptions);
        regionsChart.render();
    });
    </script>
    @endpush
</x-app-layout>