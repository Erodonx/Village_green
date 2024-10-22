import {React, useState} from 'react';

const App = () => {

  const [numbers, setNumbers] = useState([]);
  const [value, setValue] = useState("");

  const handleChangeValue = (evt) => {
    setValue(evt.target.value);
  }  

  const handleClick3 = () => {

    let tmp = [...numbers, value];
    console.log(tmp);
    setNumbers(tmp);
    setValue=useState("");
  }

  return (
  <>
  <ul>
      {
        numbers.map((l, i) => (
          <li key={i}>{l}</li>
        ))
      }
  </ul>
  <input type="text" placeholder="Element à ajouter" onChange={handleChangeValue} value={value}/>
  <button onClick={handleClick3}>Ajouter</button>
  </>
) 
}
export default App ;