<template>
    <tr :class="this.$parent.isEdit(person.id) ? 'd-none' : ''">
        <th scope="row">{{ person.id }}</th>
        <td>{{ person.name }}</td>
        <td>{{ person.age }}</td>
        <td>{{ person.job }}</td>
        <td><a href="#" @click.prevent="setEditPerson(person.id, person.name, person.age, person.job)" class="btn btn-primary">Редактировать</a></td>
        <td><a href="#" @click.prevent="deletePerson(person.id)" class="btn btn-danger">Удалить</a></td>
    </tr>
</template>

<script>
    export default {
        name: "ShowComponent",

        props: [
            'person'
        ],

        data() {
            return {

            }
        },

        mounted() {

        },

        methods: {

            setEditPerson(id, name, age, job) {
                this.$parent.editPersonId = id
                let editName = `edit_${id}`,
                    fullEditName = this.$parent.$refs[editName][0]
                fullEditName.name = name
                fullEditName.age = age
                fullEditName.job = job
            },

            deletePerson(id) {
                this.editPersonId = null
                axios.delete(`/api/people/${id}`)
                    .then( res => {
                        this.$parent.getPeople()
                    })
            }

        },

        components: {

        },

    }
</script>

<style scoped>

</style>