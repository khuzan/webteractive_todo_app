<template>
  <app-layout title="Task list">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Task
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="container mx-auto p-10">
    <div class="grid grid-cols-3 gap-4">
      <form class="w-full max-w-sm" action="/tasks" method="POST" @submit.prevent="updateTask">
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Task name
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" disabled id="inline-full-name" type="text" v-model="form.name">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-status">
        Status
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" disabled id="inline-full-status" type="text" v-model="form.status">
    </div>
  </div>
  <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-asign">
        Assign to 
      </label>
    </div>
    <div class="md:w-2/3">
     <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" disabled id="inline-assign" type="text" v-model="form.assign_name">
    </div>
    </div>
  </div>
  <div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
      <button v-if="task.status != 'Completed'" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Mark as complete
      </button>
      <button v-if="task.status != 'Incomplete'" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
        Mark as incomplete
      </button>
    </div>
  </div>
</form>
    </div>
          </div>
          <!-- <welcome /> -->
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";

export default defineComponent({
//   inject: ["page"],
  props: ["errors", "user", "task"],
  components: {
    AppLayout,
    Welcome,
  },
  data(){
      return {
          loading: false,
          form: {
              name: this.task.name,
              status: this.task.status,
              assign_name: this.user.name,
          }
      }
  },
  methods: {
      updateTask() {
        this.loading = true;
        let stat = "";
        if (this.task.status != 'Incomplete'){
            stat = "Incomplete";
        }else{
            stat = "Complete";
        }

        if (confirm("Are you sure you want to mark this as " + stat +"?")) {
            this.$inertia.patch(`/tasks/${this.task.id}`, this.form).then(() => {
                this.loading = false;
            });
        }
    },
      
  },
});
</script>