<template>
    <div>
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Возраст</th>
                <th scope="col">Должность</th>
                <th scope="col" class="w">Добавить</th>
                <th scope="col" class="w">Удалить</th>
            </tr>
            </thead>
            <tbody>
            <template v-for="person in people">
                <tr :class="isEdit(person.id) ? 'd-none' : ''">
                    <th scope="row">{{ person.id }}</th>
                    <td>{{ person.name }}</td>
                    <td>{{ person.age }}</td>
                    <td>{{ person.job }}</td>
                    <td><a href="#" @click.prevent="setEditPerson(person.id, person.name, person.age, person.job)" class="btn btn-primary">Редактировать</a></td>
                    <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Удалить</a></td>
                </tr>
                <tr :class="isEdit(person.id) ? '' : 'd-none'">
                    <th scope="row">{{ person.id }}</th>
                    <td><input type="text" class="form-control" v-model="person.name"></td>
                    <td><input type="number" min="0" class="form-control" v-model="age"></td>
                    <td><input type="text" class="form-control" v-model="job"></td>
                    <td><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Обновить</a></td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "IndexComponent",

        data() {
            return {
                people: null,
                editPersonId:null,
                name : '',
                age : null,
                job : '',
            }
        },

        mounted() {
            this.getPeople()
        },

        methods: {
            getPeople() {
                axios.get('/api/people')
                    .then( res => {
                        this.people = res.data;
                    })
            },

            setEditPerson(id, name, age, job) {
                this.editPersonId = id
                this.name = name
                this.age = age
                this.job = job
            },

            isEdit(id) {
                return this.editPersonId === id
            },

            updatePerson(id) {
                this.editPersonId = null
                axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                    .then( res => {
                        this.getPeople()
                    })
            },

            deletePerson(id) {
                this.editPersonId = null
                axios.delete(`/api/people/${id}`)
                    .then( res => {
                        this.getPeople()
                    })
            }

        }

    }
</script>

<style scoped>

</style>