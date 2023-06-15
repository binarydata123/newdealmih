<script>
import Layout from "../../../layouts/main";
import PageHeader from "../../../components/page-header";
import CKEditor from 'ckeditor4-vue';
import {
  required,
} from "vuelidate/lib/validators";
import { tableData } from "./dataAdvancedtable";

/**
 * Advanced table component
 */
export default {
  components: { Layout, PageHeader, ckeditor: CKEditor.component },
  data() {
    return {
      tableData: [],
      title: "Business Users",
      items: [
        {
          text: "Dashboard",
          href: "/",
        },
        {
          text: "Business User",
          active: true,
        },
      ],
      type:"",
      emailfrom: {
        email_body: "",
        title:"",
        subject:""
      },
      type:"",
      value: null,
      submitted: false,
      submitform: false,
      submit: false,
      typesubmit: false,
      totalRows: 1,
      currentPage: 1,
      perPage: 10,
      pageOptions: [10, 25, 50, 100],
      filter: null,
      filterOn: [],
      sortBy: "age",
      sortDesc: false,
      fields: [
        { key: "username", sortable: true },
        { key: "email", sortable: true },
        { key: "phone_number", sortable: true },
        { key: "status", sortable: true },
        { key: "actions", sortable: true },
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
  validations: {
    emailfrom: {
      email_body: {
        required,
      },
      title:{
        required
      },
      subject:{
        required
      }
    },
  },
  mounted() {
    // Set the initial number of items
    this.totalRows = this.items.length;
     this.userList();
  },
  methods: {
    userList()
      {
     axios.get('/api/users' + '?' +'type' +'=' +1,{
       
     }).
        then((response)=>
            {
              this.tableData = response.data.data;
           
            }).catch((response)=> {
            console.log(response);
            });
      },
    typeForm(e) {
      this.typesubmit = true;
      this.$v.$touch();
      axios.post('/api/notification-email-template/send-email', {
        emailData: this.emailfrom,
        UserData: this.tableData
      })
      .then(response => { 
        var result = response.data;
        if(result.status == true)
        {
          this.$bvModal.hide('modal-1');
          Vue.swal({
              position: "top-end",
              icon: "success",
              title: result.message,
              showConfirmButton: false,
              timer: 3000
          });
          //this.$router.push("/dashboard/business-users");
        }
      })
      .catch(error => {
          console.log(error)
      });
    },
    getNotificationData(){
      axios.get('/api/notification-email-template/single-email-template/12').
      then((response)=>
      {
        //console.log(response.data.data.email_body);
        this.emailfrom = response.data.data;
      }).catch((response)=> {
        console.log(response);
      });
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
              <div class="col-sm-12 col-md-3" style="text-align:right">
                <b-button v-b-modal.modal-1 class="btn-info" @click="getNotificationData()">Notification</b-button>
                <b-modal id="modal-1" title="Send Notification" hide-footer>
                  <form action="#" @submit.prevent="typeForm">
                    <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" v-model="emailfrom.title" class="form-control" name="title" id="title" placeholder="Title" :class="{'is-invalid': typesubmit && $v.emailfrom.title.$error,}">
                      <div v-if="typesubmit && $v.emailfrom.title.$error" class="invalid-feedback">
                        <span v-if="!$v.emailfrom.title.required">This title is required.</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="subject">Subject</label>
                      <input type="text" v-model="emailfrom.subject" class="form-control" name="subject" id="subject" placeholder="Subject" :class="{'is-invalid': typesubmit && $v.emailfrom.subject.$error,}">
                      <div v-if="typesubmit && $v.emailfrom.subject.$error" class="invalid-feedback">
                        <span v-if="!$v.emailfrom.title.required">This subject is required.</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="content">Content</label>
                      <ckeditor v-model="emailfrom.email_body" :class="{'is-invalid': typesubmit && $v.emailfrom.email_body.$error,}"></ckeditor>
                      <div v-if="typesubmit && $v.emailfrom.email_body.$error" class="invalid-feedback">
                        <span v-if="!$v.emailfrom.email_body.required">This content is required.</span>
                      </div>
                    </div>
                    <div align="right" class="mt-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <!-- <button type="reset" class="btn btn-secondary m-l-5 ml-1">Cancel</button> -->
                    </div>
                  </form>
                </b-modal>
              </div>
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
        <template #cell(actions)="users">
        <router-link
        :to="{name:'business-user-edit-view',params: { id: users.item.id }}"
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