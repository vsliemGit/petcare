{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.layouts.index')
{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin - Dashboard
@endsection
@section('custom-css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
   
</style>
@endsection
{{-- Thay thế nội dung vào Placeholder `main-content` của view `backend.layouts.index` --}}
@section('main-content')
<section class="wrapper">
    <div class="market-updates">
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-eye"> </i>
                </div>
                 <div class="col-md-8 market-update-left">
                 <h4>Visitors</h4>
                <h3>13,500</h3>
                <p>Tổng truy cặp</p>
              </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-1">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-users" ></i>
                </div>
                <div class="col-md-8 market-update-left">
                <h4>User</h4>
                    <h3>1,250</h3>
                    <p>User online</p>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-3">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-usd"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Sales</h4>
                    <h3>1,500</h3>
                    <p>Other hand, we denounce</p>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
        <div class="col-md-3 market-update-gd">
            <div class="market-update-block clr-block-4">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Orders</h4>
                    <h3>1,500</h3>
                    <p>Other hand, we denounce</p>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
       <div class="clearfix"> </div>
    </div>	
    <div class="agileinfo-grap" style="margin-top: 10px;">
        <div class="agileits-box">
            <header class="agileits-box-header clearfix">
                <h3>Thống kê doanh số</h3>
                    <div class="toolbar"> 
                        <form action="" autocomplete="off">
                            @csrf
                            <div class="col-md-3">
                                <p>Từ ngày: <input type="text" name="" id="datepicker" class="form-control"></p>
                            </div>
                            <div class="col-md-3">
                                <p>Đến ngày: <input type="text" name="" id="datepicker2" class="form-control"></p>
                            </div>
                            <div class="col-md-2">
                                <p class="col-md-12">&nbsp;</p>               
                                <p class="col-md-12" ><input type="button" id="btn_filter_date" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
                            </div>
                            <div class="col-md-3">
                                <p>Lọc theo: 
                                    <select name="filter_by_option" id="filter_by_option" class="filter-by-option form-control m-bot15">
                                        <option value="0" selected disabled hidden></option>
                                        <option value="1">Hôm nay</option>
                                        <option value="-1">Ngày trước</option>
                                        <option value="7">7 ngày qua</option>
                                        <option value="-30">Tháng trước</option>
                                        <option value="30">Tháng này</option>
                                        <option value="365">365 ngày qua</option>
                                    </select>
                                </p>
                            </div>
                        </form>                      
                    </div>
            </header>
            <div id="myfirstchart" class="agileits-box-body clearfix" style="height: 300px;"></div>
        </div>        
    </div>
    <div class="agileinfo-grap" style="margin-top: 10px;">
        <div class="agileits-box">
            <header class="agileits-box-header clearfix">
                <h3>Thống kê doanh số</h3>
                    <div class="toolbar"> 
                        <form action="" autocomplete="off">
                            @csrf
                            <div class="col-md-3">
                                <p>Từ ngày: <input type="text" name="" id="datepicker" class="form-control"></p>
                            </div>
                            <div class="col-md-3">
                                <p>Đến ngày: <input type="text" name="" id="datepicker2" class="form-control"></p>
                            </div>
                            <div class="col-md-2">
                                <p class="col-md-12">&nbsp;</p>               
                                <p class="col-md-12" ><input type="button" id="btn_filter_date" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>
                            </div>
                            <div class="col-md-3">
                                <p>Lọc theo: 
                                    <select name="filter_by_option" id="filter_by_option" class="filter-by-option form-control m-bot15">
                                        <option value="0" selected disabled hidden></option>
                                        <option value="1">Hôm nay</option>
                                        <option value="-1">Ngày trước</option>
                                        <option value="7">7 ngày qua</option>
                                        <option value="-30">Tháng trước</option>
                                        <option value="30">Tháng này</option>
                                        <option value="365">365 ngày qua</option>
                                    </select>
                                </p>
                            </div>
                        </form>                      
                    </div>
            </header>
            <div id="linechart_material" style="margin-top: 20px; height: 500px; padding: 20px;"></div>
        </div>        
    </div>
    
</section>
@endsection 
@section('custom-js')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    //Setup CSRF to AJAX
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
    });
    //Custom datepicker
    var chart = new Morris.Line({
            element: 'myfirstchart',
            lineCorlors: ['#819C79', '#dc8710', '#ff6541', '#A4aDD3', '#766B56'],
            barColors: ['#2BCEFF', '##C64CE0', '#25DB72', '#94F235', '#DBC128'],
            gridTextColor: ['#FA8F0F'],
            pointFillColors: ['#ffffff'],
            pointStrokeColors: ['black'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            parseTime: false,
            resize: true,
            xkey: 'period',
            ykeys: ['order', 'sales', 'profit', 'quantity'],
            labels: ['Đơn hàng', 'Doanh số', 'Lợi nhuận', 'Số lượng']      
    });
    $(document).ready(function(){
        $( "#datepicker" ).datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ['T2','T3', 'T4','T5','T6','T7','CN'],
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11', 'Tháng 12'],
            duration: 'slow'
        });

        $( "#datepicker2" ).datepicker({
            prevText: "Tháng trước",
            nextText: "Tháng sau",
            dateFormat: "yy-mm-dd",
            dayNamesMin: ['T2','T3', 'T4','T5','T6','T7','CN'],
            monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10','Tháng 11', 'Tháng 12'],
            duration: 'slow'
        });

        chart30sOrder();
        lineChartGoogleLoad();
        // coreChartGoogleLoad();
          
    });

    function lineChartGoogleLoad(){
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Day');
            data.addColumn('number', 'Guardians of the Galaxy');
            data.addColumn('number', 'The Avengers');
            data.addColumn('number', 'Transformers: Age of Extinction');

            data.addRows([
                [1,  37.8, 80.8, 41.8],
                [2,  30.9, 69.5, 32.4],
                [3,  25.4,   57, 25.7],
                [4,  11.7, 18.8, 10.5],
                [5,  11.9, 17.6, 10.4],
                [6,   8.8, 13.6,  7.7],
                [7,   7.6, 12.3,  9.6],
                [8,  12.3, 29.2, 10.6],
                [9,  16.9, 42.9, 14.8],
                [10, 12.8, 30.9, 11.6],
                [11,  5.3,  7.9,  4.7],
                [12,  6.6,  8.4,  5.2],
                [13,  4.8,  6.3,  3.6],
                [14,  4.2,  6.2,  3.4]
            ]);

            var options = {
            chart: {
                title: 'Box Office Earnings in First Two Weeks of Opening',
                subtitle: 'in millions of dollars (USD)'
            },
            width: 'auto',
            height: 500
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        } 
    }

    function coreChartGoogleLoad(){
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('linechart_material'));

        chart.draw(data, options);
      }
    }

         
    //30 days
    function chart30sOrder(){
        $.ajax({
            url: "{{route('default_data_chart')}}",
            method: 'POST' ,
            dataType: 'JSON',
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

    //Button filter by date
    $('#btn_filter_date').click(function(){
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
</script>
@endsection  