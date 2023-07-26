<template>
  <h1>hi {{ this.id }}</h1>
</template>

<script>
export default {
    name: "productPage",
    data() {
        return {
            id: null,
        }
    },
    mounted() {
        this.id = this.$route.params.id
    },
    watch: {
        '$route.params.id': function(newVal) {
            this.id = newVal;
            console.log(this.id);
        }
    }
}
</script>

<style>

</style>