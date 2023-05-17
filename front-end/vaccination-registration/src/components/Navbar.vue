<template>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#">Vaccination Platform</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" v-if="isLoggedIn">
            <a class="nav-link" href="#" @click="logout"
              >{{ user.name }} Logout</a
            >
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  computed: {
    isLoggedIn: function () {
      return this.$store.getters.isLoggedIn;
    },
    user: function () {
      const user = localStorage.getItem("user");
      return JSON.parse(user);
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
