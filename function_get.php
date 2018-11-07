<?php
class ConNguoi {
    private $title = "Việt Nam vô địch";
    private $age = 30;
    public function __get($key){
        if(property_exists($this, $key)){
            return $this->$key;
        }
        else{
            die('Không tồn tại thuộc tính');
        }
    }
    public function getTitle(){
        echo $this->title;
    }
}
$vietname = new ConNguoi();
echo $vietname->title;
echo $vietname->age;

?>