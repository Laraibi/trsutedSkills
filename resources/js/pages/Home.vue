<template>
  <h1>This Is Home</h1>
  <h5>Hello {{ loggedUser.user.name }}</h5>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  computed: {
    ...mapGetters(["loggedUser"]),
  },
};
</script>

<style>
</style>