<?php 
include './CheckCookie.php';
$cookie_name = "user";
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

  // if ($_GET['url'] == "registration"){
  //   include 'm_registration.php';
  // }

  if ($_GET['url'] == "pay"){
    include 'm_payment.php';
  }
  if ($_GET['url'] == "store"){
    include 'm_store.php';
  }

  if ($_GET['url'] == "item"){
    include 'm_item.php';
  }
  if ($_GET['url'] == "category"){
    include 'm_category.php';
  }

  if ($_GET['url'] == "registration"){
    include 'm_registration.php';
  }
  if ($_GET['url'] == "system_info"){
    include 'sys_info.php';
  }
  if ($_GET['url'] == "shop_item"){
    include 'm_shop_item.php';
  }

  











  if ($_GET['url'] == ""){
    include 'dashboard.php';
  }

}else{
	include 'dashboard.php'; 
}

include 'foot_res.php'; ?>
