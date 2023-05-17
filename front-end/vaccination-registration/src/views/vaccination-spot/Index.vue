<template>
  <div>
    <main>
      <!-- S: Header -->
      <header class="jumbotron">
        <div class="container">
          <h1 class="display-4">First Vaccination</h1>
        </div>
      </header>
      <!-- E: Header -->

      <div class="container mb-5">
        <div class="section-header mb-4">
          <h4 class="section-title text-muted font-weight-normal">
            List Vaccination Spots in Central Jakarta
          </h4>
        </div>

        <div class="section-body" v-for="(spot, index) of spots" :key="index">
          <article class="spot unavailable">
            <div class="row">
              <div class="col-5">
                <h5 class="text-primary">{{ spot.name }}</h5>
                <span class="text-muted">{{ spot.address }}</span>
              </div>
              <div class="col-4">
                <h5>Available vaccines</h5>
                <span class="text-muted">{{ spot.available_vaccines }}</span>
              </div>
              <div class="col-3">
                <h5>Serve</h5>
                <span class="text-muted" v-if="spot.serve == 1">
                  Only second vaccination
                </span>
                <span class="text-muted" v-if="spot.serve == 2">
                  Only first vaccination
                </span>
                <span class="text-muted" v-else> Both vaccination </span>
              </div>
            </div>
          </article>
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
      spots: "",
    };
  },
  mounted() {
    this.getByRegional();
  },
  methods: {
    async getByRegional() {
      const token = localStorage.getItem("token");
      await axios
        .get("http://localhost:8000/api/v1/spots", {
          params: {
            token: token,
          },
        })
        .then((response) => {
          const data = response.data.spots;
          this.spots = data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
