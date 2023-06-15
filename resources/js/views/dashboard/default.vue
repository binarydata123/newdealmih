<script>
import Layout from "../../layouts/main";
import Profile from "../../components/widgets/profile";
import Earning from "../../components/widgets/earning";
import Stat from "../../components/widgets/stat";
import Transaction from "../../components/widgets/transaction";
import Emailsent from "../../components/widgets/emailsent";
import axios from 'axios';

/**
 * Dashboard Component
 */
export default {
  components: { Layout, Profile, Stat, Transaction, Earning, Emailsent },
  data() {
    return {
      title: "Dashboard",
      showModal: false,
      categoryCount : '',
      featureCount :'',
      statData: [],
      transactions: [
        // {
        //   id: "#SK2540",
        //   name: "Neal Matthews",
        //   date: "07 Oct, 2019",
        //   total: "$400",
        //   status: "Paid",
        //   payment: ["fa-cc-mastercard", "Mastercard"],
        //   index: 1,
        // },
        // {
        //   id: "#SK2541",
        //   name: "Jamal Burnett",
        //   date: "07 Oct, 2019",
        //   total: "$380",
        //   status: "Chargeback",
        //   payment: ["fa-cc-visa", "Visa"],
        //   index: 2,
        // },
        // {
        //   id: "#SK2542",
        //   name: "Juan Mitchell",
        //   date: "06 Oct, 2019",
        //   total: "$384",
        //   status: "Paid",
        //   payment: ["fab fa-cc-paypal", "Paypal"],
        //   index: 3,
        // },
        // {
        //   id: "#SK2543",
        //   name: "Barry Dick",
        //   date: "05 Oct, 2019",
        //   total: "$412",
        //   status: "Paid",
        //   payment: ["fa-cc-mastercard", "Mastercard"],
        //   index: 4,
        // },
        // {
        //   id: "#SK2544",
        //   name: "Ronald Taylor",
        //   date: "04 Oct, 2019",
        //   total: "$404",
        //   status: "Refund",
        //   payment: ["fa-cc-visa", "Visa"],
        //   index: 5,
        // },
        // {
        //   id: "#SK2545",
        //   name: "Jacob Hunter",
        //   date: "04 Oct, 2019",
        //   total: "$392",
        //   status: "Paid",
        //   payment: ["fab fa-cc-paypal", "Paypal"],
        //   index: 6,
        // },
      ],
       walletData: [
                {
                    title: "Payment Analysis",
                    text: "Total Amount",
                    amount: " रू 6134.39",
                    subamount: "+ 0.0012.23 ( 0.2 % )",
                    income: "रू 2632.46",
                    expense: "रू 924.38",
                    chartSeries: [76, 67, 61],
                    balancelist: [
                        {
                            text: "Total",
                            coin: "4.5701 ETH",
                            amount: " रू 1123.64"
                        },
                        {
                            text: "Sales",
                            coin: "0.4412 BTC",
                            amount: " रू 4025.32"
                        },
                        {
                            text: "Commision",
                            coin: "35.3811 LTC",
                            amount: " रू 2263.09"
                        }
                    ]
                }
            ],
            chartOptions: {
                chart: {
                    height: 300,
                    type: "radialBar"
                },
                plotOptions: {
                    radialBar: {
                        offsetY: 0,
                        startAngle: 0,
                        endAngle: 270,
                        hollow: {
                            margin: 5,
                            size: "35%",
                            background: "transparent",
                            image: undefined
                        },
                        track: {
                            show: true,
                            startAngle: undefined,
                            endAngle: undefined,
                            background: "#f2f2f2",
                            strokeWidth: "97%",
                            opacity: 1,
                            margin: 12,
                            dropShadow: {
                                enabled: false,
                                top: 0,
                                left: 0,
                                blur: 3,
                                opacity: 0.5
                            }
                        },
                        dataLabels: {
                            name: {
                                show: true,
                                fontSize: "16px",
                                fontWeight: 600,
                                offsetY: -10
                            },
                            value: {
                                show: true,
                                fontSize: "14px",
                                offsetY: 4,
                                formatter: function(val) {
                                    return val + "%";
                                }
                            },
                            total: {
                                show: true,
                                label: "Grand Total",
                                color: "#373d3f",
                                fontSize: "16px",
                                fontFamily: undefined,
                                fontWeight: 600,
                                formatter: function(w) {
                                    return (
                                        w.globals.seriesTotals.reduce(function(
                                            a,
                                            b
                                        ) {
                                            return a + b;
                                        },
                                        0) + "%"
                                    );
                                }
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: "round"
                },  
                colors: ["#3452e1", "#f1b44c", "#50a5f1"],
                labels: ["Total", "Sales", "Commision"],
                legend: {
                    show: false
                }
            },
    };
  },
  mounted() {
    this.dashboardCounts()
    this.transactionsList();
    // setTimeout(() => {
    //   this.showModal = true;
    // }, 1500);

    
  },
  methods:
  {
    dashboardCounts()
    {
      axios.get('/api/dashboard').then((response)=> {
        console.log(response)
        this.statData = response.data.count;
        this.categoryCount = response.data.categoryCount;
        this.featureCount = response.data.featureCount;
        this.totalamount = response.data.totalamount;
        this.totalsales = response.data.totalsales;
        this.totalauction = response.data.totalauction;
       
      }).catch((response) => {
        console.log('error');
      })
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
          <h4 class="mb-0 font-size-18">Dashboard</h4>

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
      <div class="col-xl-4">
        <div class="card overflow-hidden">
    <div class="bg-soft bg-primary">
      <div class="row">
        <div class="col-7">
          <div class="text-primary p-3">
            <h5 class="text-primary">Welcome Back !</h5>
            <!-- <p>Yarddiant Classifieds</p> -->
          </div>
        </div>
        <div class="col-5 align-self-end">
          <img src="/images/profile-img.png" alt class="img-fluid" />
        </div>
      </div>
    </div>
    <div class="card-body pt-0">
      <div class="row">
        <div class="col-sm-4">
          <div class="avatar-md profile-user-wid">
            <img src="/images/users/dealmih.png" alt class="img-thumbnail rounded-circle" />
          </div>
          <!-- <h5 class="font-size-15 text-truncate">John Doe</h5>
          <p class="text-muted mb-0 text-truncate mt-0">Admin</p> -->
        </div>

        <div class="col-sm-8">
          <div class="pt-4">
            <div class="row">
              <div class="col-6">
                <h5 class="font-size-15">{{categoryCount}}</h5>
                <p class="text-muted mb-0">Categories</p>
              </div>
              <div class="col-6">
                <h5 class="font-size-15">{{featureCount}}</h5>
                <p class="text-muted mb-0">Features</p>
              </div>
            </div>
            <!-- <div class="mt-2">
              <a href class="btn btn-primary btn-sm">
                View Profile
                <i class="mdi mdi-arrow-right ms-1"></i> 
              </a>
            </div> -->
          </div>
        </div>

          <div class="row mt-2">
              <div class="col-sm-4">
                <div class="social-source text-center mt-3">
                  <a href="https://www.facebook.com/dealmih/" target="_blank">
                  <div class="avatar-xs mx-auto mb-3">
                    <span
                      class="avatar-title rounded-circle bg-primary font-size-16"
                    >
                      <i class="mdi mdi-facebook text-white"></i>
                    </span>
                  </div>
                  <h5 class="font-size-14">Facebook</h5></a>
                 
                </div>
              </div>
              <div class="col-sm-4">
                <div class="social-source text-center mt-3"> 
                  <a href="https://twitter.com/Dealmih_com/" target="_blank">
                  <div class="avatar-xs mx-auto mb-3">
                    <span
                      class="avatar-title rounded-circle bg-info font-size-16"
                    >
                      <i class="mdi mdi-twitter text-white"></i>
                    </span>
                  </div>
                  <h5 class="font-size-14">Twitter</h5></a>
                 
                </div>
              </div>

               <div class="col-sm-4">
                <div class="social-source text-center mt-3">
                  <a href="https://www.instagram.com/dealmih_com/" target="_blank">
                  <div class="avatar-xs mx-auto mb-3">
                    <span
                      class="avatar-title rounded-circle bg-pink font-size-16"
                    >
                      <i class="mdi mdi-instagram text-white"></i>
                    </span>
                  </div>
                  <h5 class="font-size-14">Instagram</h5></a>
                 
                </div>
              </div>

              
            </div>



      </div>
    </div>
    <!-- end card-body -->
  </div>
        <!-- <Profile /> -->
         <div class="card">
            <div class="card-body np">
              <div class="d-flex flex-wrap">
                <h5 class="card-title me-2">Sales</h5>
              
              </div>

              <div class="d-flex flex-wrap">
                <div>
                  <p class="text-muted mb-1">Total Sales</p>
                  <h4 class="">{{totalsales}}</h4>
                  
                </div>
                <div class="ms-auto align-self-end">
                  <i class="bx bx-cart display-4 text-light"></i>
                </div>
              </div>
            </div>
          </div>

           <div class="card">
            <div class="card-body np">
              <div class="d-flex flex-wrap">
                <h5 class="card-title me-2">Auction</h5>
              
              </div>

              <div class="d-flex flex-wrap">
                <div>
                  <p class="text-muted mb-1">Total Auction</p>
                  <h4 class="">{{totalauction}}</h4>
                  
                </div>
                <div class="ms-auto align-self-end">
                  <i class="bx bx-tag display-4 text-light"></i>
                </div>
              </div>
            </div>
          </div>
        <!-- <Earning /> -->
      </div>
      <!-- end col -->
      <div class="col-xl-8">
        <div class="row">
          <div v-for="stat of statData" :key="stat.icon" class="col-md-4">
            <Stat :icon="stat.icon" :title="stat.title" :value="stat.value" />
          </div>
        </div>

        <!-- Email sent -->
        <Emailsent />
      </div>
    </div>
    <!-- end row -->

    <div class="row">
    
      <!-- end col -->
     
      <!-- end col -->
    
         <div class="row">
            <div class="col-xl-8">
                <div
                    class="card"
                    v-for="(data, index) of walletData"
                    :key="index"
                >
                    <div class="card-body">
                        
                        <h4 class="card-title mb-3">{{ data.title }}</h4>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-4">
                                    <p>{{ data.text }}</p>
                                    <h4>{{ totalamount }}</h4>

                                    <p class="text-muted mb-4">
                                        <!-- {{ data.subamount }} -->
                                        <i
                                            class="mdi mdi-arrow-up ms-1 text-success"
                                        ></i>
                                    </p>

                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <p class="mb-2">Sales</p>
                                                <h5>{{ data.income }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p class="mb-2">Commision</p>
                                                <h5>{{ data.expense }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <a
                                            href="#"
                                            class="btn btn-primary btn-sm"
                                            >View more
                                            <i
                                                class="mdi mdi-arrow-right ms-1"
                                            ></i
                                        ></a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-8">
                                <div>
                                   
                                </div>
                            </div>

                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card">
               

          <div class="card-body">
            <h4 class="card-title mb-5">Notifications</h4>
            <ul class="verti-timeline list-unstyled">
              <li class="event-list">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle font-size-18"></i>
                </div>
                <div class="media">
                  <div class="me-3">
                    <h5 class="font-size-14">
                      22 Nov
                      <i
                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"
                      ></i>
                    </h5>
                  </div>
                  <div class="media-body">
                    <div>Responded to need “Volunteer Activities</div>
                  </div>
                </div>
              </li>
              <li class="event-list">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle font-size-18"></i>
                </div>
                <div class="media">
                  <div class="me-3">
                    <h5 class="font-size-14">
                      17 Nov
                      <i
                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"
                      ></i>
                    </h5>
                  </div>
                  <div class="media-body">
                    <div>
                      Everyone realizes why a new common 
                    
                    </div>
                  </div>
                </div>
              </li>
              <li class="event-list active">
                <div class="event-timeline-dot">
                  <i
                    class="bx bxs-right-arrow-circle font-size-18 bx-fade-right"
                  ></i>
                </div>
                <div class="media">
                  <div class="me-3">
                    <h5 class="font-size-14">
                      15 Nov
                      <i
                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"
                      ></i>
                    </h5>
                  </div>
                  <div class="media-body">
                    <div>Joined the group “Boardsmanship Forum”</div>
                  </div>
                </div>
              </li>
           
            </ul>
            <div class="text-center mt-4">
              <a href="javascript: void(0);" class="btn btn-primary btn-sm"
                >Load More</a
              >
            </div>
          </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Top Cities Selling Product</h4>

            <div class="text-center">
              <div class="mb-4">
                <i class="bx bx-map-pin text-primary display-4"></i>
              </div>
              <h3>1,456</h3>
              <p>San Francisco</p>
            </div>

            <div class="table-responsive mt-4">
              <table class="table table-centered">
                <tbody>
                  <tr>
                    <td style="width: 140px">
                      <p class="mb-0">San Francisco</p>
                    </td>
                    <td style="width: 120px">
                      <h5 class="mb-0">1,456</h5>
                    </td>
                    <td>
                      <b-progress
                        :value="94"
                        variant="primary"
                        height="5px"
                      ></b-progress>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="mb-0">Los Angeles</p>
                    </td>
                    <td>
                      <h5 class="mb-0">1,123</h5>
                    </td>
                    <td>
                      <b-progress
                        :value="82"
                        variant="success"
                        height="5px"
                      ></b-progress>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <p class="mb-0">San Diego</p>
                    </td>
                    <td>
                      <h5 class="mb-0">1,026</h5>
                    </td>
                    <td>
                      <b-progress
                        :value="70"
                        variant="warning"
                        height="5px"
                      ></b-progress>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div> -->
  
      <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->
    <!-- <b-modal v-model="showModal" hide-footer centered header-class="border-0">
      <div class="text-center mb-4">
        <div class="avatar-md mx-auto mb-4">
          <div class="avatar-title bg-light rounded-circle text-primary h1">
            <i class="mdi mdi-email-open"></i>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-xl-10">
            <h4 class="text-primary">Subscribe !</h4>
            <p class="text-muted font-size-14 mb-4">
              Subscribe our newletter and get notification to stay update.
            </p>

            <div class="input-group bg-light rounded">
              <input
                type="email"
                class="form-control bg-transparent border-0"
                placeholder="Enter Email address"
                aria-label="Recipient's username"
                aria-describedby="button-addon2"
              />

              <button class="btn btn-primary" type="button" id="button-addon2">
                <i class="bx bxs-paper-plane"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </b-modal> -->
  </Layout>
</template>
