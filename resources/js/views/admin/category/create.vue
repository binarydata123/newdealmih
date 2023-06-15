<script>
import Layout from "../../../layouts/main";
import Feature from "./feature";
import Swal from "sweetalert2";
import PageHeader from "../../../components/page-header";
import Multiselect from "vue-multiselect";
import vue2Dropzone from "vue2-dropzone";
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
 * Form validation component
 */
export default {
  components: {
    Layout,
    PageHeader,
    Feature,
    Multiselect,
   vueDropzone: vue2Dropzone,
  },
  data() {
    return {
      title: "Create Category",
      items: [
        {
          text: "category",
          href: "/dashboard/category",
        },
        {
          text: "create",
          active: true,
        },
      ],
      file :   "",
      typeform: {
        name: "",
        parent: "",
        status:"",
       header_category_id:"",
       category_nepal_name:"",
       header_category_ne:"",
       file:""
      },
      categoryList:[],
      headerCategoryList:[],
      value: null,
      options:[],
        showModal: false,
      submitted: false,
      submitform: false,
      submit: false,
      typesubmit: false,
       features: {
        feature: "",
        parent_feature:""
      
      },

        dropzoneOptions: {
                url: "http://dealmih.ca/api/media",
                thumbnailWidth: 150,
                maxFilesize: 0.5,
                headers: {
                    "My-Awesome-Header": "header value"
                }
            }
    };
  },
  validations: {
    typeform: {
      name: {
        required,
        minLength: minLength(3),
      },
      category_nepal_name:{
        required,
        minLength: minLength(3),
      },
      // parent: {
      //   required,
      // },
      status:{
        required
      },
      header_category_id:{
        required
      },
      header_category_ne:{
        required
      }
    

    },

      features: {
      feature: { required },
     parent_feature: { required },
    },
  },
  mounted(){
        // this.perentCategory();
        this.headerCategory();
  },
  methods: {
      perentCategory()  
      {
        axios.get("/api/category/list").then((response) => {
        this.options = response.data.data;
      })
      .catch((response)=>{
          console.log('error');
      })

      },
      headerCategory()
      {
        axios.get("/api/header-category")
        .then((response)=> {
          this.headerCategoryList = response.data.data;
        }).catch((response) => {
          console.log('error');
        })
      },
       onHeaderCategory(e)
          {
           
            let id = e.id;
            console.log(e.id);
            axios.post('/api/header-category/main-category/'+id)
            .then((response)=> {
             this.options = response.data.data;
            }).catch((response)=> {
              console.log(response);
            })
          },
          // image upload  
    //       onFileChange(e) {
         
    //   var files = e.target.files || e.dataTransfer.files;
    //   if (!files.length) return;
    //   this.images = files[0]
    //   let formData = new FormData();
    //   formData.append('file', this.images);
    // },
   
  //  createImage(file) {
    
  //     var image = new Image();
  //     var reader = new FileReader();
  //     var vm = this;

  //     reader.onload = (e) => {
  //       vm.image = e.target.result;
  //     };
  //     reader.readAsDataURL(file);
  //     // this.typeform=file;
  //     console.log(file);
  //     this.photo = file;
      
  //   },
  //   removeImage: function (e) {
  //     this.image = '';
  // },
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
           
          let  category = this.typeform;
           category = JSON.stringify(category)
          console.log(category);
            formData.append('file', this.file); 
              formData.append('data', category)
        // let datas = {
        //   category:this.typeForm,
        //   image :formData
        // }

      this.typesubmit = true;
      // stop here if form is invalid
      this.$v.$touch();

     axios.post('/api/category/create',  formData, {
          // category: this.typeform,
        
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
                this.$router.push("/dashboard/category");
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
      if (this.$v.$invalid) {
        return;
      } else {
        const currentDate = new Date();
        this.featuresData.push({
          feature: this.features.feature,
          parent_feature: this.features.parent_feature,
          date: currentDate,
        });
        this.showModal = false;
        this.features = {};
      }
      this.submitted = false;
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
        <!-- Create category in english  -->
              <div class="mb-3 col-md-6">
                <h3>In English</h3>
                <label>Category</label>
                <input
                  v-model="typeform.name"
                  type="text"
                  class="form-control"
                  placeholder="Type category"
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
                    >This category is required.</span
                  >
                  <span v-if="!$v.typeform.name.minLength"
                    >This category length is invalid. It should be between 3 and
                    5 characters long.</span
                  >
                </div>
                <br>
                 <label>Header Category</label>
                   <multiselect v-model="typeform.header_category_id"   @input="onHeaderCategory(typeform.header_category_id)"   deselect-label="Can't remove this value"
                   label="name" placeholder="Select one" :options="headerCategoryList" :searchable="true" 
                   :allow-empty="true">
                
                  </multiselect>
                   <div
                      v-if="typesubmit && $v.typeform.header_category_id.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.typeform.header_category_id.required"
                        >This header category is required.</span
                      >
                    </div>
                     <br>
              <!-- </div>

              <div class="mb-3 col-md-6"> -->
                    <label>Parent</label>
                   <multiselect v-model="typeform.parent"   deselect-label="Can't remove this value"
                   label="name" placeholder="Select one" :options="options" :searchable="true" 
                   :allow-empty="true">
                
                  </multiselect>
               
                  
              <!-- </div>

                <div class="mb-3 col-md-6"> -->
                   
                <br>

<!--                   
              </div>


                <div class="mb-3 col-md-6"> -->
                    <label >Status</label>
                    <div >
                      <select class="form-control" name="status" v-model="typeform.status"
                        :class="{
                    'is-invalid': typesubmit && $v.typeform.status.$error,
                  }">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                      </select>
                       <div
                      v-if="typesubmit && $v.typeform.status.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.typeform.status.required"
                        >This status is required.</span
                      >
                    </div>
                    </div>
                <br>

                    <!-- </div>

  <div class="mb-3 col-md-6"> -->
            <div class="card">
                  <input type="file" id="file" ref="file" v-on:change="handleFileUpload"  /> 
            </div>
            <!-- <img src="images/users/dealmih.png" alt=""> -->
            
            <!-- end card -->
        </div>
        <!-- Create category in nepal  -->
              <div class="mb-3 col-md-6">
                <h3>In Nepal</h3>
                <label>कोटि</label>

                 <input
                  v-model="typeform.category_nepal_name"
                  type="text"
                  class="form-control"
                  placeholder="प्रकार कोटि"
                  name="name"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.category_nepal_name.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.category_nepal_name.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.category_nepal_name.required"
                    >This category is required.</span
                  >
                  <span v-if="!$v.typeform.category_nepal_name.minLength"
                    >This category length is invalid. It should be between 3 and
                    5 characters long.</span
                  >
                </div>
                <br>
               
                 <label>हेडर कोटि</label>
                   <multiselect v-model="typeform.header_category_ne" @input="onHeaderCategory(typeform.header_category_ne)"     deselect-label="Can't remove this value"
                   label="ne_name" placeholder="Select one" :options="headerCategoryList" :searchable="true" 
                   :allow-empty="true">
                
                  </multiselect>
                   <div
                      v-if="typesubmit && $v.typeform.header_category_ne.$error"
                      class="invalid-feedback"
                    >
                      <span v-if="!$v.typeform.header_category_ne.required"
                        >This header category is required.</span
                      >
                    </div>
          <br>
                       <label>अभिभावक</label>
                   <multiselect v-model="typeform.parent"   deselect-label="Can't remove this value"
                   label="category_ne_name" placeholder="Select one" :options="options" :searchable="true" 
                   :allow-empty="true">
                
                  </multiselect>
               
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



