<?php if ($_SESSION['admin']['nhom'] < 3) { ?>
    <div class="content mt-3">
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-receipt text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Tin đăng</div>
                            <div class="stat-digit"><?= $this->tongtinrao ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-receipt text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Sản phẩm</div>
                            <div class="stat-digit"><?= $this->tongtincan ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Liên hệ</div>
                            <div class="stat-digit"><?= $this->tongkh ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Đơn đặt hàng</div>
                            <div class="stat-digit" style="font-size: 16px;!important;"><?= $this->doanhthu; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <!-- <div class="col-lg-3 col-md-3">
            <div class="card bg-flat-color-1">
                <div class="card-body"  style="max-height: 165px;height: 165px">
                    <div class="h4 text-muted text-right mb-4" style="height: 55px">
                        <i class="fa fa-file-text text-light"></i>
                        <small class="text-uppercase font-weight-bold text-light">Khách hàng ĐK</small>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count"><?= $this->vpluotxem ?></span> Lượt
                    </div>
                </div>
            </div>
        </div> -->
        <div class="col-lg-6 col-md-6">
            <div class="card bg-flat-color-1">
                <div class="card-body "  style="max-height: 165px;height: 165px">
                    <div class="h1 text-muted text-right mb-4" style="height: 55px">
                        <i class="fa fa-users text-light"></i>
                    </div>
                    <div class="h4 mb-0 text-light">
                        <span class="count"><?= $this->luottruycap ?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">
                        Tổng số lượt truy cập
                    </small>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        <span class="count"><?= $this->truycap7ngay ?></span>
                    </h4>
                    <p class="text-light" style="max-height: 22px;height: 22px;overflow: hidden;">Biểu đồ lượt truy cập 7 ngày</p>

                    <div class="chart-wrapper px-0" style="height:91px;" height="91">
                        <canvas id="widgetChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-3 col-md-3">
            <div class="card text-white bg-flat-color-1">
                <div class="card-body pb-0">
                    <h4 class="mb-0">
                        <span class="count1" style="overflow: hidden"><?= $this->doanhthu7ngay ?></span>
                    </h4>
                    <p class="text-light" style="max-height: 22px;height: 22px;overflow: hidden;">Đơn đặt hàng 7 ngày </p>

                    <div class="chart-wrapper px-0" style="height:91px;padding-top: 5px;" height="91">
                        <canvas id="widgetChart2"></canvas>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="content mt-3">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Biểu đồ tin đăng mới 7 ngày</h4>
                    <canvas id="tinrao"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Biểu đồ cập nhật sản phẩm sản phẩm 7 ngày</h4>
                    <canvas id="tincan"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- .content -->
    <script src="template/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="template/vendors/flot/jquery.flot.js"></script>
    <script src="template/vendors/flot/jquery.flot.time.js"></script>
    <script src="template/vendors/flot/jquery.flot.resize.js"></script>
    <script src="template/assets/js/init-scripts/flot-chart/curvedLines.js"></script>
    <script src="template/assets/js/init-scripts/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script>


        (function ($) {

            "use strict"; // Start of use strict

            $('.count').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
            var ctx = document.getElementById( "tinrao" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    labels:<?=$this->tinrao7ngay['ngaydang'];?>,
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [ {
                        label: "Bài viết",
                        data: <?=$this->tinrao7ngay['total'];?>,
                        backgroundColor: 'transparent',
                        borderColor: 'red',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 4,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'red',
                    } ]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        displayColors: false,
                        intersect: false,
                    },
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: true,
                            fontFamily: 'Montserrat',
                        },
                    },
                    scales: {
                        xAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        } ],
                        yAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Biểu đồ tin rao'
                            }
                        } ]
                    },
                    title: {
                        display: false,
                        text: 'Normal Legend'
                    }
                }
            } );

            var ctx = document.getElementById( "tincan" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    labels: <?=$this->tincan7ngay['ngaydang']?>,
                    type: 'line',
                    defaultFontFamily: 'Montserrat',
                    datasets: [{
                        label: "Sản phẩm",
                        data: <?=$this->tincan7ngay['total']?>,
                        backgroundColor: 'transparent',
                        borderColor: 'blue',
                        borderWidth: 3,
                        pointStyle: 'circle',
                        pointRadius: 5,
                        pointBorderColor: 'transparent',
                        pointBackgroundColor: 'blue',
                    } ]
                },
                options: {
                    responsive: true,

                    tooltips: {
                        mode: 'index',
                        titleFontSize: 12,
                        titleFontColor: '#000',
                        bodyFontColor: '#000',
                        backgroundColor: '#fff',
                        titleFontFamily: 'Montserrat',
                        bodyFontFamily: 'Montserrat',
                        cornerRadius: 3,
                        displayColors: false,
                        intersect: false,
                    },
                    legend: {
                        display: false,
                        labels: {
                            usePointStyle: true,
                            fontFamily: 'Montserrat',
                        },
                    },
                    scales: {
                        xAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: false,
                                labelString: 'Month'
                            }
                        } ],
                        yAxes: [ {
                            display: true,
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Biểu đồ tin cần'
                            }
                        } ]
                    },
                    title: {
                        display: false,
                        text: 'Normal Legend'
                    }
                }
            } );

            var ctx = document.getElementById("widgetChart1");
            var myChart1 = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?=$this->label7ngay; ?>,
                    type: 'line',
                    datasets: [{
                        data: <?=$this->value7ngay; ?>,
                        label: 'Lượt truy cập',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,255)',
                    },]
                },
                options: {

                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true,
                        displayColors: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            });

            var ctx1 = document.getElementById("widgetChart2");
            var myChart1 = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: <?=$this->labeldt7ngay; ?>,
                    type: 'line',
                    datasets: [{
                        data: <?=$this->valuedt7ngay; ?>,
                        // label: 'Doanh thu',
                        backgroundColor: 'transparent',
                        borderColor: 'rgba(255,255,255,255)',
                    },]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true,
                        displayColors: false,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                                    return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                                });
                            }
                        }
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: 'transparent',
                                zeroLineColor: 'transparent'
                            },
                            ticks: {
                                fontSize: 2,
                                fontColor: 'transparent'
                            }
                        }],
                        yAxes: [{
                            display: false,
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                    title: {
                        display: false,
                    },
                    elements: {
                        line: {
                            borderWidth: 1
                        },
                        point: {
                            radius: 4,
                            hitRadius: 10,
                            hoverRadius: 4
                        }
                    }
                }
            });

        })(jQuery);

    </script>
<?php } ?>