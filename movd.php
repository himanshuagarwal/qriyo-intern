<?php 
// Connects to your Database 
mysql_connect("localhost", "prayaasc_qriyo", "qriyo_himanshu") or die(mysql_error()); 
mysql_select_db("prayaasc_qriyo") or die(mysql_error()); 
$search = $_POST['search'];
?>
<html>
<head>
<title>Qriyo Movie</title>
</head>
<body>
<?php 
$search=$_SERVER["QUERY_STRING"];
$data = mysql_query("SELECT DISTINCT title,poster,genre,director,plot,imdb_id,rated,language,writer,year,imdb_rating,awards,runtime FROM data WHERE imdb_id = '$search'")
or die(mysql_error()); 
echo "<table border cellpadding=3>"; 
while($info = mysql_fetch_array( $data )) 
{ 
echo "<tr>"; 
echo '<th colspan="2">'.$info['title'] . ' ('.$info['rated'] . ') ('.$info['language'] . ') ( '.$info['imdb_rating'] . ' Out of 10 )</th> </tr> '; 
echo '<tr><th rowspan="3"><img src="'.$info['poster'] .'"alt="No Media" height="150" width="150"></th></tr> '; 
echo "<th>Plot: ".$info['plot'] ."<br>Awards: ".$info['awards'] . "<br>Runtime: ".$info['runtime'] . "<br>Released: ".$info['year'] . "</th> "; 
echo "<tr><th>Genre: ".$info['genre'] . "<br>Director: ".$info['director'] . "<br>Writer: ".$info['writer'] . " </th></tr>"; 
} 
echo "</table>"; 
?>
</body>
</html>