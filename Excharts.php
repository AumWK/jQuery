<?php 
    require("CallData.php");
?>
<div class="col-12 mb-4">
    <div class="card">
        <div class="card-header">
            <h4><i class="fas fa-file-signature fa-fw fa-1x"></i> รายงานสรุปฝ่ายบริหาร</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link text-primary active" id="nav-report-sales-tab" data-bs-toggle="tab" data-bs-target="#nav-report-sales" type="button" role="tab" aria-controls="nav-report-sales" aria-selected="true">รายงานยอดขาย</button>
                            <button class="nav-link text-primary" id="nav-executive-tab" data-bs-toggle="tab" data-bs-target="#nav-executive" type="button" role="tab" aria-controls="nav-executive" aria-selected="false">ผู้บริหาร PALM</button>
                        </div>
                    </nav>
                    <div class="tab-content mt-3" id="nav-tabContent">
                        <!-- รายงานยอดขายต่อเดือน -->
                        <div class="tab-pane fade show active" id="nav-report-sales" role="tabpanel" aria-labelledby="nav-report-sales-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 d-flex justify-content-end align-items-center">
                                    <div class="me-1">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item">
                                                <button class="nav-link active me-1 bg-light" data-bs-toggle="tab" href="#ํyear-sales"><i class="fas fa-chart-line"></i> ยอดขาย</button>
                                            </li>
                                            <li class="nav-item">
                                                <button class="nav-link bg-light" data-bs-toggle="tab" href="#year-sales-detail"><i class="fas fa-chart-bar"></i> รายละเอียด</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <form id="ํ" class="">
                                        <div class="d-flex">
                                            <select class="me-1 text-center form-select" style="width: 10rem;" name='MYear' id='MYear' onchange='SelectYear()'>
                                            <?php 
                                            echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
                                            if(date("Y") > 2022) {
                                                $i = 0;
                                                for($Y = 2022; $Y < date("Y"); $Y++) {
                                                    ++$i;
                                                    echo "<option value='".(date("Y")-$i)."'>".(date("Y")-$i)."</option>";
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-content">
                                    <div id="ํyear-sales" class="tab-pane active">
                                        <div id="ํYearSales"></div>
                                    </div>
                                    <div id="year-sales-detail" class="tab-pane fade">
                                        <div id="ํYearSalesDetail"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered rounded rounded-3 overflow-hidden" style="width:100%">
                                        <thead class="text-center" style='font-size: 13.5px; background-color: rgba(155, 0, 0, 0.08);'>
                                            <th width="12%">เดือน</th>
                                            <th width="12%">ทีม กทม.</th>
                                            <th width="12%">ทีม ตจว.</th>
                                            <th width="12%">ทีม หน้าร้าน</th>
                                            <th width="12%">ทีม ออนไลน์</th>
                                            <th width="12%">ทีม โมเดิร์นเทรด 1</th>
                                            <th width="12%">ทีม โมเดิร์นเทรด 2</th>
                                            <th width="16%">รวม</th>
                                        </thead>
                                        <tbody id='Tbody' style='font-size: 13px;'></tbody>
                                        <tfoot id='Tfoot' style='font-size: 13px; background-color: rgba(0, 0, 0, 0.04);'></tfoot>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        <!-- END รายงานยอดขายต่อเดือน -->

                        <!-- ผู้บริหาร PALM -->
                        <div class="tab-pane fade" id="nav-executive" role="tabpanel" aria-labelledby="nav-executive-tab">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div id="MonthlySales" class=""></div>
                                </div>
                                <div class="col-lg-5">
                                <div id="MonthlyPercent" class=""></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg">
                                    <nav>
                                        <div class="nav nav-tabs" id="team-tab" role="tablist">
                                            <button class="nav-link text-primary active" id="ALL-team-tab" data-bs-toggle="tab" data-bs-target="#ALL-team" type="button" role="tab" aria-controls="ALL-team" aria-selected="false">ยอดรวมทุกทีม</button>
                                            <button class="nav-link text-primary" id="TT1-team-tab" data-bs-toggle="tab" data-bs-target="#TT1-team" type="button" role="tab" aria-controls="TT1-team" aria-selected="false">ทีม กทม.</button>
                                            <button class="nav-link text-primary" id="TT2-team-tab" data-bs-toggle="tab" data-bs-target="#TT2-team" type="button" role="tab" aria-controls="TT2-team" aria-selected="false">ทีม ตจว.</button>
                                            <button class="nav-link text-primary" id="OUL-team-tab" data-bs-toggle="tab" data-bs-target="#OUL-team" type="button" role="tab" aria-controls="OUL-team" aria-selected="false">ทีม หน้าร้าน</button>
                                            <button class="nav-link text-primary" id="ONL-team-tab" data-bs-toggle="tab" data-bs-target="#ONL-team" type="button" role="tab" aria-controls="ONL-team" aria-selected="false">ทีม ออนไลน์</button>
                                            <button class="nav-link text-primary" id="MT1-team-tab" data-bs-toggle="tab" data-bs-target="#MT1-team" type="button" role="tab" aria-controls="MT1-team" aria-selected="false">ทีม โมเดิร์นเทรด 1</button>
                                            <button class="nav-link text-primary" id="MT2-team-tab" data-bs-toggle="tab" data-bs-target="#MT2-team" type="button" role="tab" aria-controls="MT2-team" aria-selected="false">ทีม โมเดิร์นเทรด 2</button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="tab-content mt-3" id="nav-tabContent-team">
                                <div class="tab-pane fade show active" id="ALL-team" role="tabpanel" aria-labelledby="ALL-team-tab">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered rounded rounded-3 overflow-hidden" style="width:100%"> 
                                                <thead>
                                                    <tr class="text-center" style='background-color: rgba(155, 0, 0, 0.04);'>
                                                        <th colspan="7" class="text-primary">รายงานยอดขาย รวมทุกทีม</th>
                                                    </tr>
                                                    <tr class="text-center" style='background-color: rgba(155, 0, 0, 0.04);'>
                                                        <th colspan="3"><?php echo FullDate(date("Y-m-d")); ?></th>
                                                        <th>เหลืออีก <?php echo (12 - date("m")); ?> เดือน</th>
                                                        <th>วันที่ปัจจุบัน <?php echo date("d"); ?></th>
                                                        <th>จำนวนวันทำงาน <?php echo cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y")); ?></th>
                                                        <th><?php echo number_format( (date("d")/cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"))) * 100 )."%"; ?> ของเดือน</th>
                                                    </tr>
                                                    <tr class="text-center text-dark table-active" style='background-color: rgba(155, 0, 0, 0.04);'>
                                                        <th colspan='2'></th>
                                                        <th>เป้าชดเชยไตรมาส</th>
                                                        <th>% เป้าชดเชย</th>
                                                        <th>เป้าการขาย</th>
                                                        <th>ยอดขาย</th>
                                                        <th>คิดเป็น % ของเดือน</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="">
                                                        <?php 
                                                            $AllnewTarGroup =   ($newTarGroup['TT101'])+
                                                                                ($newTarGroup['TT201'] + $newTarGroup['TT202'])+
                                                                                ($newTarGroup['OUL'])+
                                                                                ($newTarGroup['ONL'])+
                                                                                ($newTarGroup['MT100'] + $newTarGroup['EXP101'])+
                                                                                ($newTarGroup['MT200']);

                                                            $ALLgroupReal =     ($groupReal['TT101'])+
                                                                                ($groupReal['TT201']+$groupReal['TT202']+$groupReal['TT203'])+
                                                                                ($groupReal['OUL'])+
                                                                                ($groupReal['ONL'])+
                                                                                ($groupReal['MT100']+$groupReal['EXP101'])+
                                                                                ($groupReal['MT200']);
                                                            
                                                            $AllgroupTarget =   ($groupTarget['TT101'])+
                                                                                ($groupTarget['TT201']+$groupTarget['TT202']+$groupTarget['TT203'])+
                                                                                ($groupTarget['OUL'])+
                                                                                ($groupTarget['ONL'])+
                                                                                ($groupTarget['MT100']+$groupTarget['EXP101'])+
                                                                                ($groupTarget['MT200']);
                                                        ?>
                                                        <th colspan="2" class="text-right">รวมทุกทีม เดือน <?php echo FullMonth(date("m")); ?></th>
                                                        <th class="text-right"><?php echo number_format($AllnewTarGroup,0); ?></th>
                                                        <th class="text-center"><?php echo number_format(($ALLgroupReal / $AllnewTarGroup)*100,2); ?>%</th>
                                                        <th class="text-right"><?php echo number_format($AllgroupTarget,0); ?></th>
                                                        <th class="text-right"><?php echo number_format($ALLgroupReal,0); ?></th>
                                                        <th class="text-center"><?php echo number_format(($ALLgroupReal / $AllgroupTarget)*100,2); ?>%</th>
                                                    </tr>
                                                    <tr class="" style="background-color: rgba(0, 0, 0, 0.04);">
                                                        <?php 
                                                            $AllgroupTargetM =  ($groupTargetM['TT101'])+
                                                                                ($groupTargetM['TT201'] + $groupTargetM['TT202']+$groupTargetM['TT203'])+
                                                                                ($groupTargetM['OUL'])+
                                                                                ($groupTargetM['ONL'])+
                                                                                ($groupTargetM['MT100'] + $groupTargetM['EXP101'])+
                                                                                ($groupTargetM['MT200']);

                                                            $ALLgroupOld =      ($groupOld['TT101'])+
                                                                                ($groupOld['TT201']+$groupOld['TT202'])+
                                                                                ($groupOld['OUL'])+
                                                                                ($groupOld['ONL'])+
                                                                                ($groupOld['MT100'])+
                                                                                ($groupOld['MT200']);
                                                        ?>
                                                        <th colspan="3" class="text-right text-primary">เป้าสะสม</th>
                                                        <th class="text-center text-primary"><?php echo (date("m")-1); ?> เดือน</th>
                                                        <th class="text-right text-primary"><?php echo number_format($AllgroupTargetM,0) ?></th>
                                                        <th class="text-right text-primary"><?php echo number_format($ALLgroupOld,0) ?></th>
                                                        <th class="text-center text-primary"><?php if($AllgroupTargetM == 0) { echo "N/A"; }else{ echo number_format(($ALLgroupOld / $AllgroupTargetM)*100,2); } ?>%</th>
                                                    </tr>
                                                    <tr class="" style="background-color: rgba(0, 0, 0, 0.04);">
                                                        <?php 
                                                            $ALLTrgAmount = ($TrgAmount['TT101'])+
                                                                            ($TrgAmount['TT201'] + $TrgAmount['TT202']+$TrgAmount['TT203'])+
                                                                            ($TrgAmount['OUL'])+
                                                                            ($TrgAmount['ONL'])+
                                                                            ($TrgAmount['MT100'] + $TrgAmount['EXP101'])+
                                                                            ($TrgAmount['MT200']);
                                                        ?>
                                                        <th colspan="3" class="text-right text-primary">เป้าปี</th>
                                                        <th class="text-center text-primary">12 เดือน</th>
                                                        <th class="text-right text-primary"><?php echo number_format($ALLTrgAmount,0); ?></th>
                                                        <th class="text-right text-primary"><?php echo number_format(($ALLgroupOld+$ALLgroupReal),0); ?></th>
                                                        <th class="text-center text-primary"><?php echo number_format((($ALLgroupOld+$ALLgroupReal) / $ALLTrgAmount)*100,2); ?>%</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="TT1-team" role="tabpanel" aria-labelledby="TT1-team-tab">
                                    <div class="row">
                                        <?php require("SaleM_TT1.php");?> <!-- กทม. -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="TT2-team" role="tabpanel" aria-labelledby="TT2-team-tab">
                                    <div class="row">
                                        <?php require("SaleM_TT2.php");?> <!-- ตจว. -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="OUL-team" role="tabpanel" aria-labelledby="OUL-team-tab">
                                    <div class="row">
                                        <?php require("SaleM_OUL.php");?> <!-- หน้าร้าน -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="ONL-team" role="tabpanel" aria-labelledby="ONL-team-tab">
                                    <div class="row">
                                        <?php require("SaleM_ONL.php");?> <!-- ออนไลน์ -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="MT1-team" role="tabpanel" aria-labelledby="MT1-team-tab">
                                    <div class="row">
                                        <?php require("SaleM_MT1.php");?> <!-- ทีม โมเดิร์นเทรด 1 -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="MT2-team" role="tabpanel" aria-labelledby="MT2-team-tab">
                                    <div class="row">
                                    <?php require("SaleM_MT2.php");?> <!-- ทีม โมเดิร์นเทรด 2 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END ผู้บริหาร PALM -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"> // กราฟยอดขายรายปี/ราลละเอียด
    
    var options1 = {
        series: [],
        chart: {
            toolbar: {
                // show: false,
                tools: {
                    download: false,
                    selection: false,
                    zoom: false,
                    zoomin: false,
                    zoomout: false,
                    pan: false,
                    reset: false,
                }
            },
            height: 350,
            // width: "100%",
            type: 'line',
            stacked: false,
            labelDisplay: "rotate",
            slantLabel: "1"
        },
        stroke: {
            width: [0, 3],
            colors: ['#171011'],
            // curve: 'smooth'
        },
        title: {
            text: 'ยอดขายรายปี'
        },
        plotOptions: {
            bar: {
                columnWidth: '60%'
            }
        },
        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        markers: {
            size: 0,
            colors: ['#171011']
        },
        theme: {
            monochrome: {
                enabled: true,
                color: '#9a1118',
                shadeTo: 'light',
                shadeIntensity: 2.40
            }
        },
        xaxis: {
            labels: {
                show: true,
                rotate: -40,
                rotateAlways: true,
            },
            categories: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            tickPlacement: 'on'
        },
        yaxis: {
            title: {
                text: 'บาท',
            },
            min: 0
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toLocaleString() + " บาท";
                    }
                    return y;
                }
            }
        }
    };
    var options2 = {
        series: [],
        // colors: ['#F46036','#D7263D','#662E9B','#2983FF','#1B998B','#F9C80E','#A300D6','#9A1118','#C4BBAF','#5C4742','#E2C044',''],
        colors: ['#3F51B5','#775DD0','#FF4560','#00E396','#F86624','#008FFB','#171011'],
        chart: {
            stacked: true,
            type: 'bar',
            height: 350,
            labelDisplay: "rotate",
            slantLabel: "1",
            toolbar: {
                show: false,
                tools: {
                        download: false,
                        selection: false,
                        zoom: false,
                        zoomin: false,
                        zoomout: false,
                        pan: false,
                        reset: false,
                    }
            }
        },
        stroke: {
            // curve: 'smooth',
            curve: 'straight',
            width: [0, 0, 0, 0, 0, 0, 2],
            colors: ['#302224']
        },
        title: {
            text: 'ยอดขายรายปี'
        },
        plotOptions: {
            bar: {
                columnWidth: '60%'
            },
        },
        dataLabels: {
            enabled: false,
            // enabledOnSeries: [1]
        },
        fill: {
            opacity: [0.9, 0.9, 0.9, 0.9, 0.9, 0.9, 0.4],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        markers: {
            size: 3,
            strokeOpacity: 0.5,
        },
        xaxis: {
            categories: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            tickPlacement: 'on',
            labels: {
                show: true,
                rotate: -40,
                rotateAlways: true,
            }
        },
        yaxis: {
            title: {
                    text: 'บาท',
            },
            min: 0,
            max: 50000000
        },
        // dataLabels: {
        //     enabled: true,
        //     formatter: function(value, { seriesIndex, dataPointIndex, w }) {
        //         return w.config.series[seriesIndex].name
        //     }
        // },
        tooltip: {
            shared: false,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toLocaleString() + " บาท";
                    }
                    return y;
                }
            }
        },
    };

