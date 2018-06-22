<?php
//登入SQL資訊
$servername = "sql313.byethost.com";
$username = "b32_21804395";
$dbpassword = "asdfghj";
$dbname = "b32_21804395_test";
$data="";
$head="";
$i=0;
$ii=0;

$con=@mysqli_connect($servername,$username,$dbpassword,$dbname) or die("失敗");
$sql="SELECT * FROM account";
$result=mysqli_query($con,$sql);

//把資料用迴圈叫出

while($str=mysqli_fetch_assoc($result)){
$status=$str["status"];
$permissions=$str["permissions"];
$user=$str["user"];
$date=$str["date"];



if($i==$ii){
    $data.=<<<HEREDOC
    <thead class="tbhead">
      <tr>
        <th width="5%">
          <input type="checkbox" value="Allnot" class="checkAll">
        </th>
        <th class="ccc" width="20%">狀態</th>
        <th width="20%">帳號</th>
        <th width="20%">使用者</th>
        <th width="20%">加入時間</th>
        <th width="20%">
        <a class="popup-with-zoom-anim" href="#account_add">
          <button class="btn btn-primary btn-fab  animate-fab">
           <i class="zmdi zmdi-plus"></i>
          </button>
        </a>
        </th>
      </tr>
    </thead>
    <tbody class="tbbody">
HEREDOC;
}
$data.=<<<HEREDOC
<tr class="ajax ajaxtogle">
  <th class="checkbox-cell">
    <input class="checkdelet" type="checkbox" value="donot">
  </th>
  <td>
    <div class="togglebutton">
      <label>
        <input type="checkbox" class="toggle-info" {$status}>
        <span class="toggle"></span>
      </label>
    </div>
  </td>
  <td>{$permissions}</td>
  <td class="use">{$user}</td>
  <td>{$date}</td>
  <td>
    <a href="#account_edit" class="edit-product icon popup-with-zoom-anim account_edit">
      <i class="zmdi zmdi-edit"></i>
    </a>
  </td>
</tr>
HEREDOC;
if($i==($ii+9)){
$data.=<<<HEREDOC
  </tbody>
HEREDOC;
$ii+=10;
}
$i++;

}
$page='';
$row=mysqli_num_rows($result);
$rows=($row/10)+1;
for($i=1;$i<=$rows;$i++){
  $page.=<<<HEREDOC
  <li class="page-item">
  <a class="page-link pagetogle" href="#">{$i}</a>
  </li>
HEREDOC;
}
$html=<<<HEREDOC
<!DOCTYPE html>
<html>

<head>
    <title>Nuskin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/vendor.bundle.css">
    <link rel="stylesheet" href="css/app.bundle.css">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script>var storage=localStorage.getItem("usertype");if(storage!="admin"){location.href="admin_login.html";}</script>
</head>


