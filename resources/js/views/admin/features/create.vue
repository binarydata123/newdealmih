<script>
import { FormWizard, TabContent } from "vue-form-wizard";

import Layout from "../../../layouts/main"; 
import NEPALFEATURE from "./nepal-feature"; 

import PageHeader from "../../../components/page-header";
import Multiselect from "vue-multiselect";
import { tableData } from "./datatable";
import {
  required,
  email,
  minLength,
  sameAs,
  maxLength,
  minValue,
  maxValue,
  numeric,
  url,
  alphaNum,
} from "vuelidate/lib/validators";
import axios from 'axios';
/**
 * Form wizard component
 */
export default {
  components: { Layout, PageHeader, VueFormWizard: FormWizard, TabContent ,Multiselect,NEPALFEATURE},
  data() {
    return {
      title: "Create Feature",
      items: [
        {
          text: "feature",
          href: "/"
        },
        {
          text: "create feature",
          active: true
        }
      ],
       showModal: false,
        submitted: false,
      tableData: [],
       enabled4: false,
      totalRows: 1,
      currentPage: 1,
      perPage: 10,
      pageOptions: [10, 25, 50, 100],
      filter: null,
      filterOn: [],
      sortBy: "age",
      sortDesc: false,
      fields: [
        { key: "s_id", sortable: true },
        { key: "feature_data", sortable: true },
        // { key: "status", value: 'add' },
        // { key: "age", sortable: true },
        // { key: "date", sortable: true },
        // { key: "salary", sortable: true },
      ],


      featureForm:false,
      feature:{
          name:"",
          category:"",
          status:"",
          parent_feature :"",
          parent_feature_data:"",
          input_type:"",
          order_no:""
      },
      featureData:{
        data_name:""
      },
      value:"",
      categoryList:[],
     parentFeature:[],
     parentFeatureData:[],
    };
  },

    validations:{
          feature:{
              name:{
                  required
              },
              category:{
                  required
              },
              status:{
                required
              },
              parent_feature: {
                required
              },
              parent_feature_data:{
                required
              },
              input_type:{
                 required
              }
              ,order_no:{
                required
              }
          },
          featureData:{
              data_name:{
                required
              }
          }

      },
   
      methods:{
       
        // api axios call 
          // parent feature 
          // parentFeatureList()
          //   {
          //     axios.get('/api/feature/parent').then((response) => {
          //       this.parentFeature = response.data.data;
          //     }).catch((response) => {
          //       console.log('error');
          //     })
          //   },
        // category api call 
        category()
          { 
            axios.get('/api/category/list').then((response)=>
            { 
              this.categoryList = response.data.data;
              
            }).
            catch((response)=>{
              console.log('error');
            })
          },

      // feature create api call 
        submitFeature(e)
        {
          this.featureForm = true;
          this.$v.$touch();
          axios.post('/api/feature/create',{
            feature :this.feature
          }).then((response)=>{
            var result = response.data;
            if(result.status == true)
              {
                 Vue.swal({
                position: "top-end",
                icon: "success",
                title: result.message,
                showConfirmButton: false,
                timer: 3000
            });
                this.$router.push("/dashboard/features");
              }
          }).catch((response)=> {
            console.log(response);
          })
        },
        onCategory(e)
          {
           
            let id = e.id;
            axios.post('/api/feature/parent/'+id)
            .then((response)=> {
             this.parentFeature = response.data.data;
            }).catch((response)=> {
              console.log(response);
            })
          },

            onParentFeature(e)
          {
           
            let id = e.id;
            axios.post('/api/feature/featuredata/'+id)
            .then((response)=> {
             this.parentFeatureData = response.data.data;
            }).catch((response)=> {
              console.log(response);
            })
          },
         onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
        // feature data create api call
       featutureDataCreate(e) {
       
      this.submitted = true;

      // stop here if form is invalid
      this.$v.$touch();
      if (this.$v.$invalid) {
         axios.post('/api/feature/featureData/session',{
        feature_data_name : this.featureData.data_name,
      }).then((response) => {
          this.tableData = response.data.data;
          this.featureData.data_name = "";
          this.showModal = false;
      }).catch((response)=> {
        console.log(response);
      })
        return;
      } 
        this.submitted = false;
      // else {
        
      //   const currentDate = new Date();
      //   this.featuresData.push({
      //     feature_data_name: this.featureData.data_name,
      //     date: currentDate,
      //   });
      //   this.showModal = false;
      //   this.features = {};
      // }

    },
      },

        computed: {
    /**
     * Total no. of records
     */
    rows() {
      return this.tableData.length;
    },
  },
  created()
  {

  },
    mounted() {
      // this.parentFeatureList();
       this.category();
    // Set the initial number of items
    this.totalRows = this.items.length;
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
            <!-- <h4 class="card-title">Basic Wizard</h4> -->
            <form action="#" @submit.prevent="submitFeature">
            <vue-form-wizard color="#556ee6"  >
              <!-- Tab 1 -->
              <tab-content icon="mdi mdi-account-circle">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group row mb-3">
                <h3>In English</h3>

                      <label  for="title">Title</label>
                      <div class="col-md-12">
                        <input
                           v-model="feature.name"
                          id="name"
                          type="text"
                          class="form-control"
                       
                        
                        />
                      </div>

                    </div>
                  <!-- </div>
                  <div class="col-6"> -->

                     <div class="form-group row mb-3">
                  <label  for="category">Category</label>
                         <div class="col-md-12">
                    <multiselect  
                   @input="onCategory(feature.category)" 
                      v-model="feature.category"
                      label="name"
                      :options="categoryList"
                       :class="{
                    'is-invalid': featureForm && $v.feature.category.$error,
                  }"
                    ></multiselect>
                         </div>
                    <div
                      v-if="featureForm && $v.feature.category.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.category.required"
                        >This category is required.</span
                      >
                    </div>
              </div>
                  <!-- </div>

                   <div class="col-6"> -->

                     <div class="form-group row mb-3">
                  <label  for="parent_feature">Parent Feature</label>
                         <div class="col-md-12">
                    <multiselect  
                     @input="onParentFeature(feature.parent_feature)" 
                      v-model="feature.parent_feature"
                      label="name"
                      :options="parentFeature"
                       :class="{
                    'is-invalid': featureForm && $v.feature.parent_feature.$error,
                  }"
                    ></multiselect>
                         </div>
                    <div
                      v-if="featureForm && $v.feature.parent_feature.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.parent_feature.required"
                        >This parent feature is required.</span
                      >
                    </div>
              </div>
                  <!-- </div>
                   <div class="col-6"> -->

                     <div class="form-group row mb-3">
                  <label  for="parent_feature_data">Parent Feature Data</label>
                         <div class="col-md-12">
                    <multiselect  
                    
                    label="name"
                      v-model="feature.parent_feature_data"
                      
                      :options="parentFeatureData"
                       :class="{
                    'is-invalid': featureForm && $v.feature.parent_feature_data.$error,
                  }"
                    ></multiselect>
                         </div>
                    <div
                      v-if="featureForm && $v.feature.parent_feature_data.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.parent_feature_data.required"
                        >This parent feature data is required.</span
                      >
                    </div>
              </div>
                  <!-- </div>

                  <div class="col-6"> -->

               <div class="form-group row mb-3">
                  <label  for="status">Status</label>
                      <div class="col-md-12">
                        <select class="form-control" name="status" v-model="feature.status"
                        :class="{
                    'is-invalid': featureForm && $v.feature.status.$error,
                  }">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                       <div
                      v-if="featureForm && $v.feature.status.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.status.required"
                        >This status is required.</span
                      >
                    </div>
                    </div>
                  </div>
                    
                  <!-- </div>

                   <div class="col-6"> -->

               <div class="form-group row mb-3">
                  <label  for="input_type">Input Type</label>
                      <div class="col-md-12">
                        <select class="form-control" name="input_type" v-model="feature.input_type"
                        :class="{
                    'is-invalid': featureForm && $v.feature.input_type.$error,
                  }">
                        <option value="">Select</option>
                        <option value="1">Input</option>
                        <option value="2">Select</option>
                        <option value="3">CheckBox</option>
                        <option value="4">Radio</option>

                      </select>
                       <div
                      v-if="featureForm && $v.feature.input_type.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.input_type.required"
                        >This Input Type is required.</span
                      >
                    </div>
                    </div>
                  </div>
