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
      title: "web-ads List",
      items: [
        {
          text: "Tables",
          href: "/",
        },
        {
          text: "web-ads",
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
      sortBy: "id",
      sortDesc: false,
      fields: [
        { key: "id", sortable: true },
        { key: "page", label:"Page Name",sortable: true },
        { key: "title", label:"Title", sortable: true },
        {  key: 'actions', label: 'Actions'  },
        // { key: "age", sortable: true },
        // { key: "date", sortable: true },
        // { key: "salary", sortable: true },
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
    this.categoryList();
  },
  methods: {
    // category list api 
    categoryList()
      {
     axios.get('/api/web-ads').
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
            axios.post('/api/category/delete/'+id).then((response) => {
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
          <!--  <router-link
        :to="{name:'web-ads-create'}"
        tag="v-btn" align="right"
      >
        <v-btn 
        class="btn btn-success ms-auto mb-2 mt-2"
          color="white"
          flat
          value="feed"
        >
        </v-btn>
      </router-link> -->
        <v-btn 
        class="btn btn-success ms-auto mb-2 mt-2"
          color="white"
          flat
          value="feed"
        >
       <a :href="'/dashboard/web-ads/create/'" target="_balnk" >Add New</a>
       </v-btn>
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
 <template #cell(actions)="webadsData">
       <!--  <router-link
        :to="{name:'web-ads-edit',params: { id: webadsData.item.id }}"
        tag="v-btn" align="right">
        <v-btn class="btn btn-secondary btn-sm"
          color="white"
          flat
          value="feed">Edit
        </v-btn>

      </router-link> -->
       <a :href="'/dashboard/web-ads/edit/' +webadsData.item.id " target="_balnk" >Edit</a> 

        <!-- <b-button size="sm"  class="btn-danger" v-on:click="deleteCategory(categoryData.item.id)">
         Delete
        </b-button> -->
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