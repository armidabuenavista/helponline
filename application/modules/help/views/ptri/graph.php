    <!-- <link href="<?php echo base_url();?>assets/charts/plugins/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url();?>assets/charts/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/charts/plugins/nprogress/nprogress.css" rel="stylesheet">
    <!-- <link href="<?php //echo base_url();?>assets/charts/build/css/custom.min.css" rel="stylesheet"> -->

          <div class="table-responsive container-fluid">
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                  <div class="x_title">
                      <div class="container"><center>
                    <h4><i class="fa fa-bar-chart text-purple"></i> Summary Report of your Progress </h4>
                    <div class="clearfix"></div></center>
                  </div>
                  <div class="x_content">
                    <div id="mainc" style="height:500%;"></div>
                  </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="<?php echo base_url();?>assets/charts/plugins/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/charts/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/charts/plugins/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url();?>assets/charts/plugins/nprogress/nprogress.js"></script>
    <script src="<?php echo base_url();?>assets/charts/plugins/echarts/dist/echarts.min.js"></script>
    <script src="<?php echo base_url();?>assets/charts/plugins/echarts/map/js/world.js"></script>
    <script src="<?php echo base_url();?>assets/charts/build/js/custom.min.js"></script>

        
    <script>
        NProgress.start();
        NProgress.done();
      var theme = {
          color: [
            '#001a00','#003300','#004d00','#006600','#008000','#009900','#00b300','#00cc00','#00e600','#00ff00','#1aff1a','#33ff33','#4dff4d','#66ff66','#80ff80','#99ff99','#b3ffb3','#ccffcc','#e6ffe6'   
          ],
          
          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(150,250,150,0.1)', 'rgba(10,220,120,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

      var echartBar = echarts.init(document.getElementById('mainc'), theme);

      echartBar.setOption({
        title: {
          text: '',
          subtext: 'Weight:',
          x: 'center',
          y: 'top',
        },
          
        tooltip: {
          trigger: 'axis'
        },
        
        legend: {
          x: 'center',
          y: 'bottom',
          data: ["Old Weight","Current Weight"]
        },
          
//         toolbox: {
//          show: true,
//          feature: {
//            magicType: {
//              show: true,
//              title: {
//                stack: 'Stack',
//                tiled: 'Bar'
//              },
//              type: ['stack', 'tiled']
//            },
//            restore: {
//              show: true,
//              title: "Restore"
//            },
//            saveAsImage: {
//              show: true,
//              title: "Save Image"
//            }
//          }
//        },
          
        calculable: false,
        xAxis: [{
          type: 'category',
          <?php
                $a=0;
                $b=0;
                $c=0;
                $id = $this->session->all_userdata();
                $seg1=$id['lname'];
                $seg2=$id['fname'];
                $seg3=$id['email_address'];
                $this->load->model('mdl_help', '', TRUE);
           ?>
          data: [<?php foreach ($this->load->mdl_help->get_ptri($seg1,$seg2,$seg3) as $value_m) { echo '"'.date("M jS, Y", strtotime($value_m->date)).'",';} ?>]
        }],
        yAxis: [{
          type: 'value'
        }],
        series: [{
          name: 'Weight',
          type: 'line',
          data: [<?php foreach ($this->load->mdl_help->get_ptri($seg1,$seg2,$seg3) as $value_m) { echo $value_m->weight.",";} ?>],
          markPoint: {
            data: [{
              type: 'max',
              name: 'Max Weight'
            }, {
              type: 'min',
              name: 'Min Weight'
            }]
          }
        }
        ]
      });

    </script>