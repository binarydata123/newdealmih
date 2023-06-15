<script>
import Layout from "../../../layouts/main";
import PageHeader from "../../../components/page-header";
import Switches from "vue-switches";
import Swal from "sweetalert2";
import axios from 'axios';
// import { tableData } from "./dataAdvancedtable";

/**
 * Advanced table component
 */
export default {
  components: { Layout, PageHeader ,Switches},
  data() {
    return {
      tableData:[],
      title: "Commission",
      items: [
        {
          text: "Tables",
          href: "/",
        },
        {
          text: "Commission",
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
        { key: "percent", sortable: true },
        {  key: 'actions', label: 'Actions'  },
       
      ],
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
    // Set the initial number of items
    this.totalRows = this.items.length;
    this.commissionList();
  },
  methods: {
    // category list api 
    commissionList()
      {
     axios.get('/api/commission').
        then((response)=>
            {
              this.tableData = response.data.data;
           
            }).catch((response)=> {
            console.log(response);
            });
      },
      deleteCategory(id)
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
            axios.post('/api/header-category/delete/'+id).then((response) => {
              this.categoryList();
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
    //  handleSubmit(e) {
    //   this.submitted = true;
    //  },
    /**
     * Search the table data with search input
     */
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
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
 <template #cell(actions)="data">
        <!-- <router-link
        :to="{name:'edit-commission',params: { id: data.item.id }}"
        tag="v-btn" align="right">
        <v-btn class="btn btn-secondary btn-sm"
          color="white"
          flat
          value="feed">Edit
        </v-btn> -->
        <a :href="'/commission/edit/' +data.item.id " target="_balnk" >Edit</a>
      <!-- </router-link> -->

        
      </template>
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
  </Layout>
</template>