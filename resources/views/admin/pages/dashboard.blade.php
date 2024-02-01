@extends('admin.master')

@section('title')
    Dashboard
@endsection

@section('content')
    @apexchartsScripts
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">{{ $countParticipant->count() }} </h4>
                                {{-- <p class="text-success mb-2">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total Participant</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-primary rounded">
                                <div class="mdi mdi-account-group-outline mdi-24px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">{{ $countReservation->count() }} </h4>
                                {{-- <p class="text-success mb-2">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total Reservation</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-info rounded">
                                <div class="mdi mdi-card-account-details-star-outline mdi-24px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">{{ $countTicket->count() }} </h4>
                                {{-- <p class="text-success mb-2">(+29%)</p> --}}
                            </div>
                            <p class="mb-0">Total Ticket</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-success rounded">
                                <div class="mdi mdi-ticket-confirmation-outline mdi-24px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <div class="d-flex align-items-center">
                                <h4 class="mb-2 me-1 display-6">{{ $notPresents->count() }} </h4>
                                <p class="text-success mb-2">(+29%)</p>
                            </div>
                            <p class="mb-0">Total Not Present</p>
                        </div>
                        <div class="avatar">
                            <div class="avatar-initial bg-label-danger rounded">
                                <div class="mdi mdi-close-outline mdi-24px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row g-4 mb-4">
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Reservation Statistic</h5>
                </div>
                <div class="card-body" id='registrationChart'>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Participant Statistic</h5>
                </div>
                <div class="card-body" id='reservationChart'>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cscript')
    <script>
        const registrationChartEl = document.querySelector('#registrationChart'),
            registrationChartConfig = {
                chart: {
                    height: 200,
                    type: 'bar',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: '30%',
                        startingShape: 'rounded',
                        borderRadius: 8
                    }
                },
                grid: {
                    borderColor: '#bbbcc4',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    padding: {
                        top: -20,
                        bottom: -12
                    }
                },
                colors: config.colors.info,
                dataLabels: {
                    enabled: false
                },
                series: [{
                    name: 'Total Reservation',
                    data: @json($reservationCount)
                }],
                xaxis: {
                    categories: @json($reservationKey),
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#bbbcc4',
                            fontSize: '11px'
                        },
                        formatter: function(val) {
                            return val.toFixed(0);
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#bbbcc4',
                            fontSize: '11px'
                        }
                    }
                }
            };
        if (typeof registrationChartEl !== undefined && registrationChartEl !== null) {
            const registrationChart = new ApexCharts(registrationChartEl, registrationChartConfig);
            registrationChart.render();
        }
    </script>
    <script>
        const reservationChartEl = document.querySelector('#reservationChart'),
            reservationChartConfig = {
                chart: {
                    height: 200,
                    type: 'bar',
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        barHeight: '30%',
                        startingShape: 'rounded',
                        borderRadius: 8
                    }
                },
                grid: {
                    borderColor: '#bbbcc4',
                    xaxis: {
                        lines: {
                            show: false
                        }
                    },
                    padding: {
                        top: -20,
                        bottom: -12
                    }
                },
                colors: config.colors.info,
                dataLabels: {
                    enabled: false
                },
                series: [{
                    name: 'Total Participant',
                    data: @json($participantCount)
                }],
                xaxis: {
                    categories: @json($participantKey),
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        style: {
                            colors: '#bbbcc4',
                            fontSize: '11px'
                        },
                        formatter: function(val) {
                            return val.toFixed(0);
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#bbbcc4',
                            fontSize: '11px'
                        }
                    }
                }
            };
        if (typeof reservationChartEl !== undefined && reservationChartEl !== null) {
            const reservationChart = new ApexCharts(reservationChartEl, reservationChartConfig);
            reservationChart.render();
        }
    </script>
@endsection