</script>

<script type="text/javascript"> // กราฟยอดขายรายเดือน
    var options = {
        series: [{
            name: 'ยอดขาย',
            type: 'column',
            data: [
                    <?php echo $groupReal['TT101']; ?>,
                    <?php echo ($groupReal['TT201']+$groupReal['TT202']+$groupReal['TT203']); ?>,
                    <?php echo $groupReal['OUL']; ?>,
                    <?php echo $groupReal['ONL']; ?>,
                    <?php echo ($groupReal['MT100']+$groupReal['EXP101']); ?>,
                    <?php echo $groupReal['MT200']; ?>
                  ]
            },{
            name: 'เป้าขาย',
            type: 'line',
            data: [
                    <?php echo $groupTarget['TT101']; ?>,
                    <?php echo ($groupTarget['TT201']+$groupTarget['TT202']+$groupTarget['TT203']); ?>,
                    <?php echo $groupTarget['OUL']; ?>,
                    <?php echo $groupTarget['ONL']; ?>,
                    <?php echo ($groupTarget['MT100']+$groupTarget['EXP101']); ?>,
                    <?php echo $groupTarget['MT200']; ?>
                  ]
        }],
        chart: {
            height: 350,
            type: 'line',
            stacked: false,
            toolbar: {
                tools: {
                    download: false,
                    selection: false,
                    zoom: false,
                    zoomin: false,
                    zoomout: false,
                    pan: false,
                    reset: false,
                }
            },
        },
        stroke: {
            width: [0, 4],
            colors: ['#171011']
            // curve: 'smooth'
        },
        title: {
            text: 'ยอดขาย เดือน <?php echo FullMonth(date("m")); ?>'
        },
        plotOptions: {
            bar: {
                columnWidth: '60%'
            }
        },
        fill: {
            opacity: [0.85, 0.25, 1],
            gradient: {
                inverseColors: false,
                shade: 'light',
                type: "vertical",
                opacityFrom: 0.85,
                opacityTo: 0.55,
                stops: [0, 100, 100, 100]
            }
        },
        labels: ['กทม.', 'ตจว.', 'หน้าร้าน', 'ออนไลน์', 'โมเดิร์นเทรด 1', 'โมเดิร์นเทรด 2'],
        markers: {
            size: 0,
            colors: ['#171011']
        },
        theme: {
            monochrome: {
                enabled: true,
                color: '#9a1118',
                shadeTo: 'light',
                shadeIntensity: 2.40
            }
        },
        yaxis: {
            title: {
                text: 'บาท',
            },
            min: 0,
            labels: {
                formatter: function (val) {
                    return val.toFixed(0)
                }
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        return y.toLocaleString(undefined, {
                            minimumFractionDigits: 0,
                            maximumFractionDigits: 0
                        }) + " บาท";
                        // return y.toFixed(0) + " บาท";
                    }
                    return y;
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#MonthlySales"), options);
    chart.render();
</script>

<script type="text/javascript"> // กราฟยอดขายคิดเป็น % ของเดือน
    var options = {
        series: [{
            name: '',
            data: [
                    <?php echo number_format(($groupReal['TT101']/$groupTarget['TT101'])*100,2); ?>,
                    <?php echo number_format(( ($groupReal['TT201']+$groupReal['TT202']+$groupReal['TT203']) / ($groupTarget['TT201']+$groupTarget['TT202']+$groupTarget['TT203']) )*100,2); ?>,
                    <?php echo number_format(($groupReal['OUL']/$groupTarget['OUL'])*100,2); ?>,
                    <?php echo number_format(($groupReal['ONL']/$groupTarget['ONL'])*100,2); ?>,
                    <?php echo number_format((($groupReal['MT100']+$groupReal['EXP101']) / ($groupTarget['MT100']+$groupTarget['EXP101']))*100,2); ?>,
                    <?php echo number_format(($groupReal['MT200']/$groupTarget['MT200'])*100,2); ?>
                  ]
        }
        ],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                tools: {
                    download: false,
                    selection: false,
                    zoom: false,
                    zoomin: false,
                    zoomout: false,
                    pan: false,
                    reset: false,
                }
            },
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val.toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +" %";
            },
        },
        stroke: {
            width: 1,
        },
        title: {
            text: 'ยอดขายคิดเป็น % เดือน <?php echo FullMonth(date("m")); ?>'
        },
        xaxis: {
            categories: ['กทม.', 'ตจว.', 'หน้าร้าน', 'ออนไลน์', 'MT1', 'MT2'],
        },
        yaxis: {
            forceNiceScale: false,
            max: 100,
        },
        fill: {
            opacity: 1
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 40
        },
        theme: {
            monochrome: {
                enabled: true,
                color: '#a12f34',
                shadeTo: 'light',
                shadeIntensity: 2.40
            }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (y) {
                    if (typeof y !== "undefined") {
                        // y.toFixed(0) y.toLocaleString()
                        return y.toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) +" %";
                    }
                    return y;
                }
            }
        }

    };

    var chart = new ApexCharts(document.querySelector("#MonthlyPercent"), options);
    chart.render();

