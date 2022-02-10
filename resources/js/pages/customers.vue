<template>
    <div class="row">
        <from-upload></from-upload>
    </div>
    <div class="row justify-content-center mx-2">
            <clients-tables></clients-tables>
    </div>
</template>

<script>
import fromUpload from "../components/client/fromUpload.vue";
import clientsTables from "../components/client/clientsTables.vue";
export default {
    components: {
        fromUpload,
        clientsTables,
    },
};
</script>

<style></style>
