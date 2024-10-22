//Exercice 2
import {React, useState} from 'react';
const App = () => {

  const [count, setCount] = useState(0);

  const handleClick2 = () => {
      setCount(count+1);
  }

  console.log("render App...");

  return (
      <>
          <button onClick={handleClick2}>Compteur = {count}</button>
      </>
  );
}
export default App ; 