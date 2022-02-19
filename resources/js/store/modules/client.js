import axios from "axios";

export const client = {
    state: {
        clients: [],
        clientsCount: 0,
        currentPage: 1,
        last_page: 1,
        clientsCities: [],
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
        FILL_CITIES(state, cities) {
            state.cities = cities;
        },
        DELETE_CLIENT(state, id) {
            state.clients = state.clients.filter((client) => client.id != id);
        },
        UPDATE_CLIENT(state, { index, newClient }) {
            state.clients[index] = newClient;
        },
        UPDATE_CLIENTSCOUNT(state, count) {
            state.clientsCount = count;
        },
    },
    actions: {
        getClients({ commit, getters, state }, city = "*") {
            return axios
                .get("api/client", {
                    params: {
                        page: state.currentPage,
                        city: city,
                    },
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_CLIENTS", response.data.data);
                    if (
                        parseInt(response.data.current_page) >
                        response.data.last_page
                    ) {
                        commit("CHANGE_PAGE", response.data.last_page);
                    } else {
                        commit("CHANGE_PAGE", response.data.current_page);
                    }
                    commit("CHANGE_LAST_PAGE", response.data.last_page);
                    commit("UPDATE_CLIENTSCOUNT", response.data.total);
                });
        },
        getCities({ commit, getters }) {
            return axios
                .get("api/clientsCities", {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("FILL_CITIES", response.data);
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
        paginate(
            { dispatch, commit },
            { page, selectedCity }
        ) {
            commit("CHANGE_PAGE", page);
            dispatch("getClients", selectedCity);
        },
    },
    getters: {
        clientsCount(state) {
            return state.clientsCount;
        },
        clients(state) {
            return state.clients.map((elem) => {
                return { ...elem };
            });
        },
        cities(state) {
            return state.cities;
        },
        paginator(state) {
            return {
                currentPage: state.currentPage,
                lastPage: state.last_page,
            };
        },
    },
};
