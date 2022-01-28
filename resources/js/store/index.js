import axios from "axios"; 
import { createStore } from "vuex";
axios.defaults.headers.post["Content-Type"] = "application/json";

export default createStore({
    state: {
        prestations: [],
    },
    mutations: {
        fillPrestations(state, prestations) {
            state.prestations = prestations;
        },
    },
    actions: {
        getPrestations({ commit }) {
            axios
                .get("api/prestation")
                .then((response) => commit("fillPrestations", response.data));
        },
    },
    getters: {
        prestations(state) {
            return state.prestations;
        },
    },
    modules: {},
});
