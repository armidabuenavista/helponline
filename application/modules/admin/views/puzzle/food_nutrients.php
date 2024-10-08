
<?php

public function save() {
        $this->load->library('excel');
        
        if ($this->input->post('importfile')) {
            $path = './uploads/';
            
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|jpg|png';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            
            $createArray = array('Food_ID','Food_Name','Scientific_Name','Alternate_Name','Reference','EP','Water','Energy_kcal','Energy_kJ','Protein','Total_Fat','Carbohydrate','Carbohydrate_Available','Ash','Crude_Fiber','Fiber','Sugars','Calcium','Phosphorus','Iron','Potassium','Sodium','Zinc','Magnesium','Manganese','Copper','Selenium','Iodine','Vitamin_A','Beta_carotene','Vitamin_A_RE','Retinol','Vitamin_E','Vitamin_D','Vitamin_K','Vitamin_B1','Vitamin_B2','Niacin','Vitamin_C','Caproic','Caprylic','Capric','Lauric','Myristic','Palmitic','Strearic','Arachidic','Behenic','Oleic','Linoleic_c2','Linoleic_c3','Cholesterol');

            $makeArray = array('Food_ID'=>'Food_ID',
                               'Food_Name'=>'Food_Name',
                               'Scientific_Name'=>'Scientific_Name',
                               'Alternate_Name'=>'Alternate_Name',
                               'Reference'=>'Reference',
                               'EP'=>'EP',
                               'Water'=>'Water',
                               'Energy_kcal'=>'Energy_kcal',
                               'Energy_kJ'=>'Energy_kJ',
                               'Protein'=>'Protein',
                               'Total_Fat'=>'Total_Fat',
                               'Carbohydrate'=>'Carbohydrate',
                               'Carbohydrate_Available'=>'Carbohydrate_Available',
                               'Ash'=>'Ash',
                               'Crude_Fiber'=>'Crude_Fiber',
                               'Fiber'=>'Fiber',
                               'Sugars'=>'Sugars',
                               'Calcium'=>'Calcium',
                               'Phosphorus'=>'Phosphorus',
                               'Iron'=>'Iron',
                               'Potassium'=>'Potassium',
                               'Sodium'=>'Sodium',
                               'Zinc'=>'Zinc',
                               'Magnesium'=>'Magnesium',
                               'Manganese'=>'Manganese',
                               'Copper'=>'Copper',
                               'Selenium'=>'Selenium',
                               'Iodine'=>'Iodine',
                               'Vitamin_A'=>'Vitamin_A',
                               'Beta_carotene'=>'Beta_carotene',
                               'Vitamin_A_RE'=>'Vitamin_A_RE',
                               'Retinol'=>'Retinol',
                               'Vitamin_E'=>'Vitamin_E',
                               'Vitamin_D'=>'Vitamin_D',
                               'Vitamin_K'=>'Vitamin_K',
                               'Vitamin_B1'=>'Vitamin_B1',
                               'Vitamin_B2'=>'Vitamin_B2',
                               'Niacin'=>'Niacin',
                               'Vitamin_C'=>'Vitamin_C',
                               'Caproic'=>'Caproic',
                               'Caprylic'=>'Caprylic',
                               'Capric'=>'Capric',
                               'Lauric'=>'Lauric',
                               'Myristic'=>'Myristic',
                               'Palmitic'=>'Palmitic',
                               'Strearic'=>'Strearic',
                               'Arachidic'=>'Arachidic',
                               'Behenic'=>'Behenic',
                               'Oleic'=>'Oleic',
                               'Linoleic_c2'=>'Linoleic_c2',
                               'Linoleic_c3'=>'Linoleic_c3',
                               'Cholesterol'=>'Cholesterol',);
            
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
            }
            
            $data = array_diff_key($makeArray, $SheetDataKey);
           
            if (empty($data)) {
                $flag = 1;
            }
            if ($flag == 1) {
                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    
                    
                    $food_id = $SheetDataKey['Food_ID'];
                    $food_name = $SheetDataKey['Food_Name'];
                    $scientific_name = $SheetDataKey['Scientific_Name'];
                    $alternate_name = $SheetDataKey['Alternate_Name'];
                    $reference = $SheetDataKey['Reference'];
                    $ep = $SheetDataKey['EP'];
                    $water = $SheetDataKey['Water'];
                    $energy_kcal = $SheetDataKey['Energy_kcal'];
                    $energy_kj = $SheetDataKey['Energy_kJ'];
                    $protein = $SheetDataKey['Protein'];
                    $total_fat = $SheetDataKey['Total_Fat'];
                    $carbohydrate = $SheetDataKey['Carbohydrate'];
                    $carbohydrate_available = $SheetDataKey['Carbohydrate_Available'];
                    $ash = $SheetDataKey['Ash'];
                    $crude_fiber = $SheetDataKey['Crude_Fiber'];
                    $fiber = $SheetDataKey['Fiber'];
                    $sugars = $SheetDataKey['Sugars'];
                    $calcium = $SheetDataKey['Calcium'];
                    $phosphorus = $SheetDataKey['Phosphorus'];
                    $iron = $SheetDataKey['Iron'];
                    $potassium = $SheetDataKey['Potassium'];
                    $sodium = $SheetDataKey['Sodium'];
                    $zinc = $SheetDataKey['Zinc'];
                    $magnesium = $SheetDataKey['Magnesium'];
                    $manganese = $SheetDataKey['Manganese'];
                    $copper = $SheetDataKey['Copper'];
                    $selenium = $SheetDataKey['Selenium'];
                    $iodine = $SheetDataKey['Iodine'];
                    $vitamin_a = $SheetDataKey['Vitamin_A'];
                    $beta_carotene = $SheetDataKey['Beta_carotene'];
                    $vitamin_a_re = $SheetDataKey['Vitamin_A_RE'];
                    $retinol = $SheetDataKey['Retinol'];
                    $vitamin_e = $SheetDataKey['Vitamin_E'];
                    $vitamin_d = $SheetDataKey['Vitamin_D'];
                    $vitamin_k = $SheetDataKey['Vitamin_K'];
                    $vitamin_b1 = $SheetDataKey['Vitamin_B1'];
                    $vitamin_b2 = $SheetDataKey['Vitamin_B2'];
                    $niacin = $SheetDataKey['Niacin'];
                    $vitamin_c = $SheetDataKey['Vitamin_C'];
                    $caproic = $SheetDataKey['Caproic'];
                    $caprylic = $SheetDataKey['Caprylic'];
                    $capric = $SheetDataKey['Capric'];
                    $lauric = $SheetDataKey['Lauric'];
                    $myristic = $SheetDataKey['Myristic'];
                    $palmitic = $SheetDataKey['Palmitic'];
                    $strearic = $SheetDataKey['Strearic'];
                    $arachidic = $SheetDataKey['Arachidic'];
                    $behenic = $SheetDataKey['Behenic'];
                    $oleic = $SheetDataKey['Oleic'];
                    $linoleic_c2 = $SheetDataKey['Linoleic_c2'];
                    $linoleic_c3 = $SheetDataKey['Linoleic_c3'];
                    $cholesterol = $SheetDataKey['Cholesterol'];
                    
                    
                    $stud_no = filter_var(trim($allDataInSheet[$i][$stud_no]), FILTER_SANITIZE_STRING);
                    $firstName = filter_var(trim($allDataInSheet[$i][$firstName]), FILTER_SANITIZE_STRING);
                    $lastName = filter_var(trim($allDataInSheet[$i][$lastName]), FILTER_SANITIZE_STRING);
                    $middleName = filter_var(trim($allDataInSheet[$i][$middleName]), FILTER_SANITIZE_STRING);
                    $b_day = filter_var(trim($allDataInSheet[$i][$b_day]), FILTER_SANITIZE_STRING);
                    $sex = filter_var(trim($allDataInSheet[$i][$sex]), FILTER_SANITIZE_STRING);
                    $section = filter_var(trim($allDataInSheet[$i][$section]), FILTER_SANITIZE_STRING);
                    $year = filter_var(trim($allDataInSheet[$i][$year]), FILTER_SANITIZE_STRING);
                    
                    
                    if($stud_no==""){
                        break;
                    }
                    $fetchData[] = array('firstname' => $firstName, 'lastname' => $lastName, 'middlename' => $middleName, 'birthdate' => $b_day, 'sex' => $sex, 'section' => $section, 'year' => $year, 'student_no' => $stud_no, 'user' => $stud_no, 'pass' => $lastName, 'address' => '', 'place_birth' => '', 'weight' => '', 'height' => '', 'about_self' => '', 'profile' => '');
                }              
                $data['employeeInfo'] = $fetchData;
                $this->model_user->setBatchImport($fetchData);
                $this->model_user->importData();
            } else {
                echo "Please import correct file";
            }
        }
        $page="home";
        if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
            show_404();
        }
        $this->load->view('temp/header');
        $this->load->view('pages/'.$page);
        $this->load->view('temp/footer');
        
    }



