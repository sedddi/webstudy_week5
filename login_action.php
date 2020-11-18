<?php
session_start();

$con=mysqli_connect("localhost","root","ksyiris00","webstudy") or die("fail");

$id=$_POST['id'];
$pw=$_POST['pw'];

$query="select * from member where id = '$id'";
$result=$con->query($query);

if(mysqli_num_rows($result)==1){
  $row=mysqli_fetch_assoc($result);

  if($row['pw']==$pw){
    $_SESSION['id']=$id;
    if(isset($_SESSION['id'])){
      ?>
      <script>
      alert("로그인 성공.");
      location.replace("./index.php")
      </script>
<?php
    }
    else{
      echo "비밀번호 불일치";
    }
  }
  else{
    ?>
    <script>
    alert("아이디 혹은 비밀번호 불일치");
    history.back();
    </script>
  <?php
}
  }
  else{
    ?>
    <script>
    //alert("로그인 실패");
    history.back();
    </script>
<?php
    }
    ?>
