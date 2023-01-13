<script>
import axios from 'axios';

const apiUrl = "http://localhost/php-todo-list-json/php-todo-list-backend/";

export default {
  name: 'App.vue',

  data() {
    return {
      todoList: [],
      newTodo: ""
    };
  },

  methods: {
    // formSubmit() {
    //   // usare un oggetto (params) per memorizzare parametri che saranno inviati con la richiesta GET
    //   const params = {
    //     param: {
    //       'newTodo': this.newTodo
    //     }
    //   };

    //   // la risposta sarà strutturata nell'oggetto "response", la cui proprietà "data" conterrà i dati inviati dal server
    //   axios.get(apiUrl, { params }).then((response) => {
    //     this.newTodo(response.data);
    //   });
    // },

    getAllData() {
      axios.get(apiUrl + 'api.php')
        .then(res => {
          const data = res.data;
          console.log(data);
          this.todoList = data;
        });
    }
  },

  mounted() {
    this.getAllData();
  }
}
</script>

<template>
  <h1>To do list</h1>

  <ul>
    <li v-for="(todoElement, index) in todoList" :key="index">
      {{ todoElement.text }}
    </li>
  </ul>

  <form @submit="formSubmit">
    <input type="text" name="newTodo" v-model="newTodo">
    <input type="submit" value="Add">
  </form>
</template>

<style scoped>

</style>