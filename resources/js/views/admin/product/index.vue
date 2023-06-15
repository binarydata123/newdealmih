<script>
import Layout from "../../../layouts/main";
import PageHeader from "../../../components/page-header";
import axios from 'axios';
import Swal from "sweetalert2";
import moment  from 'moment' 

// import { tableData } from "./dataAdvancedtable";

/**
 * Advanced table component
 */
export default {
  components: { Layout, PageHeader },
  data() {
    return {
    tableData:[],
    selectedCategoryItem: null,
    sortCategoryItem : null,
    sortdatakey: "",
    options: [],
    status :"",
    statusMessage:"",
    message :"",
      title: "Product",
      items: [
        {
          text: "Dashboard",
          href: "/",
        },
        {
          text: "Product",
          active: true,
        },
      ],
      totalRows: 1,
      currentPage: 1,
      create_dt: "",
      perPage: 10,
      pageOptions: [10, 25, 50, 100],
      filter: null,
      filterOn: [],
      sortBy: "age",
      sortDesc: false,
      fields: [
        { key: "id", sortable: true },
        { key: "create_dt", label:"created Date", sortable: false },
        { key: "title", sortable: true },
        { key:'user_list.username', label:"User", sortable:true},
        { key: "price", sortable: true },
        { key: "category.category_name", label:"Category", sortable: true },
        { key: "is_approved", sortable: true },
        { key: "status", sortable: true },
        { key: "action", sortable: true },
        { key: "view", sortable: true },
        { key: 'edit'},
        { key: 'delete'}

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
    this.productList();
    this.categoryList();
  },
  methods: {
    productList()
      {
     axios.get('/api/products').
        then((response)=>
        
            {
              console.log(response);
              this.tableData = response.data.data;
              this.status = "";
            }).catch((response)=> {
            console.log(response);
            });
      },
      categoryList()
      {
        axios.get('/api/header-category/header-category-list').
        then((response)=>
        {
          this.options = response.data.data;
        }).catch((response)=> {
          console.log(response);
        });
      },
      getCategoryProducts()
      {
        axios.get('/api/products/getcategoryproducts/'+this.selectedCategoryItem+'/'+this.sortCategoryItem).
        then((response)=>
        {
          console.log(response.data.data);
          this.tableData = response.data.data;
          this.status = "";
        }).catch((response)=> {
          console.log(response);
        });
      },

      sortCategoryProducts() {
            axios.get('/api/products/getcategoryproducts/'+this.selectedCategoryItem+'/'+this.sortCategoryItem).
          then((response)=>
          {
            console.log(response.data.data);
            this.tableData = response.data.data;
            this.status = "";
          }).catch((response)=> {
            console.log(response);
          });
      },

      deleteProduct(id)
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
            axios.post('/api/products/delete/'+id).then((response) => {
              this.productList();
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
      changeStatus(id)
      {
      
        axios.post('/api/products/status-change/'+id,{
          status:this.status
        })
        .then((response)=>
        {
         this.productList();
        }).catch((response)=>
        {

        })
      },
      statusChange(id)
      {
        axios.post('/api/products/action-status/'+id)
        .then((response)=>{
          var statusMessage = response.data.statusMessage;
          var message = response.data.message;
           Swal.fire(statusMessage, message);
        }).catch((response)=>{
          console.log('hai');
        })
      },
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

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Data Table</h4> -->
            <div class="row mt-4">
              <div class="col-sm-12 col-md-2">
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
              <!-- dropdown -->
              <div class="col-sm-12 col-md-4">
                <div
                  id="tickets-table_filter"
                  class="dataTables_filter text-md-left"
                >
                  <label class="d-inline-flex align-items-center">
                    Search Categoriesss:
                    <b-form-select v-model="selectedCategoryItem" v-on:change="getCategoryProducts()" class="custom_cat_filter sort_data_product">
                      <option :value="null" disabled>Choose option</option>
                      <option v-for="option in options" :value="option.id">
                        {{ option.name }}
                      </option>
                    </b-form-select>
                  </label>
                </div>
              </div>
              <!-- the dropdown -->

              <!-- dropdown -->
              <div class="col-sm-12 col-md-3">
                <div
                  id="tickets-table_filter"
                  class="dataTables_filter text-md-end"
                >
                  <label class="d-inline-flex align-items-center">
                    Filter:
                   

                      <select class="custom_cat_filter sort_data_product" v-model="sortCategoryItem" id="" v-on:change="sortCategoryProducts()">
                        <option value="null" disabled>Choose option</option>
                        <option value="created_at">Latest created</option>
                        <option value="updated_at">Latest updated</option>
                        <option value="approved">Approved</option>
                        <option value="pending">Pending</option>
                      </select>

                  </label>
                </div>
              </div>
              <!-- the dropdown -->


              <!-- Search -->
              <div class="col-sm-12 col-md-3">
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
                hover
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
              <template #cell(is_approved)="statusData" >
                <div
                    class="form-check form-switch form-switch-md mb-3"
                    dir="ltr"
                  >
                    <input
                      class="form-check-input" :checked="statusData.item.is_approved == 1"
                      type="checkbox"
                      id="SwitchCheckSizemd" v-on:click="statusChange(statusData.item.id)"
                    />
                   
                  </div>
              </template>
            
              <template #cell(action)="productData" >
                <select class="form-control" v-model="status" id="" v-on:change="changeStatus(productData.item.id)">
                  <option value="">Select</option>
                  <option value="1">Trending</option>
                  <option value="2">Featured</option>
                  <option value="3">Premium</option>
                </select>
              </template>
              <template #cell(view)="view">
                  <a v-if="view.item.category.header_category_id == 3" :href="'/property-detail/' +view.item.slug " target="_balnk" >View</a>
                  <a v-else-if="view.item.category.header_category_id == 4" :href="'/jobs-detail/' +view.item.slug " target="_balnk" >View</a>
                  <a v-else-if="view.item.category.header_category_id == 5" :href="'/services-detail/' +view.item.slug " target="_balnk" >View</a>
                  <a v-else :href="'/product/detail/' +view.item.slug " target="_balnk" >View</a>
              </template>
              <template #cell(edit)="editProduct">
                <a :href="'/product/edit/' +editProduct.item.slug " target="_balnk" >Edit</a>
              </template>
              <template #cell(delete)="deleteProducts">
                <b-button size="sm" class="product_delete_btn" v-on:click="deleteProduct(deleteProducts.item.id)">Delete</b-button>
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