<template>
    <CreateComponent></CreateComponent>
    <IndexComponent ref="index"></IndexComponent>
</template>

<script>
    import CreateComponent from './CreateComponent.vue';
    import IndexComponent from './IndexComponent.vue';

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
            CreateComponent,
            IndexComponent
        }

    }
</script>

<style scoped>

</style>