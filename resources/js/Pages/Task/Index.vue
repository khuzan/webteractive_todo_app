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
            <div class="grid grid-cols-3 gap-4 p-4">
              <div>
                <div
                   v-if="successMessage"
                  class="
                    bg-green-100
                    border border-green-400
                    text-green-700
                    px-4
                    py-3
                    rounded
                    relative
                  "
                  role="alert"
                >
                  <strong class="font-bold">{{ successMessage }}</strong>

                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg
                      class="fill-current h-6 w-6 text-green-500"
                      role="button"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <title>Close</title>
                      <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                      />
                    </svg>
                  </span>
                </div>
              </div>
            </div>
            <button
              class="
                bg-blue-500
                hover:bg-blue-700
                text-white
                font-bold
                py-2
                px-4
                rounded
              "
            >
              <a href="/tasks/create">Create Task</a>
            </button>
            <table class="table-auto content-center">
              <thead>
                <tr>
                  <th scope="col" class="px-4 py-2">Task Name</th>
                  <th scope="col" class="px-4 py-2">Status</th>
                  <th scope="col" class="px-4 py-2">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="task in tasks" :key="task.id">
                  <td class="border px-4 py-2">{{ task.name }}</td>
                  <td class="border px-4 py-2">{{ task.status }}</td>
                  <td class="border px-4 py-2">
                    <a :href="`/tasks/${task.id}/edit`">Edit</a>
                  </td>
                </tr>
              </tbody>
            </table>
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
  inject: ["page"],
  props: ["tasks", "successMessage"],
  components: {
    AppLayout,
    Welcome,
  },
});
</script>