<?php
//include_once("modules/passport/common/phonesStatesVenezuela.php");
class validator {
   const PhoneLength = 11;
   const NameLength = 30;
   const CedulaLength = 10;
   const EmailLength = 50;
   const PasswordLength = 20;

   protected static function FixDate($date) {
      if (!$date)
         return "";
      list($day, $month, $year) = explode('/', $date);
      return trim($day)."/".trim($month)."/".trim($year);
   }
   protected static function Fix29Feb($date) {
      if (!$date)
         return "";
      $date = self::FixDate($date);
      list($day, $month, $year) = explode('/', $date);
      if (!checkdate($month, $day, $year))
         $day = 28;
      return $day."/".$month."/".$year;
   }
   protected static function Today() {
      return date("d/m/Y");
   }
   protected static function SumaAnnos($date, $annos) {
      list($day, $month, $year) = explode('/', $date);
      $year+=$annos;
      return self::Fix29Feb($day."/".$month."/".$year);
   }
   protected static function DateAMinorDateB($DateA, $DateB) {
      list($day1, $month1, $year1) = explode('/', $DateA);
      list($day2, $month2, $year2) = explode('/', $DateB);
      if (($year1*500+$month1*32+$day1) < ($year2*500+$month2*32+$day2))
         return true;
      return false;
   }
   protected static function ValidDate($date) {
      list($day, $month, $year) = explode('/', $date);
      return checkdate($month, $day, $year);
   }

   public static function Between9And18($date) {
      $year9 = self::SumaAnnos(self::Today(), -9);
      $year18 = self::SumaAnnos(self::Today(), -18);
      if ((!self::DateAMinorDateB($year9, $date)) && (!self::DateAMinorDateB($date, $year18)))
         return true;
      return false;
   }
   public static function EqualMore18($date) {
      $year18 = self::SumaAnnos(self::Today(), -18);
      if (!self::DateAMinorDateB($year18, $date))
         return true;
      return false;
   }
   public static function isInteger($cad) {
      if(!self::isEmpty($cad)) {
         if( preg_match( "/^[0-9]*$/" , $cad ) === 1 )
            return true;
         else
            return false;
      }
      return false;
   }
   public static function isEmpty($cad) {
      if(trim($cad) === "")
         return true;
      return false;
   }
   public static function isEmail($cad) {
      $user = '[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+';
      $domain = '(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.([a-z]{2}|com|edu|gov|gob|int|mil|net|org|shop|aero|biz|coop|info|museum|name|shop|arpa|pro|mobi|jobs|travel))+';
      $ipv4 = '[0-9]{1,3}(\.[0-9]{1,3}){3}';
      $ipv6 = '[0-9a-fA-F]{1,4}(\:[0-9a-fA-F]{1,4}){7}';
      return preg_match("/^$user@($domain|(\[($ipv4|$ipv6)\]))$/i", $cad);
   }
   public static function isUrl($cad) {
      if(!self::isEmpty($cad)) {
         if(preg_match("/^http://(www)?[a-zA-Z_0-9-]*([.][a-zA-Z_0-9-]*)*[^.]$/", $cad))
            return true;
         else
            return false;
      }
      return false;
   }
   public static function isFloat($cad) {
      if(self::isEmpty($cad)) {
         if(preg_match("/^[^.][0-9]*.?[0-9]+$/", $cad))
            return true;
         else
            return false;
      }
      return false;
   }
   public static function isDate($cad) {
      if(!self::isEmpty($cad)) {
         if(preg_match("/^[0-9]{1,2}\/[0-9]{1,2}\/[1-9][0-9]{3}$/", $cad)) {
            $aux = explode("/", $cad);
            if($aux[0] > 31)
               return false;
            else
            if($aux[1] > 12)
               return false;
            return true;
         }
         else
            return false;
      }
      return false;
   }
   
   public static function isName($cad) {
      if(!self::isEmpty($cad)) {
         if(preg_match("/^[a-zA-Z áéíóúüñÁÉÍÓÚÜÑ'`´]*$/", $cad))
            return true;
         else
            return false;
      }
      return false;
   }
   public static function isCedula($cad, $len=10) {
      if(!self::isEmpty($cad) && self::isInteger($cad)) {
         if(strlen($cad) <= $len)
            return true;
         return false;
      }
      return false;
   }
   public static function compare($cad, $cad_compare) {
      if((!self::isEmpty($cad)) && (!self::isEmpty($cad_compare))) {
         if($cad == $cad_compare)
            return true;
         return false;
      }
      return false;
   }
   public static function compareString($cad, $cad_compare) {
      if((!self::isEmpty($cad)) && (!self::isEmpty($cad_compare))) {
         if($cad === $cad_compare)
            return true;
         return false;
      }
      return false;
   }
   public static function phoneValid($phone, $state) {
      return phonesStatesVenezuela::findPhoneState($phone, $state);
   }
   public static function isString($cad) {
      if(!self::isEmpty($cad)) {
         if(preg_match("/^[a-zA-ZáéíóúñÁÉÍÓÚÑ]*$/", $cad))
            return true;
         else
            return false;
      }
      return false;
   }
   public static function isValidVnzPhone($phone) {
      $phone = trim($phone);
      if (strlen($phone) < self::PhoneLength)
         return false;
      if (!self::isInteger($phone))
         return false;
      return true;
   }

    public static function nuevaClave(){
        $mayus = '01234abcdefghijklmnopqr678stuvwxyz59';
        $lpass = rand(7,8);
        $i = -1;
        $clave = '';
        do{
            $i++;
            $pos = rand(0,strlen($mayus)-1);
            $clave .= $mayus[$pos];
        }
        while($i <= $lpass - 1);
        return $clave;
    }
    public function ValidateDateMoreEqual18($date) {
      if (validator::isEmpty($date))
         return true;
      if (!validator::isDate($date))
         return false;
      if (!$this->ValidDate($date))
         return false;
      if ($this->EqualMore18($date))
         return true;
      return false;
   }
    
}
?>