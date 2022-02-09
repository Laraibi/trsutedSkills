import axios from "axios";

export const user = {
    state: {
        loggedUser: {},
    },
    mutations: {
        setLoggedUser(state, user) {
            state.loggedUser = user;
        },
    },
    actions: {
        login({ commit }, playload) {
            return axios
                .post("api/signin", { ...playload })
                .then((response) => {
                    commit("setLoggedUser", response.data);
                    localStorage.setItem(
                        "loggedUser",
                        JSON.stringify(response.data)
                    );
                });
        },
        logout({ commit,getters }) {
            return axios
                .get("api/signout", {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then(() => {
                    commit("setLoggedUser", {});
                    localStorage.removeItem("loggedUser");
                });
            // return axios.post('api/')
        },
    },
    getters: {
        loggedUser(state) {
            return state.loggedUser;
        },
    },
};
