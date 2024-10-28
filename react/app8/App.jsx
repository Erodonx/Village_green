import {React, useState} from 'react';
import axios from "axios";

const App = (props) => {
   axios.get('https://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=avenger' //, { params: {
  //   id: 'api/users/2'
  // } 
  //}
  )
  .then(function (response) {
    // handle success
    console.log(response);
    console.log(response.data.results[1].title);

  })
  .catch(function (error) {
    // handle error
    console.log(error);
  });
  

  return (
  <>
  
  </>
) 
}
export default App ;