<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
      <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
      <a class="navbar-brand" href="admin.html"></a>
      <ul class="nav navbar-nav hidden-md-down">
        <li class="nav-item">
          <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a></li>
        <li class="nav-item px-1">
          <a class="nav-link" href="http://nuskin.ezweb.tw/">檢視前台網站</a></li>
      </ul>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img src="images/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
            <span class="hidden-md-down">admin</span></a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="account_password.html">
              <i class="fa fa-shield"></i>密碼修改</a>
            <a class="dropdown-item" href="admin_login.html">
              <i class="fa fa-lock"></i>登出</a>
          </div>
        </li>
      </ul>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav menu">
            <li class="nav-item">
              <a class="nav-link" href="account_list.php">
                <i class="material-icons">account_box</i>帳號增修
            </a></li>
            <li class="nav-item">
              <a class="nav-link" href="system_web.html">
                <i class="material-icons">settings</i>系統設定
              </a></li>            
            <li class="nav-item">
              <a class="nav-link" href="index_home.html">
                <i class="material-icons">home</i>首頁設定
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="news.html">
                <i class="material-icons">fiber_new</i>最新消息
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="volunteer.html">
                <i class="material-icons">favorite</i>志工紀錄
              </a>
            </li>         
            <li class="nav-item">
              <a class="nav-link" href="project.html">
                <i class="material-icons">work</i>專案管理
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order.html">
                <i class="material-icons">shopping_cart</i>訂單管理
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" href="achievement.html">
                <i class="material-icons">assignment_turned_in</i>執行成果
              </a>
            </li>            
          </ul>
        </nav>
      </div>
      <main class="main">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">管理首頁</li>
          <li class="breadcrumb-item">
            <a href="#">帳號增修</a></li>
          <li class="breadcrumb-menu">     
            <div class="btn-group float-right">
                <button type="button" class="btn btn-transparent active dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <i class="material-icons">settings</i>狀態
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item check" href="#"><i class="material-icons">check</i>開啟</a>
                    <a class="dropdown-item clear" href="#"><i class="material-icons">clear</i>關閉</a>
                </div>
            </div>           
            <div class="btn-group float-right">
                <button type="button" class="btn btn-transparent active p-0" id="search">
                    <i class="material-icons">search</i>搜尋
                </button>                 

            </div>  
            <div class="btn-group float-right">
                <button type="button" class="btn btn-transparent active p-0" id="delete">
                    <i class="material-icons">delete</i>刪除
                </button>                 

            </div>            
            <a class="popup-with-zoom-anim" href="#account_add">
              <div class="btn-group float-right">
                
                  <button type="button" class="btn btn-transparent active p-0">
                    <i class="material-icons">add_circle_outline</i>新增
                  </button>
              </div> 
            </a>
          </li> 
          <div class="card-search">
            <div id="productsTable_wrapper" class="form-group">
              <i class="zmdi zmdi-search search-icon-left"></i>
              <input type="text" class="form-control filter-input" placeholder="搜尋" id="search_input">
              <a href="#" class="close-search"><i class="zmdi zmdi-close"></i></a>
            </div>
          </div>
                  
        </ol>
        <section id="content_outer_wrapper">
          <div id="content_wrapper">
            <div id="content" class="container-fluid">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="card card-data-tables">
                        <div class="table-responsive">
                                <table class="mdl-data-table product-table  dataTable" cellspacing="0" width="100%" >
                                {$data}
                                </table>
                                <ul class="pagination">
                                  <li class="page-item"><a class="page-link" href="#"><</a>
                                  </li>
                                  {$page}
                                  <li class="page-item"><a class="page-link" href="#">></a>
                                  </li>
                                </ul>
                        </div>
                     
                    </div>
                  </div>
                </div>
             
            </div>
          </div>
        </section>
      </main>
    </div>
    <!-- 新增帳號lightbox -->
    <div id="account_add" class="zoom-anim-dialog mfp-hide">
      <div class="swal2-modal swal2-show">
        <div class="swal2-icon swal2-warning pulse-warning">
          <img src="images/user.png" alt="" width="60"></div>
          <h2 class="swal2-title">新增帳號</h2>
          <div class="card">
            <div class="card-block">
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">帳號 *</label>
                    <input id="newacc" type="text" class="form-control"  placeholder=""></div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">使用者</label>
                    <input id="newuser" type="text" class="form-control"  placeholder=""></div>
                </div>

              </div>              
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">密碼 *</label>
                    <input id="newpass" type="password" class="form-control"  placeholder=""></div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">密碼確認 *</label>
                    <input type="password" class="form-control"  placeholder=""></div>
                </div>   
              </div>  
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                <label for="ccnumber">狀態</label>
                  <div>
                  <label class="switch switch-text switch-primary">
                  <input id="newsta" type="checkbox" class="switch-input" value="">
                     <span class="switch-label" data-on="On" data-off="Off"></span>
                     <span class="switch-handle"></span>
                  </label></div>
                </div> 
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                     <label for="ccnumber">備註</label>
                     <textarea rows="4" class="form-control" placeholder="Content.."></textarea>
                  </div>
                </div>
              </div>                          
          </div>
          </div>
          <button id="newcon" type="button" class="sure_button">確定</button>
          <button type="button" class="cannel_button closebox ajaxbt">取消</button>
        </div>      
    </div>
    <!-- 編輯帳號lightbox -->
    <div id="account_edit" class="zoom-anim-dialog mfp-hide">
      <div class="swal2-modal swal2-show">
        <div class="swal2-icon swal2-warning pulse-warning">
          <img src="images/user.png" alt="" width="60"></div>
          <h2 class="swal2-title">編輯帳號</h2>
          <div class="card">
            <div class="card-block">
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">帳號</label>
                    <div class="form-control" style="background-color: #eee"></div>                    
                  </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">使用者</label>
                    <input id="user" type="text" class="form-control"  value=""></div>
                </div>

              </div>             
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">密碼 &nbsp;(若不需修改請留白)</label>
                    <input id="password" type="password" class="form-control"  placeholder="" value=""></div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                    <label for="ccnumber">密碼確認</label>
                    <input type="password" class="form-control"  placeholder=""></div>
                </div>   
              </div>
              <div class="row">
                <div class="col-lg-6 col-sm-12">
                <label for="ccnumber">狀態</label>
                  <div>
                  <label class="switch switch-text switch-primary">
                  <input id="status" type="checkbox" class="switch-input" value="">
                     <span class="switch-label" data-on="On" data-off="Off"></span>
                     <span class="switch-handle"></span>
                  </label></div>
                </div>
                <div class="col-lg-6 col-sm-12">
                  <div class="form-group">
                     <label for="ccnumber">備註</label>
                     <textarea rows="4" class="form-control" placeholder="Content.."></textarea>
                  </div>
                </div>
              </div>     
          </div>
          </div>
          <button id="confirm" type="button" class="sure_button">確定</button>
          <button type="button" class="cannel_button closebox ajaxbt">取消</button>
        </div>      
    </div>
    <footer class="app-footer">
      <span>Copyright &copy; 2018.Nuskin All rights reserved.</span>
    </footer>
    <a class="page-scroll goToTop" id="goTop"><span></span></a>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/pace.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/search.js"></script>
    <script src="js/account.js"></script>
  </body>

</html>
HEREDOC;
echo $html;
mysqli_close($con);
?>