$createArray = array('Food_ID','Food_Name','Scientific_Name','Alternate_Name','Reference','EP','Water','Energy_kcal','Energy_kJ','Protein','Total_Fat','Carbohydrate','Carbohydrate_Available','Ash','Crude_Fiber','Fiber','Sugars','Calcium','Phosphorus','Iron','Potassium','Sodium','Zinc','Magnesium','Manganese','Copper','Selenium','Iodine','Vitamin_A','Beta_carotene','Vitamin_A_RE','Retinol','Vitamin_E','Vitamin_D','Vitamin_K','Vitamin_B1','Vitamin_B2','Niacin','Vitamin_C','Caproic','Caprylic','Capric','Lauric','Myristic','Palmitic','Strearic','Arachidic','Behenic','Oleic','Linoleic_c2','Linoleic_c3','Cholesterol');




$makeArray = array('Food_ID'=>'Food_ID',
                   'Food_Name'=>'Food_Name',
                   'Scientific_Name'=>'Scientific_Name',
                   'Alternate_Name'=>'Alternate_Name',
                   'Reference'=>'Reference',
                   'EP'=>'EP',
                   'Water'=>'Water',
                   'Energy_kcal'=>'Energy_kcal',
                   'Energy_kJ'=>'Energy_kJ',
                   'Protein'=>'Protein',
                   'Total_Fat'=>'Total_Fat',
                   'Carbohydrate'=>'Carbohydrate',
                   'Carbohydrate_Available'=>'Carbohydrate_Available',
                   'Ash'=>'Ash',
                   'Crude_Fiber'=>'Crude_Fiber',
                   'Fiber'=>'Fiber',
                   'Sugars'=>'Sugars',
                   'Calcium'=>'Calcium',
                   'Phosphorus'=>'Phosphorus',
                   'Iron'=>'Iron',
                   'Potassium'=>'Potassium',
                   'Sodium'=>'Sodium',
                   'Zinc'=>'Zinc',
                   'Magnesium'=>'Magnesium',
                   'Manganese'=>'Manganese',
                   'Copper'=>'Copper',
                   'Selenium'=>'Selenium',
                   'Iodine'=>'Iodine',
                   'Vitamin_A'=>'Vitamin_A',
                   'Beta_carotene'=>'Beta_carotene',
                   'Vitamin_A_RE'=>'Vitamin_A_RE',
                   'Retinol'=>'Retinol',
                   'Vitamin_E'=>'Vitamin_E',
                   'Vitamin_D'=>'Vitamin_D',
                   'Vitamin_K'=>'Vitamin_K',
                   'Vitamin_B1'=>'Vitamin_B1',
                   'Vitamin_B2'=>'Vitamin_B2',
                   'Niacin'=>'Niacin',
                   'Vitamin_C'=>'Vitamin_C',
                   'Caproic'=>'Caproic',
                   'Caprylic'=>'Caprylic',
                   'Capric'=>'Capric',
                   'Lauric'=>'Lauric',
                   'Myristic'=>'Myristic',
                   'Palmitic'=>'Palmitic',
                   'Strearic'=>'Strearic',
                   'Arachidic'=>'Arachidic',
                   'Behenic'=>'Behenic',
                   'Oleic'=>'Oleic',
                   'Linoleic_c2'=>'Linoleic_c2',
                   'Linoleic_c3'=>'Linoleic_c3',
                   'Cholesterol'=>'Cholesterol',);




