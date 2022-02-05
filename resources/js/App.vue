<template>
  <div class="wrapper">
    <nav-bar/>
    <div class="content-wrapper">
      <section class="content">
        <router-view></router-view>
      </section>
    </div>
  </div>
</template>

<script>
// import prestationsList from "./components/prestation/prestationsList.vue";s
import navBar from "./components/navBar.vue";
export default {
  components: {
    navBar,
  },
  data() {
    return {};
  },
  created() {
    // this.$store.dispatch("getPrestations");
  },
  methods: {},
};
</script>

<style>
</style>