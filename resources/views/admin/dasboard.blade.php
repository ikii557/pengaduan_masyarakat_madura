@extends('layoutsadmin.app')
@section('content')
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
            </div>
            <div class="row">
                <h6 class="op-7 mb-2">Selamat datang, <strong> {{ auth()->user()->nama_lengkap }}</strong></h6>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="bi bi-columns-gap"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Data Petugas</p>
                          <h4 class="card-title">{{$totaladmin}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                      <div class="numbers">
                        <p class="card-category">Jumlah Laporan</p>
                        <h4 class="card-title">{{ $totalPengaduan }}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah diproses</p>
                          <h4 class="card-title">{{$pengaduanDiproses}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Laporan Selesai</p>
                          <h4 class="card-title">{{$tanggapanSelesai}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                        <div class="card-title">Keluhan Pelapor</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="min-height: 375px">
                        <canvas id="statisticsChart"></canvas>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Statistik Tanggapan -->
                <div class="col-md-4">
                    <div class="card card-primary card-round">
                        <div class="card-header">
                            <div class="card-head-row">
                                <div class="card-title">Jumlah Laporan per Bulan</div>
                                <div class="card-tools">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-label-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Export
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Excel</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                            <a class="dropdown-item" href="#">CSV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-category">{{ now()->translatedFormat('F Y') }}</div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="mb-4 mt-2">
                                <h1>{{ $tanggapanSelesai }}</h1>
                            </div>
                            <div class="pull-in">
                                <canvas id="dailySalesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ctx = document.getElementById('statisticsChart').getContext('2d');

                // Data dari Controller Laravel
                const labels = @json($labels); // Pastikan data format: ['2023-02-01', '2023-02-02']
                const data = @json($data);

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pengaduan per Tanggal',
                            data: data,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2,
                            fill: true,
                            tension: 0.4
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tanggal Pengaduan'
                                },
                                ticks: {
                                    callback: function(value) {
                                        // Format tanggal menjadi YYYY-MM-DD
                                        return value.split('T')[0];
                                    }
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Jumlah Pengaduan'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
            </script>




        <div class="row">
            @foreach (['admin', 'petugas', 'masyarakat'] as $role)
                <div class="col-md-4">
                    <div class="card card-round">
                        <div class="card-body">
                            <div class="card-head-row">
                                <div class="card-title text-center">{{ ucfirst($role) }}</div>
                            </div>
                            <div class="card-list py-4">
                                @foreach ($admins->where('role', $role) as $admin)
                                    <div class="item-list">
                                        <div class="avatar">
                                            <span class="avatar-title rounded-circle border border-white bg-primary">
                                                {{ strtoupper(substr($admin->nama_lengkap, 0, 1)) }}
                                            </span>
                                        </div>
                                        <div class="info-user ms-3">
                                            <div class="username">{{ $admin->nama_lengkap }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <script>
            function confirmDeletion(id) {
                if (confirm('Yakin ingin menghapus data ini?')) {
                    window.location.href = `/delete_admin/${id}`;
                }
            }
        </script>



@endsection
