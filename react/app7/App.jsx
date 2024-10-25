import {React, useState} from 'react';
import axios from "axios";

const App = (props) => {
  axios.get('/aapi/user', {
  })
  .then(function (response) {
    // handle success
    console.log(response);
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