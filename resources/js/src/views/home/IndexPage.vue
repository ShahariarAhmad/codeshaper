<template>
  <span>
    <div class="mx-auto container py-20 px-6">
      <p class="text-xl">Read Me ...</p>
      <br />


      <div class="rounded col-span-6">
        <div
          class="w-full grid grid-cols-2 flex flex-col justify-between bg-teal-400 rounded-lg border border-teal-400 mb-6 py-5 px-4"
        >
        <div>
            <h1 class="text-gray-800 font-bold mb-3">Tasks </h1>
            <ul class="text-gray-800 text-sm">
              <li class="indent-4">Task - 2 </li>
              <li class="indent-4">--- Please visit Article Controller.</li>
              <li class="indent-4">Task - 3 </li>
              <li class="indent-4">--- Please visit Database seeder & Factories</li>
              <li class="indent-4">Tasks - 5 & 6</li>
              <li class="indent-4">--- See [ ArticleController::class, 'store' ]</li>

              <li class="indent-4">You need to set up mailtrap to receive mails for now.</li>
            

            </ul>
            </div>
          <div>
            <h4 class="text-gray-800 font-bold mb-3">Instruction</h4>Run these commands sequentially,
            <ul class="text-gray-800 text-sm">
              <li class="indent-4">--- npm install</li>
              <li class="indent-4">--- composer install</li>
              <li class="indent-4">--- npm run dev</li>
              <li class="indent-4">--- php artisan serve</li>
              <li class="indent-4">--- php artisan queue:work</li>
              <li class="indent-4">--- Setup mailtrap</li>
              <li class="indent-4">--- php artisan migrate:fresh --seed</li>

              <li class="indent-4">--- <strong> Add this to the environment file : QUEUE_CONNECTION=database </strong></li>
              <li
                class="indent-4"
              >--- To log in, simply copy an email from DB and click login, No password is required.</li>
            </ul>
          </div>
          <div>
            <h4 class="text-gray-800 font-bold mb-3">Few things I want to mention...</h4>
            <ul class="text-gray-800 text-sm">
              <li class="indent-4">* I had an exam on October 27 And 28.</li>
              <li
                class="indent-4"
              >* And there was no internet or electricity on October 24 for the natural disaster ( Cyclone Sitrang ) that happened that day...</li>
              <li class="indent-4">* I barely had 2 days to complete the task.</li>
              <li
                class="indent-4"
              >* I couldn't implement task scheduling for scheduling post publishing for the lack of time.</li>
              <li
                class="indent-4"
              >* I need more time to understand Cashier ( Stripe ), I just had only 2 hours to study it. Sadly wasn't enough for me to understand it. But I figure out how to use the Stripe No Code version !</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-12 py-10 container mx-auto">
      <div class="col-span-5">
        <div class="flex justify-center">
          <ul v-if="placeholder" class="bg-white rounded-lg w-full text-gray-900">
            <li
              v-for="x in articles"
              :key="x.id"
              class="px-6 py-2 w-full rounded-t-lg hover:border border-b-indigo-500 cursor-pointer"
            >
              <span class="float-right">{{ new Date(x.created_at).toDateString() }}</span>
              <br />
              <span class="w-full hover:text-teal-500" @click="read(x.id)">{{ x.title }}</span>
            </li>
          </ul>

          <ul v-if="!placeholder" class="bg-white rounded-lg w-full text-gray-900">
            <li
              v-for="x in articles"
              :key="x.id"
              class="px-6 py-2 w-full rounded-t-lg hover:border border-b-indigo-500 cursor-pointer"
            >
              <span class="float-right">{{ new Date(x.created_at).toDateString() }}</span>
              <br />
              <span class="w-full hover:text-teal-500" @click="read(x.id)">{{ x.title }}</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-span-7">
        <div class="flex justify-center">
          <div v-if="placeholder" class="bg-white rounded-lg w-full text-gray-900">
            <div
              class="w-full h-64 flex flex-col justify-between bg-gray-300 dark:bg-gray-700 dark:border-gray-700 rounded-lg border border-gray-300 mb-6 py-5 px-4"
            >
              <div>
                <h4
                  class="text-gray-800 dark:text-gray-100 font-bold mb-3"
                >Click on article to view it here...</h4>
              </div>
            </div>
          </div>

          <div v-if="!placeholder" class="bg-white rounded-lg w-full text-gray-900">
            <div
              class="block px-6 py-2 w-full rounded-t-lg bg-gray-600 text-white cursor-pointer"
            >{{ view.title }}</div>
            <div
              class="block px-6 w-full hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-0 focus:bg-gray-200 focus:text-gray-600 transition duration-500 cursor-pointer py-4"
            >{{ view.description }}</div>
          </div>
        </div>
      </div>
    </div>
  </span>
</template>

<script>
export default {
  data() {
    return {
      articles: {},
      view: {},
      placeholder: true
    };
  },
  methods: {
    read(id) {
      axios.get(`api/article/${id}`).then(r => {
        this.placeholder = false;
        this.view = r.data[0];
    
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