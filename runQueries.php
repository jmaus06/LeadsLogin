<?php
if ($yesOrNo == "Yes"){                      //Attending_____________________
        if (alreadyExists($result))
            mysqli_query($conn,$sqlUpdateY);        
        else
            mysqli_query($conn,$sqlInsertY);        
}
else if ($yesOrNo == "No"){                  //Not Attending_________________
        if (alreadyExists($result))
            mysqli_query($conn,$sqlUpdateN);        
        else
            mysqli_query($conn,$sqlInsertN);        
}
else{                                        //Change to unsure________________
       if (alreadyExists($result))
            mysqli_query($conn,$sqlUpdateNull);        
        else
            mysqli_query($conn,$sqlInsertNull);        
}
?>