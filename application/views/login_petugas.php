<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('_partials/head') ?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<style type="text/css">
    body {
        color: #999;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
  }
  .form-control {
    box-shadow: none;
    border-color: #ddd;
  }
  .form-control:focus {
    border-color: #4aba70; 
  }
  .login-form {
        width: 350px;
    margin: 0 auto;
    padding: 30px 0;
  }
    .login-form form {
        color: #434343;
    border-radius: 1px;
      margin-bottom: 15px;
        background: #fff;
    border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
  }
  .login-form h4 {
    text-align: center;
    font-size: 22px;
        margin-bottom: 20px;
  }
    .login-form .avatar {
        color: #fff;
    margin: 0 auto 30px;
        text-align: center;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    z-index: 9;
    background: #3085d6;
    padding: 15px;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
  }
    .login-form .avatar i {
        font-size: 62px;
    }
    .login-form .form-group {
        margin-bottom: 20px;
    }
  .login-form .form-control, .login-form .btn {
    min-height: 40px;
    border-radius: 2px; 
        transition: all 0.5s;
  }
  .login-form .close {
        position: absolute;
    top: 15px;
    right: 15px;
  }
  .login-form .btn {
    background: #3085d6;
    border: none;
    line-height: normal;
  }
  .login-form .btn:hover, .login-form .btn:focus {
    background: #42ae68;
  }
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #4aba70;
    }
</style>
</head>
<body>
<div class="login-form">    
    <form action="<?php echo base_url('index.php/loginpetugas/auth') ?>" method="post">
    <div class="avatar"><i class="fa fa-user"></i></div>
      <h4 class="modal-title">Login sebagai Petugas</h4>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Password" required="required">
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">              
    </form>     
</div>
<?php $this->load->view('_partials/js') ?>
</body>
</html>