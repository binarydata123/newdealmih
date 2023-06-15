<script>
/**
 * Transactions component
 */
export default {
  props: {
    transactions: {
      type: Array,
      default: function () {
        return [];
      },
    },
  },
  data() {
    return {
      showModal: false,
    };
  },
};
</script>

<template>
  <div class="table-responsive mb-0">
    <table class="table table-centered table-nowrap align-middle">
      <thead class="table-light">
        <tr>
          <th style="width: 20px">
            <div class="form-check font-size-16 align-middle">
              <input
                class="form-check-input"
                type="checkbox"
                id="transactionCheck01"
              />
              <label class="form-check-label" for="transactionCheck01"></label>
            </div>
          </th>
          						
          <th class="align-middle">Sl No:</th>
          <th class="align-middle">Date</th>
          <!-- <th class="align-middle">Ad Title</th>
          <th class="align-middle">Seller</th> -->
          <th class="align-middle">Buyer</th>
          <th class="align-middle">Amount</th>
          <th class="align-middle">Commission</th>
      
          <th class="align-middle">Status</th>
          <th class="align-middle">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(data,index ) in transactions" :key="data.id">
          <td>
            <div class="form-check font-size-16">
              <input
                :id="`customCheck${data.index}`"
                type="checkbox"
                class="form-check-input"
              />
              <label
                class="form-check-label"
                :for="`customCheck${data.index}`"
                >&nbsp;</label
              >
            </div>
          </td>
          <td>
            <a href="javascript: void(0);" class="text-body fw-bold">{{
              '#' + index+1 + data.nabil_bank_orderId
            }}</a>
          </td>
          <td> {{ data.created_date}}</td>
          <!-- <td>{{ data.date }}</td> -->
          <!-- <td>Cars</td> -->
          <!-- <td>{{ data.total }}</td> -->
          <!-- <td>John</td> -->
         
            <td v-if="data.user">{{data.user.username}}</td>
            <td v-else></td>
           
          
            <!-- <span
              class="badge badge-pill badge-soft-success font-size-11"
              :class="{
                'badge-soft-danger': `${data.status}` === 'Chargeback',
                'badge-soft-warning': `${data.status}` === 'Refund',
              }"
              >{{ data.status }}</span
            > -->
         
          <td v-if="data.order_product[0]">
          RS. {{parseFloat(data.order_product[0].purchase_price) + parseFloat((10 / 100) * data.order_product[0].purchase_price)}}
          ({{parseFloat(data.order_product[0].purchase_price)}} + {{(10 / 100) * parseFloat(data.order_product[0].purchase_price)}}%)
          </td>
          <td v-else></td>
         <td v-if="data.order_product[0]">
          {{(10 / 100) * data.order_product[0].purchase_price}}%
          </td>
          <td v-else></td>


          <td>
            <!-- <i :class="`fab ${data.payment[0]} mr-1`"></i>
            {{ data.payment[1] }} -->
            <span 
              class="badge badge-pill badge-soft-success font-size-11"
              :class="{
                'badge-soft-danger': `${data.status}` === 1,
                'badge-soft-warning': `${data.status}` === '',
              }"
              >{{data.orderStatus}}</span
            >
          </td>
         
          <td>
            <!-- Button trigger modal showModal = true-->
            <button
              type="button"
              class="btn btn-primary btn-sm btn-rounded"
              
            >
              View
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <b-modal v-model="showModal" title="Order Details" centered>
      <p class="mb-2">
        Product id:
        <span class="text-primary">#SK2540</span>
      </p>
      <p class="mb-4">
        Billing Name:
        <span class="text-primary">Neal Matthews</span>
      </p>
      <div class="table-responsive">
        <table class="table table-centered table-nowrap">
          <thead>
            <tr>
              <th scope="col">Product</th>
              <th scope="col">Product Name</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                <div>
                  <img src="/images/product/img-7.png" alt class="avatar-sm" />
                </div>
              </th>
              <td>
                <div>
                  <h5 class="text-truncate font-size-14">
                    Wireless Headphone (Black)
                  </h5>
                  <p class="text-muted mb-0">$ 225 x 1</p>
                </div>
              </td>
              <td>$ 255</td>
            </tr>
            <tr>
              <th scope="row">
                <div>
                  <img src="/images/product/img-4.png" alt class="avatar-sm" />
                </div>
              </th>
              <td>
                <div>
                  <h5 class="text-truncate font-size-14">
                    Phone patterned cases
                  </h5>
                  <p class="text-muted mb-0">$ 145 x 1</p>
                </div>
              </td>
              <td>$ 145</td>
            </tr>
            <tr>
              <td colspan="2">
                <h6 class="m-0 text-end">Sub Total:</h6>
              </td>
              <td>$ 400</td>
            </tr>
            <tr>
              <td colspan="2">
                <h6 class="m-0 text-end">Shipping:</h6>
              </td>
              <td>Free</td>
            </tr>
            <tr>
              <td colspan="2">
                <h6 class="m-0 text-end">Total:</h6>
              </td>
              <td>$ 400</td>
            </tr>
          </tbody>
        </table>
      </div>
      <template v-slot:modal-footer>
        <b-button variant="secondary" @click="showModal = false"
          >Close</b-button
        >
      </template>
    </b-modal>
  </div>
  <!-- end table -->
</template>
