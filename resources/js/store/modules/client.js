import axios from "axios";

export const client = {
    state: {
        clients: [],
    },
    mutations: {
        fillClients(state, clients) {
            state.clients = clients;
        },
        DELETE_CLIENT(state, id) {
            state.clients = state.clients.filter((client) => client.id != id);
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
        deleteClient({ commit, getters }, id) {
            return axios
                .delete("api/client/" + getters.clients[id].id, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("DELETE_CLIENT", response.data.deletedElement.id);
                });
        },
    },
    getters: {
        clientsCount(state) {
            return state.clients.length;
        },
        clients(state) {
            return state.clients;
        },
    },
};
