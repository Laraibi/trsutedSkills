import axios from "axios";
import { createStore } from "vuex";
import { user } from "./modules/user.js";
axios.defaults.headers.post["Content-Type"] = "application/json";

export default createStore({
    modules: {
        user,
    },
});
