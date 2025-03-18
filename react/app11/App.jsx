import {React,  useState,useEffect} from "react";
import { Chart } from "react-google-charts";

const app5 = () => {

  const [liste, setListe] = useState([])
  useEffect(() => {
    console.log("le composant est chargé")
    fetch("https://localhost:8000/performances/chiffre/2025", {
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
    ["Mois", "Ventes"],
    ["01/2024", 1000],
    ["02/2024", 1170],
    ["03/2024", 6600],
    ["04/2024", 1030],
    ["05/2024", 1030],
    ["06/2024", 1030],
    ["07/2024", 1030],
    ["08/2024", 1030],
    ["09/2024", 1030],
    ["10/2024", 1030],
    ["11/2024", 1030],
    ["12/2024", 1030],

  ]);
   const options = {
    title: "Chiffre d'affaire par mois pour l'année 2024",
    isStacked: true,
    height: 300,
    legend: { position: "top", maxLines: 2 },
    vAxis: { minValue: 0 },
  };
    return (
      <Chart
        chartType="AreaChart"
        width="100%"
        height="400px"
        data={Graph}
        options={options}
      />
    );
}
  
export default app5;

