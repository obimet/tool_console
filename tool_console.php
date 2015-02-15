<?php

    //      PATH TO users.csv = C:\users.csv

          $record=array(
            'first_name' => array(
                'last_name' => array(
                    'username' => array(
                        'password' => array(),
                        ),
                    ),
                ),
            );

        if (($handle = fopen("c:\users.csv", "r")) !== FALSE) {
          $row = 0;
        	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        	    	$num = count($data);
        	    	$row++;
        		    $record['first_name'][]=$data[0];
                $record['last_name'][]=$data[1];
                $record['birthday'][]=$data[2];
                $record['city'][]=$data[3];
        		}
        		fclose($handle);
        
            echo "\nUseriste aus Duesseldorf:\n";
            
            for($i=0;$i<=$row-1;$i++)
            {
        	    	if(utf8_decode($record['city'][$i])=='Düsseldorf' || $record['city'][$i]=='Duesseldorf')
        		    {
                    echo "\n";
                    
                    $old=floor((time()-strtotime($record['birthday'][$i]))/(60*60*24*365.25));
                    
        		        echo  $record['first_name'][$i],' ',$record['last_name'][$i],', ',$old,' Jahre alt.';
        		    }     
            }	    
        }    
        else
          echo 'logins.csv ist nicht gefunden!';

?> 


