import {React, useState} from 'react';
import { Chart } from "react-google-charts";


function Graph1() {

  const [data, setData] = useState([
    ["Evénements", "Nombre"],
    ["Tertiaire", 11],
    ["Batiment", 3],
    ["Industrie", 7]
  ]);

  const options = {
    title: "Evénements par secteur",
    is3D: true
  };

  return (
    <>
      <Chart
        chartType="PieChart"
        data={data}
        options={options}
        width={"100%"}
        height={"400px"}
    />
    </>
  )
}
export default Graph1;