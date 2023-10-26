<template>
    <div>
        <ul>
            <li v-for="task in tasks" :key="task.id" :class="{ completed: task.completed }" @click="toggleTaskStatus(task)">
                {{ task.name }}
            </li>
        </ul>
        <form @submit.prevent="addTask">
            <input v-model="newTask.name" placeholder="Nouvelle tâche" />
            <button type="submit">Ajouter</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            tasks: [],
            newTask: {
                name: '',
            },
        };
    },
    mounted() {
        this.fetchTasks();
    },
    methods: {
        fetchTasks() {
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data.tasks;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        addTask() {
            axios.post('/api/tasks', this.newTask)
                .then(response => {
                    this.tasks.push(response.data.task);
                    this.newTask.name = '';
                })
                .catch(error => {
                    console.error(error);
                });
        },
        toggleTaskStatus(task) {
            axios.put(`/api/tasks/${task.id}`, { completed: !task.completed })
                .then(response => {
                    task.completed = response.data.task.completed;
                })
                .catch(error => {
                    console.error(error);
                });
        },
    },
};
</script>
