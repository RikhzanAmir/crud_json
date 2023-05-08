<?php 
 
    //example 
    $json = '{"name":"rizan", "gender":"male", "age":"25", "occupation":"full-stack web developer"}';

    //HOW TO USE THIS FUNCTION
    $json_output  =  crud_json_file($json, ['name','gender'], 'read');
    $json_output2 =  crud_json_file($json, ['name'=>"rikhzanamir",'age'=>'26'], 'update');
    $json_output3 =  crud_json_file($json, ['age'], 'remove');

    echo 'Read : '.json_encode($json_output);
    echo '<br/>Update'.json_encode($json_output2);
    echo '<br/>Delete'.json_encode($json_output3);

    function crud_json_file($json = null, $tweak = null, $action = null) { //tested 
        //update and create data on json
        //action remove, update, read

        if (empty($action)){
            return ['status'=>0, "message"=>"choose remove or update or read"];
        }

        //decode json is to decode json into PHP object
        $data = json_decode($json, true);  //if to read on php  
        
        //THis code is to create or update 
        if ($action == 'update') {  
            //tweak = ["password"=>"1234"];
            foreach ($tweak as $key => $value) {
                $data[$key] = $value;
            }   
            return $data;
        }

        //remove obj
        else if ($action == 'remove') {
            // $tweak =  ['key','password'];
            for ($i = 0; $i < count($tweak); $i++) {
                unset($data[$tweak[$i]]);
            }   
            return $data;
        }

        //read obj
        else if ($action == 'read') {
            // $tweak =  ['key','password'];
            for ($i = 0; $i < count($tweak); $i++) {

                $output[$tweak[$i]] = $data[$tweak[$i]]; 

            }   
            return $output;
        }

        else {
            return ['status'=>0, "message"=>"choose remove or update"];
        }      
           
        // $jsonData = json_encode($data); //use to add into database
    }







?>