



<style>

.switch {
  position: relative;
  display: inline-block;
  width: 90px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color:#2196F3;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2ab934;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(55px);
  -ms-transform: translateX(55px);
  transform: translateX(55px);
}

/*------ ADDED CSS ---------*/
.on
{
  display: none;
}

.on, .off
{
  color: white;
  position: absolute;
  transform: translate(-50%,-50%);
  top: 50%;
  left: 50%;
  font-size: 10px;
  font-family: Verdana, sans-serif;
}

input:checked+ .slider .on
{
    display: block;
}

input:checked + .slider .off
{display: none;}

/*--------- END --------*/

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.switch-container{
    margin: 10px;

}


</style>



<div class="switch-container">
    <div style="opacity: 0.5; font-weight: bold;">Tap the switch to select a purchase method</div><br/>
        <div class="switch-border">
            <div class="switch-content">
                <label class="switch">
                 <input type="checkbox" id="togBtn" onclick="switched(this)">
                    <div class="slider round">
                        <span id="on" class="on">BUY</span>
                        <span class="off">RENT</span>
                    </div>
                </label>
            </div>
        </div>
</div>

<script> 
    var switchValues = { };
    function switched (switchElement) {
      switchValues[switchElement.id] = switchElement.checked;

      if(document.getElementById('togBtn').checked === true){
        document.getElementById('togBtn').checked === true
        <?php $_SESSION['paymentType'] = "Buying";?>
      }else{
        document.getElementById('togBtn').checked = false;
        <?php $_SESSION['paymentType'] = "Renting";?>
      }

    }
</script>