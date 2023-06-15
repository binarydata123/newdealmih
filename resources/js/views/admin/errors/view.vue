<script>
import Layout from "../../../layouts/main";
import PageHeader from "../../../components/page-header";
import Switches from "vue-switches";
import Swal from "sweetalert2";
import axios from 'axios';
// import { tableData } from "./dataAdvancedtable";

/**
 * Advanced table component
 */
export default {
  components: { Layout, PageHeader },
  data() {
    return {
     tableData:[],
      title: "error view",
      items: [
        {
          text: "Error",
          href: "/",
        },
        {
          text: "Website  ",
          active: true,
        },
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
   this.totalRows = this.items.length;
    this.errList();
  },
  methods: {
    // category list api 
    errList()
      {
     axios.get("/api/errors/edit/" + this.$route.params.id, {}).
        then((response)=>
            {
              this.tableData = response.data.data;
           
            }).catch((response)=> {
            console.log(response);
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
      axios.post('/api/errors/'+id,{
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
                this.$router.push("/dashboard/errors");
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
            <div class="table-responsive">
              <table class="table mb-0">
               
                <tbody>
                  <tr>
                    <td colspan="6" v-if="this.tableData ">{{ this.tableData.error }}</td>
                  </tr>
                   
                </tbody>
                <br>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </Layout>
</template>