<script>
import Layout from "../../../layouts/main";

import Swal from "sweetalert2";
import PageHeader from "../../../components/page-header";
import Multiselect from "vue-multiselect";
import {
  required,
  minLength,

} from "vuelidate/lib/validators";
import axios from 'axios';

/**
 * Form validation component
 */
export default {
  components: {
    Layout,
    PageHeader,
    
    Multiselect,
  },
  data() {
    return {
      title: "Edit Settings",
      items: [
        {
          text: "Settings",
          href: "/dashboard/category",
        },
        {
          text: "Settings",
          active: true,
        },
      ],
      typeform: {
        name: "",
        ne_name:'',
        status:""
       
      },
      file:"",
      categoryList:[],
      value: null,
      options:[],
        showModal: false,
      submitted: false,
      submitform: false,
      submit: false,
      typesubmit: false,
     
    };
  },
  validations: {
    typeform: {
      name: {
        required,
        minLength: minLength(3),
      },
       ne_name: {
        required,
         minLength: minLength(3),
      },
      status:{
        required
      }

    },

  },
  mounted(){
      this.settingsDataEdit();
  },
  methods: {
    webadsDataEdit()
    {
      axios.get('/api/settings/edit/'+this.$route.params.id)
      .then((response)=> {
        this.typeform = response.data.data;
      }).catch((response)=> {
        console.log('error');
      })
    },
   
    /**
     * Validation type submit
     */
    // eslint-disable-next-line no-unused-vars
    typeForm(e) {
   /*Initialize the form data
            */
            let formData = new FormData();

            /*
                Add the form data we need to submit
            */
           
          let  settingsData = this.typeform;
           settingsData = JSON.stringify(settingsData)
            formData.append('file', this.file); 
              formData.append('data', settingsData)

      this.typesubmit = true;
      // stop here if form is invalid
      this.$v.$touch();

     axios.post('/api/settings/update/'+this.$route.params.id,formData,{
          headers: {
      'Content-Type': 'multipart/form-data'
    }
        })
        .then(response => { 
       
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
                this.$router.push("/dashboard");
              }
        })
        .catch(error => {
            console.log(error)
        });
    },
 /*
        Handles a change on the file upload
      */
      handleFileUpload(){
        this.file = this.$refs.file.files[0];
      },
    /**
     * Modal form submit
     */
    // eslint-disable-next-line no-unused-vars
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

    <!-- end row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Validation type</h4> -->

            <form action="#" @submit.prevent="typeForm" enctype="multipart/form-data">
             <div class="row">
                  <div class="mb-3 col-md-6">
                    <label for="">Page</label>
                     <select class="form-control" name="page" v-model="typeform.page"
                        :class="{
                    'is-invalid': typesubmit && $v.typeform.page.$error,
                  }">
                      <option value="">Select Page</option>
                      <option value="home">Home</option>
                      <option value="motor">Motor</option>
                      <option value="property">Property</option>
                      <option value="marketplace">MarketPlace</option>
                      <option value="jobs">Jobs</option>
                      <option value="auction">Auction</option>
                      <option value="services">Services</option>
                      <option value="store">Store</option>
                    </select>
                       <div
                      v-if="typesubmit && $v.typeform.page.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.typeform.page.required"
                        >This page is required.</span
                      >
                    </div>
          </div>
                         <div class="mb-3 col-md-6">
                <label> Title(EN)</label>
                <input
                  v-model="typeform.name"
                  type="text"
                  class="form-control"
                  placeholder="Type Title"
                  name="name"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.name.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.name.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.name.required"
                    >This title is required.</span
                  >
                  <span v-if="!$v.typeform.name.minLength"
                    >This title length is invalid. It should be between 3 and
                    5 characters long.</span
                  >
                </div>
              </div>
          <div class="mb-3 col-md-6">
                <label> URL</label>
                <input
                  v-model="typeform.ne_name"
                  type="url"
                  class="form-control"
                  placeholder="www.example.com"
                  name="ne_name"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.ne_name.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.ne_name.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.ne_name.required"
                    >This url is required.</span
                  >
                  <!-- <span v-if="!$v.typeform.ne_name.minLength"
                    >This title length is invalid. It should be between 3 and
                    5 characters long.</span
                  > -->
                </div>
                <br>
          </div>
        
          <div class="mb-3 col-md-6">
            <label for="">Image</label>
                 <div class="card">
                  <input type="file" id="file" ref="file" v-on:change="handleFileUpload"  />
                  <br>
                   <img v-bind:src="'/media/webads-image/' + typeform.image" width="100" height="100"  /> 
            </div>
            
              </div>
              <div class="mb-3 mb-0">
                <div align="right">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <!-- <button type="reset" class="btn btn-secondary m-l-5 ml-1">Cancel</button> -->
                </div>
              </div>
              </div>
            </form>
          </div>
        </div>
        <!-- end card -->
      </div>
      <!-- end col-->

      <!-- end col -->
    </div>
    <!-- end row -->
  



      

 
  </Layout>

</template>



