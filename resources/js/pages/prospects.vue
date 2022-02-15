<template>
    <h3>Prospects</h3>
    <div class="row justify-content-center mb-5">
        <div class="col-8">
            <add-prospect-form />
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <prospects-table />
        </div>
    </div>
</template>

<script>
import prospectsTable from "../components/prospect/prospectsTable.vue";
import addProspectForm from "../components/prospect/addProspectForm.vue";
export default {
    components: {
        prospectsTable,
        addProspectForm,
    },
};
</script>

<style></style>
