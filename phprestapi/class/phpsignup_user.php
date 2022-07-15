<?php
require_once "vendor/test.php";
   if(function_exists($_GET['function'])) {
         $_GET['function']();
      }   
   function get_user()
   {
      global $connect;      
      $query = $connect->query("SELECT * FROM user");            
      while($row=mysqli_fetch_object($query))
      {
         $data[] =$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }   
   
   function get_user_id()
   {
      global $connect;
      if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }            
      $query ="SELECT * FROM user WHERE id= $id";      
      $result = $connect->query($query);
      while($row = mysqli_fetch_object($result))
      {
         $data[] = $row;
      }            
      if($data)
      {
      $response = array(
                     'status' => 1,
                     'message' =>'Success',
                     'data' => $data
                  );               
      }else {
         $response=array(
                     'status' => 0,
                     'message' =>'No Data Found'
                  );
      }
      
      header('Content-Type: application/json');
      echo json_encode($response);
       
   }
   function insert_user()
      {
         global $connect;   
         $check = array('id' => '', 
         'username' => '', 
         'password' => '', 
         'email' => '', 
         'phone' => '', 
         'country' => '',
         'city' => '', 
         'postcode' => '', 
         'name' => '', 
         'address' => '');
         $check_match = count(array_intersect_key($_POST, $check));
         if($check_match == count($check)){
         
               $result = mysqli_query($connect, 
               "INSERT INTO user SET
               id = '$_POST[id]',
               username = '$_POST[username]',
               password = '$_POST[password]',
               email = '$_POST[email]',
               phone = '$_POST[phone]',
               country= '$_POST[country]',
               city= '$_POST[city]',
               postcode = '$_POST[postcode]',
               name = '$_POST[name]',
               address= '$_POST[address]'");
               
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Insert Success'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Insert Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
   function update_user()
      {
         global $connect;
         if (!empty($_GET["id"])) {
         $id = $_GET["id"];      
      }   
         $check = array('username' => '', 'password' => '', 'email' => '',
         'phone' => '', 
         'country' => '',
         'city' => '', 
         'postcode' => '', 
         'name' => '', 
         'address' => '');
         $check_match = count(array_intersect_key($_POST, $check));         
         if($check_match == count($check)){
         
              $result = mysqli_query($connect, "UPDATE user SET
              id = '$_POST[id]',
              username = '$_POST[username]',
              password = '$_POST[password]',
              email = '$_POST[email]',
              phone = '$_POST[phone]',
              country= '$_POST[country]',
              city= '$_POST[city]',
              postcode = '$_POST[postcode]',
              name = '$_POST[name]',
              address= '$_POST[address]'");
         
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Update Success'                  
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Update Failed'                  
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Wrong Parameter',
                     'data'=> $id
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 ?>