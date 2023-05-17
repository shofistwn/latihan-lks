<template>
  <div>
    <main>
      <!-- S: Header -->
      <header class="jumbotron">
        <div
          class="container d-flex justify-content-between align-items-center"
        >
          <div>
            <h1 class="display-4">{{ spot }}</h1>
            <span class="text-muted"
              >Jln. HOS. Cjokroaminoto (Pasirkaliki) No. 900, DKI Jakarta</span
            >
          </div>
          <a href="" class="btn btn-primary">Register vaccination</a>
        </div>
      </header>
      <!-- E: Header -->

      <div class="container">
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="form-group">
              <label for="vaccination-date">Select vaccination date</label>
              <input type="date" class="form-control" id="vaccination-date" />
            </div>
          </div>
        </div>

        <div class="row mb-5">
          <!-- S: Session 1 -->
          <div class="col-md-4">
            <div class="card card-default">
              <div class="card-body">
                <div
                  class="d-flex align-items-center justify-content-between mb-3"
                >
                  <h4>Session 1</h4>
                  <span class="text-muted">09:00 - 11:00</span>
                </div>
                <div>
                  <div class="row">
                    <div class="col-4 mb-4">
                      <div class="slot filled">#1</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot filled">#2</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot filled">#3</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot filled">#4</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot filled">#5</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- E: Session 1 -->

          <!-- S: Session 2 -->
          <div class="col-md-4">
            <div class="card card-default">
              <div class="card-body">
                <div
                  class="d-flex align-items-center justify-content-between mb-3"
                >
                  <h4>Session 2</h4>
                  <span class="text-muted">13:00 - 15:00</span>
                </div>
                <div>
                  <div class="row">
                    <div class="col-4 mb-4">
                      <div class="slot filled">#6</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot filled">#7</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot bg-primary text-white">#8</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot">#9</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot">#10</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- E: Session 2 -->

          <!-- S: Session 3 -->
          <div class="col-md-4">
            <div class="card card-default">
              <div class="card-body">
                <div
                  class="d-flex align-items-center justify-content-between mb-3"
                >
                  <h4>Session 3</h4>
                  <span class="text-muted">15:00 - 17:00</span>
                </div>
                <div>
                  <div class="row">
                    <div class="col-4 mb-4">
                      <div class="slot">#11</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot">#12</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot">#13</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot">#14</div>
                    </div>
                    <div class="col-4 mb-4">
                      <div class="slot">#15</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- E: Session 3 -->
        </div>
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
    <!-- E: Footer -->
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      spot: "",
    };
  },
  mounted() {
    this.getById();
  },
  methods: {
    async getById() {
      const token = localStorage.getItem("token");
      await axios
        .get(
          `http://localhost:8000/api/v1/spots/${this.$route.params.spot_id}`,
          {
            params: {
              token: token,
              date: "2021-09-01",
            },
          }
        )
        .then((response) => {
          const data = response.data.spot;
          this.spot = data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
