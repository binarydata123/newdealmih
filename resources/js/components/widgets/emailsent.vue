<script>
/**
 * Email-sent component
 */
import {

  columnChart,

} from "./data-apex";
export default {
  data() {
    return {
  
   columnChart: columnChart,
     
    };
  },
   methods: {
    
  },
};
</script>
<template>

 <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title mb-4">Column Charts</h4> -->
            <!-- Column Charts -->
            <apexchart
              class="apex-charts"
              height="350"
              type="bar"
              dir="ltr"
              :series="columnChart.series"
              :options="columnChart.chartOptions"
            ></apexchart>
          </div>
        </div>
      </div> 
      

</template>
