import {React, useState,useEffect} from 'react';
import DataTable from 'react-data-table-component';
const App3 = () => {
const [user, setUser] = useState([]);
const [username, setUsername]= useState();
const [token, setToken] = useState();
const [password, setPassword] = useState();
const columns = [
  {
    name : <b>id</b>,
    selector : (row) => row.id,
    sortable : true,
  },
  { 
    name : <b>Adresse mail</b>,
    selector: (row) => row.email,
    sortable : true,
  },
  {
    name : <b>rôles</b>,
    selector : (row) => row.roles,
    sortable : true,
  },
  {
    name : <b>Mot de passe</b>,
    selector : (row) => row.password,
    sortable : true,
  },
  {
    name : <b>Nom</b>,
    selector : (row) => row.nom,
    sortable : true,
  },
  {
    name : <b>Prenom</b>,
    selector : (row) => row.prenom,
    sortable : true,
  },
  {
    name : <b>Adresse</b>,
    selector : (row) => row.adresse,
    sortable : true,
  },
  {
    name : <b>Code postal</b>,
    selector : (row) => row.code_postal,
    sortable : true,
  },
  {
    name : <b>Pays</b>,
    selector : (row) => row.pays,
    sortable : true,
  },
  {
    name : <b>Ville</b>,
    selector : (row) => row.ville,
    sortable : true,
  },
  {
    name : <b>Numéro de téléphone</b>,
    selector : (row) => row.numero_mobile,
    sortable : true,
  }
]
const handleChangeUsername = (evt) => {
  setUsername(evt.target.value);
}
const handleChangeToken = (evt) => {
  setToken(evt.target.value);
}
const handleChangePassword = (evt) =>{
  setPassword(evt.target.value);
 
}
const HandleRequest = () => {
var chaine = new Object();
chaine.username = username;
chaine.password = password;
console.log(chaine);
fetch('https://localhost:8000/api/login_check', {
  method:'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(chaine)
  })
.then(response => (response.json())
.then(json =>{
  console.log(json);
  setToken(json.token);
  fetch('/api/users',
    { headers: { 
    Authorization: `Bearer ${json.token}`
  }}) //, { params: {
    //   id: 'api/users/2'
    // } 
    //}
  
    .then(response  => response.json())
    .then (data => {  
      console.log(data);
      setUser(Array.isArray(data.member) ? data.member : []);
     
    })
    .catch((error) => console.error("Erreur de récupération des données :", error ));
}))
.catch((error) => console.error("Erreur de saisie, ou de récupération des données :", error))
/*fetch('/api/users',
    { headers: { 
    Authorization: `Bearer ${token}`
  }}) //, { params: {
    //   id: 'api/users/2'
    // } 
    //}
  
    .then(response  => response.json())
    .then (data => {  
      console.log(data);
      setUser(Array.isArray(data.member) ? data.member : []);
     
    })
    .catch((error) => console.error("Erreur de récupération des données :", error ));*/
}
/*const HandleConnexion = () => {

fetch('/api/users',
  { headers: { 
  Authorization: `Bearer ${token}`
}}) //, { params: {
  //   id: 'api/users/2' a 
  // } 
  //}

  .then(response  => response.json())
  .then (data => {  
    console.log(data);
    setUser(Array.isArray(data.member) ? data.member : []);
   
  })
  .catch((error) => console.error("Erreur de récupération des données :", error ));
}*/
  console.log(user);
  return (
  <>
  <hr/>
    <DataTable
    columns={columns}
    data={user}
    defaultSortFieldId={1}
/>
  <input type="text" placeholder="login" value={username} onChange={handleChangeUsername}></input>
  <input type="password" placeholder='mot de passe' value={password} onChange={handleChangePassword}/>
  <input type="text" placeholder='Le token JWT' value={token}/>
  <button onClick={HandleRequest}>Verifier l'authentification</button>
  <br/>
  {/* <button onClick={HandleConnexion}>Demander l'accès aux données utilisateur</button> */}
  </>
) 
}
export default App3 ;