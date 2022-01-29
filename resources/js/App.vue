<template>
  <div class="contianer container-fluid">
    <div class="row">
      <div class="col-md-4">
        <nav>
          <!-- add NavBar -->
          <router-link to="Home">Home</router-link>
        </nav>
      </div>
      <div class="col-md-8">
        <section>
          <!-- content -->
          <router-view></router-view>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
// import prestationsList from "./components/prestation/prestationsList.vue";s

export default {
  components: {
    // prestationsList,s
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