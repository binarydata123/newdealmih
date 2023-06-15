<script>
import Layout from "../../../layouts/main";
import PageHeader from "../../../components/page-header";
import Switches from "vue-switches";
import Swal from "sweetalert2";
import axios from 'axios';
import {
  required,
} from "vuelidate/lib/validators";
// import { tableData } from "./dataAdvancedtable";

/**
 * Advanced table component
 */
export default {
    components: { Layout, PageHeader },
    data() {
        return {
        series: [],
        xaxis:[],
        xaxis:[],
        title:'',
        items:[],
        chartOptions: {
            chart: {
                toolbar: {
                    show: false,
                },

                events: {
                  dataPointSelection: (event, chartContext, config) => {
                     this.updateChart(chartContext.w.globals.labels[config.dataPointIndex]);
                     
                  }
                },

            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            fill: {
                opacity: 1

            },
            
            colors: ['#556ee6'],
        },
        typeform: {
            startdate:"",
            enddate:""
        },
          submitted: false,
          submitform: false,
          submit: false,
          typesubmit: false,
            
        };
    },
    validations: {
        typeform: {
          startdate:{
            required
          },
          enddate:{
            required
          }
        },
    },
     mounted() {
        this.productview();
    },
     methods: {
    // category list api 
    productview()
      {
        axios.get('/api/products/productview').
        then((response)=>
            {

            // console.log(response.data.data[0].title);

            this.series =  [

                {
                    name: 'Product view',
                    data: response.data.data,
                }

            ]

            this.typeform.enddate = response.data.startdate;
            this.typeform.startdate = response.data.enddate;

                // this.xaxis = [{ categories:['29 jan','30jan']}]
               
            }).catch((response)=> {
            console.log(response);
            });
      },
      updateChart(date) {
        axios.post('/api/products/singleproductview/'+date).
        then((response)=>
            {

            this.chartOptions = {
                colors: ['#556ee6']
            };


            this.series =  [

                {
                    name: 'Product Title',
                    data: response.data.data,
                }

            ]
               
            }).catch((response)=> {
            console.log(response);
            });
    },
    typeForm(e) {
      
      this.typesubmit = true;
      this.$v.$touch();

     axios.post('/api/products/Datewiseproductview', {
          dwpv: this.typeform
        })
        .then(response => { 
       
          var result = response.data.data;
            
            this.chartOptions = {
                colors: ['#556ee6']
            };


            this.series =  [

                {
                    name: 'Product Title',
                    data: result,
                }

            ]
              
            
        })
        .catch(error => {
            console.log(error)
        });
    },
    handleSubmit(e) {
        
      this.submitted = true;

      // stop here if form is invalid
      this.$v.$touch();
     
    },
   
  },

};

</script>

<template>
    <Layout>
        <PageHeader :title="title" :items="items" />
        <div class="row">
        
            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body">

                        <form action="#" @submit.prevent="typeForm">
              <div class="row mb-4">
                  <div class="col-md-4 col-lg-4 col-sm-12">
                <label> Start date</label>
                <input
                  v-model="typeform.startdate"
                  type="date"
                  class="form-control"
                  name="startdate"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.startdate.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.startdate.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.startdate.required"
                    >This Start date is required.</span
                  >
               
                </div>
              </div>

                <div class="col-md-4 col-lg-4 col-sm-12 ">
                <label> End date</label>
                <input
                  v-model="typeform.enddate"
                  type="date"
                  class="form-control"
                  name="enddate"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.enddate.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.enddate.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.enddate.required"
                    >This End date is required.</span
                  >
               
                </div>
              </div>

              <div class="col-md-2 col-lg-2 col-sm-12 mb-3 mb-0">
                    
                  <button type="submit" class="btn btn-primary mt-4">Submit </button>
                  <!-- <button type="reset" class="btn btn-secondary m-l-5 ml-1">Cancel</button> -->
               
              </div>
              </div>
            </form>

                        <h4 class="card-title mb-4">Product View</h4>
                        <div id="revenue-chart" class="apex-charts"></div>
                        <apexchart class="apex-charts sdf" type="bar" height="310" :series="series"
                            :options="chartOptions"></apexchart>
                           
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </Layout>
</template>