<template>
    <table
        id="example2"
        class="table table-bordered table-hover dataTable dtr-inline"
        role="grid"
        aria-describedby="example2_info"
    >
        <thead>
            <tr role="row">
                <th
                    class="sorting_asc"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-sort="ascending"
                    aria-label="Rendering engine: activate to sort column descending"
                >
                    ID
                </th>
                <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Browser: activate to sort column ascending"
                >
                    Entreprise
                </th>
                <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Platform(s): activate to sort column ascending"
                >
                    Activité
                </th>
                <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="Engine version: activate to sort column ascending"
                >
                    VILLE
                </th>
                <th
                    class="sorting"
                    tabindex="0"
                    aria-controls="example2"
                    rowspan="1"
                    colspan="1"
                    aria-label="CSS grade: activate to sort column ascending"
                >
                    Tél
                </th>
            </tr>
        </thead>
        <tbody>
            <tr role="row" v-for="(client, id) in clients" :key="id">
                <th>{{ id + 1 }}</th>
                <td>{{ client.companyName }}</td>
                <td>{{ client.activity }}</td>
                <td>{{ client.city }}</td>
                <td>{{ client.tel1 }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th rowspan="1" colspan="1">ID</th>
                <th rowspan="1" colspan="1">Entreprise</th>
                <th rowspan="1" colspan="1">Activité</th>
                <th rowspan="1" colspan="1">VILLE</th>
                <th rowspan="1" colspan="1">Tél</th>
            </tr>
        </tfoot>
    </table>
</template>

<script>
import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters(["clients"]),
    },
};
</script>

<style></style>
