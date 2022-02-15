<template>
    <table class="table text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Codifications</th>
                <th>Dernière Connexion</th>
                <th>Rappels Programmées</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(prospect, index) in prospects" :key="index">
                <th>{{ index + 1 }}</th>
                <td>{{ prospect.name }}</td>
                <td>{{ prospect.codifsCount }}</td>
                <td>
                    {{
                        prospect.lastConnection ? prospect.lastConnection : "--"
                    }}
                </td>
                <td>{{ prospect.rappelsInQueueCount }}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters(["prospects"]),
    },
};
</script>

<style></style>
