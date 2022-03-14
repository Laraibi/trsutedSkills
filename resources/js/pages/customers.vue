<template>
    <div class="row rowSection mt-5">
        <from-upload></from-upload>
    </div>
    <div class="row rowSection mt-5">
        <div class="col-6">
            <div class="form-group">
                <label for="city" class="form-label">Filtre Ville</label>
                <select
                    name="cities"
                    id="city"
                    v-model="selectedCity"
                    class="form-select"
                >
                    <option
                        v-for="(city, index) in cities"
                        :key="index"
                        :value="city"
                    >
                        {{ city }}
                    </option>
                </select>
            </div>
        </div>
    </div>
    <div class="row rowSection justify-content-center mt-5">
        <clients-tables :selectedCity="selectedCity"></clients-tables>
    </div>
</template>

<script>
import fromUpload from "../components/client/fromUpload.vue";
import clientsTables from "../components/client/clientsTables.vue";
import { mapGetters } from "vuex";
export default {
    data() {
        return {
            selectedCity: "",
        };
    },
    components: {
        fromUpload,
        clientsTables,
    },
    watch: {
        selectedCity() {
            this.$store.dispatch("getClients", this.selectedCity).then(() => {
                this.$store.dispatch("paginate");
            });
        },
    },
    computed: { ...mapGetters(["cities"]) },
    mounted() {
        this.$store.dispatch("getCities");
    },
};
</script>

<style>
.rowSection {
    margin-right: 2em;
    margin-left: 2em;
    padding: 1em 1em;
    border: 0.1px solid rgb(54, 54, 54);
    box-shadow: 5px 5px 5px rgb(173, 173, 173);
    border-radius: 2px;
}
</style>
