<?php
include_once 'reportOrder.php';
include_once 'reportPatient.php';
include_once 'reportPharmacy.php';

class reportFactory
{
    public  function getReport($reportType){
        if($reportType == null){
            return null;
        }		
        if($reportType=="order"){
            return new reportOrder();
            
        } else if($reportType=="patient"){
            return new reportPatient();
            
        } else if($reportType=="pharmacy"){
            return new reportPharmacy();
        }
        
        return null;
        }
}

?>
