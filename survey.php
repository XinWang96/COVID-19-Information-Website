<div align="center" class="easyui-layout" style="width:100%;height:800px;margin:auto 0px;">
  <div data-options="region:'west',split:true" title="Daily Health Monitoring" style="width:20%;">
      <!--<h1>Daily Health Monitoring</h1>-->
      <h3>This health assessment survey is provided to help Case Western Reserve University students,
          faculty, and staff check for COVID-19 symptoms and risk factors as outlined by the Centers for Disease Control.</h3>
      <h3>Based on your self-reported answers, the tool will provide additional guidance about reporting to work,
          going to class, or coming to campus. Regardless of the survey results, if you feel that you have symptoms of
          COVID-19, please contact a healthcare professional and stay home.</h3>
      <h3>This survey is not a substitute for professional medical advice, diagnosis, treatment of disease or other
          conditions, including COVID-19.</h3>
  </div>

  <form action = "student.php" method = "post" target = "hidden-form">
    <div data-options="region:'center',split:true" style="height:65%">
        <h3>Are you planning to visit campus today?</h3>
        <label class=""visit>
            <input type="radio" id="yes_visit" name="visit" value="yes">Yes
        </label>
        <label class="visit">
            <input type="radio" id="no_visit" name="visit" value="no">No
        </label>

        <h3>Have you had a fever (100.0F/37.8C or higher) in the past 24 hours,
            including the temperature that you took this morning?</h3>
        <label class="temperature">
            <input type="radio" id="yes_temperature" name="temperature" value="yes">Yes
        </label>
        <label class="temperature">
            <input type="radio" id="no_temperature" name="temperature" value="no">No
        </label>

        <h3>Do you have any of the following symptoms?</h3>
        <ul>
            <li>Chills</li>
            <li>Cough</li>
            <li>Shortness of breath or difficulty breathing</li>
            <li>Fatigue</li>
            <li>Muscle or body aches</li>
            <li>Headache</li>
            <li>New loss of taste or smell</li>
            <li>Sore throat</li>
            <li>Congestion or runny nose</li>
            <li>Nausea or vomiting</li>
            <li>Diarrhea</li>
        </ul>
        <label class="symptoms">
            <input type="radio" id="yes_symptoms" name="symptoms" value="yes">Yes
        </label>
        <label class="symptoms">
            <input type="radio" id="no_symptoms" name="symptoms" value="no">No
        </label>

        <h3>Have you been in close contact (more than 15 minutes) in the past 14 days
            with someone with a confirmed diagnosis of COVID-19</h3>
        <label class="contact">
            <input type="radio" id="yes_contact" name="contact" value="yes">Yes
        </label>
        <label class="contact">
            <input type="radio" id="no_contact" name="contact" value="no">No
        </label>
        <h3>By pressing Submit, I attest that the above information is accurate to the best of my knowledge.</h3>
        <div style="width:600px;float:none">
            <button href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" style="padding:5px 0px;margin-left:0px;margin-top:15px;width:100px;" type="submit">
                <span style="font-size:14px;">Submit</span>
            </button>
        </div>
    </div>
  </form>
  <IFRAME style="display:none" name="hidden-form"></IFRAME>
</div>
