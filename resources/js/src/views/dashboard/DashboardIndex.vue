<template>
  <main class="h-full overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>


      <!-- New Table -->
      <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
              >
                <th class="px-4 py-3">Title</th>
           
                <th class="px-4 py-3">Date</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              <tr
                v-for="article in published"
                :key="article.id"
                class="text-gray-700 dark:text-gray-400"
              >
                <td class="px-4 py-3 text-sm">{{article.title}}</td>
                <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight rounded-full dark:text-green-100"
                  >{{article.description.substring(0,150)}}</span>
                </td>
                <td class="px-4 py-3 text-sm">{{new Date(article.created_at).toDateString()}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import SideBar from "../../components/SideBar.vue";

export default {
  components: {
    SideBar
  },
  data() {
    return {
      published: null
    };
  },
  methods: {},
  mounted() {
    axios.get("api/user").then(r => {
      axios.get(`api/article/${r.data.id}/edit`).then(res => {
        this.published = res.data;
      });
    });
  }
};
</script>

