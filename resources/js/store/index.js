import axios from "axios";
import { createStore } from "vuex";
import { user } from "./modules/user.js";
import { prospect } from "./modules/prospect.js";
import { client } from "./modules/client.js";
import { codif } from "./modules/codif.js";
axios.defaults.headers.post["Content-Type"] = "application/json";

export default createStore({
    modules: {
        user,
        prospect,
        client,
        codif,
    },
});
