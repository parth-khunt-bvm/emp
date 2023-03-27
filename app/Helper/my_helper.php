<?php
use App\Models\Details;
use App\Models\Banner;
use App\Models\Menuaccess;

function getdetails() {
    $objDetails = new Details();
    return $objDetails->getDetails();
}

function getBannerDetails($id) {
    $ojBanner = new Banner();
    return $ojBanner->getBannerDetails($id);
}
function menuaccessList() {
    $objMenuaccess = new Menuaccess();
    return $objMenuaccess->getMenuList();
}

?>