$food_id = $SheetDataKey['Food_ID'];
$food_name = $SheetDataKey['Food_Name'];
$scientific_name = $SheetDataKey['Scientific_Name'];
$alternate_name = $SheetDataKey['Alternate_Name'];
$reference = $SheetDataKey['Reference'];
$ep = $SheetDataKey['EP'];
$water = $SheetDataKey['Water'];
$energy_kcal = $SheetDataKey['Energy_kcal'];
$energy_kj = $SheetDataKey['Energy_kJ'];
$protein = $SheetDataKey['Protein'];
$total_fat = $SheetDataKey['Total_Fat'];
$carbohydrate = $SheetDataKey['Carbohydrate'];
$carbohydrate_available = $SheetDataKey['Carbohydrate_Available'];
$ash = $SheetDataKey['Ash'];
$crude_fiber = $SheetDataKey['Crude_Fiber'];
$fiber = $SheetDataKey['Fiber'];
$sugars = $SheetDataKey['Sugars'];
$calcium = $SheetDataKey['Calcium'];
$phosphorus = $SheetDataKey['Phosphorus'];
$iron = $SheetDataKey['Iron'];
$potassium = $SheetDataKey['Potassium'];
$sodium = $SheetDataKey['Sodium'];
$zinc = $SheetDataKey['Zinc'];
$magnesium = $SheetDataKey['Magnesium'];
$manganese = $SheetDataKey['Manganese'];
$copper = $SheetDataKey['Copper'];
$selenium = $SheetDataKey['Selenium'];
$iodine = $SheetDataKey['Iodine'];
$vitamin_a = $SheetDataKey['Vitamin_A'];
$beta_carotene = $SheetDataKey['Beta_carotene'];
$vitamin_a_re = $SheetDataKey['Vitamin_A_RE'];
$retinol = $SheetDataKey['Retinol'];
$vitamin_e = $SheetDataKey['Vitamin_E'];
$vitamin_d = $SheetDataKey['Vitamin_D'];
$vitamin_k = $SheetDataKey['Vitamin_K'];
$vitamin_b1 = $SheetDataKey['Vitamin_B1'];
$vitamin_b2 = $SheetDataKey['Vitamin_B2'];
$niacin = $SheetDataKey['Niacin'];
$vitamin_c = $SheetDataKey['Vitamin_C'];
$caproic = $SheetDataKey['Caproic'];
$caprylic = $SheetDataKey['Caprylic'];
$capric = $SheetDataKey['Capric'];
$lauric = $SheetDataKey['Lauric'];
$myristic = $SheetDataKey['Myristic'];
$palmitic = $SheetDataKey['Palmitic'];
$strearic = $SheetDataKey['Strearic'];
$arachidic = $SheetDataKey['Arachidic'];
$behenic = $SheetDataKey['Behenic'];
$oleic = $SheetDataKey['Oleic'];
$linoleic_c2 = $SheetDataKey['Linoleic_c2'];
$linoleic_c3 = $SheetDataKey['Linoleic_c3'];
$cholesterol = $SheetDataKey['Cholesterol'];
    


