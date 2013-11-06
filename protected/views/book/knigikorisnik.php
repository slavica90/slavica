<div>
  
   
  <form name="form1" method="post" onsubmit="return validateForm()">
    Izberete za koj korisnik:       
    <select name="userid">   
   <?php foreach($iminja as $key => $ime){
     echo $ime;?>
     <option value="<?php echo $key; ?>"><?php echo $ime; ?></option>
   <?php }?>
    </select>
    <input type="submit" name="Submit"value="Submit"> <br/>
    <label id="lableid"></label>

</form>
  <script type="text/javascript">
  function validateForm()
{
  var idja = <?php echo json_encode($idja);?>;
var x=document.forms["form1"]["userid"].value;
var reg = /^\d+$/;
if(idja.indexOf(x) == -1){
  alert('ne postoi');
  return false;
}
if (x==="")
  {
    document.getElementById("lableid").innerHTML = 'POPOLNI ID!!!';
    return false;
  }
  else if(!reg.test(x))
  {
    alert("Please enter integers only");
    x.value="";
    x.focus();
  return false; 
  }
  else
    {
       document.getElementById("lableid").innerHTML = 'SE E VO RED';
    }
}










</script>

  <?php if($knigi != NULL) {?>

  <p> <?php echo 'Ova se knigite na korisnikot so id:'.$iduser ?> </p>
  <?php foreach ($knigi as $kniga){?>
  <p><?php echo $kniga->id;?></p>
  <p><?php echo $kniga->title;?></p>
  <p><?php echo $kniga->year;?></p>
  <p><?php echo $kniga->image_url;?></p>
 
  <hr/>
  <?php } ?>
  <?php } ?>
  </div>
