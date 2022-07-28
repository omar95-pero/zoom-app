<?php
namespace App\Http\Controllers;
use App\Models\Files\Restaurant_image;
use Storage;
use App\Models\Files\Food_image;

class Upload extends Controller {
	/*
	'name',
	'size',
	'file',
	'path',
	'full_file',
	'mime_type',
	'file_type',
	'relation_id',
	 */

	 public function delete($id)
	 {
		 $file = Restaurant_image::find($id);
		 if (!empty($file)) {
			 	Storage::delete($file->full_file);
				$file->delete();
		 }
	 }


	public function upload($data = []) {

		if (in_array('new_name', $data)) {
			$new_name = $data['new_name'] === null?time():$data['new_name'];
		}

		if ('single' == $data['upload_type'] ) {

			Storage::has($data['delete_file'])?Storage::delete($data['delete_file']):'';
			return request()->file($data['file'])->store($data['path']);

		}elseif (request()->hasFile($data['file']) && 'files' == $data['upload_type'] ) {

			 $file = request()->file($data['file']);

			 $size      = $file->getSize();
			 $mime_type = $file->getMimeType();
			 $name      = $file->getClientOriginalName();
			 $hashname  = $file->hashName();

			 $file->store($data['path']);

			 $add = Restaurant_image::create([
				 'name'        => $name,
				 'size'        => $size,
				 'file'        => $hashname,
				 'path'        => $data['path'],
				 'full_file'   => $data['path'].'/'. $hashname,
				 'mime_type'   => $mime_type,
				 'file_type'   => $data['file_type'],
				 'relation_id' => $data['relation_id'],
			 ]);

			 // return $data['path'].'/'. $hashname;

			 return $add->id;


		}
	}


}
