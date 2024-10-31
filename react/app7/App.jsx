import {React, useState,useEffect} from 'react';
import DataTable from 'react-data-table-component';
const App3 = () => {
const [user, setUser] = useState([]);
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
useEffect(() => {
  fetch('/api/users') //, { params: {
  //   id: 'api/users/2'
  // } 
  //}

  .then(response  => response.json())
  .then (data => {  
    console.log(data);
    setUser(Array.isArray(data.member) ? data.member : []);
   
  })
  .catch((error) => console.error("Erreur de récupération des données :", error ));
}, []);
  
  console.log(user);
  return (
  <>
  <p><ul>{
    user.map((user) => (
    <li key={user.id}>{user.email}||</li>
  ))
  
  }
  </ul></p>
  <DataTable
    columns={columns}
    data={user}
    defaultSortFieldId={1}
/>
  </>
) 
}
export default App3 ;