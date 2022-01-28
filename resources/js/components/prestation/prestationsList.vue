<template>
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(prestation, index) in prestations" :key="index">
        <th>{{ index + 1 }}</th>
        <th>{{ prestation.name }}</th>
        <th>{{ prestation.description }}</th>
        <th>
            <button class="btn btn-danger">Effacer</button>
            <button class="btn btn-info">Modifer</button>
        </th>
      </tr>
    </tbody>
  </table>
</template>

<script>
import {mapGetters} from "vuex";
export default {
  name: "prestationsList",
  computed: {
    ...mapGetters(["prestations"]),
  },
};
</script>

<style>
</style>