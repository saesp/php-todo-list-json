<script>
import axios from 'axios';

const apiUrl = "http://localhost/";

export default {
  name: 'JsonTest',

  data() {
    return {
      newTodo: "",
      todoList: []
    };
  },

  methods: {
    formSubmit() {
      // usare un oggetto (params) per memorizzare parametri che saranno inviati con la richiesta GET
      const params = {
        param: {
          'newTodo': this.newTodo
        }
      };

      // la risposta sarà strutturata nell'oggetto "response", la cui proprietà "data" conterrà i dati inviati dal server
      axios.get(apiUrl, { params }).then((response) => {
        this.myList(response.data);
      });
    },

    getAllData() {
      axios.get(apiUrl)
        .then(res => {
          const data = res.data;
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
  <h1>hello</h1>
  <ul>
    <li v-for="(todoElement, index) in todoList" :key="index">
      {{ todoElement.text }}
    </li>
  </ul>
  <form @submit="formSubmit">
    <input type="text" name="newTodo" v-model="newTodo">
    <input type="submit" value="CREATE">
  </form>
</template>

<style scoped>

</style>
