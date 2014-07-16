<?php

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}

function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}




# Use the Curl extension to query Google and get back a page of results
$url = "http://500px.com/photo/74379269/panties-by-andr%C3%A9-josselin?from=user";
$url = "http://www.spiegel.de";

$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);

# Create a DOM parser object

 
 $dom = new DOMDocument();
$dom->loadHTML(utf8_encode ($html));
# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
//@$dom->loadHTML($html);



   $list = $dom->getElementsByTagName("title");
    if ($list->length > 0) {
        $title = $list->item(0)->textContent;
		echo $title;    }
		echo "<br /><br />";
		
		
		
foreach( $dom->getElementsByTagName('meta') as $meta ) { 
	echo 'Name: '. $meta->getAttribute('name');
	echo "<br />";
	echo 'Content: '. $meta->getAttribute('content');
	echo "<br /><br />";
}
echo "<br /><br />";


				
foreach( $dom->getElementsByTagName('link') as $link ) { 
	$t = $link->getAttribute('href');

	echo 'Type: '.$link->getAttribute('type');
	echo "<br />";
		
	echo 'Rel: '.$link->getAttribute('rel');
	echo "<br />";	
	
	if(startsWith($t ,'http')){
		echo 'URL: '. $t;
	}else{
		echo 'URLModifyed: '. $url.$t;
	}
	echo "<br /><br />";
}
echo "<br /><br />";
		
		
		
		
		

# Iterate over all the <a> tags
foreach($dom->getElementsByTagName('a') as $link) {
	# Show the <a href>		
	if(startsWith($link->getAttribute('href') ,'http')){
		echo $link->getAttribute('href');
		echo "<br />";
	}
}

# Iterate over all the <img> tags
foreach($dom->getElementsByTagName('img') as $link) {
        # Show the <a href>
        $t = $link->getAttribute('src');
		echo 'URL: '.$t;
		echo "<br />";
		echo 'Alt: '.$link->getAttribute('alt');
		echo "<br />";
		
	if(startsWith($t ,'http')){
        echo '<img src="'.$t.'" style="max-width:500px" />';
	}else{
		       echo '<img src="'.$url.$t.'" style="max-width:500px" />';
	}
		echo "<br /><br />";
}

 /*

// Feed einlesen
if( !$xml = simplexml_load_file('http://www.naughtyblog.org/feed/') ) {
    die('Fehler beim Einlesen der XML Datei!');
}
 
// Ausgabe Array
$out = array();
 
// auszulesende Datensaetze
$i = 20;
 
// Items vorhanden?
if( !isset($xml->channel[0]->item) ) {
    die('Keine Items vorhanden!');
}
 
// Items holen
foreach($xml->channel[0]->item as $item) {
    if( $i-- == 0 ) {
        break;
    }
 
    $out[] = array(
        'title'        => (string) $item->title,
        'description'  => (string) $item->description,
        'link'         => (string) $item->guid,
        'category'		=> (string) $item->category,
        'content'		=> (string) $item->content,
        'date'         => date('d.m.Y H:i', strtotime((string) $item->pubDate))
    );
}
 
// Eintraege ausgeben
foreach ($out as $value) {
    echo $value['title'].$value['description'].$value['link'].'</br>'.$value['category'].'</br>'.'</br>'.$value['date'].'</br>'.'</br>'.$value['content'].'</br>';
}

*/
?>