<template>
    <div class="row">
        <h6>Ajouter un prospect</h6>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="name" class="fomr-label">Name :</label>
                <input
                    id="name"
                    v-model="name"
                    type="text"
                    class="form-control"
                />
            </div>
            <div class="form-group">
                <label for="email" class="fomr-label">Email :</label>
                <input
                    id="email"
                    v-model="email"
                    type="text"
                    class="form-control"
                />
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="password" class="fomr-label">Password :</label>
                <input
                    id="password"
                    v-model="password"
                    type="password"
                    class="form-control"
                />
            </div>
            <div class="form-group">
                <label for="passwordConfirm" class="fomr-label"
                    >Confirmation :</label
                >
                <input
                    id="passwordConfirm"
                    v-model="passwordConfirm"
                    type="password"
                    class="form-control"
                />
            </div>
        </div>
    </div>
    <div class="row justify-content-end ">
        <div class="col-6">
            <button class="btn btn-success w-100" @click="addProspect">
                Ajouter
            </button>
        </div>
    </div>
</template>

<script>
import { useToast } from "vue-toastification";
const toast = useToast();
export default {
    data() {
        return {
            name: "",
            email: "",
            password: "",
            passwordConfirm: "",
        };
    },
    methods: {
        addProspect() {
            let playLoad = {
                name: this.name,
                email: this.email,
                password: this.password,
                passwordConfirm: this.passwordConfirm,
            };
            this.$store
                .dispatch("addProspect", playLoad)
                .then(() => {
                    toast.success("Prospect Ajouté");
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

<style></style>
