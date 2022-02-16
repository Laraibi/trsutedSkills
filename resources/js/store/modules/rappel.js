import axios from "axios";

export const rappel = {
    state: {
        rappels: [],
        searchedRappels: [],
    },
    mutations: {
        FILL_RAPPELS(state, rappels) {
            state.rappels = rappels;
        },
        FILL_SR_RAPPELS(state, rappels) {
            state.searchedRappels = rappels;
        },
        FILL_PUSH_RAPPEL(state, rappel) {
            state.rappels.push(rappel);
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
        searchRappels({ commit, getters }, query) {
            return axios
                .post("api/searchRappel", query, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_SR_RAPPELS", response.data);
                });
        },
        planifierRappel({ commit, getters }, playLoad) {
            return axios
                .post("api/rappel", playLoad, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_PUSH_RAPPEL", response.data);
                });
        },
    },
    getters: {
        rappels(state) {
            return state.rappels;
        },
        filtredRappels(state) {
            return state.searchedRappels;
        },
    },
};
