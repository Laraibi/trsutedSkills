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
                    localStorage.setItem("loggedUser", JSON.stringify(response.data));
                });
        },
    },
    getters: {
        loggedUser(state) {
            return state.loggedUser;
        },
    },
};
