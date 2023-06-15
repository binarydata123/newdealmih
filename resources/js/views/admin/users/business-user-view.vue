<script>
import Layout from "../../../layouts/main";
import PageHeader from "../../../components/page-header";
import axios from "axios";

/**
 * Basic-table component
 */
export default {
  components: { Layout, PageHeader },
  data() {
    return {
      detail: [],
      status:"",
      title: "Business User",
      items: [
        {
          text: "Dashboard",
          href: "/",
        },
        {
          text: "user",
          active: true,
        },
      ],
    };
  },
  mounted() {
    this.userList();
  },
  methods: {
    userList() {
      axios
        .get("/api/users/details/" + this.$route.params.id, {})
        .then((response) => {
          this.detail = response.data.data;
          console.log(this.detail.username);
        })
        .catch((response) => {
          console.log("error");
        });
    },
      acceptStore(id)
    {
      this.status =1 ;
     this.storeStatusChange(id)
    },
      rejectStore(id)
      {
        this.status = 2;
        this.storeStatusChange(id);
      },
    storeStatusChange(id)
    {
      axios.post('/api/users/business-status-change/'+id,{
        status:this.status
      })
      .then((result)=>{
        console.log(result);
     if(result.data.status == true)
              {
            Vue.swal({
                position: "top-end",
                icon: "success",
                title: result.data.message,
                showConfirmButton: false,
                timer: 3000
            });
                this.$router.push("/dashboard/business-users");
              }
      }).catch((result)=>{

      })
    }
  },


};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Basic example</h4>
            <p class="card-title-desc">
              For basic styling—light padding and
              only horizontal dividers—add the base class
              <code>.table</code> to any
              <code>&lt;table&gt;</code>.
            </p> -->

            <div class="table-responsive">
              <table class="table mb-0">
                <!-- <thead>
                  <tr>
                    <th colspan="6">#</th>
                    <th>First Name</th>
                   
                  </tr>
                </thead> -->
                <tbody>
                  <tr>
                    <th scope="row">Name</th>
                    <td colspan="6" v-if="this.detail ">{{ this.detail.username }}</td>
                  </tr>
                   <tr>
                    <th scope="row">Email</th>
                    <td colspan="6" v-if="this.detail.email">
                      {{ this.detail.email }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Business Reg No.</th>
                    <td colspan="6" v-if="this.detail.business_details">
                      {{ this.detail.business_details.business_reg_number }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Business Name</th>
                    <td colspan="6" v-if="this.detail.business_details">
                      {{ this.detail.business_details.business_name }}
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">Business Tax No.</th>
                    <td
                      colspan="6"
                      v-if="this.detail.business_details"
                    >
                      {{ this.detail.business_details.business_tax_number }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">About Company</th>
                    <td
                      colspan="6"
                      v-if="this.detail.business_details"
                    >
                      {{ this.detail.business_details.about_company }}
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">Company Logo</th>

                    <div
                      class="popup-gallery"
                      v-if="this.detail.business_details"
                    >
                      <img
                        v-bind:src="
                          '/media/company-logo/' +
                          this.detail.business_details.company_log
                        "
                        width="120"
                      />
                    </div>
                  </tr>

                  <tr>
                    <th scope="row">Company Cover Pic</th>

                    <div
                      class="popup-gallery"
                      v-if="this.detail.business_details"
                    >
                      <img
                        v-bind:src="
                          '/media/company-cover-pic/' +
                          this.detail.business_details.company_cover_pic
                        "
                        width="100"
                        height="100"
                      />
                    </div>
                  </tr>

                     <tr>
                    <th scope="row">Company Document FDF</th>

                    <div
                      class="popup-gallery"
                     
                    >
                      <a v-for="documents in detail.documents" :key="documents.id" :v-if="detail.documents"
                       v-bind:href="'/media/user-document/' +documents.document" target="_balnk"> <img  v-for="documents in detail.documents" :key="documents.id" :v-if="detail.documents"
                        v-bind:src="
                          '/media/user-document/pdf_icon.png'"
                        width="100"
                        height="100"

                      /> </a>
                    </div>
                  </tr>
                </tbody>
                <br>
              </table>
              <div class="text-center" v-if="this.detail.is_approve_store == '0'">
                 <b-button size="sm"  class="btn-success " v-on:click="acceptStore(detail.id)" >
                   Approve Address & In Trade Badge 
                  </b-button>

                  <b-button size="sm"  class="btn-danger" v-on:click="rejectStore(detail.id)" >
                   Reject Address & In Trade Badge
                  </b-button>
              </div>
              <div class="text-center" v-else-if="this.detail.is_approve_store == '1'">
                  <b-button size="sm"  class="btn-success" disabled>
                   Address Badge Approved
                  </b-button>

                   <b-button size="sm"  class="btn-danger" v-on:click="rejectStore(detail.id)" >
                   Reject Address & In Trade Badge
                  </b-button>
              </div>
              <div class="text-center" v-else-if="this.detail.is_approve_store == '2'">
                  <b-button size="sm"  class="btn-success " v-on:click="acceptStore(detail.id)" >
                   Approve Address & In Trade Badge 
                  </b-button>

                   <b-button size="sm"  class="btn-danger" disabled>
                   Address Badge Rejected
                  </b-button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </Layout>
</template>