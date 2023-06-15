<script>
import Layout from "../../../layouts/main";

import Swal from "sweetalert2";
import PageHeader from "../../../components/page-header";
import Multiselect from "vue-multiselect";
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
    
    Multiselect,
  },
  data() {
    return {
      title: "Create Header Category",
      items: [
        {
          text: " Header category",
          href: "/dashboard/category",
        },
        {
          text: "create",
          active: true,
        },
      ],
      typeform: {
        name: "",
       ne_name:'',
        status:""
       
      },
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
      
  },
  methods: {

   
    /**
     * Validation type submit
     */
    // eslint-disable-next-line no-unused-vars
    typeForm(e) {
  
      this.typesubmit = true;
      // stop here if form is invalid
      this.$v.$touch();

     axios.post('/api/header-category/create', {
          category: this.typeform
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
                this.$router.push("/dashboard/header-category");
              }
        })
        .catch(error => {
            console.log(error)
        });
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

            <form action="#" @submit.prevent="typeForm">
              <div class="row">
              <div class="mb-3 col-md-6">
              <h3>In English</h3>
                <label> Name(EN)</label>
                <input
                  v-model="typeform.name"
                  type="text"
                  class="form-control"
                  placeholder="Type Heder category name"
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
                    >This heder category is required.</span
                  >
                  <span v-if="!$v.typeform.name.minLength"
                    >This heder category length is invalid. It should be between 3 and
                    5 characters long.</span
                  >
                </div>

                <br>
             
                <label> Name(NE)</label>
                <input
                  v-model="typeform.ne_name"
                  type="text"
                  class="form-control"
                  placeholder="Type Heder category name"
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
                    >This heder category is required.</span
                  >
                  <span v-if="!$v.typeform.ne_name.minLength"
                    >This heder category length is invalid. It should be between 3 and
                    5 characters long.</span
                  >
                </div>
              </div>

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
               
                  <label> नाम (NE)</label>
                <input
                  v-model="typeform.ne_name"
                  type="text"
                  class="form-control"
                  placeholder="Type Heder category name"
                  name="ne_name"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.ne_name.$error,
                  }"
                />
               
              </div>
               
              </div>
            </form>
          </div>
        </div>
        <!-- end card -->
      </div>
      <!-- end col-->
             

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



