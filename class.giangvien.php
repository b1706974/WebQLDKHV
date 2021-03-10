<?php
class giangvien extends database {
    private $_magv;
    private $_tengv;
    private $_matkhau;
    function __construct()
    {
        $this->connect();
    }

    /**
     * @return mixed
     */
    public function getMagv()
    {
        return $this->_magv;
    }

    /**
     * @param mixed $magv
     */
    public function setMagv($magv)
    {
        $this->_magv = $magv;
    }

    /**
     * @return mixed
     */
    public function getTengv()
    {
        return $this->_tengv;
    }

    /**
     * @param mixed $tengv
     */
    public function setTengv($tengv)
    {
        $this->_tengv = $tengv;
    }

    /**
     * @return mixed
     */
    public function getMatkhau()
    {
        return $this->_matkhau;
    }

    /**
     * @param mixed $matkhau
     */
    public function setMatkhau($matkhau)
    {
        $this->_matkhau = $matkhau;
    }


    public function themGV(){
        try
        {
            $sql = "INSERT INTO giangvien VALUES (N'".$this->getMagv()."',N'".$this->getTengv()."',N'".$this->getMatkhau()."')";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function suaGV($id){
        try
        {
            $sql = "UPDATE giangvien SET TenGV = N'".$this->getTengv()."',MatKhau = N'".$this->getMatkhau()."' WHERE MaGV = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function layGV(){
        $sql = "SELECT * FROM giangvien ORDER BY MaGV DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layMotGV($id){
        $sql = "SELECT * FROM giangvien where MaGV = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }
    public function xoaGV($id){
        try
        {
            $sql = "DELETE FROM giangvien WHERE MaGV = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function checkGV($id){
        $ketqua = $this->layMotGV($id);
        if($ketqua){
            return true;
        }
        else {
            return false;
        }
    }
    public function checkLoginGV($id,$pass){
        $sql = "SELECT * FROM giangvien where MaGV='$id' AND MatKhau='$pass' ";
        $this-> query($sql);
        $ketqua = $this->fetch();
        if($ketqua){
            return true;
        }
        else {
            return false;
        }
    }
}
?>