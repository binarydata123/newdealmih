<script>
import Layout from "../../layouts/main";
import Profile from "../../components/widgets/profile";
import Earning from "../../components/widgets/earning";
import Stat from "../../components/widgets/stat";
import Transaction from "../../components/widgets/transaction";
import Emailsent from "../../components/widgets/emailsent";

/**
 * Dashboard Component
 */
export default {
  components: { Layout, Profile, Stat, Transaction, Earning, Emailsent },
  data() {
    return {
      title: "Dashboard",
      showModal: false,
      statData: [
        {
          icon: "bx bx-user-circle",
          title: "Users ",
          value: "1,235",
        },
        {
          icon: "bx bx-task",
          title: "Ads",
          value: "450",
        },
        {
          icon: "bx bx-phone",
          title: "Contacts",
          value: "35",
        },
      ],
      transactions: [
        {
          id: "#SK2540",
          name: "Neal Matthews",
          date: "07 Oct, 2019",
          total: "$400",
          status: "Paid",
          payment: ["fa-cc-mastercard", "Mastercard"],
          index: 1,
        },
        {
          id: "#SK2541",
          name: "Jamal Burnett",
          date: "07 Oct, 2019",
          total: "$380",
          status: "Chargeback",
          payment: ["fa-cc-visa", "Visa"],
          index: 2,
        },
        {
          id: "#SK2542",
          name: "Juan Mitchell",
          date: "06 Oct, 2019",
          total: "$384",
          status: "Paid",
          payment: ["fab fa-cc-paypal", "Paypal"],
          index: 3,
        },
        {
          id: "#SK2543",
          name: "Barry Dick",
          date: "05 Oct, 2019",
          total: "$412",
          status: "Paid",
          payment: ["fa-cc-mastercard", "Mastercard"],
          index: 4,
        },
        {
          id: "#SK2544",
          name: "Ronald Taylor",
          date: "04 Oct, 2019",
          total: "$404",
          status: "Refund",
          payment: ["fa-cc-visa", "Visa"],
          index: 5,
        },
        {
          id: "#SK2545",
          name: "Jacob Hunter",
          date: "04 Oct, 2019",
          total: "$392",
          status: "Paid",
          payment: ["fab fa-cc-paypal", "Paypal"],
          index: 6,
        },
      ],
    };
  },
  mounted() {
    setTimeout(() => {
      this.showModal = true;
    }, 1500);
  },
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
              <li class="breadcrumb-item active">Welcome to Yarddiant Classifieds</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- end page title -->
    <div class="row">
      <div class="col-xl-4">
        <Profile />
         <div class="card">
            <div class="card-body">
              <div class="d-flex flex-wrap">
                <h5 class="card-title mb-3 me-2">Sales</h5>
              
              </div>

              <div class="d-flex flex-wrap">
                <div>
                  <p class="text-muted mb-1">Total Sales</p>
                  <h4 class="mb-3">12,00</h4>
                  
                </div>
                <div class="ms-auto align-self-end">
                  <i class="bx bx-group display-4 text-light"></i>
                </div>
              </div>
            </div>
          </div>

           <div class="card">
            <div class="card-body">
              <div class="d-flex flex-wrap">
                <h5 class="card-title mb-3 me-2">Auction</h5>
              
              </div>

              <div class="d-flex flex-wrap">
                <div>
                  <p class="text-muted mb-1">Total Auction</p>
                  <h4 class="mb-3">10,512</h4>
                  
                </div>
                <div class="ms-auto align-self-end">
                  <i class="bx bx-group display-4 text-light"></i>
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
      <div class="col-xl-6">
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
                      Everyone realizes why a new common language would be
                      desirable...
                      <a href="javascript: void(0);">Read more</a>
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
              <li class="event-list">
                <div class="event-timeline-dot">
                  <i class="bx bx-right-arrow-circle font-size-18"></i>
                </div>
                <div class="media">
                  <div class="me-3">
                    <h5 class="font-size-14">
                      12 Nov
                      <i
                        class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"
                      ></i>
                    </h5>
                  </div>
                  <div class="media-body">
                    <div>Responded to need “In-Kind Opportunity”</div>
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
      <!-- end col -->
      <!-- <div class="col-xl-6">
        <div class="card">
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
        </div>
      </div> -->
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title mb-4">Recent Ads</h4>
            <!-- Transactions table -->
            <Transaction :transactions="transactions" />
          </div>
        </div>
      </div>
      <!-- end col -->
    </div>
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
