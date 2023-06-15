@extends('website.layout.app')
@section('css')
@endsection
@section('content')

<?php

$analysis = json_encode($opn)

?>



<section class="dashboard-part top-gap">
    <div class="container-fluid">
       <div class="row">

         @include('website.dashboard.dashboard')

          <div class="col-lg-9">

            @if(session()->has('success-msg'))
            <div style="">
               <div class="alert alert-success text-center" style="padding: 10px 0;">
                  {{ session()->get('success-msg') }}
            </div>
            </div>
        @endif

         <form>
            <div class="row">
               <div class="col-md-5 col-sm-12">
                 <div class="form-group">
                   <label for="exampleInputEmail1">Start date</label>
                   <input type="date" class="form-control" id="startdate" value={{$enddate}} aria-describedby="emailHelp" required>
                 </div>
               </div> 
                <div class="col-md-5 col-sm-12">
                    <div class="form-group">
                      <label for="exampleInputPassword1">End date</label>
                      <input type="date" class="form-control" id="enddate"  value={{$startdate}} required>
                    </div>
               </div>
               <div class="col-md-2 col-sm-12">
               <button type="submit" class="btn btn-primary btn-submit mt-4">Submit</button>
               </div>
           </div>
         </form>


         <div id="app">
            <div id="chart">
            <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
          </div>
          </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
           
            <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.8.6/apexcharts.min.js"></script>
          

           
             <script>
               

        var options = {
           series: [
            {
              name: 'Actual',
              data: 
                
               <?php echo $analysis; ?>
                
              
            }
          ],
          chart: {
            height: 400,
            type: "bar",
            zoom: {
              enabled: false
            },
            toolbar: {
              show: false
            },
            events: {
                  dataPointSelection: (event, chartContext, config) => {
                     this.updateChart(chartContext.w.globals.labels[config.dataPointIndex]);
                     
                  }
            },
          },
          markers: {
            show: true,
            size: 6
          },
          dataLabels: {
            enabled: false
          },
          
          stroke: {
            curve: "smooth",
            linecap: "round"
          },
          grid: {
            row: {
              colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
              opacity: 0.5
            }
          },
          
        };

         var chart = new ApexCharts(document.querySelector("#chart"), options);
         chart.render();

    </script>

    



    <script>

      function updateChart(date){

         $.ajax({
           type:'POST',
           dataType: 'json',
           url:"/product/singleproductview",
           data:{date:date},
           success:function(response){

            chart.updateOptions({
             chart: {
               type: "bar",
               animate: true
             },
             series: [
            {
              name: 'Actual',
              data: response.data
            }
          ],
            
           });
                
           }
         });

      }

       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      $(document).ready(function(){
        $(".btn-submit").click(function(e){
    
        e.preventDefault();
     
        var startdate = $("#startdate").val();
        var enddate = $("#enddate").val();
         
         $.ajax({
           type:'POST',
           dataType: 'json',
           url:"/product/datewiseproductview",
           data:{startdate:startdate, enddate:enddate},
           success:function(response){

            chart.updateOptions({
             chart: {
               type: "bar",
               animate: true
             },
             series: [
            {
              name: 'Actual',
              data: response.data
            }
          ],
            
           });
                
           }
         });


    });
      });
   </script>
                

            
            
          </div>
       
       </div>
    </div>
 </section>


@endsection
@section('js')

@endsection