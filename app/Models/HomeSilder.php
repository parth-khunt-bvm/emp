<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSilder extends Model
{
    use HasFactory;
    protected $table = 'silder';

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'silder.id',
            1 => 'silder.image',
            2 => 'silder.title',
            3 => 'silder.description'

        );
        $query = HomeSilder ::from('silder')
            ->where("is_deleted","No");
        
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
                ->select('silder.id','silder.image','silder.title','silder.description')
                ->where("is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $image = url("public/upload/homesilder/" . $row['image']);

            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteHomeSilder" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-home-silder-edit', $row['id']) . '" class="btn btn-icon"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = '<img class="rounded-circle" height="100px" width="100px" src="' . $image . '" style="margin:10px;">';
            $nestedData[] = ucfirst($row['title']);
            $nestedData[] = ucfirst($row['description']);
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


    public function addDetail($request){
        $obj = new HomeSilder();
        $obj->title = $request->input('title');
        $obj->description = $request->input('description');
        if ($request->file('image')) {
            $image = $request->file('image');
            $silderImage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/homesilder');
            $image->move($destinationPath, $silderImage);
            $obj->image = $silderImage;
        }
        $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }

    public function getDetail($id){
        return HomeSilder::select('id','image','title','description')->where("id",$id)->get();
    }


    public function editDetail($request){

        $obj  = HomeSilder::find($request->input('editId'));
        $obj->title = $request->input('title');
        $obj->description = $request->input('description');

        if ($request->file('image')) {
            $image = $request->file('image');
            $silderImage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/homesilder');
            $image->move($destinationPath, $silderImage);
            $obj->image = $silderImage;
        }

        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }

    public function getAllDetails(){
        return HomeSilder::select('id','image','title','description')
        ->where("is_deleted","No")->get();
    }

    public function  deleteHomeSilder($data){
        $obj = HomeSilder::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}
