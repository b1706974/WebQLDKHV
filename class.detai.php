<?php
class detai extends database {
    private $_madt;
    private $_tendt;
    private $_masv;
    private $_magv;
    private $_trangthai;
    private $_diem;
    private $_namhoc;

    function __construct()
    {
        $this->connect();
    }

    /**
     * @return mixed
     */
    public function getMadt()
    {
        return $this->_madt;
    }

    /**
     * @param mixed $madt
     */
    public function setMadt($madt)
    {
        $this->_madt = $madt;
    }

    /**
     * @return mixed
     */
    public function getTendt()
    {
        return $this->_tendt;
    }

    /**
     * @param mixed $tendt
     */
    public function setTendt($tendt)
    {
        $this->_tendt = $tendt;
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
    public function getTrangthai()
    {
        return $this->_trangthai;
    }

    /**
     * @param mixed $trangthai
     */
    public function setTrangthai($trangthai)
    {
        $this->_trangthai = $trangthai;
    }

    /**
     * @return mixed
     */
    public function getDiem()
    {
        return $this->_diem;
    }

    /**
     * @param mixed $diem
     */
    public function setDiem($diem)
    {
        $this->_diem = $diem;
    }

    /**
     * @return mixed
     */
    public function getNamhoc()
    {
        return $this->_namhoc;
    }

    /**
     * @param mixed $namhoc
     */
    public function setNamhoc($namhoc)
    {
        $this->_namhoc = $namhoc;
    }



    public function themDT(){
        try
        {
            $sql = "INSERT INTO detai VALUES ( null ,N'".$this->getTendt()."',N'".$this->getMasv()."',N'".$this->getMagv()."',N'".$this->getNamhoc()."',N'".$this->getTrangthai()."','".$this->getDiem()."')";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function suaDT($id){
        try
        {
            $sql = "UPDATE detai SET TenDT = N'".$this->getTendt()."',MaSV = N'".$this->getMasv()."',MaGV = N'".$this->getMagv()."',MaNH = N'".$this->getNamhoc()."',TrangThai = N'".$this->getTrangthai()."', Diem = '".$this->getDiem()."' WHERE MaDT = '$id'";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function layDT(){
        $sql = "SELECT * FROM detai ORDER BY MaDT DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layDTTheoGV($magv){
        $sql = "SELECT * FROM detai WHERE MaGV='$magv' ORDER BY MaDT DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layDTTheoSV($masv){
        $sql = "SELECT * FROM detai WHERE MaSV='$masv' ORDER BY MaDT DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layDTTheoNH($nh){
        $sql = "SELECT * FROM detai WHERE MaNH='$nh' ORDER BY MaDT DESC";
        $this-> query($sql);
        return $this-> fetchALL();
    }
    public function layMotDT($id){
        $sql = "SELECT * FROM detai where MaDT = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }
        public function ttDT($id){
        $sql = "SELECT * FROM detai where MaDT = '$id' ";
        $this-> query($sql);
        return $this-> fetch();
    }
    public function xoaDT($id){
        try
        {
            $sql = "DELETE FROM detai WHERE MaDT = '$id' ";
            $this-> query($sql);
            return true;
        }
        catch(mysqli_sql_exception $e)
        {
            return false;
        }
    }
    public function checkDT($id){
        $kq = $this->layMotDT($id);
        if ( $kq == null ){
            return false;
        }
        else{
            return true;
        }
    }

}
?>