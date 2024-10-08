
<style>
    .cen {
        text-align: center;
    }
    .rotate_sub {
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg); 
    }
</style>



<style>
    p, li, lu{
        color: black;
    }
    .book_img {
      float: left;
        border: solid black 1px;
        margin-right: 3%;
        margin-bottom: 3%;
    }
    label{
        color: black;
    }
    

    
    
    
    


input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.1em solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 25px;
  height: 25px;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}

input[type=checkbox]:disabled + label:before {
  transform: scale(1);
  border-color: #aaa;
}

input[type=checkbox]:checked:disabled + label:before {
  transform: scale(1);
  background-color: #bfb;
  border-color: #bfb;
}
    
input{
    margin-bottom: 6%;
}
    
label{
    font-weight: 500;
}

</style>
    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
        <div class="col-sm-12">
            <div class="col-md-12 heading-section ftco-animate p-4 p-lg-5">
                <div class="containery" style="padding: 3%;">
                    <h2 class="mb-4">Nutrition <span>Facts </span>Calculator</h2>
                    
                    <p>The nutrition facts calculator provides information about the percent contribution of the packaged food item in meeting the daily Recommended Nutrient Intake for adults (male, 19 years old and above) based on the Philippine Dietary Reference Intakes 2015.</p>
<br>
<p><b>Instruction: </b>Select nutrient/s and input the weight per serving size as stated in the nutrition facts or food label. </p>

                    
                            <div class="row">  
                                <div class="col-sm-8">
                                    <hr><br>
                                    <p>Click the nutrient </p>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="sodium" onclick="nutritional_box()">
                                            <label for="sodium">Sodium(mg)*:</label> 
                                            <input onkeyup='compute_label()' type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" min="0" type='text' maxlength="7" max="1000" name="sodium_box" required class="form-control" id="sodium_box" style="display:none;" placeholder="Sodium(mg)">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="potassium" onclick="nutritional_box()">
                                            <label for="potassium">Potassium(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="potassium_box" required class="form-control" id="potassium_box" style="display:none;" placeholder="Potassium(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="dietary" onclick="nutritional_box()">
                                            <label for="dietary">Dietary Fiber(g):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="dietary_box" required class="form-control" id="dietary_box" style="display:none;" placeholder="Dietary Fiber(g):">
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="protein" onclick="nutritional_box()">
                                            <label for="protein">Protein(g):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="protein_box" required class="form-control" id="protein_box" style="display:none;" placeholder="Protein(g):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_a" onclick="nutritional_box()">
                                            <label for="vit_a">Vitamin A(µg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_a_box" required class="form-control" id="vit_a_box" style="display:none;" placeholder="Vitamin A(µg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_c" onclick="nutritional_box()">
                                            <label for="vit_c">Vitamin C(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_c_box" required class="form-control" id="vit_c_box" style="display:none;" placeholder="Vitamin C(mg):">
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="calcium" onclick="nutritional_box()">
                                            <label for="calcium">Calcium(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="calcium_box" required class="form-control" id="calcium_box" style="display:none;" placeholder="Calcium(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="iron" onclick="nutritional_box()">
                                            <label for="iron">Iron(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="iron_box" required class="form-control" id="iron_box" style="display:none;" placeholder="Iron(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_d" onclick="nutritional_box()">
                                            <label for="vit_d">Vitamin D(µg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_d_box" required class="form-control" id="vit_d_box" style="display:none;" placeholder="Vitamin D(µg):"> 
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_e" onclick="nutritional_box()">
                                            <label for="vit_e">Vitamin E(mg-a-TE):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_e_box" required class="form-control" id="vit_e_box" style="display:none;" placeholder="Vitamin E(mg-a-TE):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_k" onclick="nutritional_box()">
                                            <label for="vit_k">Vitamin K(µg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_k_box" required class="form-control" id="vit_k_box" style="display:none;" placeholder="Vitamin K(µg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="thiamin" onclick="nutritional_box()">
                                            <label for="thiamin">Thiamin(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="thiamin_box" required class="form-control" id="thiamin_box" style="display:none;" placeholder="Thiamin(mg):">
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="riboflavin" onclick="nutritional_box()">
                                            <label for="riboflavin">Riboflavin(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="riboflavin_box" required class="form-control" id="riboflavin_box" style="display:none;" placeholder="Riboflavin(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="niacin" onclick="nutritional_box()">
                                            <label for="niacin">Niacin(mg NE):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="niacin_box" required class="form-control" id="niacin_box" style="display:none;" placeholder="Niacin(mg NE):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_b6" onclick="nutritional_box()">
                                            <label for="vit_b6">Vitamin B6(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_b6_box" required class="form-control" id="vit_b6_box" style="display:none;" placeholder="Vitamin B6(mg):">
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="folate" onclick="nutritional_box()">
                                            <label for="folate">Folate(µg DFE):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="folate_box" required class="form-control" id="folate_box" style="display:none;" placeholder="Folate(µg DFE):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="vit_b12" onclick="nutritional_box()">
                                            <label for="vit_b12">Vitamin B12(µg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="vit_b12_box" required class="form-control" id="vit_b12_box" style="display:none;" placeholder="Vitamin B12(µg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="iodine" onclick="nutritional_box()">
                                            <label for="iodine">Iodine(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="iodine_box" required class="form-control" id="iodine_box" style="display:none;" placeholder="Iodine(mg):">
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="magnesium" onclick="nutritional_box()">
                                            <label for="magnesium">Magnesium(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="magnesium_box" required class="form-control" id="magnesium_box" style="display:none;" placeholder="Magnesium(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="zinc" onclick="nutritional_box()">
                                            <label for="zinc">Zinc(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="zinc_box" required class="form-control" id="zinc_box" style="display:none;" placeholder="Zinc(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="selenium" onclick="nutritional_box()">
                                            <label for="selenium">Selenium(µg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="selenium_box" required class="form-control" id="selenium_box" style="display:none;" placeholder="Selenium(µg):">
                                        </div>

                                        <div class="col-sm-4">
                                            <input type="checkbox" id="chloride" onclick="nutritional_box()">
                                            <label for="chloride">Chloride(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="chloride_box" required class="form-control" id="chloride_box" style="display:none;" placeholder="Chloride(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="flouride" onclick="nutritional_box()">
                                            <label for="flouride">Flouride(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="flouride_box" required class="form-control" id="flouride_box" style="display:none;" placeholder="Flouride(mg):">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" id="phosphorus" onclick="nutritional_box()">
                                            <label for="phosphorus">Phosphorus(mg):</label> 
                                            <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" onkeyup='compute_label()' min="0" type='text' maxlength="7" max="1000" name="phosphorus_box" required class="form-control" id="phosphorus_box" style="display:none;" placeholder="Phosphorus(mg):">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
<style>
.image {
  width: 250px;
  float: left;
  margin: 20px;
}
.body_sub {
  font-size: small;
  line-height: 1.4;
    color: black;
}
p {
  margin: 0;
}

.performance-facts {
  border: 1px solid black;
  margin: 20px;
  float: left;
  width: 280px;
  padding: 0.5rem;
  table {
    border-collapse: collapse;
  }
}
.performance-facts__title {
  font-weight: bold;
  font-size: 2rem;
  margin: 0 0 0.25rem 0;
}
.performance-facts__header {
  border-bottom: 10px solid black;
  padding: 0 0 0.25rem 0;
  margin: 0 0 0.5rem 0;
  p {
    margin: 0;
  }
}
.performance-facts__table {
  width: 100%;
  thead tr {
    th,
    td {
      border: 0;
    }
  }
  th,
  td {
    font-weight: normal;
    text-align: left;
    padding: 0.25rem 0;
    border-top: 1px solid black;
    white-space: nowrap;
  }
  td {
    &:last-child {
      text-align: right;
    }
  }
  .blank-cell {
    width: 1rem;
    border-top: 0;
  }
  .thick-row {
    th,
    td {
      border-top-width: 5px;
    }
  }
}
.small-info {
  font-size: 0.7rem;
}

.performance-facts__table--small {
  @extend .performance-facts__table;
  border-bottom: 1px solid #999;
  margin: 0 0 0.5rem 0;
  thead {
    tr {
      border-bottom: 1px solid black;
    }
  }
  td {
    &:last-child {
      text-align: left;
    }
  }
  th,
  td {
    border: 0;
    padding: 0;
  }
}

.performance-facts__table--grid {
  @extend .performance-facts__table;
  margin: 0 0 0.5rem 0;
  td {
    &:last-child {
      text-align: left;
      &::before {
        content: "•";
        font-weight: bold;
        margin: 0 0.25rem 0 0;
      }
    }
  }
}

.text-center {
  text-align: center;
}
.thick-end {
  border-bottom: 10px solid black;
}
.thin-end {
  border-bottom: 1px solid black;
}
-align: right;
      }
      .daily-value 
      { th 
        { font-size: 11px;
          text-align: right;
        }
      }
    }
    thead 
    { td, th 
      { border-bottom: solid 4px blue;
        padding-top: 3px;
        line-height: 1em;
      }
      th 
      { strong 
        { font-size: 28px;
          line-height: 28px;
        }
        span {
          font-size: 34px;
          float: right;
          line-height: 24px;
        }
      }
    }
    &.main-nutrients 
    { border-top: solid 10px #000;
      border-bottom: solid 10px #000;
      margin-top: 8px;
      tbody td:last-child 
      { font-family: "Arial Black", "Arial Bold", sans-serif;
        p 
        { text-align: left;
        }
      }
    }
    &.additional-nutrients 
    { border-bottom: solid 5px #000;
      td 
      {.spacer 
        { width: 1em;
          text-align: center;
        }
        &:last-child 
        { font-weight: normal;
          font-family: arial, sans-serif;
        }
      }
    }
    &.voluntary-nutrients 
    { border-bottom: solid 5px #000;
    }
  } 
  .footnote 
  { font-size: 9px;
    height: 4em;
    margin: 6px 0 -3px;
    padding-left: 1em;
    position: relative;
    &:before 
    { content: '*';
      position: absolute;
      left: 0;
    }
  }
}                            
</style>                        
                            
<section class="performance-facts body_sub">
  <header class="performance-facts__header">
    <h1 class="performance-facts__title">Nutrition Facts</h1>
<!--      <p>Nutritional Label based on PDRI table</p>-->
  </header>
  <table class="performance-facts__table">
    <thead>
      <tr>
        <th colspan="3" class="small-info">
          Nutrient percent contribution
        </th>
      </tr>
    </thead>
    <tbody>
        
        <tr><th colspan="2"><span id="sodium_title"></span></th><td><p id="sodium_value"></p></td></tr>
        <tr><th colspan="2"><span id="potassium_title"></span></th><td><p id="potassium_value"></p></td></tr>
        <tr><th colspan="2"><span id="dietary_title"></span></th><td><p id="dietary_value"></p></td></tr>
        <tr><th colspan="2"><span id="protein_title"></span></th><td><p id="protein_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_a_title"></span></th><td><p id="vit_a_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_c_title"></span></th><td><p id="vit_c_value"></p></td></tr>
        <tr><th colspan="2"><span id="calcium_title"></span></th><td><p id="calcium_value"></p></td></tr>
        <tr><th colspan="2"><span id="iron_title"></span></th><td><p id="iron_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_d_title"></span></th><td><p id="vit_d_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_e_title"></span></th><td><p id="vit_e_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_k_title"></span></th><td><p id="vit_k_value"></p></td></tr>
        <tr><th colspan="2"><span id="thiamin_title"></span></th><td><p id="thiamin_value"></p></td></tr>
        <tr><th colspan="2"><span id="riboflavin_title"></span></th><td><p id="riboflavin_value"></p></td></tr>
        <tr><th colspan="2"><span id="niacin_title"></span></th><td><p id="niacin_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_b6_title"></span></th><td><p id="vit_b6_value"></p></td></tr>
        <tr><th colspan="2"><span id="folate_title"></span></th><td><p id="folate_value"></p></td></tr>
        <tr><th colspan="2"><span id="vit_b12_title"></span></th><td><p id="vit_b12_value"></p></td></tr>
        <tr><th colspan="2"><span id="iodine_title"></span></th><td><p id="iodine_value"></p></td></tr>
        <tr><th colspan="2"><span id="magnesium_title"></span></th><td><p id="magnesium_value"></p></td></tr>
        <tr><th colspan="2"><span id="zinc_title"></span></th><td><p id="zinc_value"></p></td></tr>
        <tr><th colspan="2"><span id="selenium_title"></span></th><td><p id="selenium_value"></p></td></tr>
        <tr><th colspan="2"><span id="chloride_title"></span></th><td><p id="chloride_value"></p></td></tr>
        <tr><th colspan="2"><span id="flouride_title"></span></th><td><p id="flouride_value"></p></td></tr>
        <tr><th colspan="2"><span id="phosphorus_title"></span></th><td><p id="phosphorus_value"></p></td></tr>
      
      <tr class="thick-end">
        <th colspan="2">
        </th>
        <td>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="performance-facts__table--grid">
    <tbody>
      <tr>
        <td colspan="2">
          Result based on 
        </td>
        <td>
        Inputted Values
        </td>
      </tr>
<!--
      <tr>
        <td colspan="2">
          Vitamin A
          10%
        </td>
        <td>
          Vitamin C
          0%
        </td>
      </tr>
      <tr class="thin-end">
        <td colspan="2">
          Calcium
          10%
        </td>
        <td>
          Iron
          6%
        </td>
      </tr>
-->
    </tbody>
  </table>

  <p class="small-info">Disclaimer: 
The information produced by the calculator is for visual representation only. It cannot be used to label food products.
*Limit intake to < 2000 mg in adults 
</p>

<!--
  <table class="performance-facts__table--small small-info">
    <thead>
      <tr>
        <td colspan="2"></td>
        <th>Calories:</th>
        <th>2,000</th>
        <th>2,500</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th colspan="2">Total Fat</th>
        <td>Less than</td>
        <td>65g</td>
        <td>80g</td>
      </tr>
      <tr>
        <td class="blank-cell"></td>
        <th>Saturated Fat</th>
        <td>Less than</td>
        <td>20g</td>
        <td>25g</td>
      </tr>
      <tr>
        <th colspan="2">Cholesterol</th>
        <td>Less than</td>
        <td>300mg</td>
        <td>300 mg</td>
      </tr>
      <tr>
        <th colspan="2">Sodium</th>
        <td>Less than</td>
        <td>2,400mg</td>
        <td>2,400mg</td>
      </tr>
      <tr>
        <th colspan="3">Total Carbohydrate</th>
        <td>300g</td>
        <td>375g</td>
      </tr>
      <tr>
        <td class="blank-cell"></td>
        <th colspan="2">Dietary Fiber</th>
        <td>25g</td>
        <td>30g</td>
      </tr>
    </tbody>
  </table>
-->

<!--
  <p class="small-info">
    iFNRI/HelpOnline
  </p>
  <p class="small-info text-center">
    Nutrition Facts
    &bull;
    PDRI
    &bull;
    Summary Data
  </p>
-->

</section>
                                    
                                    
                   
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
</section>

<script>
function compute_label() {
    
var val_sodium_box = parseFloat($('#sodium_box').val());
var val_potassium_box = parseFloat($('#potassium_box').val());
var val_dietary_box = parseFloat($('#dietary_box').val());
var val_protein_box = parseFloat($('#protein_box').val());
var val_vit_a_box = parseFloat($('#vit_a_box').val());
var val_vit_c_box = parseFloat($('#vit_c_box').val());
var val_calcium_box = parseFloat($('#calcium_box').val());
var val_iron_box = parseFloat($('#iron_box').val());
var val_vit_d_box = parseFloat($('#vit_d_box').val());
var val_vit_e_box = parseFloat($('#vit_e_box').val());
var val_vit_k_box = parseFloat($('#vit_k_box').val());
var val_thiamin_box = parseFloat($('#thiamin_box').val());
var val_riboflavin_box = parseFloat($('#riboflavin_box').val());
var val_niacin_box = parseFloat($('#niacin_box').val());
var val_vit_b6_box = parseFloat($('#vit_b6_box').val());
var val_folate_box = parseFloat($('#folate_box').val());
var val_vit_b12_box = parseFloat($('#vit_b12_box').val());
var val_iodine_box = parseFloat($('#iodine_box').val());
var val_magnesium_box = parseFloat($('#magnesium_box').val());
var val_zinc_box = parseFloat($('#zinc_box').val());
var val_selenium_box = parseFloat($('#selenium_box').val());
var val_chloride_box = parseFloat($('#chloride_box').val());
var val_flouride_box = parseFloat($('#flouride_box').val());
var val_phosphorus_box = parseFloat($('#phosphorus_box').val());
    
var sub_sodium_box = (val_sodium_box/500)*100;
var sub_potassium_box = (val_potassium_box/2000)*100;
var sub_dietary_box = (val_dietary_box/23)*100;
var sub_protein_box = (val_protein_box/71)*100;
var sub_vit_a_box = (val_vit_a_box/700)*100;
var sub_vit_c_box = (val_vit_c_box/700)*100;
var sub_calcium_box = (val_calcium_box/750)*100;
var sub_iron_box = (val_iron_box/12)*100;
var sub_vit_d_box = (val_vit_d_box/5)*100;
var sub_vit_e_box = (val_vit_e_box/10)*100;
var sub_vit_k_box = (val_vit_k_box/61)*100;
var sub_thiamin_box = (val_thiamin_box/1.2)*100;
var sub_riboflavin_box = (val_riboflavin_box/1.3)*100;
var sub_niacin_box = (val_niacin_box/16)*100;
var sub_vit_b6_box = (val_vit_b6_box/1.3)*100;
var sub_folate_box = (val_folate_box/400)*100;
var sub_vit_b12_box = (val_vit_b12_box/2.4)*100;
var sub_iodine_box = (val_iodine_box/150)*100;
var sub_magnesium_box = (val_magnesium_box/240)*100;
var sub_zinc_box = (val_zinc_box/6.5)*100;
var sub_selenium_box = (val_selenium_box/38)*100;
var sub_chloride_box = (val_chloride_box/750)*100;
var sub_flouride_box = (val_flouride_box/38)*100;
var sub_phosphorus_box = (val_phosphorus_box/3)*100;
    
if(Number.isNaN(val_sodium_box)){}else{ $("#sodium_value").html(sub_sodium_box.toFixed(2)+"%"); $("#sodium_title").html("Sodium(mg)* "); }
if(Number.isNaN(val_potassium_box)){}else{ $("#potassium_value").html(sub_potassium_box.toFixed(2)+"%"); $("#potassium_title").html("Potassium(mg)"); }
if(Number.isNaN(val_dietary_box)){}else{ $("#dietary_value").html(sub_dietary_box.toFixed(2)+"%"); $("#dietary_title").html("Dietary Fiber(g)"); }
if(Number.isNaN(val_protein_box)){}else{ $("#protein_value").html(sub_protein_box.toFixed(2)+"%"); $("#protein_title").html("Protein(g)"); }
if(Number.isNaN(val_vit_a_box)){}else{ $("#vit_a_value").html(sub_vit_a_box.toFixed(2)+"%"); $("#vit_a_title").html("Vitamin A(µg)"); }
if(Number.isNaN(val_vit_c_box)){}else{ $("#vit_c_value").html(sub_vit_c_box.toFixed(2)+"%"); $("#vit_c_title").html("Vitamin C(mg)"); }
if(Number.isNaN(val_calcium_box)){}else{ $("#calcium_value").html(sub_calcium_box.toFixed(2)+"%"); $("#calcium_title").html("Calcium(mg)"); }
if(Number.isNaN(val_iron_box)){}else{ $("#iron_value").html(sub_iron_box.toFixed(2)+"%"); $("#iron_title").html("Iron(mg)"); }
if(Number.isNaN(val_vit_d_box)){}else{ $("#vit_d_value").html(sub_vit_d_box.toFixed(2)+"%"); $("#vit_d_title").html("Vitamin D(µg)"); }
if(Number.isNaN(val_vit_e_box)){}else{ $("#vit_e_value").html(sub_vit_e_box.toFixed(2)+"%"); $("#vit_e_title").html("Vitamin E(mg-a-TE)"); }
if(Number.isNaN(val_vit_k_box)){}else{ $("#vit_k_value").html(sub_vit_k_box.toFixed(2)+"%"); $("#vit_k_title").html("Vitamin K(µg)"); }
if(Number.isNaN(val_thiamin_box)){}else{ $("#thiamin_value").html(sub_thiamin_box.toFixed(2)+"%"); $("#thiamin_title").html("Thiamin(mg)"); }
if(Number.isNaN(val_riboflavin_box)){}else{ $("#riboflavin_value").html(sub_riboflavin_box.toFixed(2)+"%"); $("#riboflavin_title").html("Riboflavin(mg)"); }
if(Number.isNaN(val_niacin_box)){}else{ $("#niacin_value").html(sub_niacin_box.toFixed(2)+"%"); $("#niacin_title").html("Niacin(mg NE)"); }
if(Number.isNaN(val_vit_b6_box)){}else{ $("#vit_b6_value").html(sub_vit_b6_box.toFixed(2)+"%"); $("#vit_b6_title").html("Vitamin B6(mg)"); }
if(Number.isNaN(val_folate_box)){}else{ $("#folate_value").html(sub_folate_box.toFixed(2)+"%"); $("#folate_title").html("Folate(µg DFE)"); }
if(Number.isNaN(val_vit_b12_box)){}else{ $("#vit_b12_value").html(sub_vit_b12_box.toFixed(2)+"%"); $("#vit_b12_title").html("Vitamin B12(µg)"); }
if(Number.isNaN(val_iodine_box)){}else{ $("#iodine_value").html(sub_iodine_box.toFixed(2)+"%"); $("#iodine_title").html("Iodine(mg)"); }
if(Number.isNaN(val_magnesium_box)){}else{ $("#magnesium_value").html(sub_magnesium_box.toFixed(2)+"%"); $("#magnesium_title").html("Magnesium(mg)"); }
if(Number.isNaN(val_zinc_box)){}else{ $("#zinc_value").html(sub_zinc_box.toFixed(2)+"%"); $("#zinc_title").html("Zinc(mg)"); }
if(Number.isNaN(val_selenium_box)){}else{ $("#selenium_value").html(sub_selenium_box.toFixed(2)+"%"); $("#selenium_title").html("Selenium(µg)"); }
if(Number.isNaN(val_chloride_box)){}else{ $("#chloride_value").html(sub_chloride_box.toFixed(2)+"%"); $("#chloride_title").html("Chloride(mg)"); }
if(Number.isNaN(val_flouride_box)){}else{ $("#flouride_value").html(sub_flouride_box.toFixed(2)+"%"); $("#flouride_title").html("Flouride(mg)"); }
if(Number.isNaN(val_phosphorus_box)){}else{ $("#phosphorus_value").html(sub_phosphorus_box.toFixed(2)+"%"); $("#phosphorus_title").html("Phosphorus(mg)"); }
    
 
}
    
function nutritional_box() {
  var sodium = document.getElementById("sodium");
  var sodium_box = document.getElementById("sodium_box");
  if (sodium.checked == true){
    sodium_box.style.display = "block";
  } else {
     sodium_box.style.display = "none";
  }
    
  var potassium = document.getElementById("potassium");
  var potassium_box = document.getElementById("potassium_box");
  if (potassium.checked == true){
    potassium_box.style.display = "block";
  } else {
     potassium_box.style.display = "none";
  }
    
  var protein = document.getElementById("protein");
  var protein_box = document.getElementById("protein_box");
  if (protein.checked == true){
    protein_box.style.display = "block";
  } else {
     protein_box.style.display = "none";
  }
    
  var dietary = document.getElementById("dietary");
  var dietary_box = document.getElementById("dietary_box");
  if (dietary.checked == true){
    dietary_box.style.display = "block";
  } else {
     dietary_box.style.display = "none";
  }
    
  var vit_a = document.getElementById("vit_a");
  var vit_a_box = document.getElementById("vit_a_box");
  if (vit_a.checked == true){
    vit_a_box.style.display = "block";
  } else {
     vit_a_box.style.display = "none";
  }
    
  var vit_c = document.getElementById("vit_c");
  var vit_c_box = document.getElementById("vit_c_box");
  if (vit_c.checked == true){
    vit_c_box.style.display = "block";
  } else {
     vit_c_box.style.display = "none";
  }
    
  var vit_d = document.getElementById("vit_d");
  var vit_d_box = document.getElementById("vit_d_box");
  if (vit_d.checked == true){
    vit_d_box.style.display = "block";
  } else {
     vit_d_box.style.display = "none";
  }
    
  var vit_e = document.getElementById("vit_e");
  var vit_e_box = document.getElementById("vit_e_box");
  if (vit_e.checked == true){
    vit_e_box.style.display = "block";
  } else {
     vit_e_box.style.display = "none";
  }
    
  var vit_k = document.getElementById("vit_k");
  var vit_k_box = document.getElementById("vit_k_box");
  if (vit_k.checked == true){
    vit_k_box.style.display = "block";
  } else {
     vit_k_box.style.display = "none";
  }
    
  var vit_b12 = document.getElementById("vit_b12");
  var vit_b12_box = document.getElementById("vit_b12_box");
  if (vit_b12.checked == true){
    vit_b12_box.style.display = "block";
  } else {
     vit_b12_box.style.display = "none";
  }
    
  var vit_b6 = document.getElementById("vit_b6");
  var vit_b6_box = document.getElementById("vit_b6_box");
  if (vit_b6.checked == true){
    vit_b6_box.style.display = "block";
  } else {
     vit_b6_box.style.display = "none";
  }
    
  var calcium = document.getElementById("calcium");
  var calcium_box = document.getElementById("calcium_box");
  if (calcium.checked == true){
    calcium_box.style.display = "block";
  } else {
     calcium_box.style.display = "none";
  }

  var iron = document.getElementById("iron");
  var iron_box = document.getElementById("iron_box");
  if (iron.checked == true){
    iron_box.style.display = "block";
  } else {
     iron_box.style.display = "none";
  }
    
  var thiamin = document.getElementById("thiamin");
  var thiamin_box = document.getElementById("thiamin_box");
  if (thiamin.checked == true){
    thiamin_box.style.display = "block";
  } else {
     thiamin_box.style.display = "none";
  }
    
  var riboflavin = document.getElementById("riboflavin");
  var riboflavin_box = document.getElementById("riboflavin_box");
  if (riboflavin.checked == true){
    riboflavin_box.style.display = "block";
  } else {
     riboflavin_box.style.display = "none";
  }
    
  var niacin = document.getElementById("niacin");
  var niacin_box = document.getElementById("niacin_box");
  if (niacin.checked == true){
    niacin_box.style.display = "block";
  } else {
     niacin_box.style.display = "none";
  }
    
  var folate = document.getElementById("folate");
  var folate_box = document.getElementById("folate_box");
  if (folate.checked == true){
    folate_box.style.display = "block";
  } else {
     folate_box.style.display = "none";
  }
    
  var iodine = document.getElementById("iodine");
  var folate_box = document.getElementById("iodine_box");
  if (iodine.checked == true){
    iodine_box.style.display = "block";
  } else {
     iodine_box.style.display = "none";
  }
    
  var magnesium = document.getElementById("magnesium");
  var folate_box = document.getElementById("magnesium_box");
  if (magnesium.checked == true){
    magnesium_box.style.display = "block";
  } else {
     magnesium_box.style.display = "none";
  }
    
  var zinc = document.getElementById("zinc");
  var folate_box = document.getElementById("zinc_box");
  if (zinc.checked == true){
    zinc_box.style.display = "block";
  } else {
     zinc_box.style.display = "none";
  }
    
  var selenium = document.getElementById("selenium");
  var folate_box = document.getElementById("selenium_box");
  if (selenium.checked == true){
    selenium_box.style.display = "block";
  } else {
     selenium_box.style.display = "none";
  }
    
  var chloride = document.getElementById("chloride");
  var chloride_box = document.getElementById("chloride_box");
  if (chloride.checked == true){
    chloride_box.style.display = "block";
  } else {
     chloride_box.style.display = "none";
  }
    
  var flouride = document.getElementById("flouride");
  var flouride_box = document.getElementById("flouride_box");
  if (flouride.checked == true){
    flouride_box.style.display = "block";
  } else {
     flouride_box.style.display = "none";
  }
    
  var phosphorus = document.getElementById("phosphorus");
  var phosphorus_box = document.getElementById("phosphorus_box");
  if (phosphorus.checked == true){
    phosphorus_box.style.display = "block";
  } else {
     phosphorus_box.style.display = "none";
  }
    
}
</script>

<p style="padding-left: 5%;">Weight in grams (g), milligrams (mg) or micrograms (µg)</p>


    <script type="text/javascript" src="<?=base_url("assets/js/jquery-1.11.1.js"); ?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/js/bootstrap-tabcollapse.js");?>"></script>
    <script type="text/javascript" src="<?=base_url("assets/js/jquery-ui.js"); ?>"></script> 	
    <script type="text/javascript" src="<?=base_url("assets/js/fast_function.js"); ?>"></script>  
    <script type="text/javascript" src="<?=base_url("assets/js/bootstrap.js"); ?>"></script> 
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap-table.js"></script>
    <script src="<?=base_url(); ?>assets/sweet/sweetalert.min.js"></script>
    <script src="<?=base_url(); ?>assets/sweet/sweetalert-dev.js"></script>