<!--                     
                  </div>

                   <div class="col-6"> -->
                    <div class="form-group row mb-3">
                      <label  for="title">Order Number</label>
                      <div class="col-md-12">
                        <input
                           v-model="feature.order_no"
                          id="name"
                          type="text"
                          class="form-control"
                       
                        
                        />
                      </div>

                    </div>
                  </div>
                  <!-- nepal langauge  -->
                  <div class="col-6">
                    <div class="form-group row mb-3">
                <h3>In Nepal</h3>

                      <label  for="title">शीर्षक</label>
                      <div class="col-md-12">
                        <input
                           v-model="feature.name"
                          id="name"
                          type="text"
                          class="form-control"
                       
                        
                        />
                      </div>

                    </div>
                  <!-- </div>
                  <div class="col-6"> -->

                     <div class="form-group row mb-3">
                  <label  for="category">श्रेणी</label>
                         <div class="col-md-12">
                    <multiselect  
                   @input="onCategory(feature.category)" 
                      v-model="feature.category"
                      label="name"
                      :options="categoryList"
                       :class="{
                    'is-invalid': featureForm && $v.feature.category.$error,
                  }"
                    ></multiselect>
                         </div>
                    <div
                      v-if="featureForm && $v.feature.category.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.category.required"
                        >This category is required.</span
                      >
                    </div>
              </div>
                  <!-- </div>

                   <div class="col-6"> -->

                     <div class="form-group row mb-3">
                  <label  for="parent_feature">अभिभावक विशेषता</label>
                         <div class="col-md-12">
                    <multiselect  
                     @input="onParentFeature(feature.parent_feature)" 
                      v-model="feature.parent_feature"
                      label="name"
                      :options="parentFeature"
                       :class="{
                    'is-invalid': featureForm && $v.feature.parent_feature.$error,
                  }"
                    ></multiselect>
                         </div>
                    <div
                      v-if="featureForm && $v.feature.parent_feature.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.parent_feature.required"
                        >This अभिभावक विशेषता is required.</span
                      >
                    </div>
              </div>
                  <!-- </div>
                   <div class="col-6"> -->

                     <div class="form-group row mb-3">
                  <label  for="parent_feature_data">अभिभावक सुविधा डेटा</label>
                         <div class="col-md-12">
                    <multiselect  
                    
                    label="name"
                      v-model="feature.parent_feature_data"
                      
                      :options="parentFeatureData"
                       :class="{
                    'is-invalid': featureForm && $v.feature.parent_feature_data.$error,
                  }"
                    ></multiselect>
                         </div>
                    <div
                      v-if="featureForm && $v.feature.parent_feature_data.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.parent_feature_data.required"
                        >This अभिभावक सुविधा डेटा is required.</span
                      >
                    </div>
              </div>
                  <!-- </div>

                  <div class="col-6"> -->

               <div class="form-group row mb-3">
                  <label  for="status">स्थिति</label>
                      <div class="col-md-12">
                        <select class="form-control" name="status" v-model="feature.status"
                        :class="{
                    'is-invalid': featureForm && $v.feature.status.$error,
                  }">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                       <div
                      v-if="featureForm && $v.feature.status.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.status.required"
                        >This स्थिति is required.</span
                      >
                    </div>
                    </div>
                  </div>
                    
                  <!-- </div>

                   <div class="col-6"> -->

               <div class="form-group row mb-3">
                  <label  for="input_type">इनपुट प्रकार</label>
                      <div class="col-md-12">
                        <select class="form-control" name="input_type" v-model="feature.input_type"
                        :class="{
                    'is-invalid': featureForm && $v.feature.input_type.$error,
                  }">
                        <option value="">Select</option>
                        <option value="1">Input</option>
                        <option value="2">Select</option>
                        <option value="3">CheckBox</option>
                        <option value="4">Radio</option>

                      </select>
                       <div
                      v-if="featureForm && $v.feature.input_type.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.feature.input_type.required"
                        >This Input Type is required.</span
                      >
                    </div>
                    </div>
                  </div>
