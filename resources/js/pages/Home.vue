<template>
  <div class="row mt-2">
    <div class="col-md-4 col-sm-6">
      <dash-card
        :title="'Prospecteurs'"
        :count="prospectsCount"
        :toDetails="'prospect'"
        :bgColor="'info'"
        :icon="'bag'"
      ></dash-card>
    </div>
    <div class="col-md-4 col-sm-6">
      <dash-card
        :title="'Clients'"
        :count="clientsCount"
        :toDetails="'client'"
        :bgColor="'warning'"
        :icon="'bag'"
      ></dash-card>
    </div>
    <div class="col-md-4 col-sm-6">
      <dash-card
        :title="'Codifications'"
        :count="codifsCount"
        :toDetails="'codif'"
        :bgColor="'light'"
        :icon="'bag'"
      ></dash-card>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";

import dashCard from "../components/dashCard.vue";
export default {
  components: {
    dashCard,
  },
  methods: {
    ...mapActions(["getProspects", "getClients", "getCodifs"]),
  },
  computed: {
    ...mapGetters([
      "loggedUser",
      "prospectsCount",
      "clientsCount",
      "codifsCount",
    ]),
  },
  created() {
    this.getProspects();
    this.getClients();
    this.getCodifs();
  },
};
</script>

<style>
</style>