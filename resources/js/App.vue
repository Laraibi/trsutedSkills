<template>
  <div class="wrapper" v-if="loggedUser.user">
    <nav-bar />
    <div class="content-wrapper">
      <section class="content">
        <router-view></router-view>
      </section>
    </div>
  </div>
  <div v-else class="loginBox mt-5 row justify-content-center">
    <auth class="col-md-4 col-sm-8" />
  </div>
</template>

<script>
import navBar from "./components/navBar.vue";
import auth from "./components/auth.vue";
import { mapGetters } from "vuex";
import { mapMutations } from "vuex";

export default {
  components: {
    navBar,
    auth,
  },
  data() {
    return {};
  },
  created() {
    let LSloggedUser = localStorage.getItem("loggedUser");
    if (LSloggedUser) {
      this.setLoggedUser(JSON.parse(LSloggedUser));
      this.$router.push("Home");
    }
  },
  methods: {
    ...mapMutations(["setLoggedUser"]),
  },
  computed: {
    ...mapGetters(["loggedUser"]),
  },
};
</script>

<style>
</style>