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
      title: "User",
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

      makeAdmin(id)
      {
        this.status = 'make-admin';
        this.storeStatusChange(id);
      },

 rejectAdminUser(id)
      {
        this.status = 'reject-admin';
        this.storeStatusChange(id);
      },
    storeStatusChange(id)
    {
      axios.post('/api/users/status-change/'+id,{
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
                this.$router.push("/dashboard/users");
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
                    <th scope="row">Gender</th>
                    <td colspan="6" v-if="this.detail.gender">
                      {{ this.detail.gender }}
                    </td>
                  </tr>


                  <tr>
                    <th scope="row">Address</th>
                    <td colspan="6" v-if="this.detail.business_details">
                      {{ this.detail.business_details.address_one }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Phone number.</th>
                    <td colspan="6" v-if="this.detail.phone_number">
                      {{ this.detail.phone_number }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Facebook Id</th>
                    <td colspan="6" v-if="this.detail.facebook_id">
                      {{ this.detail.facebook_id }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Google Id</th>
                    <td colspan="6" v-if="this.detail.google_id">
                      {{ this.detail.google_id }}
                    </td>
                  </tr>
                   <tr>
                    <th scope="row">Apple Id</th>
                    <td colspan="6" v-if="this.detail.apple_id">
                      {{ this.detail.apple_id }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Dob</th>
                    <td colspan="6" v-if="this.detail.dob">
                      {{ this.detail.dob }}
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">District</th>
                    <td
                      colspan="6"
                      v-if="this.detail.business_details"
                    >
                      {{ this.detail.business_details.district.district_name }}
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Muncipality</th>
                    <td
                      colspan="6"
                      v-if="this.detail.business_details"
                    >
                      {{ this.detail.business_details.muncipality.municipality_name }}
                    </td>
                  </tr>

                    <tr>
                    <th scope="row">Village</th>
                    <td
                      colspan="6"
                      v-if="this.detail.business_details"
                    >
                      {{ this.detail.business_details.village.name }}
                    </td>
                  </tr>


                  <tr>
                    <th scope="row">Avatar</th>

                    <div
                      class="popup-gallery"
                      v-if="this.detail"
                    >
                      <img
                        v-bind:src="
                          '/media/avatar/' +
                          this.detail.avatar
                        "
                        width="120"
                      />
                    </div>
                  </tr>
                  <tr>
                    <th scope="row">Company Document</th>

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
              <div class="text-center">
        

            <div class="d-inline" v-if="this.detail.is_approve_store == '0'">
               <b-button size="sm"  class="btn-success " v-on:click="acceptStore(detail.id)" >
                 Approve Address Badge
                </b-button>

                <b-button size="sm"  class="btn-danger" v-on:click="rejectStore(detail.id)" >
                  Reject Address Badge
                </b-button>
            </div>

          <div class="d-inline" v-else-if="this.detail.is_approve_store == '1'">
              <b-button size="sm"  class="btn-success" disabled>
               Address Badge Approved
              </b-button>

               <b-button size="sm"  class="btn-danger" v-on:click="rejectStore(detail.id)" >
               Reject Address Badge
              </b-button>
          </div>
          <div class="d-inline" v-else-if="this.detail.is_approve_store == '2'">
              <b-button size="sm"  class="btn-success " v-on:click="acceptStore(detail.id)" >
              Approve Address Badge
              </b-button>

               <b-button size="sm"  class="btn-danger" disabled>
               Address Badge Rejected
              </b-button>
          </div>



        <b-button size="sm"  class="btn-success" v-on:click="makeAdmin(detail.id)" >
         Make as Admin
        </b-button>
        <b-button size="sm"  class="btn-danger" v-on:click="rejectAdminUser(detail.id)" >
         Reject Admin User
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