$fetchData[] = array('Food_ID'=>$food_id,
                   'Food_Name'=>$food_name,
                   'Scientific_Name'=>$scientific_name,
                   'Alternate_Name'=>$alternate_name,
                   'Reference'=>$reference,
                   'EP'=>$ep,
                   'Water'=>$water,
                   'Energy_kcal'=>$energy_kcal,
                   'Energy_kJ'=>$energy_kj,
                   'Protein'=>$protein,
                   'Total_Fat'=>$total_fat,
                   'Carbohydrate'=>$carbohydrate,
                   'Carbohydrate_Available'=>$carbohydrate_available,
                   'Ash'=>$ash,
                   'Crude_Fiber'=>$crude_fiber,
                   'Fiber'=>$fiber,
                   'Sugars'=>$sugars,
                   'Calcium'=>$calcium,
                   'Phosphorus'=>$phosphorus,
                   'Iron'=>$iron,
                   'Potassium'=>$potassium,
                   'Sodium'=>$sodium,
                   'Zinc'=>$zinc,
                   'Magnesium'=>$magnesium,
                   'Manganese'=>$manganese,
                   'Copper'=>$copper,
                   'Selenium'=>$selenium,
                   'Iodine'=>$iodine,
                   'Vitamin_A'=>$vitamin_a,
                   'Beta_carotene'=>$beta_carotene,
                   'Vitamin_A_RE'=>$vitamin_a_re,
                   'Retinol'=>$retinol,
                   'Vitamin_E'=>$vitamin_e,
                   'Vitamin_D'=>$vitamin_d,
                   'Vitamin_K'=>$vitamin_k,
                   'Vitamin_B1'=>$vitamin_b1,
                   'Vitamin_B2'=>$vitamin_b2,
                   'Niacin'=>$niacin,
                   'Vitamin_C'=>$vitamin_c,
                   'Caproic'=>$caproic,
                   'Caprylic'=>$caprylic,
                   'Capric'=>$capric,
                   'Lauric'=>$lauric,
                   'Myristic'=>$myristic,
                   'Palmitic'=>$palmitic,
                   'Strearic'=>$strearic,
                   'Arachidic'=>$arachidic,
                   'Behenic'=>$behenic,
                   'Oleic'=>$oleic,
                   'Linoleic_c2'=>$linoleic_c2,
                   'Linoleic_c3'=>$linoleic_c3,
                   'Cholesterol'=>$cholesterol,);


