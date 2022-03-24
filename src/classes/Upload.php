<?php 
namespace Src\Classes;
class Upload {
   private static  $file;
   private static  $extension;
   private static  $tmp;
   private static  function setFile($file){
   	self::$file = $file;
   }
   public static function uploadImage($files,$format,$path){
	    self::setFile($files);
		self::$extension = pathinfo(self::$file['name'], PATHINFO_EXTENSION);
		if(in_array(self::$extension,$format)){
			self::$tmp  = self::$file['tmp_name'];
			if(move_uploaded_file(self::$tmp, $path.self::$file['name'])){
				return ["ok" => true, "dir" => self::$file['name']];
			}else{
				return ["error"=>"Erro ao tentar fazer upload"];
			}
		}else{
			return ["error" => "extension not found"];
		}
   }
 }


