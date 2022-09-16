<template>
    <CreateComponent></CreateComponent>
    <!--<table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">age</th>
            <th scope="col">job</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="person in persons">
            <tr>
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.age }}</td>
                <td>{{ person.job }}</td>
            </tr>
        </template>
        </tbody>
    </table>-->
</template>

<script>
    import CreateComponent from './CreateComponent.vue';

    export default {
        name: "PersonComponent",

        data() {
            return {
                persons: null
            }
        },

        mounted() {
            this.getPersons()
        },

        methods: {
            getPersons() {
                axios.get('/persons')
                    .then(data => {
                        this.persons = data.data;
                    })
                    .catch( error => {

                    })
                    .finally({

                    })
            }
        },

        computed: {

        },

        components: {
            CreateComponent
        }

    }
</script>

<style scoped>

</style>