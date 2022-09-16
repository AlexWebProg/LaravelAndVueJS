<template>
    <div class="w-50">
        <div class="mb-3">
            <input type="text" class="form-control" id="name" v-model="name" placeholder="name">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" id="age" v-model="age" placeholder="age">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" id="job" v-model="job" placeholder="job">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" @click.prevent="addPerson">Add</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CreateComponent",

        data() {
            return {
                name: null,
                age: null,
                job: null
            }
        },

        methods: {
            addPerson() {
                axios.post('/api/people', {name: this.name, age: this.age, job: this.job})
                    .then(
                        res => {
                            this.name = null
                            this.age = null
                            this.job = null
                        });
            }
        }

    }
</script>

<style scoped>

</style>