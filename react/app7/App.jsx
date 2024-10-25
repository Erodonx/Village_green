import {React, useState} from 'react';
import axios from "axios";

const App = (props) => {
   axios.get('/api/users?_id=2' //, { params: {
  //   id: 'api/users/2'
  // } 
  //}
  )
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