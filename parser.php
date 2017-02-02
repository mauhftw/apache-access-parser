#!/usr/bin/php
<?php

	$shortopt = "f:";
	$options = getopt($shortopt);

	if (!$options) {
		echo "Usage: php parser.php -f 'apache_access_log_file'\n";
		die;	
	}


	$filename = $options['f'];
	$content = file_get_contents($filename);

	$result = explode("\n",$content);
	$result = array_map('trim',$result);

	// Total number of entries
	$entries = count ($result);
	
	$aux = [];
	$row = [];
	$register = [];
	$origin = [];
	$resource = [];

	for ($i=0; $i<$entries-1; $i++) {

		$register = explode (" ", $result[$i]);
		$aux['ip'] = $register[0];
		$aux['date'] = $register[3];
		$aux['http_method'] = $register[5];
		$aux['url'] = $register[6];
		$aux['http_status'] = $register[8];
		$row[] = $aux;

		$origin[] = $register[0];
		$resource[] = $register[6];	
	}

	$success = 0;
	$failed = 0;

	foreach ($row as $key => $value) {
		
		// Number of success requests
		if (preg_match("/^2/",$value['http_status'])) {
			$success++;
		}

		// Number of failed requests
		if (preg_match("/^4/",$value['http_status'])) {
			$failed++;
		}
	}


	$top_clients = array_count_values($origin);
	arsort($top_clients);
	array_splice($top_clients,3);

	$top_resources = array_count_values($resource);
	arsort($top_resources);
	array_splice($top_resources,3);


	//Report
	echo "REPORT\n";
	echo "------\n\n";
	echo "No. of entries: ".$entries."\n";
	echo "No. of successs request: ".$success."\n";
	echo "No. of failed request: ".$failed."\n\n";
	echo "Top clients: \n";
	foreach ($top_clients as $client => $times) {
		echo "\t hostname/ip: ".$client ."\t\t No. of requests: ".$times."\n";
	}

	echo "Top Resources: \n";
	foreach ($top_resources as $resource => $times) {
		echo "\t Resource: ".$resource ."\t\t No. of Hits: ".$times."\n";
	}

	