`foodid`
`foodname`
`scientific_name`
`alternate_name`
`ep`
`ep_desc`
`water`
`ener_tco1`
`ener_tco2`
`ener_aco1`
`ener_aco2`
`protein`
`tot_fat`
`co_total`
`co_avail`
`ash`
`fiber`
`fiber_dietary`
`sugars`
`sucrose`
`fructose`
`glucose`
`maltose`
`lactose`
`galactose`
`calcium`
`phosphorus`
`iron`
`potassium`
`sodium`
`iodine`
`zinc`
`magnesium`
`manganese`
`copper`
`selenium`
`retinol`
`beta_c`
`tot_vita`
`rae`
`alphatocopherol`
`choleclciferol`
`phylloquinone`
`thiamin`
`riboflavin`
`niacin`
`pantothenic`
`pyridoxine`
`biotin`
`folic_acid`
`folate_natural`
`folate_dfe`
`total_folate`
`cyanocobalamin`
`vitamin_c`
`fat_sat`
`c6`
`c8`
`c10`
`c12`
`c14`
`c16`
`c18`
`c20`
`c22`
`c24`
`fatty_acids`
`Oleic_C18_1`
`Fatty_acids_total`
`Linoleic_C18_2`
`Linoleic_C18_2x`
`Cholecholesterol`
`phenylalanine`
`valine`
`trytophan`
`methionine`
`arginine`
`threonine`
`histidine`
`isoleucine`
`leucine`
`lysine`
`cystine`
`tyrosine`
`alanine`
`aspartic_acid`
`glutamic_acid`
`asparagine`
`glutamine`
`glycine`
`serine`
`proline`
`hydroxyproline`
`alphacarotene`
`betacryptoxanthin`
`lycopene`
`lutein`
`zeaxanthin`
`picture`
`source`
    
?>
