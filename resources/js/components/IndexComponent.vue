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
                <ShowComponent :person="person"></ShowComponent>
                <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    import EditComponent from './EditComponent.vue';
    import ShowComponent from './ShowComponent.vue';

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
                let editName = `edit_${id}`,
                    fullEditName = this.$refs[editName][0]
                fullEditName.name = name
                fullEditName.age = age
                fullEditName.job = job
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

        },

        components: {
            EditComponent,
            ShowComponent
        },

    }
</script>

<style scoped>

</style>