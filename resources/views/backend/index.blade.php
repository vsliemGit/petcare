{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Dashboard
@endsection
@section('custom-css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- //Morris CSS -->
<link href="{{ asset('vendor/backend/css/morris.css') }}" rel="stylesheet">
<style>
   
</style>
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="market-updates">
        <div class="col-md-3 market-update-gd"> {{-- visitors --}}
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Visitors</h4>
                    <h3>{{$count_visitors}}</h3>
                    <p>Tổng truy cặp</p>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">  {{-- customers --}}
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-users" ></i>
                </div>
                <div class="col-md-8 market-update-left">
                <a href="{{route('customer.index')}}">
                    <h4>Customer</h4>
                    <h3>{{$count_customers}}</h3>
                    <p>Tổng khách hàng</p>
                </div>
                </a>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd"> {{-- Sales --}}
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Sales</h4>
                    <h4>{{number_format($sales_this_month)}}</h4>
                    <p>Doanh thu trong tháng</p>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd"> {{-- Ordes --}}
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <a href="{{route('order.index')}}">
                    <div class="col-md-8 market-update-left">
                        <h4>Orders</h4>
                        <h3>{{$count_orders}}</h3>
                        <p>Tổng đơn hàng</p>
                    </div>
                </a>
              <div class="clearfix"> </div>
            </div>
        </div>
       <div class="clearfix"> </div>
    </div>	
    <div class="row"> {{-- Statistic chart main --}}
        <div class="panel-body">
            <div class="col-md-12 w3ls-graph">
                <div class="agileinfo-grap">
                    <div class="agileits-box">
                        <header class="agileits-box-header clearfix">
                            <h3>Thống kê doanh số</h3>
                                <div class="toolbar"> 
                                    <form action="" autocomplete="off">
                                        @csrf
                                        <div class="col-md-3">
                                            <p>Từ ngày: <input type="text" name="" id="datepicker" class="form-control" ></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Đến ngày: <input type="text" name="" id="datepicker2" class="form-control"></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p class="col-md-12">&nbsp;</p>               
                                            <p class="col-md-12" ><input type="button" id="btn_filter_date" class="btn btn-primary btn-sm" disabled value="Lọc kết quả"></p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Lọc theo: 
                                                <select name="filter_by_option" id="filter_by_option" class="filter-by-option form-control m-bot15">
                                                    <option value="0" selected disabled hidden>--Chọn--</option>
                                                    <option value="1">Hôm nay</option>
                                                    <option value="-1">Ngày trước</option>
                                                    <option value="7">7 ngày qua</option>
                                                    <option value="-30">Tháng trước</option>
                                                    <option value="30">Tháng này</option>
                                                    <option value="365">365 ngày qua</option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <p>Chọn loại bản đồ: 
                                                <select name="change_type_chart" id="change_type_chart" class="filter-by-option form-control m-bot15">
                                                    <option value="0" selected disabled hidden>--Chọn--</option>
                                                    <option value="1">Default</option>
                                                    <option value="2">Area Chart</option>
                                                    <option value="3">Bar Chart</option>
                                                </select>
                                            </p>
                                        </div>
                                       
                                    </form>                      
                                </div>
                        </header>
                        <div id="myfirstchart" class="agileits-box-body clearfix" style="height: 50%;"></div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
    <div class="agil-info-calendar"> {{-- Statistic 2 --}}
        <div class="col-md-5 agile-calendar"> {{-- Loai san pham--}}
            <div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-icon">
                      <i class="fa fa-bar-chart-o"></i>
                    </span>
                    <span class="panel-title">Loại sản phẩm</span>
                </div>
                <!-- grids -->
                    <div class="agile-calendar-grid">
                        <div class="page">
                            
                            <div class="w3l-calendar-left">
                                <div class="calendar-heading">
                                    
                                </div>
                                <div id="donut-example" class="morris-donut-inverse"></div>
                            </div>
                            
                            <div class="clearfix"> </div>
                        </div>
                    </div>
            </div>
        </div> 
        <div class="col-md-7 w3agile-notifications">  {{-- Statistic 3 --}}
            <header class="panel-heading">
                Notification 
            </header>
			{{-- <div class="col-md-12 stats-info stats-last widget-shadow"> --}}
                <div class="stats-last-agile">
                    <table class="table table-sm table-dark">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            {{-- </div> --}}
			<div class="clearfix"> </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="agil-info-calendar"> {{-- Statistic 3 --}}
        <div class="col-md-7 w3agile-notifications">
            <header class="panel-heading">
                Notification 
            </header>
			{{-- <div class="col-md-12 stats-info stats-last widget-shadow"> --}}
                <div class="stats-last-agile">
                    <table class="table stats-table ">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>PRODUCT CATEROGY</th>
                                <th>STATUS</th>
                                <th>PROGRESS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Lorem ipsum</td>
                                <td><span class="label label-success">In progress</span></td>
                                <td><h5>85% <i class="fa fa-level-up"></i></h5></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Aliquam</td>
                                <td><span class="label label-warning">New</span></td>
                                <td><h5>44% <i class="fa fa-level-up"></i></h5></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Lorem ipsum</td>
                                <td><span class="label label-danger">Overdue</span></td>
                                <td><h5 class="down">40% <i class="fa fa-level-down"></i></h5></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Aliquam</td>
                                <td><span class="label label-info">Out of stock</span></td>
                                <td><h5>100% <i class="fa fa-level-up"></i></h5></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td>Lorem ipsum</td>
                                <td><span class="label label-success">In progress</span></td>
                                <td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td>Aliquam</td>
                                <td><span class="label label-warning">New</span></td>
                                <td><h5>38% <i class="fa fa-level-up"></i></h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            {{-- </div> --}}
			<div class="clearfix"> </div>
		</div> 
        <div class="col-md-5 agile-calendar"+>
            <div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-icon">
                      <i class="fa fa-bar-chart-o"></i>
                    </span>
                    <span class="panel-title">Loại sản phẩm</span>
                </div>
                <!-- grids -->
                    <div class="agile-calendar-grid">
                        <div class="page">
                            
                            <div class="w3l-calendar-left">
                                <div class="calendar-heading">
                                    
                                </div>
                                <div id="stacked" ></div>
                            </div>
                            
                            <div class="clearfix"> </div>
                        </div>
                    </div>
            </div>
        </div> 
    </div>
       

</section>
 <!-- footer -->
 @include('backend.layouts.partials.footer')
@endsection 
@section('custom-js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('vendor/backend/js/raphael-min.js') }}"></script>
<script src="{{ asset('vendor/backend/js/morris.js') }}"></script>
<script>
    //Setup CSRF to AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Line Chart
    var chart = getLineChart('myfirstchart');
    chart30sOrder();
    //Donut Chart
    var colorDanger = "#FF1744";
    Morris.Donut({
        element: 'donut-example',
        resize: true,
        colors: ['#E0F7FA','#B2EBF2','#80DEEA','#4DD0E1','#26C6DA','#00BCD4','#00ACC1','#0097A7','#00838F','#006064'],
        data: [
            {label:"Dato Ej.1", value:123, color:colorDanger},
            {label:"Dato Ej.2", value:369},
            {label:"Dato Ej.3", value:246},
            {label:"Dato Ej.4", value:159},
            {label:"Dato Ej.5", value:357}
        ]
    });

    $(document).ready(function(){
        //Custom datepicker
        $( "#datepicker" ).datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ['T2','T3', 'T4','T5','T6','T7','CN'],
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11', 'Tháng 12'],
            monthNamesShort : ['Thg1', 'Thg2', 'Thg3', 'Thg4', 'Thg5', 'Thg6', 'Thg7', 'Thg8', 'Thg9', 'Thg10','Thg11', 'Thg12'],
            duration: 'slow',
            changeMonth: true,
            changeYear: true
        });

        $( "#datepicker2" ).datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ['T2','T3', 'T4','T5','T6','T7','CN'],
            monthNames : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11', 'Tháng 12'],
            monthNamesShort : ['Thg1', 'Thg2', 'Thg3', 'Thg4', 'Thg5', 'Thg6', 'Thg7', 'Thg8', 'Thg9', 'Thg10','Thg11', 'Thg12'],
            duration: 'slow',
            changeMonth: true,
            changeYear: true
        });

        var data = [
            { y: '2014', a: 50, b: 90},
            { y: '2015', a: 65,  b: 75},
            { y: '2016', a: 50,  b: 50},
            { y: '2017', a: 75,  b: 60},
            { y: '2018', a: 80,  b: 65},
            { y: '2019', a: 90,  b: 70},
            { y: '2020', a: 100, b: 75},
            { y: '2021', a: 115, b: 75},
            { y: '2022', a: 120, b: 85},
            { y: '2023', a: 145, b: 85},
            { y: '2024', a: 160, b: 95}
        ];
        var chartBar = getBarChart("stacked").setData(data);     
    });

    //Get BarChart
    function getBarChart(element){
        config = {
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Total Income', 'Total Outcome'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['gray','red']
        };
        config.element = element;
        config.stacked = true;
        return Morris.Bar(config);
    }
    //Get BarChart
    function getBarChart2(element){
        config = {
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng'] ,
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['gray','red']
        };
        config.element = element;
        config.stacked = false;
        return Morris.Bar(config);
    }

    //Get LineChart
    function getLineChart(element){
        config = {
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng'] ,
            lineCorlors: ['#819C79', '#dc8710', '#ff6541', '#A4aDD3', '#766B56'],
            barColors: ['#2BCEFF', '##C64CE0', '#25DB72', '#94F235', '#DBC128'],
            gridTextColor: ['#FA8F0F'],
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['black'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            parseTime: false,
            resize: true
        };
        config.element = element;
        return Morris.Line(config);
    }

    //Get AreaChart
    function getAreaChart(element){
        config = {
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng'] ,
            lineCorlors: ['#819C79', '#dc8710', '#ff6541', '#A4aDD3', '#766B56'],
            barColors: ['#2BCEFF', '##C64CE0', '#25DB72', '#94F235', '#DBC128'],
            gridTextColor: ['#FA8F0F'],
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['black'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            parseTime: false,
            resize: true
        };
        config.element = element;
        return Morris.Area(config);
    }

         
    //30 days
    function chart30sOrder(){
        $.ajax({
            url: "{{route('default_data_chart')}}",
            method: 'POST' ,
            dataType: 'JSON',
            // async: false,
            data: {},
            success:function(data){
                if(data.length>0)
                { 
                    chart.setData(data)
                }else{
                    chart.setData([]);
                }
            }
        });       
    }

    //Enable Button filter
    $('#datepicker2').change(function() {
        var date = $(this).val();
        var sDate = $('#datepicker').val();
        if (Date.parse(date) < Date.parse(sDate) || sDate=="") {
            if(Date.parse(date) < Date.parse(sDate)){
                alert('End Date invalid!');
            }
            $('#datepicker2').datepicker('setDate', null);
            $("#btn_filter_date").prop('disabled', true);
            return;
        }
        $("#btn_filter_date").prop('disabled', false);

    });

    //Button filter by date
    $('#btn_filter_date').click(function(){
        let dataChart;
        let from_date = $('#datepicker').val();
        let to_date = $('#datepicker2').val();
        $.ajax({
            url: "{{route('filter_by_date')}}",
            method: 'POST' ,
            dataType: 'JSON',
            data: {
                from_date : from_date,
                to_date : to_date
            },
            success:function(data){
                if(data.length>0)
                { 
                    chart.setData(data)
                }else{
                    chart.setData([]);
                }
            }
        });
    });

    //Filter by option
    $('#filter_by_option').change(function(){
        let option = $(this).val();
        $.ajax({
            url: "{{route('filter_by_option')}}",
            method: 'POST' ,
            dataType: 'JSON',
            data: {
                option : option
            },
            success:function(data){
                if(data.length>0)
                { 
                    chart.setData(data)
                }else{
                    chart.setData([]);
                }
            }
        });
    });

    //Filter by option
    $('#change_type_chart').change(function(){
        let option = $(this).val();
        switch(option) {
        case "1":
            $("#myfirstchart").empty();
            chart = getLineChart('myfirstchart');
            chart30sOrder();
            break;   
        case "2":
            $("#myfirstchart").empty();
            chart = getAreaChart('myfirstchart');
            chart30sOrder();
            break; 
        case "3":
            $("#myfirstchart").empty();
            chart = getBarChart2('myfirstchart');
            chart30sOrder();
            break; 
        default:
            $("#myfirstchart").empty();
            chart = getLineChart('myfirstchart');
            chart30sOrder();
        }
    });
</script>
@endsection  