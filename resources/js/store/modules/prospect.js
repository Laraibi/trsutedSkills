import axios from "axios";

export const prospect = {
    state: {
        prospects: [],
    },
    mutations: {
        FILL_PROSPECTS(state, prospects) {
            state.prospects = prospects;
        },
        PUSH_PROSPECT(state, prospect) {
            state.prospects.push(prospect);
        },
    },
    actions: {
        getProspects({ commit, getters }) {
            return axios
                .get("api/user", {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_PROSPECTS", response.data);
                });
        },
        addProspect({ commit, getters }, playLoad) {
            return axios
                .post("api/user", playLoad, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("PUSH_PROSPECT", response.data.user);
                });
        },
    },
    getters: {
        prospectsCount(state) {
            return state.prospects.length;
        },
        prospects(state) {
            return state.prospects;
        },
    },
};
