<div>
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales of Last Month</h3>
                  {{-- <a href="javascript:void(0);">View Report</a> --}}
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">TK {{ $total_amount_for_monthly_report }}</span>
                    <span>Sales Last Month</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    {{-- <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span> --}}
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  {{-- <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span> --}}

                  {{-- <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span> --}}
                </div>
              </div>
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales of Last Year</h3>
                  {{-- <a href="javascript:void(0);">View Report</a> --}}
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">TK {{ $total_amount_for_yearly_report }}</span>
                    <span>Sales Last 12 Months</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    {{-- <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span> --}}
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  {{-- <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This year
                  </span> --}}

                  {{-- <span>
                    <i class="fas fa-square text-gray"></i> Last year
                  </span> --}}
                </div>
              </div>
            </div>
            <!-- /.card -->

            {{-- <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Online Store Overview</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                    <span class="text-muted">CONVERSION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">SALES RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div> --}}
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->



        <div class="row">
          
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Top Products Last Month</h3>
                <div class="card-tools">
                  {{-- <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a> --}}
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Sales</th>
                  </tr>
                  </thead>
                  <tbody>
                    {{-- {{ $top_products_monthly }} --}}
                    @foreach($top_products_monthly->sortByDesc('quantity') as $key=>$value)

                        

                          <tr>
                            <td>{{ $value['id'] }}</td>
                            <td>{{ $value['name'] }}</td>
                            <td>TK {{ $value['price'] }}</td>
                            <td>{{ $value['quantity'] }}</td>

                            {{-- <td>{{ $key }}</td> --}}
                          </tr>

                        

                    @endforeach
                  
                  


                  </tbody>
                </table>
              </div>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Latest Notice</h3>
                <div class="card-tools">
                  {{-- <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a> --}}
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                
                <ul style="list-style-type:none;">
                  
                  @foreach ($latest_notice as $key=>$value)
                    
                    <a href="{{ route('vendor.notice_details',$value->id) }}"><h5> <i class="fas fa-exclamation"></i> {{ $value->title }}</h5></a>
                      
                    {{ $value->created_at }}

                    
                    <hr>
                  @endforeach

                  <a href="{{ route('vendor.notice_board') }}" class="btn btn-default">Go to Notice Board</a>

                </ul>

                

              </div>
            </div>
          </div>
          



        </div>


        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pick Date</h3>
          </div>

          <div class="card-body">
            
            <form wire:submit.prevent="setDates()">

              
                {{-- <div class="col-md-6 offset-md-3"> --}}

                  <div class="row">
                    <div class="col-2">
                      <div class="form-group">
                        <input type="date" class="form-control" name="from" wire:model="from">
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="form-group">
                        <input type="date" class="form-control" name="to" wire:model="to">
                      </div>
                    </div>

                    <div class="col-2">
                      <button type="submit" class="btn btn-success"> Submit</button>
                    </div>
                  </div>

                {{-- </div> --}}
              
              
            </form>

          </div>
          
        </div>


        <div class="row">

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Top Products From ({{ substr($from,0,10) }}) To ({{ substr($to,0,10) }})</h3>
                  <div class="card-tools">
                    {{-- <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a> --}}
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Sales</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- {{ $top_products_monthly }} --}}
                      @foreach($top_products_last_day->sortByDesc('quantity') as $key=>$value)

                          

                            <tr>
                              <td>{{ $value['id'] }}</td>
                              <td>{{ $value['name'] }}</td>
                              <td>TK {{ $value['price'] }}</td>
                              <td>{{ $value['quantity'] }}</td>

                              {{-- <td>{{ $key }}</td> --}}
                            </tr>

                          

                      @endforeach
                    
                    


                    </tbody>
                  </table>
                </div>
              </div>
            </div>


            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <h3 class="card-title">Lowest Sold Products From ({{ substr($from,0,10) }}) To ({{ substr($to,0,10) }})</h3>
                  <div class="card-tools">
                    {{-- <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                      <i class="fas fa-bars"></i>
                    </a> --}}
                  </div>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Price</th>
                      <th>Sales</th>
                    </tr>
                    </thead>
                    <tbody>
                      {{-- {{ $top_products_monthly }} --}}
                      @foreach($low_products_last_day->sortBy('quantity') as $key=>$value)

                          

                            <tr>
                              <td>{{ $value['id'] }}</td>
                              <td>{{ $value['name'] }}</td>
                              <td>TK {{ $value['price'] }}</td>
                              <td>{{ $value['quantity'] }}</td>

                              {{-- <td>{{ $key }}</td> --}}
                            </tr>

                          

                      @endforeach
                    
                    


                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          
        </div>



        <br>
        <br>
        <br>
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->



@push('scripts')

{{-- <script type="text/javascript">
    
  

    $(function () {

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

  

</script> --}}

@include('livewire.admin.dashboard_js')

@endpush


</div>
