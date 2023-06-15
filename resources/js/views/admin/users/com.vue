<script>
import Layout from "../../../layouts/main";
import Transaction from "../../../components/widgets/transaction";
import axios from 'axios';

/**
 * Dashboard Component
 */
export default {
  components: { Layout , Transaction  },
  data() {
    return {
      title: "Dashboard",
      transactions: [],
      form: {
          percent: '',
        },
      
    };
  },
  mounted() {
    this.transactionsList();

    
  },
  methods:
  {
    onSubmit(event) {
        event.preventDefault()
        alert(JSON.stringify(this.form))
      },
    transactionsList()
    {
      axios.get('/api/transaction').then((response)=> {
        console.log(response )
        this.transactions = response.data.data;
      }).catch((response) => {
        console.log('error');
      })
    }
  }

};
</script>

<template>
  <Layout>
    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div
          class="page-title-box d-flex align-items-center justify-content-between"
        >
          <h4 class="mb-0 font-size-18">Commision</h4>

          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <!-- <li class="breadcrumb-item active">Welcome to Yarddiant Classifieds</li> -->
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end page title -->
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Set Commision Percentage</h4>
              <b-form @submit="onSubmit">
      

      <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
        <b-form-input style="width: 150px;" class="mb-3"
          id="input-2"
          v-model="form.percent"
          placeholder="Enter Percentage"
          required
        ></b-form-input>
      </b-form-group>


    

      <b-button type="submit" variant="primary">Submit</b-button>
    </b-form>

          </div>
          <div class="card-body">
            <h4 class="card-title mb-4">Commision List</h4>
            <!-- Transactions table -->
            <Transaction :transactions="transactions" />
          </div>

        </div>
      </div>
      <!-- end col -->
    </div>
  </Layout>
</template>
