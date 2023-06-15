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
      title: "Settings",
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
        admin_email: "",
        developer_email:'',
        contact_no:'',
        address:'',
        favicon:"",
        site_logo:"",
        facebook_link:"",
        twitter_link:"",
        instagram_link:"",
        youtube_link:"",
        tiktok_link:""
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
      admin_email: {
        required
      },
      developer_email: {
        required
      },
      contact_no: {
        required
      },
       address: {
        required
      },
      facebook_link: {
        required
      },
      twitter_link: {
        required
      },
      instagram_link: {
        required
      },
      youtube_link: {
        required
      },
      tiktok_link: {
        required
      }
    },
  },
  mounted(){
      this.getSettingsData();
  },
  methods: {
    getSettingsData()
    {
      axios.get('/api/settings')
      .then((response)=> {
        this.typeform = response.data.data;
      }).catch((response)=> {
        console.log('error');
      })
    },
   
    /**
     * Validation type submit
     */
    typeForm(e) {
      let formData = new FormData();
      let  settingsData = this.typeform;
      settingsData = JSON.stringify(settingsData)
      formData.append('favivon_file', this.favivon_file);
      formData.append('logo_file', this.logo_file);  
      formData.append('data', settingsData)
      this.typesubmit = true;
      this.$v.$touch();
      axios.post('/api/settings/update/1',formData,{
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
          this.$router.push("/dashboard/settings");
        }
      })
      .catch(error => {
        console.log(error)
      });
    },
    handleFaviconFileUpload(){
      this.favivon_file = this.$refs.faviconfile.files[0];
    },
    handleLogoFileUpload(){
      this.logo_file = this.$refs.logofile.files[0];
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
                  <label>Admin Email<span>*</span></label>
                  <input
                    v-model="typeform.admin_email"
                    type="text"
                    class="form-control"
                    placeholder="Admin Email"
                    name="admin_email"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.admin_email.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.admin_email.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.admin_email.required">This field is required.</span>
                    <span v-if="!$v.typeform.admin_email.email">Please enter valid email</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label>Businness Email<span>*</span></label>
                  <input
                    v-model="typeform.developer_email"
                    type="text"
                    class="form-control"
                    placeholder="Developer Email"
                    name="developer_email"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.developer_email.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.developer_email.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.developer_email.required">This field is required.</span>
                    <span v-if="!$v.typeform.developer_email.email">Please enter valid email</span>
                  </div>
                </div>

                
                <div class="mb-3 col-md-6">
                  <label>Business Number<span>*</span></label>
                  <input
                    v-model="typeform.contact_no"
                    type="text"
                    class="form-control"
                    placeholder="Business Number"
                    name="contact_no"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.contact_no.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.contact_no.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.contact_no.required">This field is required.</span>
                  </div>
                </div>

                <div class="mb-3 col-md-6">
                  <label>Business Address<span>*</span></label>
                  <input
                    v-model="typeform.address"
                    type="text"
                    class="form-control"
                    placeholder="Business Address"
                    name="address"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.address.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.address.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.address.required">This field is required.</span>
                  </div>
                </div>

                <div class="mb-3 col-md-6">
                  <label>Facebook Link<span>*</span></label>
                  <input
                    v-model="typeform.facebook_link"
                    type="text"
                    class="form-control"
                    placeholder="Facebook Link"
                    name="facebook_link"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.facebook_link.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.facebook_link.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.facebook_link.required">This field is required.</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label>Twitter Link<span>*</span></label>
                  <input
                    v-model="typeform.twitter_link"
                    type="text"
                    class="form-control"
                    placeholder="Twitter Link"
                    name="twitter_link"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.twitter_link.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.twitter_link.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.twitter_link.required">This field is required.</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label>Instagram Link<span>*</span></label>
                  <input
                    v-model="typeform.instagram_link"
                    type="text"
                    class="form-control"
                    placeholder="Instagram Link"
                    name="instagram_link"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.instagram_link.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.instagram_link.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.instagram_link.required">This field is required.</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label>Youtube Link<span>*</span></label>
                  <input
                    v-model="typeform.youtube_link"
                    type="text"
                    class="form-control"
                    placeholder="Youtube Link"
                    name="youtube_link"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.youtube_link.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.youtube_link.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.youtube_link.required">This field is required.</span>
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                  <label>Tiktok Link<span>*</span></label>
                  <input
                    v-model="typeform.tiktok_link"
                    type="text"
                    class="form-control"
                    placeholder="Tiktok Link"
                    name="tiktok_link"
                    :class="{
                      'is-invalid': typesubmit && $v.typeform.tiktok_link.$error,
                    }"
                  />
                  <div v-if="typesubmit && $v.typeform.tiktok_link.$error" class="invalid-feedback">
                    <span v-if="!$v.typeform.tiktok_link.required">This field is required.</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="">Favicon</label>
                  <div class="card">
                    <input type="file" id="faviconfile" ref="faviconfile" v-on:change="handleFaviconFileUpload"  />
                    <br>

                    <img v-bind:src="'/media/faviconImg/' + typeform.favicon" width="60" height="60"  /> 
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="">Website Logo</label>
                  <div class="card">
                    <input type="file" id="logofile" ref="logofile" v-on:change="handleLogoFileUpload"  />
                    <br>
                    <img v-bind:src="'/media/websitelogo/' + typeform.site_logo" width="250" height="60"  /> 
                  </div>
                </div>
                <div class="mb-3 mb-0">
                  <div align="right">
                    <button type="submit" class="btn btn-primary">Update</button>
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