<?php
define('config', true);
require_once __DIR__.'/../../CMStra_db/config.php';

if(ISSET($_POST['search'])){

	$keyword = $_POST['keyword'];
	echo "<h3>Results for <i>$keyword</i></h3>";
	echo "<div style='overflow-x:auto;'><table>";
	echo "<thead><tr>";
	echo "<th>See/Edit/Del</th>";
	echo "<th>ID</th>";
	echo "<th>Online (0=no)</th>";
	echo "<th>Date</th>";
	echo "<th>Title</th>";
	echo "<th>Author</th>";
	echo "</tr></thead>";
	echo "<tbody>";
	// $query=$conn->query
	$stmt = $db->query("SELECT * FROM `contents` WHERE `id` LIKE '%$keyword%' OR `content_featured_image_desc` LIKE '%$keyword%' OR `content_featured_image` LIKE '%$keyword%' OR `content_tags` LIKE '%$keyword%' OR `content_title` LIKE '%$keyword%' OR `content_subtitle` LIKE '%$keyword%' OR `content_author` LIKE '%$keyword%' OR `content_date` LIKE '%$keyword%' OR `content_content` LIKE '%$keyword%'") or die("Error");

	while ($row = $stmt->fetch()) {
		echo "<tr><td><a href=\"view.php?id=$row[id]\">&#9744;</a> <a style='color:#fbb117' href=\"content_edit.php?id=$row[id]\">&#9998;</a> <a style='color:darkred' href=\"delete.php?id=$row[id]\" onClick=\"return confirm('DELETE CONTENT?')\">&#9746;</a><br><a href='#topresult'>&#8593;</a> <a href='#bottomresult'>&#8595;</a></td>
		<td>".$row['id']."</td>
		<td>".$row['content_status']."</td>
		<td>".$row['content_date']."</td>
		<td>".$row['content_title']."</td>		
		<td>".$row['content_author']."</td></tr>";
	}

		echo "</tbody>";
		echo "<tfoot><tr><td><a id='bottomresult'>&nbsp;</a></td><td></td><td></td><td></td><td></td><td></td></tr></tfoot>";
		echo "</table></div>";
		echo "<h3>End of results for <i>$keyword</i></h3>";
	}
