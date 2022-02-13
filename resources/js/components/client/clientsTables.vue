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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr role="row" v-for="(client, id) in clients" :key="id">
                <th>{{ id + 1 }}</th>
                <td>
                    {{
                        client.companyName.length > 50
                            ? client.companyName.substr(0, 47) + "..."
                            : client.companyName
                    }}
                </td>
                <td>
                    {{
                        client.activity.length > 50
                            ? client.activity.substr(0, 47) + "..."
                            : client.activity
                    }}
                </td>
                <td>{{ client.city }}</td>
                <td>{{ client.tel1 }}</td>
                <td>
                    <button @click="showClient(id)" v-if="toDeleteID != id" class="btn btn-info mx-1">
                        Show
                    </button>
                    <button
                        @click="localDelete(id)"
                        v-if="toDeleteID != id"
                        class="btn btn-danger"
                    >
                        Delete
                    </button>
                    <div class="w-100" v-else>
                        <span class="text-red"> Confirmation </span><br>
                        <button
                            @click="confirmDelete()"
                            class="w-40 f btn btn-success"
                        >
                            Oui
                        </button>
                        <button
                            @click="cancelDelete()"
                            class="mx-2 w-40 float-right btn btn-danger"
                        >
                            Non
                        </button>
                    </div>
                </td>
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
    <show-client @close="showClientID=-1" :clientIndex="showClientID" v-if="showClientID != -1" />
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
import showClient from "./showClient.vue";
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    components: {
        showClient,
    },
    data() {
        return {
            toDeleteID: -1,
            showClientID: -1,
        };
    },
    computed: {
        ...mapGetters(["clients"]),
    },
    methods: {
        ...mapActions(["deleteClient"]),
        localDelete(id) {
            this.toDeleteID = id;
        },
        confirmDelete() {
            // console.log("api delete " + this.id);
            this.deleteClient(this.toDeleteID).then(() =>
                toast("client deleted")
            );
            this.toDeleteID = -1;
        },
        cancelDelete() {
            this.toDeleteID = -1;
        },
        showClient(id) {
            this.showClientID = id;
        },
    },
};
</script>

<style>
.w-40 {
    width: 40%;
    height: 80%;
}
</style>
