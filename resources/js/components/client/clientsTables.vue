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
                        client.companyName.length > 30
                            ? client.companyName.substr(0, 27) + "..."
                            : client.companyName
                    }}
                </td>
                <td>
                    {{
                        client.activity.length > 30
                            ? client.activity.substr(0, 27) + "..."
                            : client.activity
                    }}
                </td>
                <td>{{ client.city }}</td>
                <td>{{ client.tel1 }}</td>
                <td>
                    <button
                        @click="showClient(id)"
                        v-if="toDeleteID != id"
                        class="btn btn-info mx-1"
                    >
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
                        <span class="text-red"> Confirmation </span><br />
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

    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="dataTables_info" id="example2_info" role="status">
                Affichage de {{ paginator.currentPage * 10 - 9 }} à
                {{ paginator.currentPage * 10 }} sur {{ clientsCount }} Clients
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div
                class="dataTables_paginate paging_simple_numbers float-right "
                id="example2_paginate"
            >
                <ul class="pagination">
                    <li
                        class="paginate_button page-item previous"
                        id="example2_previous"
                    >
                        <a href="#" @click="prev" class="page-link">Previous</a>
                    </li>
                    <li
                        class="paginate_button page-item"
                        v-for="(page, index) in pages"
                        :key="index"
                        :class="paginator.currentPage == page ? 'active' : 'o'"
                    >
                        <a href="#" @click="goTO(page)" class="page-link">{{
                            page
                        }}</a>
                    </li>
                    <li
                        class="paginate_button page-item next"
                        id="example2_next"
                    >
                        <a href="#" class="page-link" @click="next">Next</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <show-client
        @close="showClientID = -1"
        :clientIndex="showClientID"
        v-if="showClientID != -1"
    />
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
    props: {
        selectedCity: {
            default: "*",
        },
    },
    computed: {
        ...mapGetters(["clients", "clientsCount", "paginator"]),
        pages() {
            let pages = [];
            for (let i = 1; i <= this.paginator.lastPage; i++) {
                pages.push(i);
            }
            return pages;
        },
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
        next() {
            if (this.paginator.currentPage == this.paginator.lastPage) {
                this.$store.dispatch("paginate", 1);
            } else {
                this.$store.dispatch("paginate", {
                    page: this.paginator.currentPage + 1,
                    selectedCity: this.selectedCity,
                });
            }
        },
        prev() {
            if (this.paginator.currentPage == 1) {
                this.$store.dispatch("paginate", this.paginator.lastPage);
            } else {
                this.$store.dispatch("paginate", {
                    page: this.paginator.currentPage - 1,
                    selectedCity: this.selectedCity,
                });
            }
        },
        goTO(page) {
            this.$store.dispatch("paginate", {
                page: page,
                selectedCity: this.selectedCity,
            });
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
