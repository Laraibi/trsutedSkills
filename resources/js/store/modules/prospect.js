export const prospect = {
    state: {
        prospects: {},
    },
    mutations: {
        fillProspects(state, prospects) {
            state.prospects = prospects;
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
                    commit("fillProspects", response.data);
                });
        },
    },
    getters: {
        prospectsCount(state) {
            return state.prospects.length;
        },
    },
};
