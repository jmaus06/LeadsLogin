<?php
if (alreadyExists($result)) {
            while($row = mysqli_fetch_assoc($result)) { 
                if ($row["Name"] != "ViewOnly"){           
                        $showName = $row["Name"]; 
                        ?><td><?php echo $showName;?><td><?php  
                        if ($colPosition%3 == 0){
                            ?></tr><tr><?php
                        }
                    $colPosition++;                    
                }
            }     
        }
        ?>