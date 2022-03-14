<template>
    <div class="row mt-2 mx-4">
        <h1>Rappels</h1>
    </div>
    <div class="row mt-2 mx-4">
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
    <div class="row mt-5 rowSection">
        <div class="col">
            <form-search />
        </div>
    </div>
    <div class="row mt-5 rowSection">
        <div class="col">
            <rappels-table />
        </div>
    </div>
</template>

<script>
import dashCard from "../components/dashCard.vue";
import formSearch from "../components/rappel/formSearch.vue";
import rappelsTable from "../components/rappel/rappelsTable.vue";
import { mapGetters } from "vuex";
import { mapActions } from "vuex";

export default {
    components: {
        dashCard,
        formSearch,
        rappelsTable,
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

<style>
.rowSection {
    margin-right: 2em;
    margin-left: 2em;
    padding: 1em 1em;
    border: 0.1px solid rgb(54, 54, 54) ;
    box-shadow: 5px 5px 5px rgb(173, 173, 173);
    border-radius: 2px;
}
</style>
