import axios from "axios";

export const client = {
    state: {
        clients: [],
    },
    mutations: {
        FILL_CLIENTS(state, clients) {
            state.clients = clients;
        },
        DELETE_CLIENT(state, id) {
            state.clients = state.clients.filter((client) => client.id != id);
        },
        UPDATE_CLIENT(state, { index, newClient }) {
            state.clients[index] = newClient;
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
                    commit("FILL_CLIENTS", response.data);
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
        updateClient({ commit, getters }, { index, playLoad }) {
            return axios
                .put(`api/client/${getters.clients[index].id}`, playLoad, {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("UPDATE_CLIENT", {
                        index: index,
                        newClient: response.data,
                    });
                });
        },
    },
    getters: {
        clientsCount(state) {
            return state.clients.length;
        },
        clients(state) {
            return state.clients.map((elem) => {
                return { ...elem };
            });
        },
    },
};
