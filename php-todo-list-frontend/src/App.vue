<script>
import axios from 'axios';

export default {
  name: 'JsonTest',
  data() {

    return {

      newTodo: "",

      todoList: []
    };
  },
  methods: {

    formSubmit(myVar) {

      // usare un oggetto (params) per memorizzare parametri che saranno inviati con la richiesta GET
      const params = {
        param: myVar
      };

      // la risposta sarà strutturata nell'oggetto "response", la cui proprietà "data" conterrà i dati inviati dal server
      axios.get(apiUrl, { params }).then((response) => {
        this.myList(response.data);
      });
    },
  },
  mounted() {

  }
}
</script>

<template>
</template>

<style scoped>

</style>
