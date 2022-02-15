import axios from "axios";

export const rappel = {
    state: {
        rappels: [],
    },
    mutations: {
        FILL_RAPPELS(state, rappels) {
            state.rappels = rappels;
        },
    },
    actions: {
        getRappels({ commit, getters }) {
            return axios
                .get("api/rappel", {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_RAPPELS", response.data);
                });
        },
    },
    getters: {
        rappels(state) {
            return state.rappels;
        },
    },
};
