<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'gallery.id',
            1 => 'gallery.name',
            2 => 'gallery.image',
            3 => 'gallery.url',
            4 => 'gallerysubmenu.name',
        );
        $query = Gallery ::from('gallery')
                        ->join("gallerysubmenu","gallerysubmenu.id","=","gallery.submenu_id")
                        ->where("gallery.is_deleted","No");


        if (!empty($requestData['search']['value'])) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $searchVal = $requestData['search']['value'];
            $query->where(function($query) use ($columns, $searchVal, $requestData) {
                $flag = 0;
                foreach ($columns as $key => $value) {
                    $searchVal = $requestData['search']['value'];
                    if ($requestData['columns'][$key]['searchable'] == 'true') {
                        if ($flag == 0) {
                            $query->where($value, 'like', '%' . $searchVal . '%');
                            $flag = $flag + 1;
                        } else {
                            $query->orWhere($value, 'like', '%' . $searchVal . '%');
                        }
                    }
                }
            });
        }

        $temp = $query->orderBy($columns[$requestData['order'][0]['column']], $requestData['order'][0]['dir']);

        $totalData = count($temp->get());
        $totalFiltered = count($temp->get());

        $resultArr = $query->skip($requestData['start'])
                ->take($requestData['length'])
                ->select('gallery.id','gallery.name','gallery.image','gallery.url','gallerysubmenu.name as cat_name')
                ->where("gallery.is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $image = url("public/upload/galleryimage/" . $row['image']);

            $actionhtml ='<a href="'.$row['url'].'"  class="btn btn-icon " target="_blank" title="Link"><i class="fa fa-link" ></i></a>'
            .'<a href="' . route('admin-portfolio-edit', $row['id']) . '" class="btn btn-icon primary" title="Edit Portfolio"><i class="fa fa-edit"> </i></a>'
            .'<a href="#" data-toggle="modal" data-target="#deleteModel" title="Delete Portfolio" class="btn btn-icon   deleteGallery" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = '<img class="rounded-circle" height="100px" width="100px" src="' . $image . '" style="margin:10px;">';
            $nestedData[] = $row['name'];
            $nestedData[] = $row['cat_name'];
            $nestedData[] = $actionhtml;
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );
        return $json_data;
    }
    public function addGalleryImage($request){


        $obj = new Gallery();
        $obj->name = $request->input('name');
        $obj->submenu_id = $request->input('submenu_id');
        if ($request->file('image')) {
            $image = $request->file('image');
            $galleryimage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/galleryimage');
            $image->move($destinationPath, $galleryimage);
            $obj->image = $galleryimage;
        }
        $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();


    }
    public function getDetail($id){
        return Gallery::select('id','name','image','submenu_id')->where("id",$id)->get();
    }
    public function editDetail($request){
        $obj = new Gallery();
        $obj  = Gallery::find($request->input('editId'));
        $obj->name = $request->input('name');
        $obj->submenu_id = $request->input('submenu_id');
        if ($request->file('image')) {
            $image = $request->file('image');
            $galleryimage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/galleryimage');
            $image->move($destinationPath, $galleryimage);
            $obj->image = $galleryimage;
        }
        $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }

    public function getAllDetails(){
        return Gallery::from('gallery')
                        ->join("gallerysubmenu","gallerysubmenu.id","=","gallery.submenu_id")
                        ->select('gallery.id','gallery.name','gallery.image','gallerysubmenu.name as cat_name','gallery.url')
                        ->where("gallery.is_deleted","No")
                        ->where("gallerysubmenu.is_deleted","No")
                        ->get();
    }

    public function  deleteGallery($data){
        $obj = Gallery::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }


}
