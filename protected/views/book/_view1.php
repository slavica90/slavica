<div class="listreview">

  <?php foreach ($dataProvider as $dp){ ?>
    <div>
       By <?php echo Book::model()->getUserName($dp->user_id); ?> <br/>
      <?php // echo $dp->book_id; ?>
      <span style="font-size: 15px;font-weight: 600"><?php echo $dp->title; ?> </span><br/>
      Description: <?php echo $dp->description; ?> <br/>
      Date created: <?php echo $dp->date_create; ?> <br/>
      <br/>
      
    </div>
  <?php } ?>
</div>
  
	