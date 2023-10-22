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
        // Effectuer une requête GET vers la route API pour obtenir les tâches
        axios.get('/api/tasks')
            .then(response => {
                this.tasks = response.data.tasks;
            })
            .catch(error => {
                console.error(error);
            });
    },
    methods: {
        addTask() {
            // Effectuer une requête POST vers la route API pour créer une nouvelle tâche
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
            // Effectuer une requête PUT vers la route API pour mettre à jour le statut de la tâche
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
