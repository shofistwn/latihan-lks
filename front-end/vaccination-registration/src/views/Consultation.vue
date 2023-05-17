<template>
  <div>
    <main>
      <!-- S: Header -->
      <header class="jumbotron">
        <div class="container">
          <h1 class="display-4">Request Consultation</h1>
        </div>
      </header>
      <!-- E: Header -->

      <div class="container">
        <form action="">
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <div class="d-flex align-items-center mb-3">
                  <label for="disease-history" class="mr-3 mb-0"
                    >Do you have disease history ?</label
                  >
                  <select class="form-control-sm" v-model="disease">
                    <option value="yes">Yes, I have</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <textarea
                  id="disease-history"
                  class="form-control"
                  cols="30"
                  rows="10"
                  placeholder="Describe your disease history"
                  :disabled="!isDisease"
                  v-model="data.disease"
                ></textarea>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <div class="d-flex align-items-center mb-3">
                  <label for="current-symptoms" class="mr-3 mb-0"
                    >Do you have symptoms now ?</label
                  >
                  <select class="form-control-sm" v-model="symptoms">
                    <option value="yes">Yes, I have</option>
                    <option value="no">No</option>
                  </select>
                </div>
                <textarea
                  id="current-symptoms"
                  class="form-control"
                  cols="30"
                  rows="10"
                  placeholder="Describe your current symptoms"
                  :disabled="!isSymptoms"
                  v-model="data.symptoms"
                ></textarea>
              </div>
            </div>
          </div>

          <button class="btn btn-primary" @click.prevent="requestConsultation">
            Send Request
          </button>
        </form>
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
      isDisease: false,
      isSymptoms: false,
      disease: "",
      symptoms: "",
      data: {
        disease: "",
        symptoms: "",
      },
    };
  },
  methods: {
    async requestConsultation() {
      const token = localStorage.getItem("token");
      await axios
        .post(
          "http://localhost:8000/api/v1/consultations",
          {
            disease_history: this.data.disease || null,
            current_symptoms: this.data.symptoms || null,
          },
          {
            params: {
              token: token,
            },
          }
        )
        .then((response) => {
          this.$router.push("/dashboard");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  watch: {
    disease() {
      const isTrue = this.disease;
      if (isTrue === "yes") {
        this.isDisease = true;
      } else {
        this.isDisease = false;
      }
    },
    symptoms() {
      const isTrue = this.symptoms;
      if (isTrue === "yes") {
        this.isSymptoms = true;
      } else {
        this.isSymptoms = false;
      }
    },
  },
};
</script>
