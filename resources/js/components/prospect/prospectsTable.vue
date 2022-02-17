<template>
    <table class="table text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Codifications</th>
                <th>Dernière Connexion</th>
                <th>Rappels Programmées</th>
                <th>Actions</th>
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
                <td>
                    <span v-if="user_id != prospect.id">
                        <button
                            class="btn btn-warning mx-2"
                            @click="resetPass(prospect.id)"
                        >
                            Reset Pass
                        </button>
                        <button
                            class="btn btn-danger"
                            @click="deleteProspect(prospect.id)"
                        >
                            Delete
                        </button>
                    </span>
                    <span v-else>
                        <p class="text-danger">Confirmation !</p>
                        <button class="btn btn-success" @click="confirm">
                            Oui
                        </button>
                        <button class="btn btn-danger" @click="cancel">
                            Non
                        </button>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { mapGetters } from "vuex";
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    data() {
        return {
            user_id: "",
            action: "",
        };
    },
    computed: {
        ...mapGetters(["prospects"]),
    },
    methods: {
        resetPass(id) {
            this.user_id = id;
            this.action = "resetUserPass";
        },
        deleteProspect(id) {
            this.user_id = id;
            this.action = "deleteUser";
        },
        confirm() {
            if (this.action == "resetUserPass") {
                this.$store
                    .dispatch("resetUserPass", { user_id: this.user_id })
                    .then(() => toast.success("Pass Reseted"));
            } else {
                this.$store
                    .dispatch("deleteUser", { user_id: this.user_id })
                    .then(() => toast.success("User Deleted"));
            }
            this.user_id = "";
            this.action = "";
        },
        cancel() {
            this.user_id = "";
            this.action = "";
        },
    },
};
</script>

<style></style>
