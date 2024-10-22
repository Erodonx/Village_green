

// Exercice 1
import {React, useState} from 'react';

const App = () => {

    let set = false;
    const [nom, setNom] = useState("");
    const [prenom, setPrenom] = useState("");
    let text = "avez-vous bien dormi ? Inutile de rappeler que c'est important...";

    const handleChangeNom = (evt) => {
        setNom(evt.target.value);
    }
    const handleChangePrenom = (evt) =>{
      setPrenom(evt.target.value);
    }

    return (
        <div>
            <div>
                Bonjour {nom} {prenom} {nom && prenom?text:"vous allez bien?"}
            </div>
            <input type="text" placeholder='Votre nom' value={nom} onChange={handleChangeNom}/>
            <input type="text" placeholder='Votre prenom' value={prenom} onChange={handleChangePrenom}/>
        </div>
    );
}
export { App };

//Exercice 2
/*import {React, useState} from 'react';
const App = () => {

  const [count, setCount] = useState(0);

  const handleClick1 = () => {
      setCount(count+1);
  }

  console.log("render App...");

  return (
      <>
          <button onClick={handleClick1}>Compteur = {count}</button>
      </>
  );
}
export default App; */
/*
*/
  /*
  var tableau = Array();
  let n=0;
  const [value, setValue] = useState("");

  const handleChangeValue = (evt) => {
    setValue(evt.target.value);
}

  const handleClick1 = () => {
    tableau+=value;
  }
  var listItems = tableau.map((tableau) =>
    <li>{tableau}</li>)

  console.log(tableau);
  return (

      <>
          <ul>
          ({tableau.length>0}?{listItems}:"coucou")
          </ul>
          <div>{value}</div>
          <input type="text" placeholder="Element à ajouter" onChange={handleChangeValue} value={value}/>
          <button onClick={handleClick1}>Ajouter</button>
      </>
  );
}*/
export default App;

