import axios from "axios";

export const client = {
    state: {
        clients: [],
        currentPage: 1,
        last_page: 1,
    },
    mutations: {
        CHANGE_PAGE(state, number) {
            state.currentPage = number;
        },
        CHANGE_LAST_PAGE(state, number) {
            state.last_page = number;
        },
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
        getClients({ commit, getters, state }) {
            return axios
                .get("api/client", {
                    params: {
                        page: state.currentPage,
                    },
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_CLIENTS", response.data.data);
                    commit("CHANGE_PAGE", response.data.current_page);
                    commit("CHANGE_LAST_PAGE", response.data.last_page);
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
        paginate({ dispatch,commit }, page) {
            commit("CHANGE_PAGE", page);
            dispatch("getClients");
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
        paginator(state) {
            return {
                currentPage: state.currentPage,
                lastPage: state.last_page,
            };
        },
    },
};
