import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state: {
    success: "",
    token: localStorage.getItem("token") || "",
    user: "",
  },
  mutations: {
    AUTH_REQUEST(state) {
      state.status = "loading";
    },
    AUTH_SUCCESS(state, token, user) {
      state.status = "success";
      state.token = token;
      state.user = user;
    },
    AUTH_ERROR(state) {
      state.status = "error";
    },
    AUTH_LOGOUT(state) {
      state.status = "";
      state.token = "";
    },
  },
  actions: {
    LOGIN({ commit }, user) {
      return new Promise((resolve, reject) => {
        commit("AUTH_REQUEST");
        axios
          .post("http://localhost:8000/api/v1/auth/login", {
            id_card_number: user.id_card_number,
            password: user.password,
          })
          .then((response) => {
            const data = response.data;
            const token = data.token;
            const user = {
              name: data.name,
              born_date: data.born_date,
              gender: data.gender,
              address: data.address,
              regional: data.regional,
            };

            localStorage.setItem("token", token);
            localStorage.setItem("user", JSON.stringify(user));
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
            commit("AUTH_SUCCESS", token, user);
            resolve(response);
          })
          .catch((err) => {
            commit("AUTH_ERROR");
            localStorage.removeItem("token");
            reject(err);
          });
      });
    },
    LOGOUT({ commit }, user) {
      return new Promise((resolve, reject) => {
        commit("AUTH_LOGOUT");
        localStorage.removeItem("token");
        localStorage.removeItem("user");
        delete axios.defaults.headers.common["Authorization"];
        resolve();
      });
    },
  },
  getters: {
    isLoggedIn: (state) => !!state.token,
    authStatus: (state) => state.status,
  },
  modules: {},
});
