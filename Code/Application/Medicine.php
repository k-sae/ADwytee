<?php

class Medicine
{
	private $Code;
  private $EnName;
  private $ArName;
  private $Description;

  public function setCode($Code)
  {
    $this->Code =$Code;
  }
  public function getCode()
  {
    return ($this->Code);
  }

  public function setEnName($EnName)
  {
    $this->EnName =$EnName;
  }
  public function getEnName()
  {
    return ($this->EnName);
  }

  public function setArName($ArName)
  {
    $this->ArName =$ArName;
  }
  public function getArName()
  {
    return ($this->ArName);
  }

  public function setDescription($Description)
  {
    $this->Description =$Description;
  }
  public function getDescription()
  {
    return ($this->Description);
  }

}
?>