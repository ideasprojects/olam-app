<style type="text/css">
 .widget-user-header {
  padding-left: 20px !important;
  }
  .label_date {
      border: none;
      display: inline-block;
      padding: 6px 12px; 
  }
</style>

<link rel="stylesheet" href="<?= BASE_ASSET; ?>admin-lte/plugins/morris/morris.css">

<section class="content-header">
    <h1>
        <?= cclang('dashboard') ?>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="#">
                <i class="fa fa-dashboard">
                </i>
                <?= cclang('home') ?>
            </a>
        </li>
        <li class="active">
            <?= cclang('dashboard') ?>
        </li>
    </ol>
</section>

<section class="content">
    <div class="row">
      <?php cicool()->eventListen('dashboard_content_top'); ?>
    </div>

   <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-body ">
            <form name="filter_dashboard" id="filter_dashboard" action="<?= base_url('administrator/dashboard/index'); ?>">
              <div class="col-sm-1 padd-left-0 label_date">
                 Start Date : 
              </div>
              <div class="col-sm-2 padd-left-0 ">
                 <input type="text" id="tanggal_awal" name="tanggal_awal" value="<?= $default_awal ?>" class="form-control datepicker">
              </div>
              <div class="col-sm-1 padd-left-0 label_date">
                 End Date : 
              </div>
              <div class="col-sm-2 padd-left-0 ">
                   <input type="text" id="tanggal_akhir" name="tanggal_akhir" value="<?= $default_akhir ?>" class="form-control datepicker">
              </div>
              <div class=" padd-left-0 ">
                  <button type="submit" class="btn btn-default" aria-label="filter"><i class="fa fa-search"></i> Filter</button>
              </div>
            </form>
            <div id="chart_pd" style="width: 100%; height: 400px; margin-top: 50px"></div>
            <div id="chart_ib" style="width: 100%; height: 400px; margin-top: 50px"></div>
            <div id="chart_qbd" style="width: 100%; height: 400px; margin-top: 50px"></div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- /.content -->

<!-- /.row -->
<?php cicool()->eventListen('dashboard_content_bottom'); ?>

