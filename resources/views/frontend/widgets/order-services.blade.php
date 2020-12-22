<div class="row">
    <div class="col-md-12">
        <div class="form-group text-center">
            <h1>ĐẶT DỊCH VỤ TẠI PETCARE</h1>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group text-center">
          <i>Dành cho khách hàng truy cập website muốn đặt lịch khám hoặc chăm sóc cho thú cưng Nhanh Chóng và Tiện Lợi</i>         
      </div>
      </div>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        #regForm {
          background-color: #ffffff;
          margin: 10px auto;
          font-family: Raleway;
          padding: 40px;
          width: 70%;
          min-width: 300px;
        }
        
        h3 {
          text-align: center;  
        }
        
        .input_info {
          padding: 10px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }

        .input_radio {
          display: inline;
          padding: 0px;
        }

        .radio_service {
          padding: 5px;
          font-size: 15px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }
        
        /* Mark input boxes that gets an error on validation: */
        /* input.invalid {
          background-color: #ffdddd;
        } */
        
        /* Hide all steps by default: */
        .tab {
          display: none;
        }
        
        button {
          background-color: #4CAF50;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;
        }
        
        button:hover {
          opacity: 0.8;
        }
        
        #prevBtn {
          background-color: #bbbbbb;
        }
        
        /* Make circles that indicate the steps of the form: */
        .step {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbbbbb;
          border: none;  
          border-radius: 50%;
          display: inline-block;
          opacity: 0.5;
        }
        
        .step.active {
          opacity: 1;
        }
        
        /* Mark the steps that are finished and valid: */
        .step.finish {
          background-color: #4CAF50;
        }
        </style>
    <div class="col-md-12">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p id="flash-message" class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach
        </div>
        <form id="regForm" action="{{route('frontend.order_service')}}" method="POST">  
            @csrf  
            <input type="hidden" name="customer_id" value="{{ Auth::guard('customer')->user()->id }}">      
            <!-- One "tab" for each step in the form: -->
            <div class="tab"><h3 >Check Info User:</h3>
              Name: 
              <p><input class="input_info" placeholder="Name of you..." oninput="this.className = ''"  readonly value="{{ Auth::guard('customer')->user()->name }}"></p>
              Username:
              <p><input class="input_info" placeholder="Username of you.." oninput="this.className = ''"  readonly value="{{ Auth::guard('customer')->user()->username }}"></p>
            </div>
            <div class="tab"><h3 >Check Info User:</h3>
              Email:
              <p><input class="input_info" placeholder="E-mail..." oninput="this.className = ''"  readonly value="{{ Auth::guard('customer')->user()->email }}"></p>
              Phone:
              <p><input class="input_info" placeholder="Phone..." oninput="this.className = ''"  readonly value="{{ Auth::guard('customer')->user()->phone }}"></p>
            </div>
            <div class="tab" style="margin-bottom: 20px;"><h3 >Choose Time:</h3>
              Choose Hour:
              <select class="input_info" id="time" name="time">
                <option value="8">8AM</option>
                <option value="9">9AM</option>
                <option value="10">10AM</option>
                <option value="1">1PM</option>
                <option value="2">2PM</option>
                <option value="8">3PM</option>
                <option value="8">4PM</option>
              </select>
              Choose Date:
              <p><input class="input_info" type="text" name="date" id="datepicker"></p>
            </div>
            <div class="tab"><h3 >Choose Service:</h3>
              @foreach ($listServices as $service)
                <div class="radio_service">
                  <input type="checkbox" id="{{$service->service_name}}" name="service[]" value="{{$service->service_id}}">
                  <label for=" {{$service->service_name}}">  {{$service->service_name}}</label>
                </div>
              @endforeach
            </div>
            <div style="overflow:auto;">
              <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
              </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
              <span class="step"></span>
            </div>
          </form>  
    </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

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
        changeYear: false,
        timepicker : false,
        minDate: 0,
        maxDate: "+3m"
    });
  });
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab
  
  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Send";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }
  
  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }
  
  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }
  
  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
  </script>