<!--                     
                  </div>

                   <div class="col-6"> -->
                    <div class="form-group row mb-3">
                      <label  for="title">अर्डर नम्बर</label>
                      <div class="col-md-12">
                        <input
                           v-model="feature.order_no"
                          id="name"
                          type="text"
                          class="form-control"
                       
                        
                        />
                      </div>

                    </div>
                  </div>
                  <!-- end col -->
                </div>
                <!-- end row -->
              </tab-content>
              <!-- Tab 2  -->
              <tab-content icon="mdi mdi-face-profile">
     <div class="row">
      <div class="col-12">
        <div class="card">
               <button align="right"
                    type="button"
                    class="btn btn-success ms-auto mb-2 "
                     @click="showModal = true"
                  >
                    <i class="mdi mdi-plus me-1"></i> Add Data
                  </button>

     
          <div class="card-body">
            <!-- <h4 class="card-title">Data Table</h4> -->
            <div class="row mt-4">
              <div class="col-sm-12 col-md-6">
                <div id="tickets-table_length" class="dataTables_length">
                  <label class="d-inline-flex align-items-center">
                    Show&nbsp;
                    <b-form-select
                      v-model="perPage"
                      size="sm"
                      class="form-select form-select-sm"
                      :options="pageOptions"
                    ></b-form-select
                    >&nbsp;entries
                  </label>
                </div>
              </div>
              <!-- Search -->
              <div class="col-sm-12 col-md-6">
                <div
                  id="tickets-table_filter"
                  class="dataTables_filter text-md-end"
                >
                  <label class="d-inline-flex align-items-center">
                    Search:
                    <b-form-input
                      v-model="filter"
                      type="search"
                      placeholder="Search..."
                      class="form-control form-control-sm ms-2"
                    ></b-form-input>
                  </label>
                </div>
              </div>
              <!-- End search -->
            </div>
            <!-- Table -->
            <div class="table-responsive mb-0">
              <b-table
                class="datatables"
                :items="tableData"
                :fields="fields"
                responsive="sm"
                :per-page="perPage"
                :current-page="currentPage"
                :sort-by.sync="sortBy"
                :sort-desc.sync="sortDesc"
                :filter="filter"
                :filter-included-fields="filterOn"
                @filtered="onFiltered"
              >
              <td>
        
          </td>
              </b-table>

            </div>
            <div class="row">
              <div class="col">
                <div
                  class="dataTables_paginate paging_simple_numbers float-end"
                >
                  <ul class="pagination pagination-rounded mb-0">
                    <!-- pagination -->
                    <b-pagination
                      v-model="currentPage"
                      :total-rows="rows"
                    ></b-pagination>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
                <!-- end row -->
              </tab-content>
              <!-- Tab 3  -->
              <tab-content icon="mdi mdi-checkbox-marked-circle-outline">
                <div class="row">
                  <div class="col-12">
                    <div class="text-center">
                      <h2 class="mt-0">
                        <i class="mdi mdi-check-all"></i>
                      </h2>
                      <h3 class="mt-0">Thank you !</h3>

                      <p class="w-75 mb-2 mx-auto">
                        Quisque nec turpis at urna dictum luctus. Suspendisse convallis dignissim eros at volutpat. In egestas mattis dui. Aliquam
                        mattis dictum aliquet.
                      </p>

                      <div class="mb-3">
                       
                         <b-form-checkbox
                          class="form-check"
                          id="customControlInline"
                          name="checkbox-1"
                          value="accepted"
                          unchecked-value="not_accepted"
                        >
                          I agree with the Terms and Conditions
                        </b-form-checkbox>
                      </div>
                    </div>
                  </div>
                   <div class="mb-3 mb-0">
                <div align="right">
                  <button type="submit" class="btn btn-primary">Finish</button>
                  
                </div>
              </div>
               
                  <!-- end col -->
                </div>
                <!-- end row -->
              </tab-content>
            </vue-form-wizard>
            </form>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
  
      <!-- end col -->
    </div>


    <!-- data creattion modal  -->

     <div class="col-sm-8">
                <div class="text-sm-end">
                    <b-modal
                    v-model="showModal"
                    title="Add New Data"
                    title-class="text-black font-18"
                    body-class="p-3"
                    hide-footer
                  >
                    <form @submit.prevent="featutureDataCreate">
                      <div class="row">
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="name">Data</label>
                            <input
                              id="name"
                              v-model="featureData.data_name"
                              type="text"
                              class="form-control"
                              placeholder="type data"
                              :class="{
                                'is-invalid':
                                  submitted && $v.featureData.data_name.$error,
                              }"
                            />
                            <div
                              v-if="
                                submitted && !$v.featureData.data_name.required
                              "
                              class="invalid-feedback"
                            >
                              This Feature Data is required.
                            </div>
                          </div>

 <div class="mb-3">
                            <label for="name">डाटा</label>
                            <input
                              id="name"
                              v-model="featureData.data_name"
                              type="text"
                              class="form-control"
                              placeholder="डाटा टाइप गर्नुहोस्"
                              :class="{
                                'is-invalid':
                                  submitted && $v.featureData.data_name.$error,
                              }"
                            />
                            <div
                              v-if="
                                submitted && !$v.featureData.data_name.required
                              "
                              class="invalid-feedback"
                            >
                              This Feature डाटा is required.
                            </div>
                          </div>
                        
                       
                        </div>
                      </div>

                      <div class="text-end pt-5 mt-3">
                        <b-button variant="light" @click="showModal = false">Close</b-button>
                        <b-button type="submit" variant="success" class="ms-1"
                          >Create </b-button
                        >
                      </div>
                    </form>
                  </b-modal>
                </div>
              </div>
    <!-- end row -->
  </Layout>
</template>



