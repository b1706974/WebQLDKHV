<?php
class namhoc extends database {
    private $_manh;
    private $_tennh;

    /**
     * @return mixed
     */
    public function getManh()
    {
        return $this->_manh;
    }

    /**
     * @param mixed $manh
     */
    public function setManh($manh)
    {
        $this->_manh = $manh;
    }

    /**
     * @return mixed
     */
    public function getTennh()
    {
        return $this->_tennh;
    }

    /**
     * @param mixed $tennh
     */
    public function setTennh($tennh)
    {
        $this->_tennh = $tennh;
    }


    public function themNH(){
        try
        {
            $sql = "INSERT INTO namhoc VALUES (null,N'".$this->getTennh()."')";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function suaNH($id){
        try
        {
            $sql = "UPDATE namhoc SET TenNH = N'".$this->getTennh()."' WHERE MaNH = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function layNH(){
        $sql = "SELECT * FROM namhoc ORDER BY MaNH ASC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layMotNH($id){
        $sql = "SELECT * FROM namhoc where MaNH = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }
    public function xoaNH($id){
        try
        {
            $sql = "DELETE FROM namhoc WHERE MaNH = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function checkNH($id){
        $kq = $this->layMotNH($id);
        if ( $kq == null ){
            return false;
        }
        else{
            return true;
        }
        
    }
}