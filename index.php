<?php 
// Connects to your Database 
mysql_connect("localhost", "prayaasc_qriyo", "qriyo_himanshu") or die(mysql_error()); 
mysql_select_db("prayaasc_qriyo") or die(mysql_error()); 
$search = $_POST['search'];
$genre = $_POST['genre'];
?>
<html>
<head>
<title>Qriyo Movie</title>

</head>
<body>
<form method="post" action="index.php">
<centre>
    <h2>Type in the title, plot, and director of the movie</h2>
    <input type="text" name="search" id="search_box" placeholder="Enter Keyword" class='search_box' />
    <input type="text" name="genre" id="genre_box"  placeholder="Enter Genre" class='search_box' />
    <input type="submit" value="Search" class="search_button" /><br />
    </centre>
</form>
      
<div id="searchresults">Search results for your keyword. <span class="word"></span></div>
<div id="results" class="update">
</div>
<?php 
if (!$search && !$genre)
echo "";
else if($search)
$data = mysql_query("SELECT DISTINCT title,poster,genre,director,plot,imdb_id FROM data WHERE title LIKE '%$search%' OR plot LIKE '%$search%' OR director LIKE '%$search%'") 
or die(mysql_error()); 
else if($genre)
$data = mysql_query("SELECT DISTINCT title,poster,genre,director,plot,imdb_id FROM data WHERE genre LIKE '%$genre%'") 
or die(mysql_error());
else
$data = mysql_query("SELECT DISTINCT title,poster,genre,director,plot,imdb_id FROM data WHERE genre LIKE '%$genre%' AND (title LIKE '%$search%' OR plot LIKE '%$search%' OR director LIKE '%$search%')") 
or die(mysql_error());
echo "<table border cellpadding=3>"; 
while($info = mysql_fetch_array( $data )) 
{ 
echo "<tr>"; 
echo '<th colspan="2"><a href="http://qriyo.prayaascorps.com/movd.php?'.$info['imdb_id'] . '">'.$info['title'] . '</a></th> </tr> '; 
echo '<tr><th rowspan="3"><a href="http://qriyo.prayaascorps.com/movd.php?'.$info['imdb_id'] . '"><img src="'.$info['poster'] .'"alt="No Media" height="150" width="150"></a></th></tr> '; 
echo "<th>Plot: ".$info['plot'] ."</th> "; 
echo "<tr><th>Genre: ".$info['genre'] . "<br>Director: ".$info['director'] . " </th></tr>"; 
} 
echo "</table>"; 
?>
</body>
</html>