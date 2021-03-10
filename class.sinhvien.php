<?php
class sinhvien extends database {
    private $_masv;
    private $_tensv;
    private $_matkhau;
    private $_ngaysinh;
    private $_lop;
    private $_gioitinh;
    private $_khoasv;

    function __construct()
    {
        $this->connect();
    }

    /**
     * @return mixed
     */
    public function getMasv()
    {
        return $this->_masv;
    }

    /**
     * @param mixed $masv
     */
    public function setMasv($masv)
    {
        $this->_masv = $masv;
    }

    /**
     * @return mixed
     */
    public function getTensv()
    {
        return $this->_tensv;
    }

    /**
     * @param mixed $tensv
     */
    public function setTensv($tensv)
    {
        $this->_tensv = $tensv;
    }

    /**
     * @return mixed
     */
    public function getNgaysinh()
    {
        return $this->_ngaysinh;
    }

    /**
     * @param mixed $ngaysinh
     */
    public function setNgaysinh($ngaysinh)
    {
        $this->_ngaysinh = $ngaysinh;
    }

    /**
     * @return mixed
     */
    public function getLop()
    {
        return $this->_lop;
    }

    /**
     * @param mixed $lop
     */
    public function setLop($lop)
    {
        $this->_lop = $lop;
    }

    /**
     * @return mixed
     */
    public function getGioitinh()
    {
        return $this->_gioitinh;
    }

    /**
     * @param mixed $gioitinh
     */
    public function setGioitinh($gioitinh)
    {
        $this->_gioitinh = $gioitinh;
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
     public function getKhoaSv()
    {
        return $this->_khoasv;
    }
    public function setKhoaSv($khoasv)
    {
        $this->_khoasv = $khoasv;
    }

    public function themSV(){
        try
        {
            $sql = "INSERT INTO sinhvien VALUES (N'".$this->getMasv()."',N'".$this->getTensv()."',N'".$this->getMatkhau()."',N'".$this->getKhoaSv()."')";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function suaSV($id){
        try
        {
            $sql = "UPDATE sinhvien SET TenSV = N'".$this->getTensv()."',MatKhau = N'".$this->getMatkhau()."' WHERE MaSV = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function laySV(){
        $sql = "SELECT * FROM sinhvien ORDER BY MaSV DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layMotSV( $id){
        $sql = "SELECT * FROM sinhvien where MaSV = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }
    public function xoaSV($id){
        try
        {
            $sql = "DELETE FROM sinhvien WHERE MaSV = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function checkSV($id){
        $ketqua = $this->layMotSV($id);
        if($ketqua){
            return true;
        }
        else {
            return false;
        }
    }
    public function checkLoginSV($id,$pass){
        $sql = "SELECT * FROM sinhvien where MaSV='$id' AND MatKhau='$pass' ";
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