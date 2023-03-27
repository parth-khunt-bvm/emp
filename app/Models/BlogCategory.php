<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_category';
    use HasFactory;

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'name',

        );
        $query = BlogCategory ::from('blog_category')
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
                ->select('id','name')
                ->where("is_deleted","No")
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteBlogCategory" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-blog-category-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $row['name'];
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
    public function addSubmenu($data){
        $count = BlogCategory::where("name", $data)
       ->count();
       if ($count == 0) {
           $obj = new BlogCategory();
           $obj->name = $data;
           $obj->created_at = date("Y-m-d h:i:s");
           $obj->updated_at = date("Y-m-d h:i:s");
           if ($obj->save()) {
             return "true";
           } else {
               return "wrong";
            }
       }
       else {
            return "exits";
       }
    }
    public function getDetail($id){
        return BlogCategory::select('id','name')->where("id",$id)->get();
    }
    public function editDetail($request){
        $count = BlogCategory::where("name",$request->input('name'))
        ->count();
        if ($count == 0) {
            $obj  = BlogCategory::find($request->input('editId'));
            $obj->name = $request->input('name');
            $obj->updated_at = date("Y-m-d h:i:s");
            if ($obj->save()) {
              return "true";
            } else {
                return "wrong";
             }
        }
        else {
             return "exits";
        }

    }

    public function getAllDetails(){
        return BlogCategory::select('id','name')
        ->where("is_deleted","No")->get();
    }

    public function  deleteBlogCategory($data){
        $obj = BlogCategory::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }
}
