<?php
$database = 'NewsData';
$c = shell_exec('python -c "import project_back_end as pbe; tb = pbe.TableAccess();tb.getStudentData()"');

?>

<div align="center" class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
  <h1>COVID-19 Student Data</h1>
  <div id="leftdiv" style="width:40%;height: 800px;float: left">
    <div id="chart1" style="width: 400px;height:300px;float:right"></div>
    <div id="chart2" style="width: 400px;height:300px;float:right"></div>
  </div>
  <div id="mindiv" style="width:20%;height: 800px;float: left">
  </div>
  <div id="leftdiv" style="width:40%;height: 800px;float: right">
    <div id="chart3" style="width: 400px;height:300px;float: left"></div>
    <div id="chart4" style="width: 400px;height:300px;float: left"></div>
  </div>
</div>

<script type="text/javascript">
  window.json = [];
  function getJson(response) {
    var url = "./student.json";
    var request = new XMLHttpRequest();
    request.open("get", url);
    request.send(null);
    request.onload = function() {
      if (request.status == 200) {
        window.json = JSON.parse(request.responseText);
        callback();
      }
    };
  }
  function callback() {
    var visitCount = 0,
      feverCount = 0,
      symptomsCount = 0,
      contactCount = 0;
    for (var index = 0; index < json.length; index++) {
      var element = json[index];
      visitCount += element[0];
      feverCount += element[1];
      symptomsCount += element[2];
      contactCount += element[3];
    }
    var visitChart = echarts.init(document.getElementById("chart1"));
    var feverChart = echarts.init(document.getElementById("chart2"));
    var symptomsChart = echarts.init(document.getElementById("chart3"));
    var contactChart = echarts.init(document.getElementById("chart4"));

    var visitOption = {
      title: {
        text: "visit",
        x: "center"
      },

      tooltip: {
        trigger: "item",
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      series: [
        {
          name: "",
          type: "pie",
          minAngle: "15",
          data: [
            { name: "visit", value: visitCount },
            { name: "not visit", value: json.length - visitCount }
          ],
          itemStyle: {
            normal: {
              label: {
                show: true,
                formatter: "{b} :\n  {c} \n ({d}%)",
                position: "inner"
              }
            }
          }
        }
      ]
    };
    visitChart.setOption(visitOption);



    var feverOption = {
      title: {
        text: "fever",
        x: "center"
      },

      tooltip: {
        trigger: "item",
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      series: [
        {
          name: "",
          type: "pie",
          minAngle: "15",
          data: [
            { name: "feverred", value: feverCount },
            { name: "not feverred", value: json.length - feverCount }
          ],
          itemStyle: {
            normal: {
              label: {
                show: true,
                formatter: "{b} :\n  {c} \n ({d}%)",
                position: "inner"
              }
            }
          }
        }
      ]
    };
    feverChart.setOption(feverOption);

    var symptomsOption = {
      title: {
        text: "symptoms",
        x: "center"
      },

      tooltip: {
        trigger: "item",
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      series: [
        {
          name: "",
          type: "pie",
          minAngle: "15",
          data: [
            { name: "have symptoms", value: symptomsCount },
            { name: "no symptoms", value: json.length - symptomsCount }
          ],
          itemStyle: {
            normal: {
              label: {
                show: true,
                formatter: "{b} :\n  {c} \n ({d}%)",
                position: "inner"
              }
            }
          }
        }
      ]
    };
    symptomsChart.setOption(symptomsOption);

    var contactOption = {
      title: {
        text: "contact",
        x: "center"
      },

      tooltip: {
        trigger: "item",
        formatter: "{a} <br/>{b} : {c} ({d}%)"
      },
      series: [
        {
          name: "",
          type: "pie",
          minAngle: "15",
          data: [
            { name: "contact", value: contactCount },
            { name: "no contact", value: json.length - contactCount }
          ],
          itemStyle: {
            normal: {
              label: {
                show: true,
                formatter: "{b} :\n  {c} \n ({d}%)",
                position: "inner"
              }
            }
          }
        }
      ]
    };
    contactChart.setOption(contactOption);
  }

  getJson();
</script>
