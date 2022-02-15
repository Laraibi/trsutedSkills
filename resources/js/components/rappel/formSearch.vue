<template>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="dateFrom" class="from-label">From : </label>
                <input
                    type="text"
                    id="dateFrom"
                    v-model="dateFrom"
                    class="form-control"
                />
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="dateTo" class="from-label"> To : </label>
                <input
                    type="text"
                    id="dateTo"
                    v-model="dateTo"
                    class="form-control"
                />
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="prospecteur" class="from-label">Prospect :</label>
                <select
                    v-model="prospectId"
                    name="prospecteur"
                    id="prospecteur"
                    class="form-select"
                >
                    <option
                        value="prospect.id"
                        v-for="(prospect, index) in prospects"
                        :key="index"
                    >
                        {{ prospect.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-3 d-flex align-items-baseline">
            <button class="btn btn-primary" @click="serachRappels">
                Search
            </button>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    date() {
        return {
            dateFrom: "",
            dateTo: "",
            prospectId: "",
        };
    },
    computed: {
        ...mapGetters(["prospects"]),
    },
    methods: {
        searchRappels() {
            console.log("hello world");
        },
    },
};
</script>

<style></style>
