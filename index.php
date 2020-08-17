<?php 
include './CheckCookie.php';
$cookie_name = "bookshop_user";
$mo = "";
if (isset($_COOKIE[$cookie_name])) {

    $mo = chk_cookie($_COOKIE[$cookie_name]);

    if ($mo == "ok") {
        // header('Location: ' . "home.php");
        // exit();
    }
}else{
  header('Location: ' . "auth.php");
  exit();
}


// -----------------------
include 'head_res.php'; 
if (isset($_GET['url'])) {

  if ($_GET['url'] == "new_user") {
        include_once './new_user.php';
    }
    if ($_GET['url'] == "user_p") {
        include_once './user_permission.php';
    }
    if ($_GET['url'] == "change_password") {
        include_once './change_password.php';
    }

    
  // if ($_GET['url'] == "registration"){
  //   include 'm_registration.php';
  // }


  if ($_GET['url'] == "store"){
    include 'm_store.php';
  }

  
  if ($_GET['url'] == "category"){
    include 'm_category.php';
  }

  if ($_GET['url'] == "registration"){
    include 'm_registration.php';
  }
  if ($_GET['url'] == "student_verification"){
    include 'm_student_verification.php';
  }
  if ($_GET['url'] == "orders"){
    include 'm_order.php';
  }


  if ($_GET['url'] == "system_info"){
    include 'sys_info.php';
  }
  if ($_GET['url'] == "shop_item"){
    include 'm_shop_item.php';
  }

  if ($_GET['url'] == "publisher"){
    include 'm_publisher.php';
  }
  if ($_GET['url'] == "author"){
    include 'm_author.php';
  }

  if ($_GET['url'] == "school"){
    include 'm_school.php';
  }
  if ($_GET['url'] == "level"){
    include 'm_level.php';
  }

  if ($_GET['url'] == "level_type"){
    include 'm_level_type.php';
  }

  if ($_GET['url'] == "book"){
    include 'm_book.php';
  }
  if ($_GET['url'] == "arts_and_crafts"){
    include 'm_arts_and_crafts.php';
  }
  if ($_GET['url'] == "uniform"){
    include 'm_uniform.php';
  }
  if ($_GET['url'] == "health_and_sports"){
    include 'm_health_and_sports.php';
  }
  if ($_GET['url'] == "snacks_and_deco"){
    include 'm_snacks_and_deco.php';
  }
  if ($_GET['url'] == "toys_and_gifts"){
    include 'm_toys_and_gifts.php';
  }
  if ($_GET['url'] == "cards_and_flowers"){
    include 'm_cards_and_flowers.php';
  }
  if ($_GET['url'] == "pre_owned"){
    include 'm_pre_owned.php';
  }



  if ($_GET['url'] == "complaint"){
    include 'm_complaint.php';
  }
  if ($_GET['url'] == "inquiry"){
    include 'm_inquiry.php';
  }
  if ($_GET['url'] == "feedback"){
    include 'm_feedback.php';
  }


  if ($_GET['url'] == "inquiry_type"){
    include 'm_inquiry_type.php';
  }






  if ($_GET['url'] == "book_allo"){
    include 'm_book_allo.php';
  }
  if ($_GET['url'] == "arts_and_crafts_allo"){
    include 'm_arts_and_crafts_allo.php';
  }
  if ($_GET['url'] == "uniform_allo"){
    include 'm_uniform_allo.php';
  }

  
  if ($_GET['url'] == "health_and_sports_allo"){
    include 'm_health_and_sports_allo.php';
  }
  if ($_GET['url'] == "snacks_and_deco_allo"){
    include 'm_snacks_and_deco_allo.php';
  }
  if ($_GET['url'] == "toys_and_gifts_allo"){
    include 'm_toys_and_gifts_allo.php';
  }

  if ($_GET['url'] == "cards_and_flowers_allo"){
    include 'm_cards_and_flowers_allo.php';
  }














  if ($_GET['url'] == "product_upload"){
    include 'm_product_upload.php';
  }

  if ($_GET['url'] == "manage_syllabus"){
    include 'm_manage_syllabus.php';
  }

  if ($_GET['url'] == "delivery_rate"){
    include 'm_delivery_rate.php';
  }



















  







  if ($_GET['url'] == "order_a_report"){
    include 'r_order_a_report.php';
  }
  if ($_GET['url'] == "item_a_report"){
    include 'r_item_a_report.php';
  }
  if ($_GET['url'] == "xero_report"){
    include 'r_xero_report.php';
  }
  
  
  if ($_GET['url'] == ""){
    include 'dashboard.php';
  }

}else{
	include 'dashboard.php'; 
}

include 'foot_res.php'; ?>
