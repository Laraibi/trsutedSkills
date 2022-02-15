<template>
    <div class="row">
        <h1>Rappels</h1>
    </div>
    <div class="row">
        <div class="col-md-4 col-sm-6">
            <dash-card
                title="Rappels Prorgrammés"
                :count="rappels.length"
                toDetails="#"
                :bgColor="'info'"
                :icon="'bag'"
            ></dash-card>
        </div>
    </div>
    <div class="row">
        <form-search />
    </div>
</template>

<script>
import dashCard from "../components/dashCard.vue";
import formSearch from "../components/rappel/formSearch.vue";
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
export default {
    components: {
        dashCard,
        formSearch,
    },
    computed: {
        ...mapGetters(["rappels"]),
    },
    methods: {
        ...mapActions(["getRappels"]),
    },
    mounted() {
        this.getRappels();
    },
};
</script>

<style></style>
