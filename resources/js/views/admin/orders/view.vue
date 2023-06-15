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
      cusromer_detail: [],
      order_detail: [],
      order_products_detail: [],
      status:"",
      title: "Order",
      items: [
        {
          text: "Dashboard",
          href: "/",
        },
        {
          text: "order",
          active: true,
        },
      ],
      sortBy: "age",
      sortDesc: false,
      fields: [
        { key: "title", label:"Product Name", sortable: true },
        { key: "cart_quantity", label:"Quantity", sortable: true },
        { key: "cart_product_price", label:"Product Price", sortable: true },
      ],
    };
  },
  mounted() {
    this.customerData();
    this.OrderProductData();
  },
  methods: {
    customerData() {
      axios
        .get("/api/orders/details/" + this.$route.params.id, {})
        .then((response) => {
          this.cusromer_detail = response.data.data;
          this.order_detail = response.data.order_data;
          console.log(this.cusromer_detail.id);
        })
        .catch((response) => {
          console.log("error");
        });
    },
    OrderProductData() {
      axios
        .get("/api/orders/order-product-details/" + this.$route.params.id, {})
        .then((response) => {
          this.order_products_detail = response.data.data;
          console.log(this.order_products_detail.id);
        })
        .catch((response) => {
          console.log("error");
        });
    },
    onFiltered(filteredItems) {
      // Trigger pagination to update the number of buttons/pages due to filtering
      this.totalRows = filteredItems.length;
      this.currentPage = 1;
    },
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
            <h2>OrderId - #{{this.$route.params.id}}</h2>
            <p><span>Date: </span>{{this.order_detail.create_dt}}</p>
            <hr>
            <div class="customer_details_sec">
              <h4>Customer Details</h4>
              <ul style="list-style: none;padding-left: 0px;font-style: italic;">
                <li v-if="this.cusromer_detail" style="text-transform: capitalize;"><strong>{{ this.cusromer_detail.username }}</strong></li>
                <li v-if="this.cusromer_detail.email">{{ this.cusromer_detail.email }}</li>
                <li v-if="this.cusromer_detail.phone_number">{{ this.cusromer_detail.phone_number }}</li>
                <li v-if="this.cusromer_detail.business_details">{{ this.cusromer_detail.business_details.address_one }}</li>
                <li v-if="this.cusromer_detail.business_details">{{ this.cusromer_detail.business_details.district.district_name }}</li>
              </ul>
            </div>
            <div class="customer_details_sec">
              <h4>Products Details</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Store Owner Name</th>
                    <th scope="col">Store Owner Email</th>
                    <th scope="col">Store Owner Phone No.</th>
                  </tr>
                </thead>
                <tbody v-for="product_data in order_products_detail">
                  <tr>
                    <td>
                    <h1 v-if="product_data.image"><img 
                        v-bind:src="
                          '/media/product-image/' +
                          product_data.image
                        "
                        width="120"
                      /></h1>
                       <h1 v-else><img 
                        v-bind:src="
                          '/media/product-image/dummy.png'
                        "
                        width="120"
                      /></h1>
                      </td>
                      
                    <td>{{product_data.title}}</td>
                    <td>{{product_data.cart_quantity}}</td>
                    <td>{{product_data.cart_product_price}}</td>
                    <td>{{product_data.username}}</td>
                    <td>{{product_data.email}}</td>
                    <td>{{product_data.phone_number}}</td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right" style="border:1px solid #eff2f7;"><strong>Total Price</strong>: <span style="float: right;">${{product_data.purchase_price}}</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end row -->
  </Layout>
</template>