</section>
<!-- /.content -->
<script type="text/javascript">
  var chartDom = document.getElementById('chart_pd');
  var myChart = echarts.init(chartDom);
  var option_pd;

  option_pd = {
    title: {
      text: 'Powder Plant',
      subtext:  <?php
      $avg_sum = array();
      foreach($data_pd_all as $data) {
         $avg_sum[] = $data->avg_target;
      }
       echo "'Target Powder Plant: " . number_format((array_sum($avg_sum) / count($avg_sum)), 2, ',', ' ') ."%',";
      ?>
    },
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      data: ['Powder Plant 1', 'Powder Plant 2', 'Powder Plant 3']
    },
    toolbox: {
      show: true,
      feature: {
        // dataView: { show: true, readOnly: false },
        magicType: { show: true, type: ['line', 'bar', 'stack'] },
        restore: { show: true },
        saveAsImage: { show: true }
      },
      right: '5%',
    },
    grid: {
      top: 110,
      left: 50,
      right: 50,
    },
    calculable: true,
    xAxis: [
    {
      type: 'category',
     
      data: [<?php foreach($data_pd_all as $data) {
        echo "'" . date("d M Y", strtotime($data->date)) . "',";
      }
      ?>
      ],
      axisLabel: {
        show: true,
        interval: 0,
        rotate: 45,
        fontSize: 10,
      },
    }
    ],
    yAxis: [
    {
      type: 'value'
    }
    ],
    series: [
    {
      name: 'Powder Plant 1',
      // stack: 'pd',
      type: 'bar',
      // barWidth: '20%',
      data: [<?php foreach($data_pd_p1 as $data) {
        echo "" . number_format($data->sum, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      // position: 'top',
      // color: "black",
      // fontSize: 10,
      // position: 'insideBottom',
      // distance: 15,
      // align: 'left',
      // verticalAlign: 'middle',
      // rotate: 90,
      formatter: function(d) {
        return d.data + '%';
        },
      },
      markLine: {
          symbol: 'none',
          data: [{
            yAxis: <?php
      $avg_sum = array();
      foreach($data_pd_p3 as $data) {
         $avg_sum[] = $data->avg_target;
      }
       echo number_format((array_sum($avg_sum) / count($avg_sum)), 2, '.', ' ');
      ?>,
            label: {
              normal: {
               show: true, 
              }
            },
            // lineStyle: {
            //   normal: {
            //     type:'dashed',
            //     color: 'green',
            //   }
            // },
          }],
        }
    },
    {
      name: 'Powder Plant 2',
      type: 'bar',
      // stack: 'pd',
      data: [<?php foreach($data_pd_p2 as $data) {
        echo "" . number_format($data->sum, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      // position: 'top',
      // color: "black",
      // fontSize: 10,
      // position: 'insideBottom',
      // distance: 15,
      // align: 'left',
      // verticalAlign: 'middle',
      // rotate: 90,
      formatter: function(d) {
        return d.data + '%';
        },
      },
      // markLine: {
      //   data : [{name: 'Target', type: 'max'}]
      // }
    },
    {
      name: 'Powder Plant 3',
      type: 'bar',
      // stack: 'pd', 
      data: [<?php foreach($data_pd_p3 as $data) {
        echo "" . number_format($data->sum, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      // position: 'top',
      // color: "black",
      // fontSize: 10,
      // position: 'insideBottom',
      // distance: 15,
      // align: 'left',
      // verticalAlign: 'middle',
      // rotate: 90,
      formatter: function(d) {
        return d.data + '%';
        },
      },
    },
    ]
  };

  option_pd && myChart.setOption(option_pd);
</script>

<script type="text/javascript">
  var chartDom = document.getElementById('chart_ib');
  var myChart = echarts.init(chartDom);
  var option_ib;

  option_ib = {
    title: {
      text: 'Incoming Beans',
      subtext:  <?php
      $avg_sum = array();
      foreach($data_ib as $data) {
         $avg_sum[] = $data->avg_target;
      }
       echo "'Target : " . number_format((array_sum($avg_sum) / count($avg_sum)), 2, ',', ' ') ."',";
      ?>
    },
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      data: ['Incoming Beans']
    },
    toolbox: {
      show: true,
      feature: {
        // dataView: { show: true, readOnly: false },
        magicType: { show: true, type: ['line', 'bar'] },
        restore: { show: true },
        saveAsImage: { show: true }
      },
      right: '5%',
    },
    grid: {
      top: 110,
      left: 50,
      right: 50,
    },
    calculable: true,
    xAxis: [
    {
      type: 'category',
     
      data: [<?php foreach($data_ib as $data) {
        echo "'" . date("d M Y", strtotime($data->date)) . "',";
      }
      ?>
      ],
      axisLabel: {
        show: true,
        interval: 0,
        rotate: 45,
        fontSize: 10,
      },
    }
    ],
    yAxis: [
    {
      type: 'value'
    }
    ],
    series: [
    {
      name: 'Incoming Beans',
      type: 'bar',
      data: [<?php foreach($data_ib as $data) {
        echo "" . number_format($data->sum, 2, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 12,
      },
      markLine: {
          symbol: 'none',
          data: [{
            yAxis: <?php
      $avg_sum = array();
      foreach($data_ib as $data) {
         $avg_sum[] = $data->avg_target;
      }
       echo number_format((array_sum($avg_sum) / count($avg_sum)), 2, '.', ' ');
      ?>,
            label: {
              normal: {
               show: true, 
              }
            },
            // lineStyle: {
            //   normal: {
            //     type:'dashed',
            //     color: 'green',
            //   }
            // },
          }],
        }
    },
    ]
  };

  option_ib && myChart.setOption(option_ib);
</script>

<script type="text/javascript">
  var chartDom = document.getElementById('chart_qbd');
  var myChart = echarts.init(chartDom);
  var option_qbd;

  genFormatter = (series) => {
    return (param) => {
        // console.log(param);
        let sum = 0;
        series.forEach(item => {
            sum += item.data[param.dataIndex];
        });
        return sum
    }
  };

  function isLastSeries(index) {
      return index === series.length - 1
  }

  series = [
    {
      name: 'Deo FFA',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_ffa, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Deo BCI',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_bci, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Deo AI',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_ai, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Deo Red',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_red, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Deo Yellow',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_yellow, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Deo Blue',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_blue, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Deo Neutral',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->deo_neutral, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw FFA',
     qbdack: 'raw',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_ffa, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw BCI',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_bci, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw AI',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_ai, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw Red',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_red, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw Yellow',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_yellow, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw Blue',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_blue, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
      name: 'Raw Neutral',
      stack: 'qbd',
      type: 'bar',
      data: [<?php foreach($data_qbd as $data) {
        echo "" . number_format($data->raw_neutral, 0, '.', ' ') . ",";
      }
      ?>
      ],
      label: {
      show: true,
      position: 'top',
      color: "black",
      fontSize: 10,
      position: 'insideBottom',
      distance: 15,
      align: 'left',
      verticalAlign: 'middle',
      rotate: 90,
      formatter: function(d) {
        return d.data;
        },
      },
    },
    {
    name: 'Total',
     data: [<?php foreach($data_qbd as $data) {
        echo "" . ($data->raw_neutral*0) . ",";
      }
      ?>
      ],
      tooltip: {
        show: false
      }
    }
    ]

  option_qbd = {
    title: {
      text: 'Quality Butter DEO',
    },
    tooltip: {
      trigger: 'axis'
    },
    legend: {
      data: ['Deo FFA','Deo BCI', 'Deo AI', 'Deo Red', 'Deo Yellow', 'Deo Blue', 'Deo Neutral', 'Raw FFA', 'Raw BCI', 'Raw AI', 'Raw Red', 'Raw Yellow', 'Raw Blue', 'Raw Neutral'],
      selected:{'Deo FFA':true,'Deo BCI':true, 'Deo AI':true, 'Deo Red':true, 'Deo Yellow':true, 'Deo Blue':true, 'Deo Neutral':true, 'Raw FFA':true, 'Raw BCI':true, 'Raw AI':true, 'Raw Red':true, 'Raw Yellow':true, 'Raw Blue':true, 'Raw Neutral':true},
      top: '12%',
      type: 'scroll',
    },
    toolbox: {
      show: true,
      feature: {
        // dataView: { show: true, readOnly: false },
        magicType: { show: true, type: ['line', 'bar'] },
        restore: { show: true },
        saveAsImage: { show: true }
      },
      right: '5%',
    },
    grid: {
      top: 110,
      left: 50,
      right: 50,
    },
    calculable: true,
    xAxis: [
    {
      type: 'category',
     
      data: [<?php foreach($data_qbd as $data) {
        echo "'" . date("d M Y", strtotime($data->date)) . "',";
      }
      ?>
      ],
      axisLabel: {
        show: true,
        interval: 0,
        rotate: 45,
        fontSize: 10,
      },
    }
    ],
    yAxis: [
    {
      type: 'value'
    }
    ],
    series: series.map((item, index) => Object.assign(item, {
        type: 'bar',
        stack: true,
        label: {
            show: true,
            formatter: isLastSeries(index) ? genFormatter(series) : null,
            fontSize:  isLastSeries(index) ? 12 : 12,
            color: 'black',
            position: isLastSeries(index) ? 'top' : 'inside'
        },
    })) ,  
  };

  option_qbd && myChart.setOption(option_qbd);
</script>

<script type="text/javascript">
    jQuery('#tanggal_awal').datetimepicker({
     timepicker:false,
     formatDate:'Y-m-d',
     // minDate:0,
     maxDate: '-1970-01-02',
    });
    
    jQuery('#tanggal_akhir').datetimepicker({
     timepicker:false,
     formatDate:'Y-m-d',
     // minDate:0,
     maxDate: '-1970-01-02',
    });
</script>