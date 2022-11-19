<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>

<head>
  <title>Result(s)</title>
</head>

<body>

  <table width='80%' border=0>

    <tr bgcolor='#CCCCCC'>
      <td>Name</td>
      <td>Course</td>
      <td>Fees</td>
      <td>Update</td>
    </tr>
    <?php
    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
    while ($res = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $res['name'] . "</td>";
      echo "<td>" . $res['course'] . "</td>";
      echo "<td>" . $res['fees'] . "</td>";
      echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
  </table>
</body>

</html>