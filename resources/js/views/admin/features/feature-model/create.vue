<script>
import Layout from "../../../../layouts/main";
import PageHeader from "../../../../components/page-header";
import Switches from "vue-switches";
import Swal from "sweetalert2";
import { tableData } from "../datatable";
import {
  required,

} from "vuelidate/lib/validators";
import axios from 'axios';

/**
 * Advanced table component
 */
export default {
  components: { Layout, PageHeader ,Switches},
  data() {
    return { 
      showModal: false,
        submitted: false,
      tableData: [],
      title: "Model List",
      items: [
        {
          text: "Tables",
          href: "/",
        },
        {
          text: "Model",
          active: true,
        },
      ],
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
        { key: "id", sortable: true },
        { key: "model_name", label:"Feature",sortable: true }
        // {  key: 'actions', label: 'Actions'  },
        // { key: "date", sortable: true },
        // { key: "salary", sortable: true },
      ],
      featureDataModel:{
        data_name:""
      },
    };
  },
  computed: {
    /**
     * Total no. of records
     */
    rows() {
      return this.tableData.length;
    },
  },
  mounted() {
    this.featuresDataModel();
    // Set the initial number of items
    this.totalRows = this.items.length;
  },

    validations:{
          featureDataModel:{
              data_name:{
                required
              }
          }

      },
   
  methods: {
    // features list api call 
    featuresDataModel()
      {
        axios.get('/api/feature/featureDataModel/'+this.$route.params.id)
          .then((response)=> {
            this.tableData = response.data.data;
          }).catch((response) => {
            console.log(response)
          });
      },
       deleteFeature(id)
      { 
       
     const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger ml-2"
        },
        buttonsStyling: false
      });

      swalWithBootstrapButtons
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          showCancelButton: true
        })
        .then(result => {
          if (result.value) {
            axios.post('/api/feature/delete/'+id).then((response) => {
              this.features();
            }).catch((response) => {
              console.log('error');
            })
            swalWithBootstrapButtons.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
            );
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
            );
          }
        });
      },

      onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
        featutureDataModelCreate(e) {
       
      this.submitted = true;

      // stop here if form is invalid
      this.$v.$touch();


         axios.post('/api/feature/featureDataModel/'+this.$route.params.id,{
        feature_data_model_name : this.featureDataModel.data_name,
      }).then((response) => {
         this.featuresDataModel();
          this.featureDataModel.data_name = "";
          this.showModal = false;
      }).catch((response)=> {
        console.log(response);
      })
        return;
      
        this.submitted = false;
    

    },
    //  handleSubmit(e) {
    //   this.submitted = true;
    //  },
    /**
     * Search the table data with search input
     */
    
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />

   
    <!-- create modal end -->
    <div class="row">
    
    
   
      <div class="col-12">
        <div class="card">
        
         <button align="right"
                    type="button"
                    class="btn btn-success ms-auto mb-2 "
                     @click="showModal = true"
                  >
                    <i class="mdi mdi-plus me-1"></i> Add Model
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
            <!-- <template #cell(actions)="featureDataModels">
        <router-link
        :to="{name:'feature-edit',params: { id: featureDataModels.item.id}}"
        tag="v-btn" align="right">
        <v-btn class="btn btn-secondary btn-sm"
          color="white"
          flat
          value="feed">Edit
        </v-btn>
      </router-link>

        <b-button size="sm"  class="btn-danger" v-on:click="deleteFeature(featureDataModels.item.id)">
         Delete
        </b-button>
      </template> -->

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

     <!-- model creattion modal  -->

     <div class="col-sm-8">
                <div class="text-sm-end">
                    <b-modal
                    v-model="showModal"
                    title="Add New Model"
                    title-class="text-black font-18"
                    body-class="p-3"
                    hide-footer
                  >
                    <form @submit.prevent="featutureDataModelCreate">
                      <div class="row">
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="name">Model</label>
                            <input
                              id="name"
                              v-model="featureDataModel.data_name"
                              type="text"
                              class="form-control"
                              placeholder="type model"
                              :class="{
                                'is-invalid':
                                  submitted && $v.featureDataModel.data_name.$error,
                              }"
                            />
                            <div
                              v-if="
                                submitted && !$v.featureDataModel.data_name.required
                              "
                              class="invalid-feedback"
                            >
                              This Model is required.
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