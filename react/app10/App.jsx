import {React, useState,useEffect} from 'react';
import DataTable from 'react-data-table-component';
const App4 = () => {
const [commandes, setCommandes] = useState([]);
const [username, setUsername]= useState();
const [token, setToken] = useState();
const [password, setPassword] = useState();
const caseInsensitiveSort = (rowA,rowB) => {
	const a = rowA.email.toLowerCase();
	const b = rowB.email.toLowerCase();

	if (a > b) {
		return 1;
	}

	if (b > a) {
		return -1;
	}

	return 0;
};
const caseInsensitiveSort1 = (rowA,rowB) => {
	const a = rowA.nom.toLowerCase();
	const b = rowB.nom.toLowerCase();

	if (a > b) {
		return 1;
	}

	if (b > a) {
		return -1;
	}

	return 0;
};
const caseInsensitiveSort2 = (rowA,rowB) => {
	const a = rowA.prenom.toLowerCase();
	const b = rowB.prenom.toLowerCase();

	if (a > b) {
		return 1;
	}

	if (b > a) {
		return -1;
	}

	return 0;
};
const numberInferiorValueSort = (rowC, rowD) => {
  const c = rowC.montantCommandeTTC;
  const d = rowD.montantCommandeTTC;
  if (c > d)
  {
    return 1 ;
  }
  if (d > c)
  {
    return -1 ;
  }
  return 0;
}

const columns = [
  {
    name : <b>E-mail</b>,
    selector : (row) => row.email,
    sortable : true,
    sortFunction: caseInsensitiveSort,
  },
  { 
    name : <b>Prénom</b>,
    selector: (row) => row.prenom,
    sortable : true,
    sortFunction: caseInsensitiveSort2,
  },
  {
    name : <b>Nom</b>,
    selector : (row) => row.nom,
    sortable : true,
    sortFunction: caseInsensitiveSort1,
  },
  {
    name : <b>id commande</b>,
    selector : (row) => row.id,
    sortable : true,
  },
  {
    name : <b>Date de la commande</b>,
    selector : (row) => row.dateCommande,
    sortable : true,
  },
  {
    name : <b>Montant total de la commande</b>,
    selector : (row) => row.montantCommandeTTC + ' €',
    sortable : true,
    sortFunction: numberInferiorValueSort,

  },
]
useEffect(() => {
  console.log("le composant est chargé")
  fetch("https://localhost:8000/performances/commandes", {
    headers: {
      'Accept': 'application/json'
    }
  })
  .then( (response) => { return response.json() } )
  .then( (data) => { 
    console.log(data) 
    setCommandes(data)
  })
}, [])

  return (
  <>
  <hr/>
    <DataTable
    columns={columns}
    data={commandes}
    defaultSortFieldId={1}
/>
  </>
) 
}
export default App4 ;