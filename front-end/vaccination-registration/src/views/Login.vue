<template>
  <main>
    <!-- S: Header -->
    <header class="jumbotron">
      <div class="container text-center">
        <h1 class="display-4">Vaccination Platform</h1>
      </div>
    </header>
    <!-- E: Header -->

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form class="card card-default">
            <div class="card-header">
              <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
              <div class="form-group row align-items-center">
                <div class="col-4 text-right">ID Card Number</div>
                <div class="col-8">
                  <input
                    type="text"
                    class="form-control"
                    v-model="id_card_number"
                  />
                </div>
              </div>
              <div class="form-group row align-items-center">
                <div class="col-4 text-right">Password</div>
                <div class="col-8">
                  <input
                    type="password"
                    class="form-control"
                    v-model="password"
                  />
                </div>
              </div>
              <div class="form-group row align-items-center mt-4">
                <div class="col-4"></div>
                <div class="col-8">
                  <button class="btn btn-primary" @click.prevent="login">
                    Login
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      id_card_number: "",
      password: "",
    };
  },
  methods: {
    login() {
      let id_card_number = this.id_card_number;
      let password = this.password;
      this.$store
        .dispatch("LOGIN", {
          id_card_number,
          password, 
        })
        .then(() => {
          console.log(this.$router.push("/dashboard"));
          this.$router.push("/dashboard");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
