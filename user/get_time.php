<?php
include('include/config.php');
if(!empty($_POST["id"])) 
{?>
    <script>
    function datetime(s1,s2){
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        if(s1.value == "<?php echo ($date1);?>"){
            <?php $todaysdate= date("y-m-d");
        $sql2= mysqli_query($con,"select * from token where tokentime='9 Am' and tokendate='$todaysdate'");
        $count=mysqli_num_rows($sql2);
       
        if( $count<=11){?>
                                      <option value="9 am">9 Am</option>
        <?php }
        
        else{?>
            <option value="9 Am" disabled>9 Am <span style="color:red;">slot full!</span></option>
       <?php }
            ?>
            
        } else if(s1.value == "<?php echo ($date2);?>"){
            <?php 
        $sql2= mysqli_query($con,"select * from token where tokentime='10 Am' and tokendate ='$date2'");
        $count=mysqli_num_rows($sql2);
       
        if( $count<=11){?>
                                      <option value="10 am">10 Am</option>
        <?php }
        
        else{?>
            <option value="10 Am" disabled>10 Am <span>slot full!</span></option>
       <?php }
            ?>
            
        } else if(s1.value == "<?php echo ($date3);?>"){
            <?php
        $sql2= mysqli_query($con,"select * from token where tokentime='11 Am' and tokendate='$date3'");
        $count=mysqli_num_rows($sql2);
       
        if( $count<=11){?>
                                      <option value="11 am">11 Am</option>
        <?php }
        
        else{?>
            <option value="11 Am" disabled>11 Am <span style="color:red;">slot full!</span></option>
       <?php }
            ?>
            
        }
        
    }
    </script>   
<?php } ?>
<script> document.getElementById("apptime").value=d;</script>


