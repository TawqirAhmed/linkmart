<script type="text/javascript">
    
  

    $(function () {

    	'use strict'

      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
      }

      var mode      = 'index'
      var intersect = true

      var yearly_sales_level = <?php echo json_encode($months_for_yearly_report); ?>;
      var yearly_sales_data = <?php echo json_encode($amounts_for_yearly_report); ?>;

      // console.log(yearly_sales_level);

      var $salesChart = $('#sales-chart')
      var salesChart  = new Chart($salesChart, {
        type   : 'bar',
        data   : {
          // labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          labels  : yearly_sales_level,
          datasets: [
            {
              // label: "TK",
              backgroundColor: '#007bff',
              borderColor    : '#007bff',
              // data           : [1000, 2000, 3000, 2500, 2700, 2500, 3000, 4000, 5000, 6000, 5500, 6500]
              data           : yearly_sales_data
            }
            // ,
            // {
            //   backgroundColor: '#ced4da',
            //   borderColor    : '#ced4da',
            //   data           : [700, 1700, 2700, 2000, 1800, 1500, 2000, 2200, 2100, 1900, 1950, 1999]
            // }
          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips           : {
            mode     : mode,
            intersect: intersect
          },
          hover              : {
            mode     : mode,
            intersect: intersect
          },
          legend             : {
            display: false
          },
          scales             : {
            yAxes: [{
              // display: false,
              gridLines: {
                display      : true,
                lineWidth    : '4px',
                color        : 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks    : $.extend({
                beginAtZero: true,

                // Include a dollar sign in the ticks
                callback: function (value, index, values) {
                  if (value >= 1000) {
                    value /= 1000
                    value += 'k'
                  }
                  // return '$' + value
                  return 'TK'+ " " + value
                }
              }, ticksStyle)
            }],
            xAxes: [{
              display  : true,
              gridLines: {
                display: false
              },
              ticks    : ticksStyle
            }]
          }
        }
      })


      var monthly_sales_lebel = <?php echo json_encode($dates_for_monthly_report); ?>;
      var monthly_sales_data = <?php echo json_encode($amounts_for_monthly_report); ?>;


      var $visitorsChart = $('#visitors-chart')
      var visitorsChart  = new Chart($visitorsChart, {
        data   : {
          // labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
          labels  : monthly_sales_lebel,
          datasets: [{
            type                : 'line',
            // data                : [100, 120, 170, 167, 180, 177, 160],
            data                : monthly_sales_data,
            backgroundColor     : 'transparent',
            borderColor         : '#007bff',
            pointBorderColor    : '#007bff',
            pointBackgroundColor: '#007bff',
            fill                : false
            // pointHoverBackgroundColor: '#007bff',
            // pointHoverBorderColor    : '#007bff'
          }
          // ,
          //   {
          //     type                : 'line',
          //     data                : [60, 80, 70, 67, 80, 77, 100],
          //     backgroundColor     : 'tansparent',
          //     borderColor         : '#ced4da',
          //     pointBorderColor    : '#ced4da',
          //     pointBackgroundColor: '#ced4da',
          //     fill                : false
          //     // pointHoverBackgroundColor: '#ced4da',
          //     // pointHoverBorderColor    : '#ced4da'
          //   }
            ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips           : {
            mode     : mode,
            intersect: intersect
          },
          hover              : {
            mode     : mode,
            intersect: intersect
          },
          legend             : {
            display: false
          },
          scales             : {
            yAxes: [{
              // display: false,
              gridLines: {
                display      : true,
                lineWidth    : '4px',
                color        : 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks    : $.extend({
                beginAtZero : true,
                suggestedMax: 200
              }, ticksStyle)
            }],
            xAxes: [{
              display  : true,
              gridLines: {
                display: false
              },
              // ticks    : ticksStyle
              ticks: {
                      autoSkip: false,
                      maxRotation: 90,
                      minRotation: 90
                    }
            }]
          }
        }
      })




      window.addEventListener('contentChanged', (e) => {

      'use strict'

      var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
      }

      var mode      = 'index'
      var intersect = true

      var yearly_sales_level = <?php echo json_encode($months_for_yearly_report); ?>;
      var yearly_sales_data = <?php echo json_encode($amounts_for_yearly_report); ?>;

      // console.log(yearly_sales_level);

      var $salesChart = $('#sales-chart')
      var salesChart  = new Chart($salesChart, {
        type   : 'bar',
        data   : {
          // labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          labels  : yearly_sales_level,
          datasets: [
            {
              // label: "TK",
              backgroundColor: '#007bff',
              borderColor    : '#007bff',
              // data           : [1000, 2000, 3000, 2500, 2700, 2500, 3000, 4000, 5000, 6000, 5500, 6500]
              data           : yearly_sales_data
            }
            // ,
            // {
            //   backgroundColor: '#ced4da',
            //   borderColor    : '#ced4da',
            //   data           : [700, 1700, 2700, 2000, 1800, 1500, 2000, 2200, 2100, 1900, 1950, 1999]
            // }
          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips           : {
            mode     : mode,
            intersect: intersect
          },
          hover              : {
            mode     : mode,
            intersect: intersect
          },
          legend             : {
            display: false
          },
          scales             : {
            yAxes: [{
              // display: false,
              gridLines: {
                display      : true,
                lineWidth    : '4px',
                color        : 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks    : $.extend({
                beginAtZero: true,

                // Include a dollar sign in the ticks
                callback: function (value, index, values) {
                  if (value >= 1000) {
                    value /= 1000
                    value += 'k'
                  }
                  // return '$' + value
                  return 'TK'+ " " + value
                }
              }, ticksStyle)
            }],
            xAxes: [{
              display  : true,
              gridLines: {
                display: false
              },
              ticks    : ticksStyle
            }]
          }
        }
      })


      var monthly_sales_lebel = <?php echo json_encode($dates_for_monthly_report); ?>;
      var monthly_sales_data = <?php echo json_encode($amounts_for_monthly_report); ?>;


      var $visitorsChart = $('#visitors-chart')
      var visitorsChart  = new Chart($visitorsChart, {
        data   : {
          // labels  : ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
          labels  : monthly_sales_lebel,
          datasets: [{
            type                : 'line',
            // data                : [100, 120, 170, 167, 180, 177, 160],
            data                : monthly_sales_data,
            backgroundColor     : 'transparent',
            borderColor         : '#007bff',
            pointBorderColor    : '#007bff',
            pointBackgroundColor: '#007bff',
            fill                : false
            // pointHoverBackgroundColor: '#007bff',
            // pointHoverBorderColor    : '#007bff'
          }
          // ,
          //   {
          //     type                : 'line',
          //     data                : [60, 80, 70, 67, 80, 77, 100],
          //     backgroundColor     : 'tansparent',
          //     borderColor         : '#ced4da',
          //     pointBorderColor    : '#ced4da',
          //     pointBackgroundColor: '#ced4da',
          //     fill                : false
          //     // pointHoverBackgroundColor: '#ced4da',
          //     // pointHoverBorderColor    : '#ced4da'
          //   }
            ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips           : {
            mode     : mode,
            intersect: intersect
          },
          hover              : {
            mode     : mode,
            intersect: intersect
          },
          legend             : {
            display: false
          },
          scales             : {
            yAxes: [{
              // display: false,
              gridLines: {
                display      : true,
                lineWidth    : '4px',
                color        : 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks    : $.extend({
                beginAtZero : true,
                suggestedMax: 200
              }, ticksStyle)
            }],
            xAxes: [{
              display  : true,
              gridLines: {
                display: false
              },
              // ticks    : ticksStyle
              ticks: {
                      autoSkip: false,
                      maxRotation: 90,
                      minRotation: 90
                    }
            }]
          }
        }
      })




      });

    })

  

</script>