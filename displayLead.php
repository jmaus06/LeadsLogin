<?php
if (alreadyExists($result)) {
            while($row = mysqli_fetch_assoc($result)) { 
                if ($row["Name"] != "ViewOnly"){                //      ONLY IF VALID NAME 
                        $showName = $row["Name"]; 
                        ?><td><?php echo $showName;?><td><?php  
                        if ($colPosition%3 == 0){               //      ONLY 3 PER LINE
                            ?></tr><tr><?php
                        }
                    $colPosition++;                    
                }
            }     
        }
        ?>