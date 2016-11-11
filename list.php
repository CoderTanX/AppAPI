<?php
	require_once("./db.php");
	require_once("./response.php");
	$page = isset($_GET["page"]) ? $_GET["page"] : 1;
	$pageSize = isset($_GET["pageSize"]) ? $_GET["pageSize"] : 6;
	if (!is_numeric($page) || !is_numeric($pageSize)) {
		return Response::json(400,"数据不合法");
	}
	$offset = ($page - 1) * $pageSize;
	$sql = "select *from student order by id desc limit $offset,$pageSize";
	$connect = Db::getInstance()->connect();
	$result = mysql_query($sql);
	$data = array();
	while ($stu = mysql_fetch_assoc($result)) {
		$data[] = $stu;
	}
	return Response::json(200,"成功",$data);
?>