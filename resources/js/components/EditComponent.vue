<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td><input type="text" class="form-control" v-model="person.name"></td>
        <td><input type="number" min="0" class="form-control" v-model="age"></td>
        <td><input type="text" class="form-control" v-model="job"></td>
        <td colspan="2"><a href="#" @click.prevent="updatePerson(person.id)" class="btn btn-success">Обновить</a></td>
    </tr>
</template>

<script>
    export default {
        name: "EditComponent",

        props: [
            'person'
        ],

        data() {
            return {
                name : '',
                age : null,
                job : '',
            }
        },

        mounted() {

        },

        methods: {

            updatePerson(id) {
                this.$parent.editPersonId = null
                axios.patch(`/api/people/${id}`, {name: this.name, age: this.age, job: this.job})
                    .then( res => {
                        this.$parent.getPeople()
                    })
            },

        }

    }
</script>

<style scoped>

</style>