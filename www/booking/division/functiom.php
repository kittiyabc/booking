<?php
function nailTotal($conn)
{

  $sql = "SELECT SUM(rooms) FROM tb_event WHERE rooms = 1";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
       return $row["SUM"];
    }
  } else {
    return 0;
  }
}
function eye11($conn)
{

  $sql = "SELECT SUM(rooms) FROM tb_event WHERE rooms = 2";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      return $row["SUM"];
    }
  } else {
    return 0;
  }
}
function cute11($conn)
{

  $sql = "SELECT SUM(rooms) FROM tb_event WHERE rooms = 3";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
       return $row["SUM"];
    }
  } else {
    return 0;
  }
}
?>