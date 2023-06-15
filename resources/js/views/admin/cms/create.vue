<script>
import Layout from "../../../layouts/main";
import CKEditor from 'ckeditor4-vue';
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
    ckeditor: CKEditor.component ,
    Multiselect,
  },
  data() {
    return {
      title: "Create Cms",
      items: [
        {
          text: "Cms",
          href: "/dashboard/cms",
        },
        {
          text: "create",
          active: true,
        },
      ],
      file:"",
      typeform: {
        name: "",
        page:""
       
      },
     
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
      page:{
        required
      }

    },

  },
  mounted(){
      
  },
  methods: {

   
    /**
     * Validation type submit
     */
    // eslint-disable-next-line no-unused-vars
    typeForm(e) {
   /*
                Initialize the form data
            */
            let formData = new FormData();

            /*
                Add the form data we need to submit
            */
           
          let  cms = this.typeform;
           cms = JSON.stringify(cms)
        
            formData.append('file', this.file); 
              formData.append('data', cms)
      this.typesubmit = true;
      // stop here if form is invalid
      this.$v.$touch();


     axios.post('/api/cms/create', formData,{
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
                this.$router.push("/dashboard/cms");
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
                  <div class="mb-3 col-md-4">
                    <label for="">Page</label>
                     <select class="form-control" name="page" v-model="typeform.page"
                        :class="{
                    'is-invalid': typesubmit && $v.typeform.page.$error,
                  }">
                      <option value="">Select Page</option>
                      <option value="Home">Home</option>
                      <option value="Motor">Motor</option>
                      <option value="Property">Property</option>
                      <option value="Marketplace">MarketPlace</option>
                      <option value="Jobs">Jobs</option>
                      <option value="Auction">Auction</option>
                      <option value="Services">Services</option>
                      <option value="Store">Store</option>
                      <option value="About us">About us</option>
                      <option value="Advertising">Advertising</option>
                      <option value="Terms And Conditions">Terms & Conditions</option>
                      <option value="Privacy Policy">Privacy Policy </option>
                      <option value="Contact">Contact </option>
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
                         <div class="mb-3 col-md-4">
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
          
               <div class="mb-3 col-md-4">
            <label for="">Image</label>
                 <div class="card">
                  <input type="file" id="file" ref="file" v-on:change="handleFileUpload"  required /> 
            </div>
              </div>

        
         
              <div class="mb-3 col-md-12">
           <ckeditor
                  v-model="typeform.content"
                  
                ></ckeditor></div>

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



