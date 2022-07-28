<?php


namespace App\Http\Traits;


trait Upload_Files
{



    //---------------Upload Files----------------
    public function uploadFiles($folder_name,$file,$is_updated_file){
        //upload or update
        $fileNameToStore=null;

        if ($file){
            if ($is_updated_file!=null) {
             //   $fileNameToStore=$is_updated_file;
                \Storage::delete($is_updated_file);
            }
            $fileName_original =$file->getClientOriginalName();
            $fileNameWithExt =$file->getClientOriginalExtension();
            $fileName = $folder_name.'/'.pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //$ext =$file->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_'.$fileName_original . '_'.time() . '.' . $fileNameWithExt;
            $file->storeAs('/', $fileNameToStore);
        }else{
            $fileNameToStore=$is_updated_file;
        }

        return $fileNameToStore!=null?$fileNameToStore:null;
    }//end


    /**
     * @param $oldPath
     * @param $folder_name
     * @return string
     */
    public function copy_file($oldPath , $folder_name)
    {
        $fileExtension = \File::extension($oldPath);
        $newName = 'copy_image'.time().'_'.rand(111,999).'.'.$fileExtension;
        $newPathWithName = $folder_name.'/'.$newName;
        \File::copy(storage_path() . '/app/public/'.$oldPath,
            storage_path() . '/app/public/'.$newPathWithName);
        return $newPathWithName;
    }//end fun


}//end trait
