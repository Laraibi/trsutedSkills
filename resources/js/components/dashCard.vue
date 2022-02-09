<template>
  <!-- <div class="col-lg-3 col-6"> -->
  <!-- small box -->
  <div :class="'small-box bg-' + bgColor">
    <div class="inner">
      <h3>{{ count }}</h3>

      <p>{{ title }}</p>
    </div>
    <div class="icon">
      <i :class="'ion ion-' + icon"></i>
    </div>
    <router-link :to="toDetails" class="small-box-footer"
      >More info <i class="fas fa-arrow-circle-right"></i
    ></router-link>
  </div>
  <!-- </div> -->
</template>

<script>
export default {
  name: "dashCard",
  props: {
    title: {
      type: String,
      required: true,
    },
    count: {
      type: Number,
      required: true,
    },
    toDetails: {
      type: String,
      required: true,
    },
    bgColor: {
      type: String,
      default: "info",
    },
    icon: {
      type: String,
      default: "bag",
    },
  },
};
</script>

<style>
</style>