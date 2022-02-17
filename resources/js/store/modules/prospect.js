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
        POP_PROSPECT(state, prospect_id) {
            state.prospects = state.prospects.filter(
                (prospect) => prospect.id != prospect_id
            );
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
        resetUserPass({ commit, getters }, playLoad) {
            return axios
                .post("api/user/resetUserPass", playLoad, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("PUSH_PROSPECT", response.data.user);
                });
        },
        deleteUser({ commit, getters }, playLoad) {
            return axios
                .delete("api/user", playLoad, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("POP_PROSPECT", response.data.user.id);
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
