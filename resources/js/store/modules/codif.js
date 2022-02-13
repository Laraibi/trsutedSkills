import axios from "axios";

export const codif = {
    state: {
        codifs: [],
    },
    mutations: {
        fillCodifs(state, codifs) {
            state.codifs = codifs;
        },
    },
    actions: {
        getCodifs({ commit, getters }) {
            return axios
                .get("api/codif", {
                    headers: {
                        Authorization: `Bearer ${getters.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    commit("fillCodifs", response.data);
                });
        },
    },
    getters: {
        codifsCount(state) {
            return state.codifs.length;
        },
    },
};
