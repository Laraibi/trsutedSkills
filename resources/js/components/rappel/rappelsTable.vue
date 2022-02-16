<template>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>CLient</th>
                <th>Prospect</th>
                <th>Date Time</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(rappel, index) in filtredRappels" :key="index">
                <th>{{ index + 1 }}</th>
                <td>{{ rappel.client.companyName }}</td>
                <td>{{ rappel.prospect.name }}</td>
                <td>{{ parsedDate(rappel.rappelDT)}}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { mapGetters } from "vuex";
let moment = require("moment");

export default {
    computed: {
        ...mapGetters(["filtredRappels"]),
    },
    methods: {
        parsedDate(date) {
            return moment.utc(date).format("DD-MM HH:mm");
        },
    },
};
</script>

<style></style>
