<template>
  <main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- Card -->

        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Publishing Quota</p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">2</p>
          </div>
        </div>
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                fill-rule="evenodd"
                d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Published Today</p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">{{count}}</p>
          </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div
            class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path
                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"
              />
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >Current Membership Plan</p>
            <p
              class="text-lg font-semibold text-gray-700 dark:text-gray-200"
            >{{isMember ? 'Premium Member' : 'Free Member'}}</p>
          </div>
        </div>
      </div>
      <div role="alert" class="mb-8" v-if="disable">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">Notice !</div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
          <p>You have reached your daily Publishing limit... Please upgrade your membership to enjoy unlimited publishing access</p>
        </div>
      </div>

      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Write A Article</h4>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span v-if="isMember">
            <p
              class="text-red-900"
            >Only pick date Today's or future date. No validation is been implemented</p>
            <span class="text-gray-700 dark:text-gray-400">scheduled your publish</span>
            <input
              v-model="date"
              type="date"
              min="10/29/2022"
              id="date"
              class="border border-teal-600 p-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            />
          </span>
          <input
            v-if="disable"
            disabled
            class="border p-2 block w-full mt-1 text-sm border-gray-600 form-input"
            placeholder="You have reached your daily limit !"
          />
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Name</span>
          <input
            v-if="!disable"
            v-model="title"
            class="border border-teal-600 p-2 block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Jane Doe"
          />

          <input
            v-if="disable"
            disabled
            class="border p-2 block w-full mt-1 text-sm border-gray-600 form-input"
            placeholder="You have reached your daily limit !"
          />
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Message</span>
          <textarea
            v-if="!disable"
            v-model="description"
            class="border border-teal-600 p-2 block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
            rows="20"
            placeholder="Enter some long form content."
          ></textarea>

          <textarea
            disabled
            v-if="disable"
            class="border p-2 block w-full mt-1 text-sm form-textarea"
            rows="20"
            placeholder="You have reached your daily limit !"
          ></textarea>
        </label>

        <button
          v-if="disable"
          disabled
          class="mt-4 float-right flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-600 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-700 focus:outline-none focus:shadow-outline-purple cursor-pointer"
        >Publish</button>
        <button
          v-if="!disable"
          @click.prevent="publish"
          class="mt-4 float-right flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        >Publish</button>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  data() {
    return {
      title: null,
      description: null,
      count: false,
      isMember: null,
      date: null
    };
  },
  computed: {
    disable() {
      if (this.isMember == 1) {
        return false;
      } else if (this.isMember == 0 && this.count < 2) {
        return false;
      } else {
        return true;
      }
    }
  },
  methods: {
    publish() {
      axios.get("/api/user").then(r => {
        axios
          .post("api/article", {
            title: this.title,
            description: this.description,
            id: r.data.id
          })
          .then(() => {
            this.$router.go(this.$router.currentRoute);
          });
      });
    }
  },

  mounted() {
    axios.get("api/user").then(r => {
      axios.get(`api/article/${r.data.id}/quota`).then(r => {
        this.count = r.data.quota;
        this.isMember = r.data.isMember;
      });
    });
  }
};
</script>

