
      

  <div class="col-sm-8">
                <div class="text-sm-end">
                  
                    <b-modal
                    v-model="showModal"
                    title="Add New Customer"
                    title-class="text-black font-18"
                    body-class="p-3"
                    hide-footer
                  >
                    <form @submit.prevent="handleSubmit">
                      <div class="row">
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="name">Event Name</label>
                            <input
                              id="name"
                              v-model="customers.username"
                              type="text"
                              class="form-control"
                              placeholder="Insert username"
                              :class="{
                                'is-invalid':
                                  submitted && $v.customers.username.$error,
                              }"
                            />
                            <div
                              v-if="
                                submitted && !$v.customers.username.required
                              "
                              class="invalid-feedback"
                            >
                              This value is required.
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input
                              id="phone"
                              v-model="customers.phone"
                              type="text"
                              class="form-control"
                              placeholder="Insert phone"
                              :class="{
                                'is-invalid':
                                  submitted && $v.customers.phone.$error,
                              }"
                            />
                            <div
                              v-if="submitted && !$v.customers.phone.required"
                              class="invalid-feedback"
                            >
                              This value is required.
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="email">Email</label>
                            <input
                              id="email"
                              v-model="customers.email"
                              type="email"
                              class="form-control"
                              placeholder="Insert email"
                              :class="{
                                'is-invalid':
                                  submitted && $v.customers.email.$error,
                              }"
                            />
                            <div
                              v-if="submitted && !$v.customers.email.required"
                              class="invalid-feedback"
                            >
                              This value is required.
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="address">Address</label>
                            <input
                              id="address"
                              v-model="customers.address"
                              type="text"
                              class="form-control"
                              placeholder="Insert address"
                              :class="{
                                'is-invalid':
                                  submitted && $v.customers.address.$error,
                              }"
                            />
                            <div
                              v-if="submitted && !$v.customers.address.required"
                              class="invalid-feedback"
                            >
                              This value is required.
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="mb-3">
                            <label for="balance">Balance</label>
                            <input
                              id="balance"
                              v-model="customers.balance"
                              type="text"
                              class="form-control"
                              placeholder="Insert balance"
                              :class="{
                                'is-invalid':
                                  submitted && $v.customers.balance.$error,
                              }"
                            />
                            <div
                              v-if="submitted && !$v.customers.balance.required"
                              class="invalid-feedback"
                            >
                              This value is required.
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="text-end pt-5 mt-3">
                        <b-button variant="light" @click="showModal = false">Close</b-button>
                        <b-button type="submit" variant="success" class="ms-1"
                          >Create event</b-button
                        >
                      </div>
                    </form>
                  </b-modal>
                </div>
              </div>
              