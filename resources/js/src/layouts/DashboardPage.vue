
<template>
  <div class="flex h-screen bg-gray-50 dark:bg-gray-900">
    <SideBar />

    <div class="flex flex-col flex-1 w-full">
      <HeaderSec />
      <router-view></router-view>
    </div>
  </div>
</template>


<script>
import SideBar from "../components/SideBar.vue";
import HeaderSec from "../components/HeaderSec.vue";

export default {
  components: {
    SideBar,
    HeaderSec
  },
  data() {
    return {};
  }
};
</script>