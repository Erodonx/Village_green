import {React, useState,useEffect} from 'react';
import { Chart } from "react-google-charts";


function Graph1() {

  const [liste, setListe] = useState([])
  useEffect(() => {
    console.log("le composant est chargé")
    fetch("https://localhost:8000/performances/chiffre", {
      headers: {
        'Accept': 'application/json'
      }
    })
    .then( (response) => { return response.json() } )
    .then( (data) => { 
      console.log(data) 
      setGraph(data)
    })
  }, [])

  useEffect(() => {
    console.log("liste est modifiée")
    
  }, [liste]);

  const [Graph, setGraph] = useState([
    ["Fournisseur", "Chiffre d'affaire"],
    ["Tertiaire", 11],
    ["Batiment", 30],
    ["Industrie", 7]
  ]);

  const options = {
    title: "Chiffre d'affaire par fournisseur",
    is3D: true
  };
  
  return (
    <>
      <Chart
        chartType="PieChart"
        data={Graph}
        options={options}
        width={"100%"}
        height={"400px"}
    />
    </>
  )
}
export default Graph1;