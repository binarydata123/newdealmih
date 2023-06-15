<script>
import Layout from "../../../layouts/main";
import CKEditor from 'ckeditor4-vue';
import Swal from "sweetalert2";
import PageHeader from "../../../components/page-header";
import Multiselect from "vue-multiselect";
import {
  required,
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
      title: "Edit Email Template",
      items: [
        {
          text: "Email Template",
          href: "/dashboard/email-template",
        },
        {
          text: "edit",
          active: true,
        },
      ],
      typeform: {
        content: "",
        title:"",
        subject:""
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
      content: {
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
  mounted(){
      this.editTemaplateData();
  },
  methods: {

    editTemaplateData()
    {
      axios.get('/api/email-template/edit/'+this.$route.params.id)
      .then((response)=>{
        this.typeform = response.data.data;
      }).catch((response) =>
      {
        console.log('error');
      });
    },
   
    /**
     * Validation type submit
     */
    // eslint-disable-next-line no-unused-vars
    typeForm(e) {
  
      this.typesubmit = true;
      // stop here if form is invalid
      this.$v.$touch();

     axios.post('/api/email-template/update/'+this.$route.params.id, {
          emailData: this.typeform
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
                this.$router.push("/dashboard/email-template");
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
                  <div class="mb-3 col-md-12">
                <label> Title</label>
                <input
                  v-model="typeform.title"
                  type="text"
                  class="form-control"
                  placeholder="Type title name"
                  name="title"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.title.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.title.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.title.required"
                    >This title is required.</span
                  >
               
                </div>
              </div>

                <div class="mb-3 col-md-12">
                <label> Subject</label>
                <input
                  v-model="typeform.subject"
                  type="text"
                  class="form-control"
                  placeholder="subject"
                  name="title"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.subject.$error,
                  }"
                />
                <div
                  v-if="typesubmit && $v.typeform.subject.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.title.required"
                    >This subject is required.</span
                  >
               
                </div>
              </div>


        <div class="col-12">
          <div class="card">
            <div class="card-body">
      <ckeditor
                  v-model="typeform.content"
                  :class="{
                    'is-invalid': typesubmit && $v.typeform.content.$error,
                  }"
                ></ckeditor>

                   <div
                  v-if="typesubmit && $v.typeform.content.$error"
                  class="invalid-feedback"
                >
                  <span v-if="!$v.typeform.content.required"
                    >This content is required.</span
                  >
                
                </div>
            </div>
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



