import ApolloClient from 'apollo-boost';
import Vue from 'vue';
import VueApollo from 'vue-apollo';
import { AuthError, gqlErrors } from './utils';
import store from "./vuex.config";

//Registra apollo como plugin
Vue.use(VueApollo);


// const apolloClient = new ApolloClient({
//     uri: 'http://localhost:8000/graphql' 
//   });

//   const apolloClient = new ApolloClient({
//     uri: 'http://127.0.0.1:8000/graphql' 
//   });

  const apolloClient = new ApolloClient({
    // You should use an absolute URL here
    //uri: 'https://api.graphcms.com/simple/v1/awesomeTalksClone'
    uri: 'http://127.0.0.1:8000/graphql',

    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    },
    //Con esto permitimos a apollo enviar las cookies con cada request
    credentials: 'include',

    onError: (err) => {
      try {
        gqlErrors(err);
      } catch (err) {
        if (err instanceof AuthError) {
          store.dispatch("logout");
        }
      }
    }
  });

export default new VueApollo({

    defaultClient: apolloClient

});