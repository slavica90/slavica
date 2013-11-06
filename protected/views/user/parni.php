<div>
  <p> Ova se korisnici so paren ID</p>
  <?php foreach ($korisnici as $korisnik){?>
  <p><?php echo $korisnik->id;?></p>
  <p><?php echo $korisnik->name;?></p>
  <p><?php echo $korisnik->email;?></p>
  <p><?php echo $korisnik->password;?></p>
  <p><?php echo $korisnik->date_update;?></p>
  
  <hr/>
  <?php } ?>
  </div>
