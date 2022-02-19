<template>
    <div class="row">
        <from-upload></from-upload>
    </div>
    <div class="row">
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
    <div class="row justify-content-center mx-2">
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

<style></style>
