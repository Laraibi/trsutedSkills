<template>
    <div class="row mx-4">
        <h3>Prospects</h3>
    </div>
    <div class="row justify-content-center mt-5 rowSection">
        <div class="col">
            <add-prospect-form />
        </div>
    </div>
    <div class="row justify-content-center mt-5 rowSection">
        <div class="col">
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

<style>
.rowSection {
    margin-right: 2em;
    margin-left: 2em;
    padding: 1em 1em;
    border: 0.1px solid rgb(54, 54, 54);
    box-shadow: 5px 5px 5px rgb(173, 173, 173);
    border-radius: 2px;
}
</style>
