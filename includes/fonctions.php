<?php

/*
 * Function getRemoteInformations
 *
 * This function return remote informations
 *
 * @param (type) about this param
 * @return (type)
 */
function getRemoteInformations(){
	set_time_limit(500);
	$message = "";
	$conn_id = ftp_connect(ftp_server);
	$login_result = ftp_login($conn_id, ftp_user_name, ftp_user_pass);
	ftp_pasv($conn_id, true); 

	if ($login_result) $message = "Remote host has successfully established connection!";
	else $message = "Remote host has failed to establish a connection!";

	function getRecDirSize ($connection, $dir){
        $temp = ftp_rawlist ($connection, "-alR $dir");
		$size = 0;
        foreach ($temp as $file){
            if (preg_match ("/([-d][rwxst-]+).* ([0-9]) ([a-zA-Z0-9]+).* ([a-zA-Z0-9]+).* ([0-9]*) ([a-zA-Z]+[0-9: ]*[0-9]) ([0-9]{2}:[0-9]{2}) (.+)/", $file, $regs)){  
                $isdir = (substr ($regs[1],0,1) == "d");
                if (!$isdir)
                    $size += $regs[5];
            }
        }
        return $size;
    }
	
	function ftpRecursiveFileListing($ftpConnection, $path) { 
		static $allFiles = array(); 
		$contents = ftp_nlist($ftpConnection, $path); 
		foreach($contents as $currentFile) { 
		
			$info = pathinfo(substr($currentFile, strlen($path) + 1));
			// Currently Disabled
			//if ($info['extension'] =='' or strlen($info['extension']) > 3) ftpRecursiveFileListing($ftpConnection, $currentFile); 
				$fileInfo = array();
				$fileInfo['name'] = str_replace('/','',substr($currentFile, strlen($path)));
				$fileInfo['path'] = $path;
				$dirSize = getRecDirSize ($ftpConnection, $currentFile);
				$fileInfo['size'] = $dirSize;
				$fileInfo['extension'] = $info['extension'];
				$fileInfo['status'] = 'Not Transfered';
				$allFiles[str_replace('/','',substr($currentFile, strlen($path)))] = $fileInfo;			
		} 
		return $allFiles; 
	} 

	$result = array(
		'files' => ftpRecursiveFileListing($conn_id, remote_path_sync),
		'server' => ftp_server,
		'connected' => $login_result,
		'message' =>  $message
	);	
	return $result;
}

/*
 * Function getSyncHist
 *
 * what the function does
 *
 * @param (type) about this param
 * @return (type)
 */
function getSyncHist(){
	set_time_limit(500);
	$message = "";
	$conn_id = ftp_connect(ftp_server);
	$login_result = ftp_login($conn_id, ftp_user_name, ftp_user_pass);
	ftp_pasv($conn_id, true); 

	if ($login_result) $message = "Remote host has successfully established connection!";
	else $message = "Remote host has failed to establish a connection!";

	function getRecDirSize ($connection, $dir){
        $temp = ftp_rawlist ($connection, "-alR $dir");
        foreach ($temp as $file){
            if (ereg ("([-d][rwxst-]+).* ([0-9]) ([a-zA-Z0-9]+).* ([a-zA-Z0-9]+).* ([0-9]*) ([a-zA-Z]+[0-9: ]*[0-9]) ([0-9]{2}:[0-9]{2}) (.+)", $file, $regs)){  
                $isdir = (substr ($regs[1],0,1) == "d");
                if (!$isdir)
                    $size += $regs[5];
            }
        }
        return $size;
    }
	
	function ftpRecursiveFileListing($ftpConnection, $path) { 
		static $allFiles = array(); 
		$contents = ftp_nlist($ftpConnection, $path); 
		foreach($contents as $currentFile) { 		
			$info = pathinfo(substr($currentFile, strlen($path) + 1));			
			$fileInfo = array();
			$fileInfo['name'] = str_replace('/','',substr($currentFile, strlen($path)));
			$fileInfo['path'] = $path;	
			$allFiles[str_replace('/','',substr($currentFile, strlen($path)))] = $fileInfo;			
		} 
		return $allFiles; 
	} 

	$result = array(
		'files' => ftpRecursiveFileListing($conn_id, remote_path_completed),
		'server' => ftp_server,
		'connected' => $login_result,
		'message' =>  $message
	);
	
	return $result;
}


/*
 * Function printGrid
 *
 * what the function does
 *
 * @param (type) about this param
 * @return (type)
 */
function printGrid(){
	 
	$arrRemoteFTP = getRemoteInformations();	

	function human_filesize($bytes, $decimals = 2) {
		$sz = 'BKMGTP';
		$factor = floor((strlen($bytes) - 1) / 3);
		return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	}
		
	echo "<table class='table table-striped' border='0' style='width:80%'>
	<tr>
	<th>Nom du fichier</th>
	<th>Taille</th> 	
	<th>Status</th>         					
	</tr>	";

		foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(local_path_sync)) as $filename){
			$filesizeRemote = 0;
			$synching = false;
			$userfile_extn = substr($filename, strrpos($filename, '.')+1);	
			if($userfile_extn == "lftp-pget-status"){
				$name = str_replace(".lftp-pget-status", '', $filename);				
				$filesize = human_filesize(abs(filesize($name)));				
				$result = explode('/', $name);
				
				if(count($result)<= 6){
					$name = $result[count($result)-1];
				}else{
					$name = $result[count($result)-2]."/".$result[count($result)-1];
				}
				//TODO: Get filesize using DELUGE API. (Currently Disabled)
				//$filesizeRemote = 0;			
				//$filesizeRemote = human_filesize(abs($arrRemoteFTP['files'][$name]['size']));
				//if(array_key_exists($name,$arrRemoteFTP['files'])){
					$status = $arrRemoteFTP['files'][$name]['status'];
					$pourcent = 100; //round(($filesize /$filesizeRemote)*100,2);			
					echo "<tr><td style='width: auto; font-size: 14px'> <a href='#'> $name </a> </td>
							<td style='font-size: 14px'> $filesize </td>					
							<td style='width: 20%'>
								<div class='progress'>
								<div class='progress-bar progress-bar-striped active' role='progressbar' aria-valuenow='".$pourcent."'
									aria-valuemin='0' aria-valuemax='100' style='width:".$pourcent."%'>
									Récupération en cours...
								</div>
								</div>
							</td>								
							</tr>";
				//}				
			}
		}
		
	echo "</table>";
}
?>