<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'image',
            2 => 'title',
            3 => 'description',
               );
        $query = Blog ::from('blog')
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
                ->select('id','image','title','description','category_id')
                ->where("is_deleted","No")
                ->get();
        $data = array();


        $i = 0;
        foreach ($resultArr as $row) {
            $image = url("public/upload/blog/" . $row['image']);

            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteBlog" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>'
            .'<a href="' . route('admin-blog-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>';

            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = '<img height="100px" width="100px" src="' . $image . '" style="margin:10px;">';
            $nestedData[] = $row['title'];
            $nestedData[] = $row['description'];
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
    public function addBlog($request){

        $obj = new Blog();

        if ($request->file('image')) {
            $image = $request->file('image');
            $blogimage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/blog');
            $image->move($destinationPath, $blogimage);
            $obj->image = $blogimage;
        }
        $obj->title = $request->input('title');
        $obj->category_id = $request->input('category_id');
        $obj->short_description = $request->input('short_description');
        $obj->description = $request->input('description');
           $obj->created_at = date("Y-m-d h:i:s");
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();


    }
    public function getDetail($id){
        return Blog::select('id','category_id','image','title','short_description','description')->where("id",$id)->get();
    }
    public function editDetail($request){
        $obj = new Blog();
        $obj  = Blog::find($request->input('editId'));
        if ($request->file('image')) {
            $image = $request->file('image');
            $blogimage = time() . '1.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/blog');
            $image->move($destinationPath, $blogimage);
            $obj->image = $blogimage;
        }
        $obj->title = $request->input('title');
        $obj->category_id = $request->input('category_id');
        $obj->short_description = $request->input('short_description');
        $obj->description = $request->input('description');
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }

    public function getAllDetails(){
        return Blog::from('blog')
                    ->join("blog_category","blog_category.id","=","blog.category_id")
                    ->select('blog.id','blog_category.name','blog.image','blog.title','blog.short_description','blog.description')
                    ->where("blog.is_deleted","No")
                    ->get();
    }
    public function getBlogsDetail($id){
        return Blog::from('blog')
                    ->join("blog_category","blog_category.id","=","blog.category_id")
                    ->select('blog.id','blog_category.name','blog.image','blog.title','blog.short_description','blog.description')
                    ->where("blog.is_deleted","No")
                    ->where("blog.id",$id)
                    ->get();
    }
    public function  deleteBlog($data){
        $obj = Blog::find($data['id']);
        $obj->is_deleted = "Yes";
        $obj->updated_at = date("Y-m-d h:i:s");
        return $obj->save();
    }

}
