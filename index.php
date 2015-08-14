<?php
require_once 'Xpath.php';
$startUrl = "http://www.bbc.com/sport/football/premier-league/fixtures";

//href -- //td[@class='title']/a/@href
//title -- //td[@class='title']/a/text()
//img src -- //td[@class='image']//img/@src
//img title -- //td[@class='image']//img/@title

$xpath = new XPATH($startUrl);

//$imageQuery = $xpath->query("//td[@class='image']//img/@src");
//$imageTitleQuery = $xpath->query("//td[@class='image']//img/@title");
////td[@class='kickoff']/text()
$linkTitleQuery = $xpath->query("//span[@class='team-home teams']/a/text()");
$linkTitleQuery1 = $xpath->query("//span[@class='team-away teams']/a/text()");
// $gameTime = $xpath->query("//td[@class='kickoff']/text()");
$gameTime = $xpath->query("//td[@class='kickoff']");
$gameDate = $xpath->query("//div[@class='fixtures-table full-table-medium']//h2[@class='table-header']/text()");
$linkHrefQuery = $xpath->query("//span[@class='team-home teams']/a/@href");

// echo $imageQuery->length;
// echo $imageTitleQuery->length;
// echo $linkTitleQuery->length;
$data = array();
for($x=0; $x<$linkHrefQuery->length; $x++){
	//$data[$x]['imageTitle'] = $imageTitleQuery->item($x)->nodeValue;
	//$data[$x]['imageSrc'] = $imageQuery->item($x)->nodeValue;
	
	$data[$x]['Home Team'] = $linkTitleQuery->item($x)->nodeValue;
	$data[$x]['Away Team'] = $linkTitleQuery1->item($x)->nodeValue;
	// $data[$x]['KickOff'] = trim($gameTime->item($x)->nodeValue);
	
	// $table = $gameTime->item($x)->parentNode->parentNode->parentNode;
	// $data[$x]['Date'] = trim($table->previousSibling->previousSibling->nodeValue);
	//$data[$x]['linkHrefQuery'] = $linkHrefQuery->item($x)->nodeValue;
}
echo "<pre>";
// print_r($data);
print_r(json_encode($data));
