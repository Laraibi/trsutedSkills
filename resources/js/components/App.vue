<template>
  <div class="row">
    <div class="container-lg container-fluid-sm">
      <button class="btn btn-success">Hello World</button>
      <prestations-list />
    </div>
  </div>
  <!-- <div class="row"></div> -->
</template>

<script>
import prestationsList from "./prestation/prestationsList.vue";

export default {
  components: {
    prestationsList,
  },
  data() {
    return {};
  },
  created() {
    this.$store.dispatch("getPrestations");
  },
  methods: {},
};
</script>

<style>
</style>