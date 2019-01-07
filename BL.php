<?php
declare(strict_types=1);
include "DAL.php";
class BL
{
    public $dal;
    function __construct()
    {
        $this->dal=new DAL("localhost","root","","robotrainer");
    }//construct

    /**
     * @param $name
     * @param $Username
     * @param $Password
     * @param $Weight
     * @param $Target
     * @param $height
     * @return mixed
     */
    public function createNewUser($name,$Username, $Password, $Weight, $Target,$height)
    {
         $sql = "INSERT INTO User (name,Username,password,Weight,Target,height) VALUES(\"$name \",\"$Username \",\"$Password \",$Weight ,\"$Target \",$height)";
         return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $username
     * @param $password
     * @return
     */
    public function loginUser($username, $password){
        $sql="SELECT * FROM User WHERE Username=\"$username\" AND password=\"$password\"";
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCourse($id){
        $sql="SELECT * FROM course WHERE userID =".$id;
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @return mixed
     */
    public function getUsers(){
        $sql="SELECT * FROM User";
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $filter
     * @return mixed
     */
    public function getUsersFiltered($filter){
        $sql="SELECT * FROM User WHERE Target=\"$filter\"";
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @param $e
     * this method is used to add new products
     * @param $f
     * @param $g
     * @return mixed
     */
    public function addNewProduct($a, $b, $c, $d, $e,$f,$g){
        $sql="INSERT INTO products (name,price,rate,describtion,image,brand,categ) VALUES(\"$a\",$b,$c,\"$d\",\"$e\",\"$f\",\"$g\")";
        return $result= $this->dal->executeSelect($sql);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProduct($id){
        $sql="SELECT * FROM products WHERE id=".$id;
        return  $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @param $e
     * @param $f
     * @param $g
     * @return mixed
     */
    public function updateProduct($a, $b, $c, $d, $e, $f, $g,$id){
        $sql="UPDATE products SET name=\"$a\"
        ,price=$b
        ,rate=$c
        ,describtion=\"$d\"
        ,image=\"$e\"
        ,brand=\"$f\"
        ,categ=\"$g\"
        WHERE id =".$id;
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $a
     * @param $b
     * @param $c
     * @param $d
     * @param $f
     * @param $g
     * @return mixed
     */
    public function updateProductNoImage($a, $b, $c, $d, $f, $g,$id){
        $sql="UPDATE products SET name=\"$a\"
        ,price=$b
        ,rate=$c
        ,describtion=\"$d\"
        ,brand=\"$f\"
        ,categ=\"$g\"
        WHERE id=".$id;
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function removePro($id){
        $sql="DELETE FROM products WHERE id =".$id;
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $name
     * @param $pro
     * @param $img
     * @return mixed
     */
    public function addTrainer($name, $pro, $img,$user,$pass){
        $sql="INSERT INTO coach (name,profession,img,username,password) VALUES (\"$name\",\"$pro\",\"$img\",\"$user\",\"$pass\")";
        return $result= $this->dal->executeSelect($sql);
    }
    public function loginCoach($Username, $password){
        $sql="SELECT * FROM coach WHERE username=\"$Username\" AND password=\"$password\"";
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $oldWeight
     * @param $newWeight
     * @return mixed
     */
    public function updateWeight($oldWeight, $newWeight){
     $sql="UPDATE user set Weight=$oldWeight, newWeight =$newWeight";
        return $result= $this->dal->executeSelect($sql);
    }

    /**
     * @param $category
     * @return mixed
     */
    public function retrieveProducts($category){
    $sql="SELECT * FROM products WHERE categ=\"$category\"";
    return $result= $this->dal->executeSelect($sql);
}

    /**
     * @param $customerName
     * @param $customerPhone
     * @param $customerEmail
     * @param $totalAmount
     * @param $customerAddress
     * @return mixed
     */
    public function addOrder($customerName, $customerPhone, $customerEmail, $totalAmount,$customerAddress){
    $sal_statement="INSERT INTO orders (name,phone,email,totalAmount,address) VALUES (\"$customerName\",\"$customerPhone\",\"$customerEmail\",\"$totalAmount\",\"$customerAddress\") ";
    return $result=$this->dal->executeSelect($sal_statement);

}

    /**
     * @return mixed
     */
    public function latestId(){
        $sql = "select max(id) from orders";
        return $this->dal->executeSelect($sql);
    }

    /**
     * @param $orderId
     * @param $productId
     * @param $productName
     * @param $productQuantity
     * @param $productPrice
     * @param $productTotalPrice
     * @return mixed
     */
    public function fillOrderDetails($orderId, $productId, $productName, $productQuantity, $productPrice, $productTotalPrice ){
        $sql = "INSERT INTO `orderdetails` (`orderId`, `productId`, `ProductName`, `productQuantity`, `productPrice`, `productTotalPrice`) VALUES ($orderId, $productId, \"$productName\", $productQuantity, $productPrice, $productTotalPrice)";
        return $this->dal->executeSelect($sql);
    }
    public function adminLogin($username,$password){
        $sql="SELECT * FROM admin WHERE username=\"$username\" AND password=\"$password\"";
        return $this->dal->executeSelect($sql);
    }
    /**
     * @return mixed
     */
    public function orders(){
        $sql="SELECT * FROM orders ";
        return $this->dal->executeSelect($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function orderbyId($id){
        $sql="SELECT * FROM orderdetails WHERE orderId=".$id;
        return $this->dal->executeSelect($sql);
    }

    /**
     * @return mixed
     */
    public function latestIdUser(){
        $sql = "select max(Id) from user";
        return $this->dal->executeSelect($sql);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function foodAndCourse($id){
        $sql = "INSERT INTO course (SC, SB, SS, ST, SBI, SL, MC, MB, MS, MT, MBI, ML, TC, TB, TS, TT, TBI, TL, WC, WB, WS, WT, WBI, WL, HC, HB, HS, HT, HBI, HL, userID,food,proID) VALUES ('X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X','X',$id, '2 Apple<br>3 waters<br>5 banana', 1)";
        return $this->dal->executeSelect($sql);
    }

    /**
     * @param $pro_id
     * @param $new_state
     * @return mixed
     */
    public function updatestate($pro_id, $new_state){
        $sql="UPDATE orders SET state =\"$new_state\" WHERE id=$pro_id";
        return $this->dal->executeSelect($sql);

    }

    }//class