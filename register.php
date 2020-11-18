<?php
session_start();

$con=mysqli_connect("localhost","root","ksyiris00","webstudy") or die("fail");

$id=$_POST['id'];
$pw=$_POST['pw'];
$name=$_POST['name'];
$email=$_POST['email'];

mysqli_select_db($con,'webstudy');

$query="select * from member where id = '$id'";
$result=$con->query($query);
$count=mysqli_num_rows($result);
if($count==1){?>
  <script>
      alert("중복된 id 입니다. 다시 입력해주세요.");
      location.replace("./register.html")
  </script>
<?php
}
else if($id==""||$pw==""||$name==""||$email=="")
{?>
  <script>
      alert("모든 정보를 빈칸 없이 입력해주세요.");
      location.replace("./register.html")
  </script>
<?php}

$sql="INSERT INTO member(id,pwd,name,email)VALUES('$id','$pwd','$name','$email')");
if(mysqli_query($con,$sql))
{?>
  <script>
      alert("회원가입 완료!");
      location.replace("./index.php")
  </script>
<?php
}
?>
