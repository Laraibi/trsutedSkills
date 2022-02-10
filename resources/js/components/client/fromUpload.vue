<template>
    <div class="row justify-content-center mt-2">
        <p class="col-2">Import Clients</p>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-8">
            <div class="form-group">
                <!-- <label for="customFile">Custom File</label> -->

                <div class="custom-file">
                    <input
                        type="file"
                        class="custom-file-input"
                        id="customFile"
                        @change="handleFileUpload($event)"
                    />
                    <label class="custom-file-label" for="customFile"
                        >Choose file</label
                    >
                </div>
            </div>
        </div>
        <div class="col-2">
            <button class="btn btn-primary w-100" @click="submitFile()">
                Upload
            </button>
        </div>
    </div>
</template>

<script>
import { mapGetters } from "vuex";
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    data() {
        return {
            file: "",
        };
    },
    computed: {
        ...mapGetters(["loggedUser"]),
    },
    methods: {
        handleFileUpload(event) {
            this.file = event.target.files[0];
        },

        submitFile() {
            let formData = new FormData();

            formData.append("file", this.file);

            axios
                .post("api/importClients", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                        Authorization: `Bearer ${this.loggedUser.access_token}`,
                    },
                })
                .then((response) => {
                    toast(response.data.importedCount + "Imported Clients");
                })
                .catch(function () {
                    console.log("FAILURE!!");
                });
        },
    },
};
</script>

<style></style>
