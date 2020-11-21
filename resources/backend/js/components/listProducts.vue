<template>
  <ul>
  <li v-for="item in product_categories" :key="item.message">
    {{ item.pro_category_id }}
  </li>
</ul>
</template>

<script>
export default {
  data() {
      return {
        product_categories: [],
      }
    },
    methods: {
      
    },
    mounted(){
      axios
      .get('http://petcare.test/api/admin/product-categories')
      .then(response => (this.product_categories = response.data.pro_categories))
    }
}
</script>

<style>

</style>