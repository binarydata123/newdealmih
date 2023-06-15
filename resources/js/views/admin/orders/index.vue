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
    status :"",
    statusMessage:"",
    message :"",
      title: "Orders",
      items: [
        {
          text: "Dashboard",
          href: "/",
        },
        {
          text: "Orders",
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
        { key: "id", label:"Order Id", sortable: true },
        { key: "username", label:"Customer Name", sortable: true },
        { key: "create_dt", label:"created Date", sortable: false },
        { key: "purchase_price", label:"Amount", sortable: true },
        { key: "status", sortable: true },
        { key: "action", sortable: true },
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
    this.ordersList();
  },
  methods: {
    ordersList()
    {
      if(this.$route.query.user_id){
        axios.get('/api/orders/single-user-orders/' + this.$route.query.user_id).
        then((response)=>
        {
          console.log(response);
          this.tableData = response.data.data;
          this.status = "";
        }).catch((response)=> {
          console.log(response);
        });
      } else {
        axios.get('/api/orders').
        then((response)=>
        {
          console.log(response);
          this.tableData = response.data.data;
          this.status = "";
        }).catch((response)=> {
          console.log(response);
        });
      }
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
              <template #cell(action)="orders">
                <router-link
                  :to="{name:'orders-edit-view',params: { id: orders.item.id }}"
                  tag="v-btn" align="right">
                  <v-btn class="btn btn-secondary btn-sm"
                    color="white"
                    flat
                    value="feed">View
                  </v-btn>
                </router-link>
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