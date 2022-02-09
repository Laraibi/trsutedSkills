export const client = {
    state: {
        clients: {},
    },
    mutations: {
        fillClients(state, clients) {
            state.clients = clients;
        },
    },
    actions: {
        getClients({ commit, getters }) {
            return axios
                .get("api/client", {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("fillClients", response.data);
                });
        },
    },
    getters: {
        clientsCount(state) {
            return state.clients.length;
        },
    },
};
