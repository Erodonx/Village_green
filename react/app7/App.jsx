import {React, useState} from 'react';
import axios from "axios";

const App = (props) => {
  const [test, setTest] = useState([]);
  axios.get('/api/users?_id=2' //, { params: {
  //   id: 'api/users/2'
  // } 
  //}
  )

  .then(function (response) {
    // handle success
    console.log(response);
    setTest(response.data.member[0].email);
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  });
  

  return (
  <>
  <p> COUCOU {test} </p>
  </>
) 
}
export default App ;