<template>
  <div>
    <main>
      <!-- S: Header -->
      <header class="jumbotron">
        <div class="container">
          <h1 class="display-4">Dashboard</h1>
        </div>
      </header>
      <!-- E: Header -->

      <div class="container">
        <!-- S: Consultation Section -->
        <section class="consultation-section mb-5">
          <div class="section-header mb-3">
            <h4 class="section-title text-muted">My Consultation</h4>
          </div>
          <div class="row">
            <!-- S: Link to Request Consultation -->
            <div class="col-md-4">
              <div class="card card-default">
                <div class="card-header">
                  <h5 class="mb-0">Consultation</h5>
                </div>
                <div class="card-body">
                  <router-link to="/consultation">+ Request consultation</router-link>
                </div>
              </div>
            </div>
            <!-- E: Link to Request Consultation -->

            <!-- S: Society Consultation Box (Pending) -->
            <div class="col-md-4">
              <div class="card card-default">
                <div class="card-header border-0">
                  <h5 class="mb-0">Consultation</h5>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped mb-0">
                    <tr>
                      <th>Status</th>
                      <td><span class="badge badge-info">Pending</span></td>
                    </tr>
                    <tr>
                      <th>Disease History</th>
                      <td class="text-muted">-</td>
                    </tr>
                    <tr>
                      <th>Current Symptoms</th>
                      <td class="text-muted">flu and cough</td>
                    </tr>
                    <tr>
                      <th>Doctor Name</th>
                      <td class="text-muted">-</td>
                    </tr>
                    <tr>
                      <th>Doctor Notes</th>
                      <td class="text-muted">-</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- E: Society Consultation Box (Pending) -->

            <!-- S: Society Consultation Box (Accepted) -->
            <div class="col-md-4">
              <div class="card card-default">
                <div class="card-header border-0">
                  <h5 class="mb-0">Consultation</h5>
                </div>
                <div class="card-body p-0">
                  <table class="table table-striped mb-0">
                    <tr>
                      <th>Status</th>
                      <td><span class="badge badge-primary">Accepted</span></td>
                    </tr>
                    <tr>
                      <th>Disease History</th>
                      <td class="text-muted">diabetes</td>
                    </tr>
                    <tr>
                      <th>Current Symptoms</th>
                      <td class="text-muted">flu</td>
                    </tr>
                    <tr>
                      <th>Doctor Name</th>
                      <td class="text-muted">Dr. Ratna Pradipta</td>
                    </tr>
                    <tr>
                      <th>Doctor Notes</th>
                      <td class="text-muted">ok</td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <!-- E: Society Consultation Box (Accepted) -->
          </div>
        </section>
        <!-- E: Consultation Section -->

        <!-- S: List Vaccination Section -->
        <section class="consultation-section mb-5">
          <div class="section-header mb-3">
            <h4 class="section-title text-muted">My Vaccinations</h4>
          </div>
          <div class="section-body">
            <div class="row mb-4">
              <!-- S: First Vaccination info -->
              <div class="col-md-12">
                <div class="alert alert-warning">
                  Your consultation must be approved by doctor to get the
                  vaccine.
                </div>
              </div>
              <!-- E: First Vaccination info -->

              <!-- S: Link to Register First Vaccination -->
              <div class="col-md-4">
                <div class="card card-default">
                  <div class="card-header border-0">
                    <h5 class="mb-0">First Vaccination</h5>
                  </div>
                  <div class="card-body">
                    <router-link to="/vaccination-spot">+ Register vaccination</router-link>
                  </div>
                </div>
              </div>
              <!-- E: Link to Register First Vaccination -->

              <!-- S: First Vaccination Box (Registered) -->
              <div class="col-md-4">
                <div class="card card-default">
                  <div class="card-header border-0">
                    <h5 class="mb-0">First Vaccination</h5>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                      <tr>
                        <th>Status</th>
                        <td class="text-muted">
                          <span class="badge badge-info">Registered</span>
                        </td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td class="text-muted">October 27, 2021</td>
                      </tr>
                      <tr>
                        <th>Spot</th>
                        <td class="text-muted">Usamah Hospital</td>
                      </tr>
                      <tr>
                        <th>Vaccine</th>
                        <td class="text-muted">-</td>
                      </tr>
                      <tr>
                        <th>Vaccinator</th>
                        <td class="text-muted">-</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- S: First Vaccination Box (Registered) -->

              <!-- S: First Vaccination Box (Done) -->
              <div class="col-md-4">
                <div class="card card-default">
                  <div class="card-header border-0">
                    <h5 class="mb-0">First Vaccination</h5>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                      <tr>
                        <th>Status</th>
                        <td class="text-muted">
                          <span class="badge badge-primary">Vaccinated</span>
                        </td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td class="text-muted">October 27, 2021</td>
                      </tr>
                      <tr>
                        <th>Spot</th>
                        <td class="text-muted">Usamah Hospital</td>
                      </tr>
                      <tr>
                        <th>Vaccine</th>
                        <td class="text-muted">Sinovac</td>
                      </tr>
                      <tr>
                        <th>Vaccinator</th>
                        <td class="text-muted">Dr. Raina Pradipta</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- S: First Vaccination Box (Done) -->
            </div>

            <div class="row">
              <!-- S: Link to Register Second Vaccination -->
              <div class="col-md-4">
                <div class="card card-default">
                  <div class="card-header border-0">
                    <h5 class="mb-0">Second Vaccination</h5>
                  </div>
                  <div class="card-body">
                    <a href="">+ Register vaccination</a>
                  </div>
                </div>
              </div>
              <!-- E: Link to Register Second Vaccination -->

              <!-- S: Second Vaccination Box (Registered) -->
              <div class="col-md-4">
                <div class="card card-default">
                  <div class="card-header border-0">
                    <h5 class="mb-0">Second Vaccination</h5>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                      <tr>
                        <th>Status</th>
                        <td class="text-muted">
                          <span class="badge badge-info">Registered</span>
                        </td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td class="text-muted">October 27, 2021</td>
                      </tr>
                      <tr>
                        <th>Spot</th>
                        <td class="text-muted">Usamah Hospital</td>
                      </tr>
                      <tr>
                        <th>Vaccine</th>
                        <td class="text-muted">-</td>
                      </tr>
                      <tr>
                        <th>Vaccinator</th>
                        <td class="text-muted">-</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- S: Second Vaccination Box (Registered) -->

              <!-- S: Second Vaccination Box (Done) -->
              <div class="col-md-4">
                <div class="card card-default">
                  <div class="card-header border-0">
                    <h5 class="mb-0">Second Vaccination</h5>
                  </div>
                  <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                      <tr>
                        <th>Status</th>
                        <td class="text-muted">
                          <span class="badge badge-primary">Vaccinated</span>
                        </td>
                      </tr>
                      <tr>
                        <th>Date</th>
                        <td class="text-muted">October 27, 2021</td>
                      </tr>
                      <tr>
                        <th>Spot</th>
                        <td class="text-muted">Usamah Hospital</td>
                      </tr>
                      <tr>
                        <th>Vaccine</th>
                        <td class="text-muted">Sinovac</td>
                      </tr>
                      <tr>
                        <th>Vaccinator</th>
                        <td class="text-muted">Dr. Raina Pradipta</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <!-- S: Second Vaccination Box (Done) -->
            </div>
          </div>
        </section>
        <!-- E: List Vaccination Section -->
      </div>
    </main>

    <!-- S: Footer -->
    <footer>
      <div class="container">
        <div class="text-center py-4 text-muted">
          Copyright &copy; 2021 - Web Tech ID
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  computed: {
    isLoggedIn: function () {
      return this.$store.getters.isLoggedIn;
    },
  },
  methods: {
    logout: function (params) {
      this.$store.dispatch("LOGOUT").then(() => {
        this.$router.push("/");
      });
    },
  },
};
</script>