</script>

<script>
    $(document).ready(function(){
        SelectYear();
	});

    function SelectYear() {
        var MYear = $("#MYear").val();
        $(".overlay").show();
        $.ajax({
            url: "dashboard/ajax/ajaxManageReport.php?a=SelectYear",
            type: "POST",
            data: { YearSelect : MYear },
            success: function(result) {
                var obj = jQuery.parseJSON(result);
                $.each(obj,function(key,inval) {
                    $("#Tbody").html(inval['Tbody']);
                    $("#Tfoot").html(inval['Tfoot']);
                    
                    chart1.updateSeries([{
                        name: 'ยอดขายรวม',
                        type: 'column',
                        data: [ parseInt(inval['smM1']), 
                                parseInt(inval['smM2']),
                                parseInt(inval['smM3']),
                                parseInt(inval['smM4']),
                                parseInt(inval['smM5']),
                                parseInt(inval['smM6']),
                                parseInt(inval['smM7']),
                                parseInt(inval['smM8']),
                                parseInt(inval['smM9']),
                                parseInt(inval['smM10']),
                                parseInt(inval['smM11']),
                                parseInt(inval['smM12']),
                              ]
                        },{
                        name: 'เป้าขาย',
                        type: 'line',
                        data: [ parseInt(inval['CM1']), 
                                parseInt(inval['CM2']),
                                parseInt(inval['CM3']),
                                parseInt(inval['CM4']),
                                parseInt(inval['CM5']),
                                parseInt(inval['CM6']),
                                parseInt(inval['CM7']),
                                parseInt(inval['CM8']),
                                parseInt(inval['CM9']),
                                parseInt(inval['CM10']),
                                parseInt(inval['CM11']),
                                parseInt(inval['CM12']),
                              ]
                    }])
                    chart2.updateSeries([{
                                            name: 'กทม.',
                                            type: 'bar',
                                            data: [ parseInt(inval['CMDTT11']), 
                                                    parseInt(inval['CMDTT12']),
                                                    parseInt(inval['CMDTT13']),
                                                    parseInt(inval['CMDTT14']),
                                                    parseInt(inval['CMDTT15']),
                                                    parseInt(inval['CMDTT16']),
                                                    parseInt(inval['CMDTT17']),
                                                    parseInt(inval['CMDTT18']),
                                                    parseInt(inval['CMDTT19']),
                                                    parseInt(inval['CMDTT110']),
                                                    parseInt(inval['CMDTT111']),
                                                    parseInt(inval['CMDTT112']),
                                                  ]
                                        }, {
                                            name: 'ตจว.',
                                            type: 'bar',
                                            data: [ parseInt(inval['CMDTT21']), 
                                                    parseInt(inval['CMDTT22']),
                                                    parseInt(inval['CMDTT23']),
                                                    parseInt(inval['CMDTT24']),
                                                    parseInt(inval['CMDTT25']),
                                                    parseInt(inval['CMDTT26']),
                                                    parseInt(inval['CMDTT27']),
                                                    parseInt(inval['CMDTT28']),
                                                    parseInt(inval['CMDTT29']),
                                                    parseInt(inval['CMDTT210']),
                                                    parseInt(inval['CMDTT211']),
                                                    parseInt(inval['CMDTT212']),
                                                  ]
                                        }, {
                                            name: 'หน้าร้าน',
                                            type: 'bar',
                                            data: [ parseInt(inval['CMDOUL1']), 
                                                    parseInt(inval['CMDOUL2']),
                                                    parseInt(inval['CMDOUL3']),
                                                    parseInt(inval['CMDOUL4']),
                                                    parseInt(inval['CMDOUL5']),
                                                    parseInt(inval['CMDOUL6']),
                                                    parseInt(inval['CMDOUL7']),
                                                    parseInt(inval['CMDOUL8']),
                                                    parseInt(inval['CMDOUL9']),
                                                    parseInt(inval['CMDOUL10']),
                                                    parseInt(inval['CMDOUL11']),
                                                    parseInt(inval['CMDOUL12']),
                                                  ]
                                        }, {
                                            name: 'ออนไลน์',
                                            type: 'bar',
                                            data: [ parseInt(inval['CMDONL1']), 
                                                    parseInt(inval['CMDONL2']),
                                                    parseInt(inval['CMDONL3']),
                                                    parseInt(inval['CMDONL4']),
                                                    parseInt(inval['CMDONL5']),
                                                    parseInt(inval['CMDONL6']),
                                                    parseInt(inval['CMDONL7']),
                                                    parseInt(inval['CMDONL8']),
                                                    parseInt(inval['CMDONL9']),
                                                    parseInt(inval['CMDONL10']),
                                                    parseInt(inval['CMDONL11']),
                                                    parseInt(inval['CMDONL12']),
                                                  ]
                                        }, {
                                            name: 'MT1',
                                            type: 'bar',
                                            data: [ parseInt(inval['CMDMT11']), 
                                                    parseInt(inval['CMDMT12']),
                                                    parseInt(inval['CMDMT13']),
                                                    parseInt(inval['CMDMT14']),
                                                    parseInt(inval['CMDMT15']),
                                                    parseInt(inval['CMDMT16']),
                                                    parseInt(inval['CMDMT17']),
                                                    parseInt(inval['CMDMT18']),
                                                    parseInt(inval['CMDMT19']),
                                                    parseInt(inval['CMDMT110']),
                                                    parseInt(inval['CMDMT111']),
                                                    parseInt(inval['CMDMT112']),
                                                  ]
                                        }, {
                                            name: 'MT2',
                                            type: 'bar',
                                            data: [ parseInt(inval['CMDMT21']), 
                                                    parseInt(inval['CMDMT22']),
                                                    parseInt(inval['CMDMT23']),
                                                    parseInt(inval['CMDMT24']),
                                                    parseInt(inval['CMDMT25']),
                                                    parseInt(inval['CMDMT26']),
                                                    parseInt(inval['CMDMT27']),
                                                    parseInt(inval['CMDMT28']),
                                                    parseInt(inval['CMDMT29']),
                                                    parseInt(inval['CMDMT210']),
                                                    parseInt(inval['CMDMT211']),
                                                    parseInt(inval['CMDMT212']),
                                                  ]
                                        }, {
                                            name: 'เป้าขาย',
                                            type: 'line',
                                            data: [ parseInt(inval['CM1']), 
                                                    parseInt(inval['CM2']),
                                                    parseInt(inval['CM3']),
                                                    parseInt(inval['CM4']),
                                                    parseInt(inval['CM5']),
                                                    parseInt(inval['CM6']),
                                                    parseInt(inval['CM7']),
                                                    parseInt(inval['CM8']),
                                                    parseInt(inval['CM9']),
                                                    parseInt(inval['CM10']),
                                                    parseInt(inval['CM11']),
                                                    parseInt(inval['CM12']),
                                                  ]
                    }])
                    var max = 0;
                    for(var i = 0; i <= 12; i++){
                        if (max < parseInt(inval['smM'+i])){
                            max = parseInt(inval['smM'+i]);
                        }
                    }
                    chart2.updateOptions({
                        yaxis: {
                            max: max,
                            min: 0,
                            title: {
                                    text: 'บาท',
                            }
                        }
                    })
                });
                $(".overlay").hide();
            }
        })
    }
    var chart1 = new ApexCharts(document.querySelector("#ํYearSales"), options1); chart1.render();
    var chart2 = new ApexCharts(document.querySelector("#ํYearSalesDetail"), options2); chart2.render();
</script>