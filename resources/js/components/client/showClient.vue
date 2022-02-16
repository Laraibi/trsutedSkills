<template>
    <div
        class="modal fade show"
        id="modal-default"
        style="display: block; padding-right: 17px"
        aria-modal="true"
        role="dialog"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Client</h4>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span @click="this.$emit('close')" aria-hidden="true"
                            >×</span
                        >
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="Entreprise" class="form-label"
                                    >Entreprise :</label
                                >
                                <input
                                    type="text"
                                    name="entreprise"
                                    id="Entreprise"
                                    class="form-control"
                                    disabled="disabled"
                                    v-model="client.companyName"
                                />
                            </div>
                            <div class="form-group">
                                <label for="activity" class="form-label"
                                    >Activité :</label
                                >
                                <input
                                    type="text"
                                    name="activity"
                                    id="activity"
                                    class="form-control"
                                    v-model="client.activity"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Adresse" class="form-label"
                                    >Adresse :</label
                                >
                                <input
                                    type="text"
                                    name="Adresse"
                                    id="Adresse"
                                    class="form-control"
                                    v-model="client.adress"
                                />
                            </div>

                            <div class="form-group">
                                <label for="Ville" class="form-label"
                                    >Ville :</label
                                >
                                <input
                                    type="text"
                                    name="Ville"
                                    id="Ville"
                                    class="form-control"
                                    v-model="client.city"
                                />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tel" class="form-label"
                                    >Téléphone 1:</label
                                >
                                <input
                                    type="text"
                                    name="tel"
                                    id="tel"
                                    class="form-control"
                                    v-model="client.tel1"
                                />
                            </div>
                            <div class="form-group">
                                <label for="tel2" class="form-label"
                                    >Téléphone 2:</label
                                >
                                <input
                                    type="text"
                                    name="tel2"
                                    id="tel2"
                                    class="form-control"
                                    v-model="client.tel2"
                                />
                            </div>

                            <div class="form-group">
                                <label for="fax" class="form-label"
                                    >Fax :</label
                                >
                                <input
                                    type="text"
                                    name="fax"
                                    id="fax"
                                    class="form-control"
                                    v-model="client.fax"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Email" class="form-label"
                                    >Email :</label
                                >
                                <input
                                    type="text"
                                    name="Email"
                                    id="Email"
                                    class="form-control"
                                    v-model="client.email"
                                />
                            </div>
                            <div class="form-group">
                                <label for="website" class="form-label"
                                    >Site Web :</label
                                >
                                <input
                                    type="text"
                                    name="website"
                                    id="website"
                                    class="form-control"
                                    v-model="client.website"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <span>Planifier un rappel</span>
                        </div>
                        <div class="col-4">
                            <Datepicker autoApply  v-model="dateRappel" />
                        </div>
                        <div class="col-4">
                            <button
                                class="btn btn-primary"
                                @click="planifierRappel"
                            >
                                Planifer
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                        @click="this.$emit('close')"
                    >
                        Close
                    </button>
                    <button
                        @click="updateClient"
                        type="button"
                        class="btn btn-primary"
                    >
                        Save changes
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import Datepicker from "vue3-date-time-picker";
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    props: {
        clientIndex: {
            type: Number,
            required: true,
        },
    },
    components: {
        Datepicker,
    },
    data() {
        return {
            client: {},
            dateRappel: "",
        };
    },
    mounted() {
        this.client = this.clients[this.clientIndex];
    },
    computed: {
        ...mapGetters(["clients"]),
    },
    methods: {
        updateClient() {
            this.$store
                .dispatch("updateClient", {
                    index: this.clientIndex,
                    playLoad: this.client,
                })
                .then(() => {
                    toast.warning("client updated");
                });
        },
        planifierRappel() {
            this.$store
                .dispatch("planifierRappel", {
                    client_id: this.client.id,
                    codif_id: 1,
                    rappelDT: this.dateRappel,
                })
                .then(() => {
                    toast.success("rappel programmé");
                })
                .catch((err) => {
                    let errors = err.response.data.errors;
                    Object.keys(errors).forEach((error) => {
                        toast.error(`${error}: ${errors[error]}`);
                    });
                });
        },
    },
};
</script>

<style>
.modal {
    background-color: rgba(0, 0, 0, 0.3) !important;
}
.form-group {
    margin-bottom: 5px;
}
.modal-dialog {
    max-width: 700px;
}
</style>
