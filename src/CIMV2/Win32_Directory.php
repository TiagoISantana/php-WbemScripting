<?php


namespace CIMV2;

use Connector\WMIConnector;

/**
 * Class Win32_UserAccount
 * @package CIMV2
 */
final class Win32_Directory extends WMIConnector
{


    public function getAttributes()
    {

        $a =0;

        $volumes = $this->_wmi_connector->ExecQuery("SELECT * FROM Win32_Directory");

        $data = [];

        foreach ($volumes as $volume){

            $data[] = [
                'AccessMask'=>$volume->AccessMask,
                'Archive'=>$volume->Archive,
                'Caption'=>$volume->Caption,
                'Compressed'=>$volume->Compressed,
                'CompressionMethod'=>$volume->CompressionMethod,
                'CreationClassName'=>$volume->CreationClassName,
                'CreationDate'=>$volume->CreationDate,
                'CSCreationClassName'=>$volume->CSCreationClassName,
                'CSName'=>$volume->CSName,
                'Description'=>$volume->Description,
                'Drive'=>$volume->Drive,
                'EightDotThreeFileName'=>$volume->EightDotThreeFileName,
                'Encrypted'=>$volume->Encrypted,
                'EncryptionMethod'=>$volume->EncryptionMethod,
                'Extension'=>$volume->Extension,
                'FileName'=>$volume->FileName,
                'FileSize'=>$volume->FileSize,
                'FileType'=>$volume->FileType,
                'FSCreationClassName'=>$volume->FSCreationClassName,
                'FSName'=>$volume->FSName,
                'Hidden'=>$volume->Hidden,
                'InstallDate'=>$volume->InstallDate,
                'InUseCount'=>$volume->InUseCount,
                'LastAccessed'=>$volume->LastAccessed,
                'LastModified'=>$volume->LastModified,
                'Name'=>$volume->Name,
                'Path'=>$volume->Path,
                'Readable'=>$volume->Readable,
                'Status'=>$volume->Status,
                'System'=>$volume->System,
                'Writeable'=>$volume->Writeable,
            ];

            if($a == 15)
                break;

            $a++;

        }
        return $data;


    }

}