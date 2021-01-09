<div class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
  <div style="width:100%;height:100%;">
  <?php
      $database = 'LiveData';
      shell_exec('python -c "import project_back_end as pbe; tb = pbe.TableAccess(); tb.read_livedata()"');
  ?>
  <script>
      $(document).ready(window.unload = function () {
          $.getJSON("livedata.json", function (data) {

              var arrItems = [];
              $.each(data, function (index, value) {
                  arrItems.push(value);
              });

              var col = [];
              for (var i = 0; i < arrItems.length; i++) {
                  for (var key in arrItems[i]) {
                      if (col.indexOf(key) === -1) {
                          col.push(key);
                      }
                  }
              }

              var dps = [];

              var chart = new CanvasJS.Chart("chartContainer", {
              animationEnabled: true,
              theme: "light1",
              title:{
                text:"New Cases per Ohio County"
              },
              axisY:{
                title: "Number of cases",
              },
              data: [{
                type: "column",
                dataPoints: dps
              }]
            });

            function parseDataPoints() {
              for (var i = 0; i <arrItems.length; i++) {
                  if ((arrItems[i]["location"] != "Ohio") && (arrItems[i]["location"] != "Worldwide")) {
                    dps.push({y: parseInt(arrItems[i]["new_case"]), label: arrItems[i]["location"]});
                  }
                }
            }

            parseDataPoints();
            chart.options.data[0].dataPoints = dps;
            chart.render();

          });
      });
  </script>

  <div id="chartContainer" style="height: 50%; margin-left: 33%; width: 33%;"></div>
  <table class="easyui-datagrid" title="Latest Data" style="width:100%;height:50%"
      data-options="singleSelect:true,url:'livedata.json',method:'get'">
      <thead>
          <tr>
              <th data-options="field:'location',width:250, align: 'left'">Location</th>
              <th data-options="field:'total_case',width:250, align: 'center'">Total Cases</th>
              <th data-options="field:'new_case',width:250, align: 'center'">New Cases</th>
              <th data-options="field:'case_per_1m',width:250, align: 'center'">Cases per Million</th>
              <th data-options="field:'death',width:250, align: 'center'">Total Deaths</th>
              <th data-options="field:'date',width:250, align: 'center'">Last Updated</th>
          </tr>
      </thead>
  </table>
  </div>
</div>
