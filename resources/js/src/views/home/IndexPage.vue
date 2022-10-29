<template>
  <div class="grid grid-cols-12 py-10 container mx-auto">
    <div class="col-span-5">
      <div class="flex justify-center">
        <ul class="bg-white rounded-lg w-full text-gray-900">
          <li
            v-for="x in articles"
            :key="x.id"
            class="px-6 py-2 w-full rounded-t-lg hover:border border-b-indigo-500 cursor-pointer"
          >
            <span class="float-right">{{new Date(x.created_at).toDateString()}}</span>
            <br />
            <span class="w-full hover:text-teal-500" @click="read(x.id)">{{x.title}}</span>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-span-7">
      <div class="flex justify-center">
        <div class="bg-white rounded-lg w-full text-gray-900">
          <div
            class="block px-6 py-2 w-full rounded-t-lg bg-gray-600 text-white cursor-pointer"
          >{{view.title}}</div>
          <div
            class="block px-6 w-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-0 focus:bg-gray-200 focus:text-gray-600 transition duration-500 cursor-pointer py-4"
          >{{view.description}}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      articles: null,
      view: {}
    };
  },
  methods: {
    read(id) {
      axios.get(`api/article/${id}`).then(r => {
        this.view = r.data[0];
        console.log(this.view);
      });
     
    }
  },
  mounted() {
    axios.get("api/article").then(res => {
      this.articles = res.data[0];
    });
  }
};
</script>