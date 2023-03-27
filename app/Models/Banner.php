<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banner";

    public function getBannerList(){
        return Banner::select('page_name','image','id')->get();
    }

    public function getdatatable(){
            $requestData = $_REQUEST;
            $columns = array(
                0 => 'banner.id',
                1 => 'banner.page_name',
                2 => 'banner.image',

            );
            $query = BlogCategory ::from('banner');


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
                    ->select('banner.id','banner.image','banner.page_name')
                    ->get();
            $data = array();
            $i = 0;
            foreach ($resultArr as $row) {
                $image = url("public/upload/banner_image/" . $row['image']);

                $actionhtml = '<a href="' . route('admin-banner-edit', $row['id']) . '" class="btn btn-icon primary"><i class="fa fa-edit"> </i></a>';

                $i++;
                $nestedData = array();
                $nestedData[] = $i;
                $nestedData[] = $row['page_name'];
                $nestedData[] = '<img height="100px" width="320px" src="' . $image . '" style="margin:10px;">';
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

    public function getBannerDetails($id){
        return Banner::select('page_name','image','id')->where('id',"=",$id)->get();
    }

    public function editDetail($request){

        $objBanner  = Banner::find($request->input('editId'));
        if ($request->file('image')) {
            $image = $request->file('image');
            $blogimage = time().".".$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/banner_image');
            $image->move($destinationPath, $blogimage);
            $objBanner->image = $blogimage;
        }
        $objBanner->updated_at = date("Y-m-d h:i:s");
        return $objBanner->save();


    }

}
