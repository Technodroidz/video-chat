<?php
if(isset($_FILES['file']['name']) && isset($_POST['upload_type']) == 'form_upload'){
   // $filename = $_POST['filename'];
   if (!empty($_FILES['file']['name'][0])) {
        
      $zip = new ZipArchive();
      $zip_name = getcwd() . "/uploads/upload_" . time() . ".zip";
      
      // Create a zip target
      if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
          $error .= "Sorry ZIP creation is not working currently.<br/>";
      }
      
      $imageCount = count($_FILES['file']['name']);
      for($i=0;$i<$imageCount;$i++) {
      
          if ($_FILES['file']['tmp_name'][$i] == '') {
              continue;
          }
          $newname = date('YmdHis', time()) . mt_rand() . '.jpg';
          
          // Moving files to zip.
          $zip->addFromString($_FILES['file']['name'][$i], file_get_contents($_FILES['file']['tmp_name'][$i]));
          
          // moving files to the target folder.
         //  move_uploaded_file($_FILES['file']['tmp_name'][$i], './uploads/' . $newname);
      }
      $zip->close();
      
      // redirect to form and send message and zipname to formupload url for inserting data in db.
         $success = basename($zip_name);
         
         // this code is for url issue for accesing server folder with foldername video-chat on live or local server both ends----- 
         $php_self = explode('/',$_SERVER['PHP_SELF']);
         ($php_self[1] == 'video-chat') ? $serverfolder_path = "/video-chat/" : $serverfolder_path = "/";
         if ($_POST["tenant"] == 'user'){  
            
            $location = "$serverfolder_path"."userdash/uploadform.php";
         }else{
            $location = "$serverfolder_path"."dash/uploadform.php";   
         }

         return header("Location: $location?message=success&zipname=$success");
         
   } else {
         $error = '<strong>Error!! </strong> Please select a file.';
         return header("Location: $location?message=$error");
   }
      // echo $success;
      // exit;
      
}else{

   if($_FILES && $_FILES['file']){
      // var_dump(date("Y-m-d H:i:s"));
      // file name
      $filename = $_POST['filename']. ".zip";

      // Location
      if(!is_dir("uploads/")) {
         mkdir("uploads/");
   }
      $zip = new ZipArchive();
      $zip_name = getcwd() . "/uploads/" .$filename;
      
      // Create a zip target
      if ($zip->open($zip_name, ZipArchive::CREATE) !== TRUE) {
         $error .= "Sorry ZIP creation is not working currently.<br/>";
      }
      $location = '/uploads/'.$filename;

      // file extension
      $file_extension = pathinfo($location, PATHINFO_EXTENSION);
      $file_extension = strtolower($file_extension);

      // Valid extensions
      $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");
      $response = 0;
   //    if(in_array($file_extension,$valid_ext)){
         // Upload file
         // if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         if($zip->addFromString($_FILES['file']['name'], file_get_contents($_FILES['file']['tmp_name']))){   
            // Moving files to zip.
            // $zip->addFromString($_FILES['file']['name'], file_get_contents($location));
            $zip->close();  
            $response = 1;
         } 
   //    }

      echo $response;
     
   }
}   