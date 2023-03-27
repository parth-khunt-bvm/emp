<?php

namespace App\Http\Controllers\frontend\team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App\Models\OurTeam;
class TeamController extends Controller
{
     //
     function __construct(){

    }

    public function team(Request $request){
        $objDetails = new OurTeam();
        $data['ourTeam'] = $objDetails->getAllDetails();
        $data['title'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'title.OUR_TEAM_PAGE' ) ;
        $data['description'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'description.OUR_TEAM_PAGE' ) ;
        $data['keywords'] = Config::get( 'constants.PROJECT_NAME' ) . ' || '. Config::get( 'keywords.OUR_TEAM_PAGE' ) ;
        $data['css'] = array(
        );
        $data['plugincss'] = array(
        );
        $data['pluginjs'] = array(
        );
        $data['js'] = array(
        );
        $data['funinit'] = array(
        );
        $data['header'] = array(
            'title' => 'Our Team',
            'breadcrumb' => array()
        );
        return view('frontend.pages.team.team', $data);
    }
}
