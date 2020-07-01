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

  if ($_GET['url'] == "book"){
    include 'm_book.php';
  }
  if ($_GET['url'] == "arts_and_crafts"){
    include 'm_arts_and_crafts.php';
  }
  if ($_GET['url'] == "uniform"){
    include 'm_uniform.php';
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

















  







  if ($_GET['url'] == "order_a_report"){
    include 'r_order_a_report.php';
  }
  if ($_GET['url'] == "item_a_report"){
    include 'r_item_a_report.php';
  }
  
  
  if ($_GET['url'] == ""){
    include 'dashboard.php';
  }

}else{
	include 'dashboard.php'; 
}

include 'foot_res.php'; ?>
