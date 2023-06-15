<script>
/**
 * Profile component
 */
export default {};
</script>
<template>
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
                <h5 class="font-size-15">23</h5>
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
                  <div class="avatar-xs mx-auto mb-3">
                    <span
                      class="avatar-title rounded-circle bg-primary font-size-16"
                    >
                      <i class="mdi mdi-facebook text-white"></i>
                    </span>
                  </div>
                  <h5 class="font-size-14">Facebook</h5>
                 
                </div>
              </div>
              <div class="col-sm-4">
                <div class="social-source text-center mt-3">
                  <div class="avatar-xs mx-auto mb-3">
                    <span
                      class="avatar-title rounded-circle bg-info font-size-16"
                    >
                      <i class="mdi mdi-twitter text-white"></i>
                    </span>
                  </div>
                  <h5 class="font-size-14">Twitter</h5>
                 
                </div>
              </div>
              <div class="col-sm-4">
                <div class="social-source text-center mt-3">
                  <div class="avatar-xs mx-auto mb-3">
                    <span
                      class="avatar-title rounded-circle bg-pink font-size-16"
                    >
                      <i class="mdi mdi-instagram text-white"></i>
                    </span>
                  </div>
                  <h5 class="font-size-14">Instagram</h5>
                 
                </div>
              </div>
            </div>



      </div>
    </div>
    <!-- end card-body -->
  </div>
  <!-- end card -->
</template>
