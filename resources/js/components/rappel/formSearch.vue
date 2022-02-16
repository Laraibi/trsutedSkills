<template>
    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <label for="dateFrom" class="from-label">From : </label>
                <Datepicker
                    autoApply
                    id="dateFrom"
                    v-model="dateFrom"
                ></Datepicker>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="dateTo" class="from-label"> To : </label>
                <Datepicker autoApply id="dateTo" v-model="dateTo"></Datepicker>
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
                    <option value="*">All</option>
                    <option
                        :value="prospect.id"
                        v-for="(prospect, index) in prospects"
                        :key="index"
                    >
                        {{ prospect.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-3 d-flex align-items-baseline">
            <button class="btn btn-primary" @click="search">Search</button>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
import Datepicker from "vue3-date-time-picker";
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    components: {
        Datepicker,
    },
    data() {
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
        ...mapActions(["searchRappels"]),
        search() {
            this.searchRappels({
                dateFrom: this.dateFrom,
                dateTo: this.dateTo,
                prospectId: this.prospectId,
            }).catch((err) => {
                let errors = err.response.data.errors;
                Object.keys(errors).forEach((error) => {
                    toast.error(`${error}: ${errors[error]}`);
                });
            });
        },
    },
};
</script>

<style></style>
