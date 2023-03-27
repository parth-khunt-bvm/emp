<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerDetail extends Model
{
    use HasFactory;
    protected $table = "career_detail";
    public function saveDetails($request){
        // print_r($request->file());
        // die();
        $objCareerDetail = new CareerDetail();
        $objCareerDetail->name =$request->input('name');
        $objCareerDetail->email =$request->input('email');
        if($request->input('phone') == NULL || $request->input('phone') == ''){
            $objCareerDetail->phone = NULL;
        }else{
            $objCareerDetail->phone = $request->input('phone');
        }
        if ($request->file('file')) {
            $imagenew = $request->file('file');
            $file = time() . '1.' . $imagenew->getClientOriginalExtension();
            $destinationPath = public_path('/upload/career_file');
            $imagenew->move($destinationPath, $file);
            $objCareerDetail->file = $file;
        }

        $objCareerDetail->message =$request->input('message');
        $objCareerDetail->experience =$request->input('experience');
        $objCareerDetail->department =$request->input('department');
        $objCareerDetail->updated_at = date("Y-m-d h:i:s");
        $objCareerDetail->updated_at = date("Y-m-d h:i:s");
        if($objCareerDetail->save()){

            return true;
        }else{
            return false;
        }
    }
    public function getdatatable(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'career_detail.id',
            1 => 'career_detail.name',
            2 => 'career_detail.email',
            3 => 'career_detail.phone',
            4 => 'career_detail.message',
            5 => 'career_detail.file',
        );
        $query = CareerDetail ::from('career_detail');


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
                ->select('career_detail.id','career_detail.name','career_detail.email','career_detail.phone','career_detail.message','career_detail.file')
                ->get();
        $data = array();
        $i = 0;
        foreach ($resultArr as $row) {
            $file = url("public/upload/career_file/" . $row['file']);
            $actionhtml = '<a href="#" data-toggle="modal" data-target="#deleteModel" class="btn btn-icon  deleteCareerDetail" data-id="' . $row["id"] . '" ><i class="fa fa-trash" ></i></a>';
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = ucfirst($row['name']);
            $nestedData[] = $row['email'];
            if($row['phone'] != NULL || $row['phone'] != ''){
                $nestedData[] = $row['phone'];
            }else{
                $nestedData[] = "N/A";
            }
            $nestedData[] = $row['message'];
            $nestedData[] = "<a href='$file' download>Resume</a>";
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
    public function deleteList($data){
        return $result = CareerDetail::where('id', $data['id'])
        ->delete();
    }

}
